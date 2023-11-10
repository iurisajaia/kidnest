<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PaymentStatusEnum extends Enum
{
    const PAID = 'paid';
    const NOT_PAID = 'not_paid';
    const IN_PROGRESS = 'in_progress';
}
