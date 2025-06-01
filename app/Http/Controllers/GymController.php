<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Gyms;
use App\Models\FotoGym;
use App\Models\PublicFacility;
use App\Models\ToolFacility;
use App\Models\GymAddress;
use Illuminate\Support\Facades\Storage;
use App\Models\Trainers;


class GymController extends Controller
{

    
    public $gyms;
    public function indexgym(Request $request)
    {
        $user = Session::get('role');
        $userId = Session::get('user_id');

        // Cek role pengguna
        if ($user === 'admin') {
            // Jika admin, tampilkan semua gym
            $gyms = Gyms::with('fotoGym')->get(); 
        } elseif ($user === 'gym owner') {
            // Jika gym owner, tampilkan gym yang sesuai dengan user_id
            $gyms = Gyms::with('fotoGym')->where('user_id', $userId)->get(); 
        } else {
            
            return abort(403, 'Unauthorized access');
        }

      
        return view('dashboard.gym.data-gym', ['gyms' => $gyms]);
    }

    //--------------------------------------Form 1 --------------------------------------

    public function storeGym(Request $request)
    {
        $validatedData = $request->validate([
            'gym_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'price_member' => 'required|numeric|min:0',
            'rekening' => 'required|string|max:255',
            'description' => 'nullable|string',
            'no_hpowner' => 'required|numeric',
        ]);

        $gym = new Gyms();
        $gym->gym_name = $validatedData['gym_name'];
        $gym->price = $validatedData['price'];
        $gym->price_member = $validatedData['price_member'];
        $gym->rekening = $validatedData['rekening'];
        $gym->description = $validatedData['description'];
        $gym->no_hpowner = $validatedData['no_hpowner'];
        $gym->user_id = session('user_id');
        $gym->save();

        session(['gym_id' => $gym->gym_id]);

        flash('Data berhasil disimpan!', 'success');
        return redirect()->route('gym.foto')->withInput();
    }

    public function addGym()
    {
        return view('dashboard.gym.form-gym.add-gym');
    }

    //--------------------------------------Form 2--------------------------------------

    public function storeFotoGym(Request $request)
    {

        $request->validate([
            'foto_gym1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foto_gym2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_gym3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        $gym_id = session('gym_id');

        if (!$gym_id) {
            return redirect()->route('gym.foto')->with('error', 'Gym ID tidak ditemukan.');
        }


        $path1 = null;
        if ($request->hasFile('foto_gym1')) {
            $path1 = $request->file('foto_gym1')->store('gyms', 'public');
        }


        $path2 = null;
        if ($request->hasFile('foto_gym2')) {
            $path2 = $request->file('foto_gym2')->store('gyms', 'public');
        }


        $path3 = null;
        if ($request->hasFile('foto_gym3')) {
            $path3 = $request->file('foto_gym3')->store('gyms', 'public');
        }


        FotoGym::create([
            'gym_id' => $gym_id,
            'foto_gym1' => $path1,
            'foto_gym2' => $path2,
            'foto_gym3' => $path3,
        ]);

        flash('Foto berhasil disimpan!', 'success');
        return redirect()->route('fasilitas.umum')->withInput();
    }

    public function addFotoGym()
    {

        $gym_id = session('gym_id');


        return view('dashboard.gym.form-gym.foto-gym', compact('gym_id'));
    }

    //--------------------------------------Form 3 --------------------------------------
    public function storeFasilitasUmum(Request $request)
    {
        $validatedData = $request->validate([
            'public_facility' => 'required|array',
            'public_facility.*' => 'string|max:255',
        ]);

        $gym_id = session('gym_id');
        if (!$gym_id) {
            return redirect()->route('fasilitas.umum')->with('error', 'Gym ID tidak ditemukan dalam sesi.');
        }


        foreach ($validatedData['public_facility'] as $facility) {
            PublicFacility::create([
                'gym_id' => $gym_id,
                'public_facility' => $facility,
            ]);
        }

        flash('Fasilitas umum berhasil disimpan!', 'success');
        return redirect()->route('fasilitas.alat');
    }
    public function addFasilitasUmum()
    {
        return view('dashboard.gym.form-gym.fasilitas-umum');
    }

    //--------------------------------------Form 4 --------------------------------------
    public function storeFasilitasAlat(Request $request)
    {
        flash('Fasilitas umum berhasil disimpan!', 'success');
        $validatedData = $request->validate([
            'tool_facility' => 'required|array',
            'tool_facility.*' => 'string|max:255',
        ]);

      
        $gym_id = session('gym_id');
        if (!$gym_id) {
            return redirect()->route('fasilitas.alat')->with('error', 'Gym ID tidak ditemukan dalam sesi.');
        }


        foreach ($validatedData['tool_facility'] as $facility) {
            ToolFacility::create([
                'gym_id' => $gym_id,
                'tool_facility' => $facility,
            ]);
        }
        flash('Fasilitas alat berhasil disimpan!', 'success');
        return redirect()->route('gym.alamat');
    }
    public function addFasilitasAlat()
    {
        return view('dashboard.gym.form-gym.fasilitas-alat');
    }

    //--------------------------------------Form 5 --------------------------------------
    public function storeAlamatGym(Request $request)
    {

        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'regency' => 'required|string|max:255',
            'subdistrict' => 'required|string|max:255',
            'link' => 'required|string',
        ]);


        $gym_id = session('gym_id');
        if (!$gym_id) {
            return redirect()->route('gym.alamat')->with('error', 'Gym ID tidak ditemukan dalam sesi.');
        }


        GymAddress::create([
            'gym_id' => $gym_id,
            'address' => $validatedData['address'],
            'province' => $validatedData['province'],
            'regency' => $validatedData['regency'],
            'subdistrict' => $validatedData['subdistrict'],
            'link' => $validatedData['link'] ?? null,
        ]);

        flash('Alamat gym berhasil disimpan!', 'success');
        return redirect()->route('gym.trainer');
    }
    public function addAlamatGym()
    {
        return view('dashboard.gym.form-gym.alamat-gym');
    }

    //--------------------------------------Form 6 Trainer --------------------------------------

    public function add()
    {
        $gym_id = session('gym_id'); // Mendapatkan gym_id dari sesi
        if (!$gym_id) {
            return redirect()->route('dashboard')->with('error', 'Gym ID tidak ditemukan dalam sesi.');
        }

        return view('dashboard.gym.form-gym.form-trainer.add-trainer', compact('gym_id'));
    }
    public function storeTrainerGym(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'gym_id' => 'required|exists:gyms,gym_id', 
            'trainer_name' => 'required|string|max:255',
            'no_hptrainer' => 'required|numeric',
            'foto_trainer' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gender_trainer' => 'required|in:Laki-laki,Perempuan',
        ]);

        // Simpan foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto_trainer')) {
            $fotoPath = $request->file('foto_trainer')->store('trainers', 'public');
        }

        // Simpan data trainer
        Trainers::create([
            'gym_id' => $validatedData['gym_id'],
            'trainer_name' => $validatedData['trainer_name'],
            'no_hptrainer' => $validatedData['no_hptrainer'],
            'foto_trainer' => $fotoPath,
            'gender_trainer' => $validatedData['gender_trainer'],
        ]);

        flash('Trainer berhasil ditambahkan!', 'success');
        return redirect()->route('gym.trainer');
    }

    
    public function TrainerGym()
    {
        $gym_id = session('gym_id'); 
        if (!$gym_id) {
            return redirect()->route('dashboard')->with('error', 'Gym ID tidak ditemukan dalam sesi.');
        }

        
        $trainers = Trainers::where('gym_id', $gym_id)->get();

   
        return view('dashboard.gym.form-gym.trainer-gym', compact('trainers'));
    }

    //--------------------------------------Search --------------------------------------
    public function searchgymD(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $gyms = Gyms::with('fotoGym')
                ->where('gym_name', 'like', '%' . $query . '%')
                ->get();
        } else {

            $gyms = Gyms::with('fotoGym')->get();
        }

        return view('dashboard.gym.data-gym', compact('gyms'));
    }





    //--------------------------------------Edit Form 1--------------------------------------
    public function editDataGym(Request $request)
    {
        $gym_id = $request->query('gym_id');
        $gym = Gyms::findOrFail($gym_id);
        session(['gym_id' => $gym_id]);
        return view('dashboard.gym.form-edit.edit-data-gym', compact('gym'));
    }

    public function updateDataGym(Request $request)
    {

        $validatedData = $request->validate([
            'gym_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'price_member' => 'required|numeric|min:0',
            'rekening' => 'required|string|max:255',
            'description' => 'nullable|string',
            'no_hpowner' => 'required|numeric',     
        ]);

        $gym_id = $request->input('gym_id');
        $gym = Gyms::findOrFail($gym_id);


        $gym->gym_name = $validatedData['gym_name'];
        $gym->price = $validatedData['price'];
        $gym->price_member = $validatedData['price_member'];
        $gym->rekening = $validatedData['rekening'];
        $gym->description = $validatedData['description'];
        $gym->no_hpowner = $validatedData['no_hpowner'];
        $gym->save();
        flash('Data gym berhasil diperbarui!', 'success');
        return redirect()->route('gym.edit.foto');
    }

    //--------------------------------------Edit Form 2--------------------------------------
    public function editFotoGym()
    {
        $gym_id = session('gym_id');
        $gym = Gyms::with('fotoGym')->findOrFail($gym_id);
        return view('dashboard.gym.form-edit.edit-foto-gym', compact('gym'));
    }


    public function updateFotoGym(Request $request)
    {
        $request->validate([
            'foto_gym1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_gym2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_gym3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gym_id = session('gym_id');
        $fotoGym = FotoGym::where('gym_id', $gym_id)->first();

        if ($request->hasFile('foto_gym1')) {
            $fotoGym->foto_gym1 = $request->file('foto_gym1')->store('gyms', 'public');
        }

        if ($request->hasFile('foto_gym2')) {
            $fotoGym->foto_gym2 = $request->file('foto_gym2')->store('gyms', 'public');
        }

        if ($request->hasFile('foto_gym3')) {
            $fotoGym->foto_gym3 = $request->file('foto_gym3')->store('gyms', 'public');
        }

        $fotoGym->save();
        flash('Foto gym berhasil disimpan!', 'success');
        return redirect()->route('gym.edit.fasilitas.umum');
    }

    //--------------------------------------Edit Form 3--------------------------------------
    public function editFasilitasUmum()
    {
        $gym_id = session('gym_id');
        $publicFacilities = PublicFacility::where('gym_id', $gym_id)->get();
        return view('dashboard.gym.form-edit.edit-fasilitas-umum', compact('publicFacilities'));
    }

    public function updateFasilitasUmum(Request $request)
    {
        $validatedData = $request->validate([
            'public_facility' => 'required|array',
            'public_facility.*' => 'string|max:255',
        ]);

        $gym_id = session('gym_id');
        PublicFacility::where('gym_id', $gym_id)->delete();

        foreach ($validatedData['public_facility'] as $facility) {
            PublicFacility::create([
                'gym_id' => $gym_id,
                'public_facility' => $facility,
            ]);
        }
        flash('Fasilitas umum berhasil diperbarui!', 'success');
        return redirect()->route('gym.edit.fasilitas.alat');
    }

    //--------------------------------------Edit Form 4--------------------------------------

    public function editFasilitasAlat()
    {
        $gym_id = session('gym_id');
        $toolFacilities = ToolFacility::where('gym_id', $gym_id)->get();


        $toolFacilitiesArray = $toolFacilities->pluck('tool_facility')->toArray();

        return view('dashboard.gym.form-edit.edit-fasilitas-alat', compact('toolFacilitiesArray'));
    }


    public function updateFasilitasAlat(Request $request)
    {
        $validatedData = $request->validate([
            'tool_facility' => 'required|array',
            'tool_facility.*' => 'string|max:255',
        ]);

        $gym_id = session('gym_id');
        ToolFacility::where('gym_id', $gym_id)->delete();

        foreach ($validatedData['tool_facility'] as $facility) {
            ToolFacility::create([
                'gym_id' => $gym_id,
                'tool_facility' => $facility,
            ]);
        }
        flash('Fasilitas alat berhasil diperbarui!', 'success');
        return redirect()->route('gym.edit.alamat');
    }

    //--------------------------------------Edit Form 5--------------------------------------
    public function editAlamatGym()
    {
        $gym_id = session('gym_id');
        $gymAddress = GymAddress::where('gym_id', $gym_id)->first();
        return view('dashboard.gym.form-edit.edit-alamat-gym', compact('gymAddress'));
    }

    public function updateAlamatGym(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'regency' => 'required|string|max:255',
            'subdistrict' => 'required|string|max:255',
            'link' => 'required|string',
        ]);

        $gym_id = session('gym_id');
        $gymAddress = GymAddress::where('gym_id', $gym_id)->first();

        if (!$gymAddress) {
            return redirect()->route('gym.alamat')->with('error', 'Alamat gym tidak ditemukan!');
        }

        $gymAddress->address = $validatedData['address'];
        $gymAddress->province = $validatedData['province'];
        $gymAddress->regency = $validatedData['regency'];
        $gymAddress->subdistrict = $validatedData['subdistrict'];
        $gymAddress->link = $validatedData['link'];
        $gymAddress->save();
        flash('Alamat gym berhasil diperbarui!', 'success');
        return redirect()->route('gym.trainer');
    }


    //--------------------------------------Edit Form 6--------------------------------------
    public function editTrainerGym()
    {
        $gym_id = session('gym_id');
        $trainer = Trainers::where('gym_id', $gym_id)->first();

        if (!$trainer) {
            return redirect()->route('gym.trainer')->with('error', 'Trainer tidak ditemukan!');
        }

        return view('dashboard.gym.form-edit.edit-trainer', compact('trainer'));
    }

    public function updateTrainerGym(Request $request)
    {

        $validatedData = $request->validate([
            'trainer_name' => 'required|string|max:255',
            'no_hptrainer' => 'required|numeric',
            'foto_trainer' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gender_trainer' => 'required|in:Laki-laki,Perempuan',
        ]);

        $gym_id = session('gym_id');
        $trainer = Trainers::where('gym_id', $gym_id)->first();
        if (!$trainer) {
            return redirect()->route('gym.trainer')->with('error', 'Trainer tidak ditemukan!');
        }


        $trainer->trainer_name = $validatedData['trainer_name'];
        $trainer->no_hptrainer = $validatedData['no_hptrainer'];
        $trainer->gender_trainer = $validatedData['gender_trainer'];


        if ($request->hasFile('foto_trainer')) {

            if ($trainer->foto_trainer) {
                Storage::delete('public/' . $trainer->foto_trainer);
            }


            $trainer->foto_trainer = $request->file('foto_trainer')->store('trainers', 'public');
        }


        $trainer->save();
        flash('Trainer berhasil diperbarui!', 'success');
        return redirect()->route('gym.trainer');
    }




    //--------------------------------------DELETE--------------------------------------

    public function destroy(Request $request)
    {
        $gym_id = $request->query('gym_id');

        $gym = Gyms::findOrFail($gym_id);

        $gym->fotoGym()->delete();

        $gym->publicFacility()->delete();

        $gym->toolFacility()->delete();

        $gym->gymAddress()->delete();

        $gym->trainers()->delete();

        $gym->delete();
        flash( 'Gym beserta data terkait berhasil dihapus!', 'success');
        return redirect()->route('gym.data');
    }


    public function deleteTrainer(Request $request, $trainer_id)
    {
        
        $gym_id = session('gym_id');

        $trainer = Trainers::where('gym_id', $gym_id)->first();
    
        // Hapus file foto jika ada
        if ($trainer->foto_trainer) {
            Storage::delete('public/' . $trainer->foto_trainer);
        }
    
        // Hapus data trainer
        $trainer->delete();
    
        // Redirect dengan pesan sukses
        return redirect()->route('gym.trainer')->with('success', 'Trainer berhasil dihapus!');
    }

}