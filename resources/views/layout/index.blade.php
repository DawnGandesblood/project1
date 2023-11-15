<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                fontFamily: {
                    montserrat: ["Montserrat Alternates"],
                },
            },
            corePlugins: {
                preflight: false,
            },
        };
    </script>
    <title> @yield('title')</title>
</head>

<body class="font-montserrat {{ !Auth::user() ? 'bg-gray-800' : 'bg-gray-100' }}">
    @if (Auth::user())
        <header>
            @include('component/nav')
        </header>

        <main class="m-10">
            @yield('content')
        </main>

        <footer>
            @include('component/footer')
        </footer>
    @else
        @yield('content')
    @endif

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::has('success') || Session::has('message'))
        @if (Session::has('success'))
            @php
                $icon = 'success';
                $title = Session::get('success');
            @endphp
        @else
            @php
                $icon = 'error';
                $title = Session::get('message');
            @endphp
        @endif
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });
            Toast.fire({
                icon: '{{ $icon }}',
                title: '{{ $title }}'
            });
        </script>
    @endif

</body>

</html>
