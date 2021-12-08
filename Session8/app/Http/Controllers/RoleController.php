<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Exception;

class RoleController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role= Role::query()->select([
            'id','name'
        ])->get();
        return view("Role.all",compact('role'));

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view("Role.sign_in");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name=$request->name;

        try {
            $role=Role::create(["name" => $name]);
            return $role;
            // return response()->json([
            //     'data' => $role,
            //     'msg' => 'successfully'], 500);
        } catch (Exception $exception) {
            return response()->json([
                'data' => $exception,
                'msg' => 'failed'], 500);
        }
        return view('Role.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role= Role::query()->where('id',$id)->select([
            'id','name'
        ])->first();
        if (!$role) {
         return response()->json([
                'msg' => "NOT FOUND",
            ],404);}
        return view("Role.edit", compact('role'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$role= SELECT *  FROM roles WHERE 'id' = $id
        // $role =  Role::find($id);
        
        $role= Role::query()->where('id', $id)->first();
        if (!$role) {
            return response()->json([
                'msg' => "NOT FOUND",
            ], 404);
        }
        //  $tmp=['name'=>$request->name];
        //  $role->update($tmp);
        //  $role->save();
        //  return view("Role.all",compact('role'));

            $role->name=$request->name;
            $role->save();
            return $this->index();
          

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Role::query()->where('id', $id)->delete();
        return $this->index();

    }
}
