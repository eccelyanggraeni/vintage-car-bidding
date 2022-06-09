<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register', ['title'=> 'Register']);
    }

    public function register(Request $request){
        $validate = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'role' => ['required'],
            'password' => ['required']
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password, ['rounds' => 12]);
        $save = $user->save();

        if($save){
            return redirect("/register")->withSuccess('Registrasi berhasil. Silahkan login.');
        } else {
            return redirect("/register")->withFail('Register gagal. Mohon periksa inputan anda.');
        }
    }
}

?>