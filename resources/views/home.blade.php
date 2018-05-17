<!DOCTYPE html>
<html>
<head>
    <title></title>
    <head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"><!-- CSRF Token --><meta name="csrf-token" content="{{ csrf_token() }}"><link rel="apple-touch-icon" sizes="57x57" href="{{asset('icon/apple-icon-57x57.png')}}"><link rel="apple-touch-icon" sizes="60x60" href="{{asset('icon/apple-icon-60x60.png')}}"><link rel="apple-touch-icon" sizes="72x72" href="{{asset('icon/apple-icon-72x72.png')}}"><link rel="apple-touch-icon" sizes="76x76" href="{{asset('icon/apple-icon-76x76.png')}}"><link rel="apple-touch-icon" sizes="114x114" href="{{asset('icon/apple-icon-114x114.png')}}"><link rel="apple-touch-icon" sizes="120x120" href="{{asset('icon/apple-icon-120x120.png')}}"><link rel="apple-touch-icon" sizes="144x144" href="{{asset('icon/apple-icon-144x144.png')}}"><link rel="apple-touch-icon" sizes="152x152" href="{{asset('icon/apple-icon-152x152.png')}}"><link rel="apple-touch-icon" sizes="180x180" href="{{asset('icon/apple-icon-180x180.png')}}"><link rel="icon" type="image/png" sizes="192x192"  href="{{asset('icon/android-icon-192x192.png')}}"><link rel="icon" type="image/png" sizes="32x32" href="{{asset('icon/favicon-32x32.png')}}"><link rel="icon" type="image/png" sizes="96x96" href="{{asset('icon/favicon-96x96.png')}}"><link rel="icon" type="image/png" sizes="16x16" href="{{asset('icon/favicon-16x16.png')}}"><link rel="manifest" href="{{asset('icon/manifest.json')}}"><meta name="msapplication-TileColor" content="#ffffff"><meta name="msapplication-TileImage" content="{{asset('icon/ms-icon-144x144.png')}}"><meta name="theme-color" content="#ffffff">
   <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<body>
    <div id="app"></div>
    <script> window.Laravel = {
            csrfToken: "{{ csrf_token() }}"
        }
        window.User = {!! Auth::user() !!}
        window.url = "{{url('/')}}"
	</script>
<script src="{{asset('js/client.js')}}"></script>
</body>
</html>