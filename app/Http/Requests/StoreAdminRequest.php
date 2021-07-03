<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->can('create admin')){
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
        
        if ($request->route()->named('admins.store')) {
            //
            return [
                "first_name"=>"required",
                "last_name"=>"required",
    
                "email"=>"required|unique:admins,email",
                "phone"=>"min:11|max:11|nullable|unique:admins,phone",
                "password"=>"required|confirmed|min:8|max:25",
                "role"=>"required"
               
                //
            ];
    
    
        }

        return [];
    }
}
