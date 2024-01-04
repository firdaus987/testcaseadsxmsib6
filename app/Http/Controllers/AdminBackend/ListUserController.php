<?php

namespace App\Http\Controllers\Adminbackend;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ListUserController extends Controller
{
    //
    public function index()
    {
        $users = User::all()->where('kelas_user', '3');
        return view('admin_backend.admin_listuser', compact('users'));
    }
    // /**
    //  * Get a validator for an incoming registration request.
    //  *
    //  * @param  array  $data
    //  * @return \Illuminate\Contracts\Validation\Validator
    //  */

    public function store(Request $request)
    {
        $user = new User();
        $user->nama_lengkap = $request->input('nama_lengkap');
        $user->alamat = $request->input('alamat');
        $user->tgl_lahir = $request->input('tgl_lahir');
        $user->tgl_bergabung = $request->input('tgl_bergabung');
        $user->semester = $request->input('semester');
        $user->angkatan = $request->input('angkatan');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('email'));
        $user->kelas_user = '3';
        $user->save();

        return response()->json(['message' => 'User ditambahkan'], 201);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Hasil::where('id_user', $id)->delete();
        return redirect()->route('adminListUser.index')->with('success', 'User tersebut telah dihapus');
        }
}
