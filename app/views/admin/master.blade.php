<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Painel Administrativo Genérico</title>

    @section('page-styles')
        {{HTML::style('components/bootstrap/dist/css/bootstrap.min.css')}}
    @show

</head>
<body>
{{-- http://getbootstrap.com/examples/jumbotron-narrow/ --}}
    <div class="container">
        @yield("navigation")
        @yield("content")
    </div>

    {{HTML::script('components/jquery/dist/jquery.min.js')}}
    {{HTML::script('components/bootstrap/dist/js/bootstrap.min.js')}}

</body>
</html>
