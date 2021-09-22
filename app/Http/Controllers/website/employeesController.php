<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\DeleteEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\ViewEmployeeRequest;

class employeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ViewEmployeeRequest $request)
    {
        //
        $data['employees'] = [];
        $data["paginator"] = employee::paginate(10);

        foreach ($data["paginator"] as $employee) {

            $employee["company"] = $employee->company;
            array_push($data['employees'], $employee);
        }
        return view('employees.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreEmployeeRequest $request)
    {
        //
        $data["companies"] = Company::all();
        return view('employees.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        //
        $employee = new employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone ?? null;
        $employee->password = Hash::make($request->password);
        $employee->company_id = $request->company;

        $employee->save();

        return redirect()->route('employees.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ViewEmployeeRequest $request,$id)
    {
        //
        $data["employee"]=employee::find($id);

        return view('employees.view',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UpdateEmployeeRequest $request,$id)
    {
        //
        $data["employee"]=employee::find($id);
        $data["companies"] = Company::all();
        return view('employees.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        //
        $employee=employee::find($id);


        $employee->first_name = $request->first_name??$employee->first_name;
        $employee->last_name = $request->last_name??$employee->last_name;
        $employee->email = $request->email??$employee->email;
        $employee->phone = $request->phone ??$employee->phone;
        $employee->company_id = $request->company??$employee->company_id;

        $employee->save();

        return redirect()->route('employees.index');

        return view('employees.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteEmployeeRequest $request,$id)
    {
        //
        $employee=employee::find($id);
        $employee->delete();
          //code...
          if($request->ajax()){
            return response()->json("sucess", 200);
        }
        return redirect()->route('employees.index');

    }
}
