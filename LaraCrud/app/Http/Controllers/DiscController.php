<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Disc;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DiscController extends Controller
{
    public function AddDisc(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['artist'] = strip_tags($incomingFields['artist']);
        $incomingFields['price'] = strip_tags($incomingFields['price']);
        $incomingFields['stock'] = strip_tags($incomingFields['stock']);
        Disc::create($incomingFields);
        return redirect('/');
    }
}
