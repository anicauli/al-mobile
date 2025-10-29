<?php

namespace App\Enums;

enum PublicationStatus: string
{
    case DRAFT = 'DRAFT';
    case PUBLISHED = 'PUBLISHED';
    case PRIVATE = 'PRIVATE';

    public function getLabel(): string
    {
        return [
            self::DRAFT->value => 'Draft',
            self::PUBLISHED->value => 'Published',
            self::PRIVATE->value => 'Private',
        ][$this->value];
    }
}
