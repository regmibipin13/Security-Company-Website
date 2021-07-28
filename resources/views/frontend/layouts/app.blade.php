<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
    @php
        $settings = \App\Models\Setting::with(['media'])->first();
    @endphp
    @include('frontend.partials.header',[
        'settings' => $settings,
    ])

    @yield('content')

    @include('frontend.partials.footer',[
        'settings' => $settings,
    ])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    @yield('scripts')
</body>
</html>
