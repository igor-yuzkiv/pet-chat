<?php

namespace App\Ship\Http\Controllers;

use App\Ship\Http\Controller;

/**
 *
 */
class SpaController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function __invoke()
    {
        return view('app');
    }
}
