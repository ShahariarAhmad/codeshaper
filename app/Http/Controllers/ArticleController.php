<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Jobs\PostNotification;
use App\Mail\PublishedNotifier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{

    // Assigning middleware partially to Laravel resource routes ... 
    public function __construct()
    {
        $this->middleware('auth:sanctum')
            ->except([
                'show',
                'index'
            ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response('cache is here !!!');

        if (Cache::has('allArticles')) {
            return Cache::get('allArticles');
        } else {
            return Article::orderBy('id','DESC')->get();
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = Article::create([
            "title" => $request->title,
            "description" => $request->description,
            "user_id" => $request->id
        ]);

        if ($data) {
            Cache::forget('allArticles');
            Cache::forever('allArticles', [Article::orderBy('id','DESC')->get()], 500000);
            $article = Article::find($data->id);
            PostNotification::dispatch($article);
       
        }
     
        


    }


    public function show($id)
    {
        return User::join('articles', 'users.id', 'articles.user_id')
            ->where('articles.id', $id)

            ->get(['title', 'description']);
    }


    public function edit($id)
    {
        // using this route to show data on dashboard table instead of creating new one 
        return Article::where('user_id', $id)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }

    function quota($id)
    {
        $member = User::find($id)->is_member;
        $count = Article::where('user_id', $id)->whereDate('created_at', '=', date('Y-m-d'))->count();
        return response([
            "quota" => $count,
            "isMember" => $member
        ] , 200);
    }
}
