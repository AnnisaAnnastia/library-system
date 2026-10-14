<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    
    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div>
            <label>Judul Buku</label><br>
            <input 
                type="text" 
                name="title" 
                placeholder="Masukkan judul buku"
                value="{{ old('title') }}">

            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Penulis</label><br>
            <input 
                type="text" 
                name="author"
                placeholder="Masukkan nama penulis"
                value="{{ old('author') }}">

            @error('author')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Tahun Terbit</label><br>
            <input 
                type="number" 
                name="year"
                placeholder="Masukkan tahun terbit"
                value="{{ old('year') }}">

            @error('year')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Stok Buku</label><br>
            <input 
                type="number" 
                name="stock" 
                placeholder="Masukkan stok buku"
                value="{{ old('stock') }}">
        
            @error('stock')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>
        
        <button type="submit"> Simpan Buku </button>
    </form>

    <p>
        <a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
    </p>
</body>
</html>
