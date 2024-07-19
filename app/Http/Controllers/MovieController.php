<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index() {
        $data = json_decode(json_encode(Movie::query()->simplePaginate(10)->toArray(), JSON_INVALID_UTF8_IGNORE), true);

        return view('movies.index', ['data' => $data]);
    }

    public function show(int $id) {
//        $movie = Movie::query()->findOrFail($id);
        $movie = Movie::query()->where(['id' => $id])->firstOrFail();

        return view('movies.show', ['movie' => $movie]);
//        return Movie::query()->findOrFail($id);
    }

    public function delete(Request $request, int $id): RedirectResponse
    {

        $error = false;

        try {
            $deleted = Movie::query()->where(['id' => $id])->firstOrFail()->delete();

            if(!$deleted) {
                $error = true;
                $message = 'an error occurred while trying to delete the movie with id: '.$id;
            } else {
                $message = 'Successfully deleted the movie with id: '.$id;
            }

        } catch(\Exception $e) {
            $error = true;
            $message = $e->getMessage();
        }

        return redirect()->route('movies.index')->with('message', $message)->with('error', $error);
//        return redirect()->back()->with('message', $message)->with('error', $error);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $values = $request->only([
            'year',
            'length',
            'title',
            'subject',
            'actor',
            'actress',
            'director',
            'popularity',
            'awards',
            'image'
        ]);


        $data = [ 'id' => $id ];

        $error = false;

        try {
            $movie = Movie::query()->where(['id' => $id])->firstOrFail();

            $status = $movie->update($values);

            $message = $status ? 'Successfully updated movie with id: '. $id
                : 'An error occured trying to update.';
        } catch (\Exception $ex) {
            $message = 'An error occured trying to update';
            $error = true;
        }

        return redirect()->route('movies.show', $data)->with('message', $message)->with('error', $error);
    }
}
