<!DOCTYPE html>
<html lang="en">
<head>
    @include('meta-info')
    <title>Zrušiť účet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/moj-ucet.css')}}">
    <script src="{{url('js/main.js')}}"></script>
</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
<div class="nadpis">
    <p>Zrušiť účet</p>
</div>
<div class="zrusit-ucet">
    <p>Ste si istý, že chcete zrušiť svoj účet?</p>
    <form action="{{route('app_zrusit_ucet')}}" method="post">
        @csrf
        <button type="submit">Zrušiť účet</button>
    </form>
</div>
@include('footer')
</body>
</html>
