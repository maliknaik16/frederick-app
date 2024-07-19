<!DOCTYPE html>
<html>
    @include('head')
    <body>
        @include('header')
        <div class="container-fluid">
            <div class="row">
                @section('sidebar')
                    @include('sidebar')
                @show

                @section('content')
                @show

                <div class="col-md-2"></div>
            </div>
        </div>
    <div style="margin-top: 25px; background-color: #f9f9f9; padding: 20px 0; text-align: center; font-size: 11px;">
        Copyright &copy; Malik N.
    </div>
    </body>
</html>
