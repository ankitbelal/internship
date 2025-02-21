<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerForGroup extends Controller
{
    public function showMessage(){
        return "showing messages";
    }

    public function showGroup(){
        return "showing group ";
    }

    public function showMember(){
        return "showing member";

    }
}
