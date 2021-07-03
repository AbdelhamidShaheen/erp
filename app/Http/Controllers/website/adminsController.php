<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use App\Http\Requests\DeleteAdminRequest;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Requests\ViewAdminRequest;
use Illuminate\Support\Facades\Hash;

class adminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ViewAdminRequest $request)
    {
        
        
    
      $data['admins']=$data["paginator"]=Admin::paginate(10);
        
     


         return view('admins.index',$data);;
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreAdminRequest $request)
    {
        //
        $data['roles']=Role::all();
        return view('admins.create',$data);;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        //
        $admin=Admin::create(["first_name"=>$request->first_name,"last_name"=>$request->last_name,"email"=>$request->email,"password"=>Hash::make($request->password)]);
     
        $admin->assignRole($request->role);

return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ViewAdminRequest $request,$id)
    {
        //
        $data["admin"]=$admin=Admin::find($id);
        $data["roles"]=$admin->getRoleNames();

       
        return view('admins.view',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UpdateAdminRequest $request,$id)
    {
        //
        $data["admin"]=Admin::find($id);
        $data['roles']=Role::all();

        return view('admins.edit',$data);;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, $id)
    {
        //
        $admin=Admin::find($id);

        $admin->first_name=$request->first_name??$admin->first_name;
        $admin->last_name=$request->last_name??$admin->last_name;
        $admin->email=$request->email??$admin->email;
        $admin->phone=$request->phone??$admin->phone;

        $admin->save();

        $admin->syncRoles([$request->role]);



       return redirect()->route('admins.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteAdminRequest $request,$id)
    {
        //
        $admin=Admin::find($id);
        $admin->delete();
        return redirect()->route('admins.index');

    }
}
