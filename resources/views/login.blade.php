
@extends('base')

@section('sidebar')
@endsection

@section('content')
<form action="/login" method="POST" style="width: 500px;margin: 50px auto 0 auto;">
    @csrf
    <h1 style="text-align: center">Login to your account</h1>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control " name="email" id="email" placeholder="Email" /><br><br>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" /><br><br>
    </div>
    <input type="submit" value="Login" class="btn btn-primary btn-block"/>
</form>
@endsection
