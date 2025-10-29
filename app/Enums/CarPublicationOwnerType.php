<?php

namespace App\Enums;

enum CarPublicationOwnerType: string
{
    case New = 'new';
    case Used = 'used';

    public function getLabel(): string
    {
        return [
            self::New->value => 'New',
            self::Used->value => 'Used',
        ][$this->value];
    }
}
