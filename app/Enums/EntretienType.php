<?php

namespace App\Enums;

enum EntretienType: string
{
    case PHONE = 'phone';
    case TECHNICAL = 'technical';
    case HR = 'hr';
    case ONSITE = 'onsite';
}