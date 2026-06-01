<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\Candidature;
use App\Policies\CandidaturePolicy;

use App\Models\Entretien;
use App\Policies\EntretienPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Candidature::class => CandidaturePolicy::class,
        Entretien::class   => EntretienPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}