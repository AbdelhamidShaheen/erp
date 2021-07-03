<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->can('create company')){
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
       
        if ($request->route()->named('companies.store')) {
            //
            return [
                "name"=>"required|unique:companies,name",
                "email"=>"required|unique:companies,email",
                "logo"=>"image|mimes:jpg,png",
                "website"=>"url|nullable",
               
                //
            ];
    
        }

        return [];
    }
}
