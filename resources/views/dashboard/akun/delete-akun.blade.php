<form action="{{ route('delete.akun', $user->user_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini?');">
    @csrf
    @method('DELETE') 
    <button type="submit" class="btn btn-danger">Hapus</button>
</form>
