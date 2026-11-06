<?php

declare(strict_types=1);

namespace App\Student;

class Student
{
    public function __construct(
        public readonly int $id,
        public readonly string $nama,
        public readonly string $desa,
        public readonly int $umur,
        public readonly string $jenisKelamin,
        public readonly string $elemen,
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'desa' => $this->desa,
            'umur' => $this->umur,
            'jenis_kelamin' => $this->jenisKelamin,
            'elemen' => $this->elemen,
        ];
    }
}
