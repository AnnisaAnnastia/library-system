<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Laut Bercerita',
            'author' => 'Leila S. Chudori',
            'year' => 2017,
            'stock' => 5
        ]);

        Book::create([
            'title' => 'Filosofi Teras',
            'author' => 'Henry Manampiring',
            'year' => 2018,
            'stock' => 4
        ]);

        Book::create([
            'title' => 'Pemrograman Web',
            'author' => 'Billy Ibrahim Hasbi',
            'year' => 2026,
            'stock' => 3
        ]);

        Book::create([
            'title' => 'Bumi',
            'author' => 'Tere Liye',
            'year' => 2014,
            'stock' => 7
        ]);

        Book::create([
            'title' => 'Biografi B.J. Habibie',
            'author' => 'A. Makmur Makka',
            'year' => 2010,
            'stock' => 4
        ]);

        Book::create([
            'title' => 'Sejarah Indonesia',
            'author' => 'Ricklefs',
            'year' => 2008,
            'stock' => 2
        ]);

        Book::create([
            'title' => 'Perahu Kertas',
            'author' => 'Dee Lestari',
            'year' => 2009,
            'stock' => 6
        ]);

        Book::create([
            'title' => 'Sapiens',
            'author' => 'Yuval Noah Harari',
            'year' => 2011,
            'stock' => 5
        ]);

        Book::create([
            'title' => 'Negeri 5 Menara',
            'author' => 'Ahmad Fuadi',
            'year' => 2009,
            'stock' => 3
        ]);
    }
}
