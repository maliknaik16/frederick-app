@extends('dashboard')

@section('content')
<div class="col-md-8">

@if(count($data['data']) > 0)

@if(session()->get('message'))
    <div class="alert {{ session()->get('error') ? 'alert-danger' : 'alert-success' }}">
        <strong>{{ session()->get('error') === true ? 'Error!' : 'Success!' }}</strong> {{ session()->get('message')  }}
    </div>
@endif
<div class="table-responsive">
<table class="table table-hover table-bordered">
    <tr>
        <th>ID</th>
        <th>Year</th>
        <th>Length</th>
        <th>Title</th>
        <th>Subject</th>
        <th>Actor</th>
        <th>Actress</th>
        <th>Director</th>
        <th>Popularity</th>
        <th>Awards</th>
        <th>Image</th>
        <th>Operation</th>
    </tr>

    @if(isset($data))
        @foreach($data['data'] as $movie)
            <tr>
                <td>{{ $movie['id'] ?? '' }}</td>
                <td>{{ $movie['year'] ?? '' }}</td>
                <td>{{ $movie['length'] ?? '' }}</td>
                <td>{{ $movie['title'] ?? '' }}</td>
                <td>{{ $movie['subject'] ?? '' }}</td>
                <td>{{ $movie['actor'] ?? '' }}</td>
                <td>{{ $movie['actress'] ?? '' }}</td>
                <td>{{ $movie['director'] ?? '' }}</td>
                <td>{{ $movie['popularity'] ?? '' }}</td>
                <td>{{ $movie['awards'] ?? '' }}</td>
                <td>{{ $movie['image'] ?? '' }}</td>
                <td><a href="/movies/{{ $movie['id']  }}"><button class="btn btn-primary">Update</button></a><br/>
                    <form action="/movies/delete/{{ $movie['id'] }}" method="POST">
                        @csrf
                        <input style="margin-top: 10px;" class="btn btn-danger" value="Delete" type="submit"/>
                    </form>
            </tr>
        @endforeach
    @endif
</table>
</div>
<span>Page {{ $data['current_page']}}</span><br>
<ul class="pagination">
    <li class="page-item"><a class="page-link" {{ $data['prev_page_url'] ?? 'onclick="return false;'  }} href="{{ $data['prev_page_url'] ?? ''  }}">Previous</a></li>
    <li class="page-item"><a class="page-link" {{ $data['next_page_url'] ?? 'onclick="return false;'  }} href="{{ $data['next_page_url'] ?? '' }}">Next</a></li>
</ul>
</div>
@else
    <div style="marign-top: 20px;"></div>
    <h1>No records found.</h1><br>
    <span>Upload movies <a href="/dashboard">here</a></span>
@endif
@endsection
