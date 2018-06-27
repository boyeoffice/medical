<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"><!-- CSRF Token --><meta name="csrf-token" content="{{ csrf_token() }}"><link rel="icon" type="image/png" sizes="32x32" href="{{asset('icon/favicon32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('icon/favicon16x16.png')}}"><link rel="manifest" href="{{asset('icon/manifest.json')}}"><meta name="msapplication-TileColor" content="#ffffff"><meta name="msapplication-TileImage" content="{{asset('icon/ms-icon-144x144.png')}}"><meta name="theme-color" content="#ffffff"><link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}"><link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}"><link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}"><link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"><link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}"><link rel="stylesheet" href="{{asset('css/nprogress.css')}}"><link rel="stylesheet" href="{{asset('css/toastr.css')}}"><link rel="stylesheet" href="{{asset('css/main.css')}}"><link rel="stylesheet" href="{{asset('css/typehead.css')}}"><link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('css/select2-bootstrap.min.css')}}">
<title>Dashboard</title><script> window.Laravel = {
            csrfToken: "{{ csrf_token() }}"
        }
        window.User = {!! Auth::user() !!}
        window.url = "{{url('/')}}"
	</script></head><body class="skin-blue sidebar-mini"><div id="app"></div><script src="{{asset('js/backend.js')}}"></script> <script src="{{asset('js/app.min.js')}}"></script>
</body>
</html>
