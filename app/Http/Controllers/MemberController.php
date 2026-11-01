<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        $title = "Daftar Member";
        $description = "Daftar member yang terdaftar di perpustakaan";
        $members = Member::all();

        return view('members.index', compact('title', 'description', 'members'));
    }

    public function create(){
        $title = "Tambah Member";
        
        return view('members.create', compact('title'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|string|max:15',
        ]);

        Member::create($validated);

        return redirect()
            ->route('members.index')
            ->with('success', 'Data Member berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);

        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:members,email,' . $member->id,
            'phone' => 'required|string|max:15',
        ]);

        $member->update($validated);

        return redirect()->route('members.index')
            ->with('success', 'Data Member berhasil diperbarui.');
    }
    
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')
            ->with('success', 'Data member berhasil dihapus.');
    }
}