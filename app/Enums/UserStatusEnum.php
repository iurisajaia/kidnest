<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserStatusEnum extends Enum
{
    const MOTHER = 'mother';
    const FATHER = 'father';
    const SISTER_BROTHER = 'sister/brother';
    const GRANDPARENT = 'grandparent';
}
