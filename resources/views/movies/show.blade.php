@extends('dashboard')

@section('content')
    <div class="col-md-8">
        <h1>Movie information</h1>

        @if(session()->get('message'))
        <div class="alert {{ session()->get('error') ? 'alert-danger' : 'alert-success' }}">
            <strong>{{ session()->get('error') === true ? 'Error!' : 'Success!' }}</strong> {{ session()->get('message')  }}
        </div>
        @endif

        <form action="/movies/{{ $movie['id']  }}" method="POST">

            @csrf
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="text" class="form-control" id="year" name="year" value="{{ $movie['year']  }}"/>
            </div>
            <div class="form-group">
                <label for="length">Length:</label>
                <input type="text" class="form-control" id="length" name="length" value="{{ $movie['length']  }}"/>
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $movie['title']  }}"/>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject" value="{{ $movie['subject']  }}"/>
            </div>
            <div class="form-group">
                <label for="actor">Actor:</label>
                <input type="text" class="form-control" id="actor" name="actor" value="{{ $movie['actor']  }}"/>
            </div>
            <div class="form-group">
                <label for="actress">Actress:</label>
                <input type="text" class="form-control" id="actress" name="actress" value="{{ $movie['actress']  }}"/>
            </div>
            <div class="form-group">
                <label for="director">Director:</label>
                <input type="text" class="form-control" id="director" name="director" value="{{ $movie['director']  }}"/>
            </div>
            <div class="form-group">
                <label for="popularity">Popularity:</label>
                <input type="text" class="form-control" id="popularity" name="popularity" value="{{ $movie['popularity']  }}"/>
            </div>
            <div class="form-group">
                <label for="awards">Awards:</label>
                <input type="text" class="form-control" id="awards" name="awards" value="{{ $movie['awards']  }}"/>
            </div>
            <input type="submit" value="Update" class="btn btn-primary"><br>
{{--            <form action="/api/delete/{{ $movie['id'] }}" method="DELETE">--}}
{{--                <button style="margin-top: 10px;" class="btn btn-danger">Delete</button>--}}
{{--            </form>--}}
        </form>
        <form action="/movies/delete/{{ $movie['id'] }}" method="POST">
            @csrf
            <input style="margin-top: 10px;" class="btn btn-danger" value="Delete" type="submit"/>
        </form>
    </div>
@endsection
