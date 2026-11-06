<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CineManía')</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --background: #101014;
            --surface: #1b1b22;
            --surface-light: #25252e;
            --primary: #e50914;
            --text: #ffffff;
            --muted: #a1a1aa;
            --border: #30303a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--background);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }

        header {
            background: #17171d;
            border-bottom: 1px solid var(--border);
            padding: 20px 6%;
        }

        .navbar {
            max-width: 1250px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 25px;
            font-weight: 800;
            color: white;
            text-decoration: none;
        }

        .logo span {
            color: var(--primary);
        }

        .nav-link {
            color: var(--muted);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .nav-link:hover {
            color: white;
        }

        main {
            max-width: 1250px;
            margin: 45px auto;
            padding: 0 25px;
            min-height: 65vh;
        }

        .page-title {
            font-size: 30px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .page-description {
            color: var(--muted);
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 7px;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 700;
        }

        .btn:hover {
            background: #bd0710;
        }

        .btn-secondary {
            background: var(--surface-light);
            color: white;
        }

        .btn-danger {
            background: #991b1b;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 24px;
        }

        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            background: #14532d;
            color: #dcfce7;
        }

        input, textarea, select {
            width: 100%;
            padding: 13px;
            margin-top: 8px;
            margin-bottom: 20px;
            background: var(--surface-light);
            color: white;
            border: 1px solid var(--border);
            border-radius: 7px;
            font-family: inherit;
        }

        label {
            font-size: 14px;
            font-weight: 600;
        }

        footer {
            border-top: 1px solid var(--border);
            text-align: center;
            padding: 25px;
            color: var(--muted);
            font-size: 13px;
        }

        @media (max-width: 600px) {
            header {
                padding: 18px 20px;
            }

            main {
                margin: 30px auto;
                padding: 0 18px;
            }

            .page-title {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

    <header>
        <nav class="navbar">
            <a href="{{ route('peliculas.index') }}" class="logo">
                CINE<span>MANÍA</span>
            </a>

            <a href="{{ route('peliculas.index') }}" class="nav-link">
                CATÁLOGO
            </a>
        </nav>
    </header>

    <main>
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        CineManía © {{ date('Y') }} · Tu espacio cinematográfico
    </footer>

</body>
</html>
