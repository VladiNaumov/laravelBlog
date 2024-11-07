<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return string
     */


    public function __invoke(Request $request)
    {
        return 'index';
    }

    public function index()
    {
      return view('index');
    }

    public function UserIndex(){
        return view('user.index');

    }


}
