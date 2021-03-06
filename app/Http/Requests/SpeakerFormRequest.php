<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class SpeakerFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user('isAdmin')){
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'required',
            'job_title' => 'required',
            'organisation' => 'required',
            'thumbnail' => 'mimes:jpeg,bmp,png'
        ];
    }
}
