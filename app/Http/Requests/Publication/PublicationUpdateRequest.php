<?php

namespace App\Http\Requests\Publication;

use App\Models\Publication;
use App\Utils\PublicationFields;
use Illuminate\Foundation\Http\FormRequest;

class PublicationUpdateRequest extends FormRequest
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
        /**
         * @var Publication $publication
         */
        $publication = $this->route('publication');
        $publicationData = array_merge(
            $publication->getAttributes(),
            $this->all()
        );

        return PublicationFields::getValidationRules($publication->publishable_type, $publicationData);
    }
}
