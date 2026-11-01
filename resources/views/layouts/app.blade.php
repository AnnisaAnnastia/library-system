<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    
    @if (session()->has('success'))
        <div class="notification">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="app-layout">

        <header class="sidebar">
            <h1 class="brand">
                Library System
            </h1>

            <p class="sidebar-label">MENU UTAMA</p>

            <nav class="sidebar-nav">
                <a href="/dashboard"
                   class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>

                <a href="{{ route('books.index') }}"
                   class="{{ request()->is('books*') ? 'active' : '' }}">
                    Books
                </a>

                <a href="/categories"
                   class="{{ request()->is('categories*') ? 'active' : '' }}">
                    Categories
                </a>

                <a href="/members"
                   class="{{ request()->is('members*') ? 'active' : '' }}">
                    Members
                </a>
            </nav>

            <div class="sidebar-user">
                <div class="user-avatar">A</div>
                <div>
                    <strong>Annisa Annastia</strong>
                    <small>Administrator</small>
                </div>
            </div>
        </header>

        <div class="main-wrapper">

            <div class="topbar">
                <h2>@yield('title')</h2>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout">
                        Logout
                    </button>
                </form>
            </div>

            <main class="page-content">
                @yield('content')
            </main>

            <footer class="page-footer">
                <p>&copy; 2026 Annisa Annastia</p>
            </footer>

        </div>
    </div>

</body>
</html>