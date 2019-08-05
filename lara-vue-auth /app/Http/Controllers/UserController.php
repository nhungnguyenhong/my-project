<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function index(){
        return view('register');
    }
    public function store(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->company_name = $request->company_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->address2 = $request->address2;
        $user->phone_number = $request->phone_number;
        $user->save();
        return response()->json(['error'=>false]);


    }
}
