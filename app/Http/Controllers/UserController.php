<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('user.main', ['data' => $user, 'title' => 'Daftar User']);
    }

    public function view_tambah_user(){
        return view('user.tambah', ['title' => 'Tambah User']);
    }

    public function save_user(Request $request){
        $request->validate([
            'nama_user' => ['required'],
            'email' => ['required', 'email'],
            'role' => ['required'],
            'password' => ['required']
        ]);
        
        $user = new User;
        $user->name = $request->nama_user;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password, ['rounds' => 12]);
        $save = $user->save();

        if($save){
            return redirect("/user")->withSuccess('User berhasil tersimpan');
        } else {
            return redirect("/user")->withFail('User gagal tersimpan');
        }
    }

    public function view_update_user($id){
        $user = User::where('id', $id)->first();

        return view('user.ubah', ['user' => $user, 'title' => 'Ubah User']);
    }

    public function update_user(Request $request){
        $request->validate([
            'nama_user' => ['required'],
            'email' => ['required', 'email'],
            'role' => ['required'],
            'password' => ['required']
        ]);

        $user = User::where('id', $request->id)->first();

        $user->name = $request->nama_user;
        $user->email = $request->email;
        $user->role = $request->role;
        if($user->password == $request->password){
            $user->password = $request->password;
        } else {
            $user->password = Hash::make($request->password, ['rounds' => 12]);
        }
       
        $update = $user->update();

        if($update){
            return redirect("/user")->withSuccess('User berhasil diubah');
        } else {
            return redirect("/user")->withFail('User gagal diubah');
        }
    }

    public function delete($id){
        $user = User::where('id', $id)->first();

        $delete = $user->delete();

        if($delete){
            return redirect("/user")->withSuccess('User berhasil dihapus');
        } else {
            return redirect("/user")->withFail('User gagal dihapus');
        }
    }
}

?>