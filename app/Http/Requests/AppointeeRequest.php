<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'idnumber' => 'required|unique:appointees,idnumber,' .$this->id,
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email:rfc|unique:appointees,email,' .$this->id,
            'password'=> 'required',
            'department_id' => 'required|exists:departments,id'
        ];
    }
    public function attributes()
    {
        return [
            'idnumber' => 'Id Number',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email Address',
            'department_id' => 'Department',
            'password'=> 'Password',
        ];
    }
}
