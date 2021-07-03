<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->can('create employee')){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
     

        if ($request->route()->named('employees.store')) {
            //
            return [
                "first_name"=>"required",
                "last_name"=>"required",
    
                "email"=>"required|unique:employees,email",
                "phone"=>"min:11|max:11|nullable|unique:employees,phone",
                "password"=>"required|confirmed|min:8|max:25",
                "company"=>"required"
                
               
                //
            ];
    
        }

        return [];
    }
}
