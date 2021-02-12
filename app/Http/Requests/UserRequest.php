<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $is_required = $this->_method ? 'nullable' : 'required';
        $user = $this->user??auth()->user();
        return [
            'name' => 'required|string',
            'email' => 'nullable|string|email|max:191|unique:users,email'.($this->_method ? ",".@$user->id : ''),
            'mobile' => 'required|string|max:191|unique:users,mobile'.($this->_method ? ",".@$user->id : ''),
            'password' => $is_required.'|string|min:6',
            'confirm_password' => $is_required.'|same:password|min:6',
            'allow' => 'nullable',
        ];
    }
}
