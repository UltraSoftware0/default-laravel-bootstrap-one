<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request){
        $request->validate([
            'hello'=>'required'
        ]);

        return redirect()->back()->with('success',"file successfully stored")
                                 ->with('error',"file successfully stored")
                                 ->with('info',"file successfully stored")
                                 ->with('warning',"file successfully stored");
    }
}
