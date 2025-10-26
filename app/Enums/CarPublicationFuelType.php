<?php

namespace App\Enums;

enum CarPublicationFuelType: string
{
    case Petrol = 'Petrol';
    case Diesel = 'Diesel';
    case Electric = 'Electric';
    case Ethanol = 'Ethanol';
    case HybridDiesel = 'HybridDiesel';
    case HybridPetrol = 'HybridPetrol';
    case Hydrogen = 'Hydrogen';
    case LPG = 'LPG';
    case NaturalGas = 'NaturalGas';
    case PlugInHybrid = 'PlugInHybrid';
    case Other = 'Other';
}
