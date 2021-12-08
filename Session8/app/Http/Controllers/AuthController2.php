<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use Dotenv\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class AuthController extends Controller
{
    public function LoginRole(Request $request){
    $roles= User::query()->select([
        'id','name'
    ])->with('role')->get();
    if (!$roles){
        return response()->json([
            'data' => '',
            'msg' =>"NOT FOUND"
        ],404);
    }else{
        // return response()->json([
        //     'data' => $users,
        //     'msg' =>"SUCCESSFULLY"
        // ],200);
       try {
           return view('Role.all', compact('roles'));
       }
        catch(Exception $exception){

        }
    }
    for ($i=0;$i < count($roles);$i++){
            if ($request->name == $roles[$i]['name']){
                return view('Role.all', compact('roles'));
            }  
            else{
                continue;
            }
   

    } 
      
    // $userdata=null;
    // try {

    //     $validator = Validator::make($request->all(), [
    //         'email'    => 'required|email', // make sure the email is an actual email
    //         'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters        
    //     ]);

    //     if ($validator->fails()) {
    //         return view('login');
    //        } else {
        
    //         // create our user data for the authentication
    //         $userdata=User::create([
    //             "name" => $request->name,
    //             "email" => $request->email,
    //             "mobile" => $request->mobile,
    //             "role_id" => $request->role_id,
    //             "password" => Hash::make($request->password,)
    //         ]);
        
    //            // attempt to do the login
    //            if (Auth::attempt($userdata)) {
        
    //             // validation successful!
    //                // redirect them to the secure section or whatever
    //                // return Redirect::to('secure');
    //                // for now we'll just echo success (even though echoing in a controller is bad)
    //                echo 'SUCCESS!';
             
    //                $token = $userdata->createToken('token')->plainTextToken;
    //                $response =['User' => $userdata,'token'=>$token];
    //                return response($response,201);
    //            } else {
        
    //             // validation not successful, send back to form
    //                return view('login');
    //            }
    //        }

        // $user=Role::create([
        //     "name" => $request->name,
        //     "email" => $request->email,
        //     "mobile" => $request->mobile,
        //     "role_id" => $request->role_id,
        //     "password" => Hash::make($request->password,)
        // ]);
    // } catch (Exception $exception) {
    //     return response()->json([
    //         'data' => $exception,
    //         'msg' => 'failed'], 500);
    // }

}

    public function LoginUser(Request $request){

        $users= User::query()->select([
            'id','name','mobile','role_id','password','email'
        ])->with('role')->get();
        if (!$users){
            return response()->json([
                'data' => '',
                'msg' =>"NOT FOUND"
            ],404);
        }else{
            // return response()->json([
            //     'data' => $users,
            //     'msg' =>"SUCCESSFULLY"
            // ],200);
           try {
               return view('User.all', compact('users'));
           }
            catch(Exception $exception){

            }
        }
        for ($i=0;$i < count($users);$i++){
            if (Hash::make($request->password,) == $users[$i]['password']){
                if ($request->name == $users[$i]['name']){
                    return view('User.all', compact('users'));
                }  
                else{
                    continue;
                }
            }
            else{
                continue;
            }

        } 
          
        // $userdata=null;
        // try {

        //     $validator = Validator::make($request->all(), [
        //         'email'    => 'required|email', // make sure the email is an actual email
        //         'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters        
        //     ]);

        //     if ($validator->fails()) {
        //         return view('login');
        //        } else {
            
        //         // create our user data for the authentication
        //         $userdata=User::create([
        //             "name" => $request->name,
        //             "email" => $request->email,
        //             "mobile" => $request->mobile,
        //             "role_id" => $request->role_id,
        //             "password" => Hash::make($request->password,)
        //         ]);
            
        //            // attempt to do the login
        //            if (Auth::attempt($userdata)) {
            
        //             // validation successful!
        //                // redirect them to the secure section or whatever
        //                // return Redirect::to('secure');
        //                // for now we'll just echo success (even though echoing in a controller is bad)
        //                echo 'SUCCESS!';
                 
        //                $token = $userdata->createToken('token')->plainTextToken;
        //                $response =['User' => $userdata,'token'=>$token];
        //                return response($response,201);
        //            } else {
            
        //             // validation not successful, send back to form
        //                return view('login');
        //            }
        //        }

            // $user=Role::create([
            //     "name" => $request->name,
            //     "email" => $request->email,
            //     "mobile" => $request->mobile,
            //     "role_id" => $request->role_id,
            //     "password" => Hash::make($request->password,)
            // ]);
        // } catch (Exception $exception) {
        //     return response()->json([
        //         'data' => $exception,
        //         'msg' => 'failed'], 500);
        // }
    
    }
    public function DestroyUser(Request $request){
        $id=$request->id;
        User::query()->where('id', $id)->delete();
    }
    public function DestroyRole(Request $request){
        $id=$request->id;
        Role::query()->where('id', $id)->delete();
    }
}
