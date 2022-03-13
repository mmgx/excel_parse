<!doctype html>
<head>
    <title>@yield('title','Title')</title>
    <link href="{{ url('css/app.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ url('css/sweetalert2.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <meta name="vapid_public_key" content="{{ env('VAPID_PUBLIC_KEY') }}">
</head>
<body>
<div class="topnav">
    <a href="{{ route('home') }}">Импорт</a>
    <a href="{{ route('rows') }}">Результат</a>
</div>

@yield('content')
<input id="pusher-key" type="hidden" value="{{ config('broadcasting.connections.pusher.key') }}"/>
<input id="pusher-cluster" type="hidden" value="{{ config('broadcasting.connections.pusher.options.cluster') }}"/>

<script type="text/javascript" src="{{ url('js/enable-push.js') }}"></script>
<script type="text/javascript" src="http://js.pusher.com/7.0/pusher.min.js"></script>
<script type="text/javascript" src="{{ url('js/service-worker.js') }}"></script>
<script type="text/javascript" src="{{ url('js/script.js') }}"></script>
<script type="text/javascript" src="{{ url('js/sweetalert2.min.js') }}"></script>


</body>
</html>
