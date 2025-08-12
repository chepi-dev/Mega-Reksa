<!DOCTYPE html>
<html>

<head>
    <title>Verifikasi Email</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h4 class="mb-3">Verifikasi Email Anda</h4>
                <p>Kami telah mengirimkan link verifikasi ke email Anda.</p>
                <p>Silakan cek email Anda, lalu klik link verifikasi.</p>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success">
                        Link verifikasi baru telah dikirim ke email Anda.
                    </div>
                @endif

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Kirim Ulang Link Verifikasi</button>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Logout</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
