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
}
