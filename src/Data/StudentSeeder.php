<?php

declare(strict_types=1);

namespace App\Data;

use App\Student\Gender;

class StudentSeeder
{
    public function rows(): array
    {
        $laki = Gender::Laki->value;
        $perempuan = Gender::Perempuan->value;

        return [
            ['id' => 1, 'nama' => 'Naruto Uzumaki', 'desa' => 'Konohagakure', 'umur' => 17, 'jenis_kelamin' => $laki, 'elemen' => 'Angin'],
            ['id' => 2, 'nama' => 'Sasuke Uchiha', 'desa' => 'Konohagakure', 'umur' => 17, 'jenis_kelamin' => $laki, 'elemen' => 'Petir'],
            ['id' => 3, 'nama' => 'Sakura Haruno', 'desa' => 'Konohagakure', 'umur' => 17, 'jenis_kelamin' => $perempuan, 'elemen' => 'Tanah'],
            ['id' => 4, 'nama' => 'Kakashi Hatake', 'desa' => 'Konohagakure', 'umur' => 31, 'jenis_kelamin' => $laki, 'elemen' => 'Petir'],
            ['id' => 5, 'nama' => 'Itachi Uchiha', 'desa' => 'Konohagakure', 'umur' => 21, 'jenis_kelamin' => $laki, 'elemen' => 'Api'],
            ['id' => 6, 'nama' => 'Shikamaru Nara', 'desa' => 'Konohagakure', 'umur' => 17, 'jenis_kelamin' => $laki, 'elemen' => 'Api'],
            ['id' => 7, 'nama' => 'Choji Akimichi', 'desa' => 'Konohagakure', 'umur' => 17, 'jenis_kelamin' => $laki, 'elemen' => 'Tanah'],
            ['id' => 8, 'nama' => 'Ino Yamanaka', 'desa' => 'Konohagakure', 'umur' => 17, 'jenis_kelamin' => $perempuan, 'elemen' => 'Air'],
            ['id' => 9, 'nama' => 'Neji Hyuga', 'desa' => 'Konohagakure', 'umur' => 18, 'jenis_kelamin' => $laki, 'elemen' => 'Tanah'],
            ['id' => 10, 'nama' => 'Rock Lee', 'desa' => 'Konohagakure', 'umur' => 17, 'jenis_kelamin' => $laki, 'elemen' => 'Tanah'],
            ['id' => 11, 'nama' => 'Tenten', 'desa' => 'Konohagakure', 'umur' => 17, 'jenis_kelamin' => $perempuan, 'elemen' => 'Air'],
            ['id' => 12, 'nama' => 'Hinata Hyuga', 'desa' => 'Konohagakure', 'umur' => 17, 'jenis_kelamin' => $perempuan, 'elemen' => 'Petir'],
            ['id' => 13, 'nama' => 'Kiba Inuzuka', 'desa' => 'Konohagakure', 'umur' => 17, 'jenis_kelamin' => $laki, 'elemen' => 'Tanah'],
            ['id' => 14, 'nama' => 'Shino Aburame', 'desa' => 'Konohagakure', 'umur' => 17, 'jenis_kelamin' => $laki, 'elemen' => 'Tanah'],
            ['id' => 15, 'nama' => 'Might Guy', 'desa' => 'Konohagakure', 'umur' => 32, 'jenis_kelamin' => $laki, 'elemen' => 'Tanah'],
            ['id' => 16, 'nama' => 'Asuma Sarutobi', 'desa' => 'Konohagakure', 'umur' => 31, 'jenis_kelamin' => $laki, 'elemen' => 'Api'],
            ['id' => 17, 'nama' => 'Kurenai Yuhi', 'desa' => 'Konohagakure', 'umur' => 31, 'jenis_kelamin' => $perempuan, 'elemen' => 'Api'],
            ['id' => 18, 'nama' => 'Hiruzen Sarutobi', 'desa' => 'Konohagakure', 'umur' => 68, 'jenis_kelamin' => $laki, 'elemen' => 'Api'],
            ['id' => 19, 'nama' => 'Tsunade', 'desa' => 'Konohagakure', 'umur' => 54, 'jenis_kelamin' => $perempuan, 'elemen' => 'Tanah'],
            ['id' => 20, 'nama' => 'Jiraiya', 'desa' => 'Konohagakure', 'umur' => 54, 'jenis_kelamin' => $laki, 'elemen' => 'Air'],
            ['id' => 21, 'nama' => 'Orochimaru', 'desa' => 'Konohagakure', 'umur' => 54, 'jenis_kelamin' => $laki, 'elemen' => 'Angin'],
            ['id' => 22, 'nama' => 'Minato Namikaze', 'desa' => 'Konohagakure', 'umur' => 24, 'jenis_kelamin' => $laki, 'elemen' => 'Angin'],
            ['id' => 23, 'nama' => 'Kushina Uzumaki', 'desa' => 'Konohagakure', 'umur' => 24, 'jenis_kelamin' => $perempuan, 'elemen' => 'Api'],
            ['id' => 24, 'nama' => 'Konohamaru Sarutobi', 'desa' => 'Konohagakure', 'umur' => 14, 'jenis_kelamin' => $laki, 'elemen' => 'Api'],
            ['id' => 25, 'nama' => 'Yamato', 'desa' => 'Konohagakure', 'umur' => 27, 'jenis_kelamin' => $laki, 'elemen' => 'Kayu'],
            ['id' => 26, 'nama' => 'Gaara', 'desa' => 'Sunagakure', 'umur' => 17, 'jenis_kelamin' => $laki, 'elemen' => 'Magnet'],
            ['id' => 27, 'nama' => 'Temari', 'desa' => 'Sunagakure', 'umur' => 18, 'jenis_kelamin' => $perempuan, 'elemen' => 'Angin'],
            ['id' => 28, 'nama' => 'Kankuro', 'desa' => 'Sunagakure', 'umur' => 18, 'jenis_kelamin' => $laki, 'elemen' => 'Tanah'],
            ['id' => 29, 'nama' => 'Sasori', 'desa' => 'Sunagakure', 'umur' => 35, 'jenis_kelamin' => $laki, 'elemen' => 'Magnet'],
            ['id' => 30, 'nama' => 'Chiyo', 'desa' => 'Sunagakure', 'umur' => 70, 'jenis_kelamin' => $perempuan, 'elemen' => 'Tanah'],
            ['id' => 31, 'nama' => 'Killer Bee', 'desa' => 'Kumogakure', 'umur' => 36, 'jenis_kelamin' => $laki, 'elemen' => 'Petir'],
            ['id' => 32, 'nama' => 'A Raikage', 'desa' => 'Kumogakure', 'umur' => 45, 'jenis_kelamin' => $laki, 'elemen' => 'Petir'],
            ['id' => 33, 'nama' => 'Darui', 'desa' => 'Kumogakure', 'umur' => 31, 'jenis_kelamin' => $laki, 'elemen' => 'Petir'],
            ['id' => 34, 'nama' => 'Yugito Nii', 'desa' => 'Kumogakure', 'umur' => 30, 'jenis_kelamin' => $perempuan, 'elemen' => 'Api'],
            ['id' => 35, 'nama' => 'Samui', 'desa' => 'Kumogakure', 'umur' => 20, 'jenis_kelamin' => $perempuan, 'elemen' => 'Petir'],
            ['id' => 36, 'nama' => 'Omoi', 'desa' => 'Kumogakure', 'umur' => 17, 'jenis_kelamin' => $laki, 'elemen' => 'Petir'],
            ['id' => 37, 'nama' => 'Mei Terumi', 'desa' => 'Kirigakure', 'umur' => 35, 'jenis_kelamin' => $perempuan, 'elemen' => 'Lava'],
            ['id' => 38, 'nama' => 'Zabuza Momochi', 'desa' => 'Kirigakure', 'umur' => 26, 'jenis_kelamin' => $laki, 'elemen' => 'Air'],
            ['id' => 39, 'nama' => 'Kisame Hoshigaki', 'desa' => 'Kirigakure', 'umur' => 32, 'jenis_kelamin' => $laki, 'elemen' => 'Air'],
            ['id' => 40, 'nama' => 'Haku', 'desa' => 'Kirigakure', 'umur' => 15, 'jenis_kelamin' => $laki, 'elemen' => 'Es'],
            ['id' => 41, 'nama' => 'Suigetsu Hozuki', 'desa' => 'Kirigakure', 'umur' => 19, 'jenis_kelamin' => $laki, 'elemen' => 'Air'],
            ['id' => 42, 'nama' => 'Utakata', 'desa' => 'Kirigakure', 'umur' => 26, 'jenis_kelamin' => $laki, 'elemen' => 'Air'],
            ['id' => 43, 'nama' => 'Chojuro', 'desa' => 'Kirigakure', 'umur' => 19, 'jenis_kelamin' => $laki, 'elemen' => 'Air'],
            ['id' => 44, 'nama' => 'Onoki', 'desa' => 'Iwagakure', 'umur' => 79, 'jenis_kelamin' => $laki, 'elemen' => 'Tanah'],
            ['id' => 45, 'nama' => 'Kurotsuchi', 'desa' => 'Iwagakure', 'umur' => 20, 'jenis_kelamin' => $perempuan, 'elemen' => 'Tanah'],
            ['id' => 46, 'nama' => 'Deidara', 'desa' => 'Iwagakure', 'umur' => 24, 'jenis_kelamin' => $laki, 'elemen' => 'Ledakan'],
            ['id' => 47, 'nama' => 'Roshi', 'desa' => 'Iwagakure', 'umur' => 40, 'jenis_kelamin' => $laki, 'elemen' => 'Lava'],
            ['id' => 48, 'nama' => 'Han', 'desa' => 'Iwagakure', 'umur' => 33, 'jenis_kelamin' => $laki, 'elemen' => 'Uap'],
            ['id' => 49, 'nama' => 'Konan', 'desa' => 'Amegakure', 'umur' => 35, 'jenis_kelamin' => $perempuan, 'elemen' => 'Kertas'],
            ['id' => 50, 'nama' => 'Nagato', 'desa' => 'Amegakure', 'umur' => 35, 'jenis_kelamin' => $laki, 'elemen' => 'Gravitasi'],
        ];
    }
}
