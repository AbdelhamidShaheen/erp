<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use App\Http\Requests\DeleteRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\ViewRoleRequest;

class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ViewRoleRequest $request)
    {
        //

        $data['roles']= $data["paginator"]=Role::paginate(10);


        return view('roles.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreRoleRequest $request)
    {
        //

        $data["permissions"]=Permission::all();

        return view('roles.create',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        //



       $role=Role::create(["name"=>$request->name]);


        $permissions=$request->permissions;

        $role->givePermissionTo($permissions);


        return redirect()->route('roles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ViewRoleRequest $request,$id)
    {

        $data["role"]= $role=Role::find($id);

        $data["permissions"]=$role->permissions;

        return view('roles.view',$data);

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UpdateRoleRequest $request,$id)
    {
        $data["role"]=Role::find($id);
        $data["permissions"]=Permission::all();


        return view('roles.edit',$data);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        //
        $role=Role::find($id);

        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRoleRequest $request,$id)
    {


        $role=Role::find($id);
        $role->delete();

            //code...
            if($request->ajax()){
                return response()->json("sucess", 200);
            }


        return redirect()->route('roles.index');

        //
    }
}
