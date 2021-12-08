<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return view('User.all',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $users=User::create([
                "name" => $request->name,
                "email" => $request->email,
                "mobile" => $request->mobile,
                "role_id" => $request->role_id,
                "password" => Hash::make($request->password,)
            ]);
            return $users;
        } catch (Exception $exception) {
            return response()->json([
                'data' => $exception,
                'msg' => 'failed'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users= User::query()->where('id',$id)->with('role')->first();
        if (!$users) {
         return response()->json([
                'msg' => "NOT FOUND",
            ],404);}
         else{
             return view("User.edit", compact('users'));
         }    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
  //$users= SELECT *  FROM users WHERE 'id' = $id
//   $users= User::query()->where('id', $id)->first();
//   if (!$users) {
//       return response()->json([
//           'msg' => "NOT FOUND",
//       ], 200);
//   } else {
//       $users->name=$request->name;
//       $users->mobile=$request->mobile;
//       $users->role_id=$request->role_id;
//       $users->email=$request->email;
//       $users->password=$request->password;
//       $users->save();
//          return view('User.all');

  $users= User::query()->where('id', $id)->first();
  if (!$users) {
      return response()->json([
          'msg' => "NOT FOUND",
      ], 200);
  }
//  $tmp=['name'=>$request->name];
//  $role->update($tmp);
//  $role->save();
//  return view("Role.all",compact('role'));
      $users->name=$request->name;
      $users->mobile=$request->mobile;
      $users->role_id=$request->role_id;
      $users->email=$request->email;
      $users->password=$request->password;
      $users->save();
    return $this->index();

// }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       User::query()->where('id', $id)->delete();
        return $this->index();
    }
}
