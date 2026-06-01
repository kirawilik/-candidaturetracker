<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\EntretienType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\EntretienResult;

class StoreEntretienRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        
    return [
        'candidature_id' => ['required', 'integer', 'exists:candidatures,id'],
        'type' => ['required', new Enum(EntretienType::class)],

        'date' => ['required', 'date'],
        'time' => ['required'],

        'notes' => ['nullable', 'string'],
        'result' => ['nullable', new Enum(EntretienResult::class)],
    ];
    }
}