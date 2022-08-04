<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ProjectStatus extends Enum
{
    const On = '1';
    const Off = '2';
    const Complete = '3';
    const OnSchedule = '4';
    const BehindSchedule = '5';
}
