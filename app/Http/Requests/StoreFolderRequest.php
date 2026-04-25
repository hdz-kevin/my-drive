<?php

namespace App\Http\Requests;

use App\Models\File;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreFolderRequest extends ParentIdBaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return array_merge(parent::rules(),
            [
                'name' => [
                    'required',
                    'string',
                    'max:1024',
                    Rule::unique(File::class, 'id')
                        ->where('created_by', Auth::id())
                        ->where('parent_id', $this->parent_id)
                        ->whereNull('deleted_at'),
                ],
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function messages(): array
    {
        return [
            'name.unique' => 'Folder ":input" already exists',
        ];
    }
}
