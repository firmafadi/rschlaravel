<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

use App\User;

class AuthController extends Controller {

    public function register(RegisterRequest $request){

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return $this->setResponse(['access_token' => $token,'token_type' => 'Bearer',], 200, 'Register User Berhasil ');
        
    }

    public function login(LoginRequest $request){

        $token = User::where('email', $request['email'])->firstOrFail()->createToken('auth_token')->plainTextToken;
        return $this->setResponse(['access_token' => $token,'token_type' => 'Bearer',], 200, "Login Berhasil ");
    
    }

    public function me(Request $request){
        $users = User::orderBy('id','desc')->paginate(2);
        // $users->withPath('/admin/users');
        $users->appends(['sort' => 'votes']);
        return $this->setResponse($users, 200, "List Data User");
    }
}
