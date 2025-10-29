<?php

namespace App\Http\Requests\Publication;

use App\Models\CarPublication;
use Illuminate\Foundation\Http\FormRequest;

class PublicationStoreRequest extends FormRequest
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
        $typeMapping = [
            'car_publication' => CarPublication::class
        ];

        $this->publication_type = $typeMapping[$this->type] ?? null;
        return [
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:' . implode(',', array_keys($typeMapping))]
        ];
    }
}
