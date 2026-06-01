<?php

namespace App\Enums;

enum EntretienResult: string
{
    case PENDING = 'pending';
    case SUCCESS = 'success';
    case FAILED = 'failed';
}