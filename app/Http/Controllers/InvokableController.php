<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvokableController extends Controller
{
  
//single action controller
    public function __invoke(Request $request)
    {
      return " you have used invokable or single action controller";
    }
}
