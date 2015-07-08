@extends("master")

@section("page-icon")
    <i class="mdi-action-search"></i>
@stop

@section("content")
    <form class="row" method="GET">
        <input type="text" placeholder="Search" name="q" class="col s4">
        <input type="submit" value="Submit" class="col s2">
    </form>
@stop