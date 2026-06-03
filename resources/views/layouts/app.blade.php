<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Dapur Seni Biru</title>

<link rel="stylesheet"
href="{{ asset('assets/css/style.css') }}">

</head>

<body>

@include('layouts.navbar')

@yield('content')

@include('layouts.footer')

</body>
</html>