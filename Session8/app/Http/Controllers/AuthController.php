<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use Exception;

class AuthController extends Controller
{
    public function AddUser(Request $request){
        $user=null;
        try {
            $user=Role::create([
                "name" => $request->name,
                "email" => $request->email,
                "mobile" => $request->mobile,
                "role_id" => $request->role_id,
                "password" => Hash::make($request->password,)
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'data' => $exception,
                'msg' => 'failed'], 500);
        }
        $token = $user->createToken('token')->plainTextToken;
        $response =['User' => $user,'token'=>$token];
        return response($response,201);
    }
    public function DestroyUser(Request $request){
        $id=$request->id;
        User::query()->where('id', $id)->delete();
    }
}
