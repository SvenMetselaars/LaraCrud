<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Disc;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class DiscController extends Controller
{
    public function deleteDisc(Disc $disc) {
        $disc->delete();
        return redirect('/');
    }

    public function updateDisc(Disc $disc, Request $request) {

        $incomingFields = $request->validate([
            'title' => 'required',
            'director' => 'required',
            'summary' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['director'] = strip_tags($incomingFields['director']);
        $incomingFields['summary'] = strip_tags($incomingFields['summary']);
        $incomingFields['price'] = strip_tags($incomingFields['price']);
        $incomingFields['stock'] = strip_tags($incomingFields['stock']);

        $disc->update($incomingFields);
        return redirect('/');
    }

    public function showViewScreen(Disc $disc)
    {
        // if (Auth::user()->id !== $disc['user_id']) {
        //     return redirect('/');
        // }

        // Make sure this exact line is used -- 'disc' => $disc
        return view('view', ['disc' => $disc]);
    }

    public function AddDisc(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'director' => 'required',
            'summary' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['director'] = strip_tags($incomingFields['director']);
        $incomingFields['summary'] = strip_tags($incomingFields['summary']);
        $incomingFields['price'] = strip_tags($incomingFields['price']);
        $incomingFields['stock'] = strip_tags($incomingFields['stock']);
        
        Disc::create($incomingFields);
        return redirect('/');
    }
}
