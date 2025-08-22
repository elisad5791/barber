<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ReviewController extends Controller
{
    public function __construct(
        
    ) {}

    public function index(): View
    {

        return view('review.index');
    }
}
