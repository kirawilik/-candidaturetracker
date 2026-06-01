<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\CandidatureStatus;
use App\Enums\Priority;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateCandidatureRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name' => ['sometimes', 'required', 'string', 'max:255'],
            'job_title' => ['sometimes', 'required', 'string', 'max:255'],
            'job_url' => ['nullable', 'url'],
            'status' => ['sometimes', 'required', new Enum(CandidatureStatus::class)],
            'priority' => ['sometimes', 'required', new Enum(Priority::class)],
            'notes' => ['nullable', 'string'],
            'applied_at' => ['sometimes', 'required', 'date'],
        ];
    }
}