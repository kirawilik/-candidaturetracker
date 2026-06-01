<?php

namespace App\Enums;

enum CandidatureStatus: string
{
    case PENDING = 'pending';
    case INTERVIEW = 'interview';
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';
}