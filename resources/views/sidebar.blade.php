
<div class="col-md-2 sidebar">
    <ul>
        <h2>Welcome, {{ auth()?->user()?->name ?? 'Guest'  }}</h2>

        <div class="btn-group-vertical btn-block">
            <button type="button" class="btn btn-primary"><a href="/dashboard">Upload CSV/TSV</a></button>
            <button type="button" class="btn btn-primary"><a href="/movies">View Movies</a></button>
        </div>
        <div class="btn-group-vertical btn-block">
            <button type="button" class="btn btn-danger"><a href="/logout">Logout</a></button>
        </div>

{{--        <li><a href="/dashboard">Upload CSV/TSV</a></li>--}}
{{--        <li><a href="/movies">View Movies</a></li><br><br>--}}
{{--        <li><a href="/logout">Logout</a></li>--}}
    </ul>
</div>
