<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Entretien;
use App\Models\User;

class EntretienPolicy
{
    public function viewAny(User $user): bool
{
    return true;
}
    public function view(User $user, Entretien $entretien): bool
    {
return $entretien->candidature
    && $entretien->candidature->user_id === $user->id;    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Entretien $entretien): bool
    {
return $entretien->candidature
    && $entretien->candidature->user_id === $user->id;    }

    public function delete(User $user, Entretien $entretien): bool
    {
return $entretien->candidature && $entretien->candidature->user_id === $user->id;    }
}