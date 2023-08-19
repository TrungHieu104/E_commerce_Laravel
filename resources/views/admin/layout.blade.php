<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="/ADassets/style.css">

    <title>Admin Dashboard  @yield('title')</title>
</head>

<body>

    @include('component.admin.header')

    <!-- CONTENT -->
    <section id="content">
        @include('component.admin.topHead')

        @yield('content')

    </section>

    <script src="/ADassets/script.js"></script>
</body>

</html>
