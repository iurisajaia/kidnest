<?php
namespace App\Enums;

use BenSampo\Enum\Enum;

final class AgeEnum extends Enum
{
    const ages = [
        1 => '0-დან 1 წლამდე',
        2 => '0-დან 2 წლამდე',
        3 => '1-დან 2 წლამდე',
        4 => '2-დან 3 წლამდე',
        5 => '3-დან 4 წლამდე',
        6 => '4-დან 5 წლამდე',
        7 => '5-დან 6 წლამდე',
    ];
}
