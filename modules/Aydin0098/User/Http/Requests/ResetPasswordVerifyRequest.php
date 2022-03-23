<?php

namespace Aydin0098\User\Http\Requests;

use Aydin0098\User\Services\VerifyCodeService;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordVerifyRequest extends FormRequest
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
            'email' => 'required|email',
            'verify_code' => VerifyCodeService::getRule()
        ];
    }
}
