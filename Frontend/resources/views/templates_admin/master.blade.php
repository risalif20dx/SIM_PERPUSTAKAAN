<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- csrf token --}}
    <meta name="_token" content="{{ csrf_token() }}">

    @include('templates_admin/header')


</head>
    <body>
   
         @include('templates_admin/sidebar')
        @yield('body')

        @include('templates_admin/footer')
     
    </body>
</html>