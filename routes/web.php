
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    return view('borrowed_books');
});

Route::get('/get-books', function () {

    $response = Http::get(
        'https://brosebo.com/api/group/jericho/borrowed/books'
    );

    return $response->json();

});
