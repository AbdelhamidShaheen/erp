<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\DeleteCompanyRequest;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\ViewCompanyRequest;
use Illuminate\Support\Facades\Storage;

class companiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ViewCompanyRequest $request)
    {
        //

        $data['companies']= $data["paginator"]=Company::paginate(7);



        return view('companies.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreCompanyRequest $request)
    {
        //
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        if($request->hasFile("logo")){
            $path=  Storage::disk('public')->putFile("logo",$request->file("logo"));
        }
        $company=new Company();
        $company->name=$request->name;
        $company->email=$request->email??null;
        $company->logo=$path??null;
        $company->website=$request->website??null;

        $company->save();

        //

        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ViewCompanyRequest $request,$id)
    {
        //
        $data["company"]=Company::find($id);

        return view('companies.view',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UpdateCompanyRequest $request,$id)
    {
        //
        $data["company"]=Company::find($id);

        return view('companies.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, $id)
    {
        //
        $company=Company::find($id);
        if($request->hasFile("logo")){
            $path=  Storage::disk('public')->putFile("logo",$request->file("logo"));
        }
        $company->name=$request->name??$company->name;
        $company->email=$request->email??$company->email;
        $company->logo=isset($path)?$path:$company->logo;
        $company->website=$request->website??$company->website;

        $company->save();

        //

        return redirect()->route('companies.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteCompanyRequest $request,$id)
    {
        $status=200;
        $msg="sucess";
        try {
            //code...
            $company=Company::find($id);
            $company->delete();
        } catch (\Throwable $th) {
            //throw $th;
           $status=400;
           $msg="fail";
        }
       //code...
      if($request->ajax()){
              return response()->json($msg, $status);
        }
        return redirect()->route('companies.index');
    }
}
