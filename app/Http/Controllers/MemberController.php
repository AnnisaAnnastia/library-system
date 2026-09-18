<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        $title = "Daftar Member";
        $description = "Daftar member yang terdaftar di perpustakaan";
        $members = [
            'Annisa Annastia',
            'Nadin Amizah',
            'Justin Bieber',
            'Kafka Bintang',
            'Raisa Andriana'
        ];

        return view('members.index', compact('title', 'description', 'members'));
    }
}