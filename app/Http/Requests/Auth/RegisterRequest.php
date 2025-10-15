<?php

namespace App\Http\Requests\Auth;

use App\Services\User\UserReadService;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255',
                function ($attribute, $value, $fail) {
                    if (!$value) return;
                    $userReadService = app(UserReadService::class);
                    if ($userReadService->getUserByEmail($value)) {
                        $fail(__('User with this email already exists.'));
                    }
                },
            ],
            'password' => ['required', 'string', 'min:8'],
        ];
    }
}
