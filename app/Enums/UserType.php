<?php

namespace App\Enums;

enum UserType: string
{
    case STAFF = 'STAFF';
    case AGENCY = 'AGENCY';
    case INDIVIDUAL = 'INDIVIDUAL';
}
