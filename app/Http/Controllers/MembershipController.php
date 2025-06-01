<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use App\Models\User;
use App\Notifications\MembershipVerified;
use App\Notifications\MembershipRejected;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class MembershipController extends Controller
{

    public function show(Request $request)
    {

        $members = Membership::with(['member', 'gym'])->get();


        foreach ($members as $membership) {
            if (is_null($membership->member)) {
                Log::warning('Membership tanpa user ditemukan ID: ' . $membership->id);
            }
            if (is_null($membership->gym)) {
                Log::warning('Membership tanpa gym ditemukan ID: ' . $membership->id);
            }
        }
        // Ambil role dan user_id dari session
        $role = Session::get('role');
        $userId = Session::get('user_id');

        if ($role === 'admin') {

            $members = Membership::with('gym')->get();
        } elseif ($role === 'gym owner') {

            $members = Membership::with('gym')
                ->whereHas('gym', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                })->get();
        } else {
            // Role tidak valid
            return abort(403, 'Unauthorized access');
        }

        // Kirim data $members ke view 
        return view('dashboard.membership.membership', compact('members'));
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:15',
            'pembayaran' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'gym_id' => 'required|exists:gyms,gym_id',
        ]);


        $user_id = Session::get('user_id');


        if (!$user_id) {
            return redirect()->route('home.welcome')->with('error', 'User tidak terdaftar, silakan login terlebih dahulu');
        }

        $filePath = $request->file('pembayaran')->store('pembayaran', 'public');


        $membership = new Membership();
        $membership->user_id = $user_id;
        $membership->gym_id = $request->gym_id;
        $membership->name = $request->name;
        $membership->email = $request->email;
        $membership->no_hp = $request->no_hp;
        $membership->pembayaran = $filePath;
        $membership->status = 'pending';
        $membership->save();

        flash('Data berhasil di tambahkan. Tunggu verifikasi dari sistem!', 'success');
        return redirect()->back();
    }


    public function approve($id)
    {
        $membership = Membership::find($id);

        if (!$membership) {
            return redirect()->route('membership');
        }


        $membership->status = 'approved';
        $membership->save();


        Notification::route('mail', $membership->email)
            ->notify(new MembershipVerified($membership));

        flash('Member di setujui!', 'success');
        return redirect()->route('membership');
    }


    public function reject($id)
    {
        $membership = Membership::find($id);

        if (!$membership) {
            return redirect()->route('membership')->with('error', 'Membership tidak ditemukan');
        }


        $membership->status = 'rejected';
        $membership->save();


        Notification::route('mail', $membership->email)
            ->notify(new MembershipRejected($membership));

        return redirect()->route('membership')->withErrors(['error' => 'Member berhasil di tolak!']);;
    }
    public function searchmember(Request $request)

    {
        // Ambil parameter pencarian dari input
        $search = $request->input('search');

        // Cari berdasarkan nama, email, dan no_hp
        $members = Membership::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('no_hp', 'like', '%' . $search . '%')
            ->get();

        // Kirim data ke view
        return view('dashboard.membership.membership', compact('members'));
    }
}
