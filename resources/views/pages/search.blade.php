@extends("master")

@section("content")

    <form class="search-form">
        <div class="input-group search">
            <label>Search</label>
            <i class="fa fa-search"></i>
            <input class="search-input" type="search" placeholder="e.g. soccer" required>
        </div>
    </form>

@stop

@section("footer")
    <script>
        $(".search.input-group input.search-input").focus(function(){
            $.each($(".search.input-group"),function(i){
                $(this).addClass("focus");
            });
        }).blur(function(){
            $.each($(".search.input-group"),function(i){
                $(this).removeClassa("focus");
            });
        });

    </script>
@stop