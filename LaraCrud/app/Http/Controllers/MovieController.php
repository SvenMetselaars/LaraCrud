<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        // check if this info has been recieved
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

        // only check these for tags. (ones that writes code)
        $stringFields = ['title','director','summary','price','img','vid'];
        foreach ($stringFields as $field) {
            $incomingFields[$field] = strip_tags($incomingFields[$field]);
        }

        // update
        $movie->update($incomingFields);

        // Sync categories — replaces old ones with new selection
        $movie->categories()->sync($request->categories);

        // go to this page
        return redirect('/');
    }

    public function showViewScreen(Movie $Movie)
    {
        // get categories out of database via model
        $allCategories = Category::all();

        // go to the view page with  this info
        return view('view', [
            'Movie' => $Movie,
            'categories' => $allCategories,
        ]);
    }

    public function addMovie(Request $request)
    {
        // check if we have this data
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

        // only strip the tags from this one
        $stringFields = ['title','director','summary','price','img','vid'];
        foreach ($stringFields as $field) {
            $incomingFields[$field] = strip_tags($incomingFields[$field]);
        }

        // Create the movie
        $movie = Movie::create($incomingFields);

        // Attach categories
        if ($request->has('categories')) {
            $movie->categories()->attach($request->categories);
        }

        // go to home screen
        return redirect('/');
    }
}
