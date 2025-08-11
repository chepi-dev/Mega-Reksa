<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mega Reksa - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            overflow-x: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        #sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 220px;
            background-color: #0C0950;
            padding: 1.5rem 1rem;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        #sidebar.collapsed {
            margin-left: -250px;
        }

        #sidebar .logo {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 2rem;
            padding: 0 0.5rem;
        }

        #sidebar .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        #sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 16px;
            border-radius: 5px;
            transition: all 0.2s ease;
        }

        #sidebar a:hover {
            background-color: #161179;
            transform: translateX(5px);
        }

        #content {
            margin-left: 250px;
            padding: 2rem;
            transition: margin-left 0.3s ease;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        #content.collapsed {
            margin-left: 0;
        }

        #toggle-btn {
            background-color: #261FB3;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        #toggle-btn:hover {
            background-color: #1a157a;
        }
    </style>

</head>

<body>
    <!-- Sidebar -->
    <div id="sidebar">
        <div class="logo">Mega Reksa</div>
        <div class="nav-menu">
            {{-- <a href="{{ route('dashboard') }}">Dashboard</a> --}}
            <a href="{{ route('Customer.index') }}"><i class="fas fa-users"></i> Data Customer</a>
            <a href="{{ route('Transaksi.index') }}"><i class="fas fa-exchange-alt"></i> Data Transaksi</a>
            <a href="{{ route('Invoice.index') }}"><i class="fas fa-file-invoice"></i> Cetak Invoice</a>
            <a href="{{ route('Summaries.index') }}"><i class="fas fa-clipboard-list"></i> Data Rekapan</a>
        </div>
    </div>

    <!-- Content -->
    <div id="content">
        <button id="toggle-btn">☰ Menu</button>
        <hr>
        @yield('content')
    </div>

    <script>
        const toggleBtn = document.getElementById('toggle-btn');
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');

        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
        < script src = "https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" >
    </script>
</body>

</html>
