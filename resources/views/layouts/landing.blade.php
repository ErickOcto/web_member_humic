<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Web Member Humic | Homepage</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- START::BOOTSTRAP_CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- END::BOOTSTRAP_CSS -->

    <!-- START::VANILLA_CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- END::VANILLA_CSS -->

    @stack('css_scripts')
</head>
<body>


        <!-- START""NAVBAR -->
            @include('components.navbar')
        <!-- END::NAVBAR -->


        <!-- START::CONTENT -->

            @yield('landing-content')

        <!-- END::CONTENT -->

        {{-- START::FOOTER --}}
            @include('components.footer')
        {{-- END::FOOTER --}}

        @stack('js_scripts')

        <!-- START::JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            <script>
                @if(session()->has('success'))
                    toastr.success('{{ session('success') }}', 'BERHASIL!');
                @elseif(session()->has('error'))
                    toastr.error('{{ session('error') }}', 'GAGAL!');
                @endif
            </script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- END::JS -->

</body>
</html>
