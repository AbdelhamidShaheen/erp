<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Company;
use App\Models\employee;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class dashboardController extends Controller
{
    //
    public function index()
    {
        $data["companiesnum"]=Company::count();
        $data["empoyeesnum"]=employee::count();
        $data["adminsnum"]=Admin::count();
        $data["rolesnum"]=Role::count();
        $data["permissionsnum"]=Permission::count();
        
         return view('dashboard', $data);
        //
    }
}
