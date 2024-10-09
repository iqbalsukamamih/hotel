<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css')}}">
    
    <link rel="stylesheet" href="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{ asset('/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
    <link rel="shortcut icon" href="{{ asset('/images/favicon.svg')}}" type="image/x-icon">
    @stack('styles')
</head>

<body>
    <div id="app">
        <x-sidebar />

        <div id="main" class='layout-navbar'>
           <x-header />
            <div id="main-content">
                
                @yield('content')

               <x-footer /> 
            </div>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    <script src="assets/js/mazer.js"></script>
</body>

</html>
