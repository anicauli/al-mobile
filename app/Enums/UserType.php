<?php

namespace App\Enums;

enum UserType: string
{
    case STAFF = 'STAFF';
    case CLIENT = 'CLIENT';

    public function getLabel(): string
    {
        return [
            self::STAFF->value => 'Staff',
            self::CLIENT->value => 'Client',
        ][$this->value];
    }
}
