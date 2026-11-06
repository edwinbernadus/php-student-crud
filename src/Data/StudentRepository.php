<?php

declare(strict_types=1);

namespace App\Data;

use App\Student\Student;
use App\Student\StudentValidator;

class StudentRepository
{
    private const STORE_KEY = 'students';
    private const COUNTER_KEY = 'students_next_id';

    public function __construct(private readonly StudentValidator $validator)
    {
    }

    public function all(): array
    {
        $this->seedIfMissing();

        return array_values($_SESSION[self::STORE_KEY]);
    }

    public function create(array $input): array
    {
        $errors = $this->validator->validate($input);

        if ($errors !== []) {
            return ['errors' => $errors];
        }

        $this->seedIfMissing();

        $student = $this->make($this->nextId(), $input);
        $_SESSION[self::STORE_KEY][] = $student->toArray();

        return ['student' => $student->toArray()];
    }

    public function update(int $id, array $input): array
    {
        $errors = $this->validator->validate($input);

        if ($errors !== []) {
            return ['errors' => $errors];
        }

        foreach ($this->all() as $index => $row) {
            if ($row['id'] === $id) {
                $student = $this->make($id, $input);
                $_SESSION[self::STORE_KEY][$index] = $student->toArray();

                return ['student' => $student->toArray()];
            }
        }

        return ['errors' => ['id' => 'Student tidak ditemukan.']];
    }

    public function delete(int $id): bool
    {
        foreach ($this->all() as $index => $row) {
            if ($row['id'] === $id) {
                array_splice($_SESSION[self::STORE_KEY], $index, 1);

                return true;
            }
        }

        return false;
    }

    public function reset(): void
    {
        $_SESSION[self::STORE_KEY] = (new StudentSeeder())->rows();
        $_SESSION[self::COUNTER_KEY] = count($_SESSION[self::STORE_KEY]) + 1;
    }

    private function make(int $id, array $input): Student
    {
        return new Student(
            $id,
            $this->validator->text($input, 'nama'),
            $this->validator->text($input, 'desa'),
            (int) $input['umur'],
            (string) $input['jenis_kelamin'],
            $this->validator->text($input, 'elemen'),
        );
    }

    private function seedIfMissing(): void
    {
        if (!isset($_SESSION[self::STORE_KEY])) {
            $this->reset();
        }
    }

    private function nextId(): int
    {
        $id = $_SESSION[self::COUNTER_KEY] ?? 1;
        $_SESSION[self::COUNTER_KEY] = $id + 1;

        return $id;
    }
}
