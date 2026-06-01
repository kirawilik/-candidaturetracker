<?php

namespace App\Models;

use App\Enums\CandidatureStatus;
use App\Enums\Priority;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Entretien;

class Candidature extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'company_name',
        'job_title',
        'job_url',
        'status',
        'priority',
        'notes',
        'applied_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => CandidatureStatus::class,
            'priority' => Priority::class,
            'applied_at' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function entretiens(): HasMany
    {
        return $this->hasMany(Entretien::class);
    }
}