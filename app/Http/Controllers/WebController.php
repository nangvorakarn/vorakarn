<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    //
    public function showinfo()  {
        $n = "วรกานต์";
        $p = "08333333";
        $a = "ศูนย์หัวใจ";


        return view('showinfo',[
            'name'=>$n,
            'phone'=>$p,
            'address'=>$a,
            ]);
    }
}
