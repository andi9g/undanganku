<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Undangan Digital - {{ $penerima->namapenerima ?? 'Tamu Undangan' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="icon" href="{{ asset("backgroundku/thumbnail.jpg") }}?v={{ time() }}" sizes="any">
    <link rel="icon" href="{{ asset("backgroundku/thumbnail.jpg") }}?v={{ time() }}" type="image/svg+xml">
    <meta property="og:title" content="Undangan Digital - {{ $penerima->namapenerima ?? 'Tamu Undangan' }}" />
    <meta property="og:description" content="Undangan digital pernikahan {{ $undangan->identitaspengantin->namapengantinwanita }} & {{ $undangan->identitaspengantin->namapengantinpria }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset("backgroundku/thumbnail.jpg") }}?v={{ time() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    
</head>

<body>
    <script>
        // Redirect utama (lebih cepat & clean)
        window.location.replace("{{ url('/mengundang/'.$kode.'/'.$kodepenerima) }}");
    </script>

    <noscript>
        <p>
            Mengalihkan ke undangan...
            <a href="{{ url('/mengundang/'.$kode.'/'.$kodepenerima) }}">
                Klik di sini jika tidak otomatis
            </a>
        </p>
    </noscript>

</body>
</html>
