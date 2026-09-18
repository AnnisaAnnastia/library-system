<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <title>
        @yield('title')
    </title>
</head>
<body>
    <header>
        <h1>Library System</h1>
        
       <nav>
            <a href="/dashboard">Dashboard</a> |
            <a href="{{ route ('buku') }}">Books</a> |
            <a href="/categories">Categories</a> |
            <a href="/members">Members</a>
        </nav>

        <hr>
    </header>
 
   <main>
        @yield('content')
    </main>
    
    <footer>
        <hr>
        <p>&copy; 2026 Annisa Annastia</p>
    </footer>

</body>
</html>