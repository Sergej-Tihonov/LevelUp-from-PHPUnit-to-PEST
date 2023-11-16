<?php

namespace App\Enums;

//use BenSampo\Enum\Contracts\LocalizedEnum;
//use BenSampo\Enum\Enum;

/**
 * @method static static Public ()
 * @method static static Private ()
 * @method static static Meeting()
 * @method static static PressPublication()
 * @method static static Rules()
 * @method static static Communication()
 * @method static static History()
 * @method static static MeetingHistory()
 */
final class ChannelType //extends Enum implements LocalizedEnum
{
    public const Public = 'public';

    public const Private = 'private';

    public const Meeting = 'meeting';

    public const PressPublication = 'press_publication';

    public const Rules = 'rules';

    public const Communication = 'communication';

    public const History = 'history';

    public const MeetingHistory = 'meeting_history';
}
