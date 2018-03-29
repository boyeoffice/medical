<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/nprogress.css')}}">
	<link rel="stylesheet" href="{{asset('css/toastr.css')}}">
	<link rel="stylesheet" href="{{asset('css/main.css')}}">
	<link rel="stylesheet" href="{{asset('css/typehead.css')}}">
	<title>Dashboard</title>
	<script>
		window.Laravel = {
            csrfToken: "{{ csrf_token() }}"
        }

        window.User = {!! Auth::user() !!}
        window.url = "{{url('/')}}"
	</script>
</head>
<body class="skin-red sidebar-mini">
	<div id="app"></div>
	<script src="{{asset('js/backend.js')}}"></script>
	<script src="{{asset('js/app.min.js')}}"></script>
	<script>NProgress.configure({ minimum : 0.4 })</script>
</body>
</html>