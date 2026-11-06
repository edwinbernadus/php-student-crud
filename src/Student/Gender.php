<?php

declare(strict_types=1);

namespace App\Student;

enum Gender: string
{
    case Laki = 'Laki-laki';
    case Perempuan = 'Perempuan';

    public static function values(): array
    {
        return array_map(static fn (self $gender): string => $gender->value, self::cases());
    }
}
