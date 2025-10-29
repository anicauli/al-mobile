<?php

namespace App\Enums;

enum CarPublicationFuelType: string
{
    case Petrol = 'petrol';
    case Diesel = 'diesel';
    case Electric = 'electric';
    case Ethanol = 'ethanol';
    case HybridDiesel = 'hybrid_diesel';
    case HybridPetrol = 'hybrid_petrol';
    case Hydrogen = 'hydrogen';
    case LPG = 'lpg';
    case NaturalGas = 'natural_gas';
    case PlugInHybrid = 'plug_in_hybrid';
    case Other = 'other';

    public function getLabel(): string
    {
        return [
            self::Petrol->value => 'Petrol',
            self::Diesel->value => 'Diesel',
            self::Electric->value => 'Electric',
            self::Ethanol->value => 'Ethanol',
            self::HybridDiesel->value => 'Hybrid with Diesel',
            self::HybridPetrol->value => 'Hybrid with Petrol',
            self::Hydrogen->value => 'Hydrogen',
            self::LPG->value => 'LPG',
            self::NaturalGas->value => 'Natural Gas',
            self::PlugInHybrid->value => 'Plug-in Hybrid',
            self::Other->value => 'Other',
        ][$this->value];
    }
}
