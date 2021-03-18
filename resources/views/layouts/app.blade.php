<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script defer src="{{ mix("js/vendor.js") }}"></script>
    <script defer src="{{ mix("js/app.js") }}"></script>
    <title>@yield("title")</title>
</head>
<body>
    @include("components.navbar")
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ session('success') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if(session('error'))
        <div class="bg-green-400 w-75 p-4 mb-6 text-white text-center">
            {{ session('error') }}
        </div>
    @endif
    @yield("content")

</body>
</html>
