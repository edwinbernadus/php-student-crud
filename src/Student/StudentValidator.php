<?php

declare(strict_types=1);

namespace App\Student;

class StudentValidator
{
    private const MAX_AGE = 200;

    public function validate(array $input): array
    {
        $errors = [];

        if ($this->text($input, 'nama') === '') {
            $errors['nama'] = 'Nama wajib diisi.';
        }

        if ($this->text($input, 'desa') === '') {
            $errors['desa'] = 'Desa kelahiran wajib diisi.';
        }

        if ($this->text($input, 'elemen') === '') {
            $errors['elemen'] = 'Elemen wajib diisi.';
        }

        $umur = $input['umur'] ?? null;
        if (!is_numeric($umur) || (int) $umur < 0 || (int) $umur > self::MAX_AGE) {
            $errors['umur'] = 'Umur harus berupa angka 0-' . self::MAX_AGE . '.';
        }

        if (!in_array($input['jenis_kelamin'] ?? null, Gender::values(), true)) {
            $errors['jenis_kelamin'] = 'Jenis kelamin tidak valid.';
        }

        return $errors;
    }

    public function text(array $input, string $key): string
    {
        return trim((string) ($input[$key] ?? ''));
    }
}
