<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Position extends Enum
{
    const admin =   0;
    const projectManager =   1;
    const employeee = 2;
}
