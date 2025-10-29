<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function deleteMovie(Movie $Movie) 
    {
        $Movie->delete();
        return redirect('/');
    }

    public function updateMovie(Movie $movie, Request $request)
    { 
        $incomingFields = $request->validate([
            'title' => 'required',
            'director' => 'required',
            'summary' => 'required',
            'price' => 'required',
            'img' => 'required',
            'vid' => 'required',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id'
        ]);

        $stringFields = ['title','director','summary','price','img','vid'];
        foreach ($stringFields as $field) {
            $incomingFields[$field] = strip_tags($incomingFields[$field]);
        }

        $movie->update($incomingFields);

        // Sync categories — replaces old ones with new selection
        $movie->categories()->sync($request->categories);

        return redirect('/');
    }

    public function showViewScreen(Movie $Movie)
    {
        // if (Auth::user()->id !== $Movie['user_id']) {
        //     return redirect('/');
        // }

        // Make sure this exact line is used -- 'Movie' => $Movie
        return view('view', ['Movie' => $Movie]);
    }

    public function addMovie(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'director' => 'required',
            'summary' => 'required',
            'price' => 'required',
            'img' => 'required',
            'vid' => 'required',
            'categories' => 'required|array', // must be an array
            'categories.*' => 'exists:categories,id' // each selected ID must exist in categories table
        ]);

        $stringFields = ['title','director','summary','price','img','vid'];
        foreach ($stringFields as $field) {
            $incomingFields[$field] = strip_tags($incomingFields[$field]);
        }

        // Create the movie
        $movie = Movie::create($incomingFields);

        // Attach categories (many-to-many)
        if ($request->has('categories')) {
            $movie->categories()->attach($request->categories);
        }

        return redirect('/');
    }
}
