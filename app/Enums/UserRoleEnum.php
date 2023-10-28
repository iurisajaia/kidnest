<?php
namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserRoleEnum extends Enum
{
    const KINDERGARTEN = [
        'id' => 1,
        'title' => 'kindergarten',
        'key' => 'kindergarten',
        'relations' => [
            'branches',
            'groups',
            'staff',
            'role'
        ]
    ];
    const EDUCATOR = [
        'id' => 2,
        'title' => 'educator',
        'key' => 'educator',
        'relations' => []
    ];
    const MANAGER = [
        'id' => 3,
        'title' => 'manager',
        'key' => 'manager',
        'relations' => []
    ];
    const PSYCHOLOGIST = [
        'id' => 4,
        'title' => 'psychologist',
        'key' => 'psychologist',
        'relations' => []
    ];
    const PARENT = [
        'id' => 5,
        'title' => 'parent',
        'key' => 'parent',
        'relations' => [
            'role',
            'kids'
        ]
    ];
}
