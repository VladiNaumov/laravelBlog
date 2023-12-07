<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        //return view('index', compact('users', 'root'));
        return view('user.index');
    }


    public function welcome()
    {
      //return view('user.index');
      return view('welcome');
    }



}
