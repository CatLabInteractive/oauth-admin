<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}" />

</head>
<body id="app-layout">

<div class="container container-fluid">
    @if (!empty($messages))
        @foreach ($messages as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    @if (!empty($errors))
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    @yield('content')
</div>

<!-- JavaScripts -->
{{ Html::script('vendor/jquery/dist/jquery.min.js') }}
{{ Html::script('vendor/bootstrap/dist/js/bootstrap.min.js') }}
{{ Html::script('js/main.js') }}
</body>
</html>