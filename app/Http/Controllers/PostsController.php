<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://kandydat.t/api/post');
        $response = json_decode($request->getBody(), true);
        return view('posts.index')->with('response', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $url = "http://kandydat.t/api/post";
        $request = $client->post($url, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode([
                'user_id'=> auth()->user()->id,
                'title' => $request->title,
                'content' => $request->content])
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get("http://kandydat.t/api/post/$id");
        $response = json_decode($request->getBody(), true);
        return view('posts.edit')->with('response', $response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = new \GuzzleHttp\Client();
        $url = "http://kandydat.t/api/post/" . $id;
        $client->delete($url);

        return redirect()->route('posts.index');
    }
}
