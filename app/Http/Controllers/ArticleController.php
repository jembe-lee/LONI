<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ArticleController extends Controller
{
    // public function open()
    // {
    //     $data = "here is a data on a open method does not need authentication";
    //     return response()->json(compact('data'), 200);
    // }

    // public function close()
    // {
    //     $data = "here is a data on a closed method requires user to be authenticated";
    //     return response()->json(compact('data'), 200);
    // }

    /**
     * Display a listing of the resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return response()->json(compact('articles'));
    }

    /**
     * Display a specified resource.
     *
     * @param int $id 
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return response()->json(compact('article'));
    }

    /**
     * Save a resource inside a storage
     * 
     * @param \Illuminate\Http\Request $request
     * @param App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'body' => 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json(['error' => $validator->errors()->toJson()], 400);
        }

        $article->create($request->all());
        // return response()->json($article, 200);
        return redirect()->route('articles.index');
    }

    /**
     * Update an existing resource.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'body' => 'required'
        ]);

       if ($validator->fails())
       {
           return response()->json(['error' => $validator->errprs()->toJson()], 400);
       }
        $article = Article::find($id);
        $article->update($request->all());
        return response()->json(['article' => $article, 'status' => 'success'], 201);
    }

    /**
     * Delete an existing resource
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        // return redirect()->route('articles.index');
        return 204;
    }

}
