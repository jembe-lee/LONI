<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function open()
    {
        $data = "here is a data on a open method does not need authentication";
        return response()->json(compact('data'), 200);
    }

    public function close()
    {
        $data = "here is a data on a closed method requires user to be authenticated";
        return response()->json(compact('data'), 200);
    }
}
