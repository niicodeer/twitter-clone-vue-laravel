<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TweetController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return Inertia::render('Welcome', [
      'tweets' => Tweet::orderBy('id', 'desc')->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $file = null;
    $extension = null;
    $fileName = null;
    $path = '';

    if ($request->hasFile('file')) {
      $file = $request->file('file');
      $request->validate(['file' => 'required|mimes:jpg,jpeg,png,mp4']);
      $extension = $file->getClientOriginalExtension();
      $fileName = time() . '.' . $extension;
      $extension === 'mp4' ? $path = '/videos/' : $path = '/pics/';
    }

    $tweet = new Tweet;

    $tweet->name = 'Nico Radin Dev';
    $tweet->handle = '@nico_radin';
    $tweet->image = 'https://yt3.ggpht.com/yti/AGOGRCrBA_DXtIytv3OSpGI2FVHohLKiRB-7eKK5ExamSg=s88-c-k-c0x00ffffff-no-rj';
    $tweet->tweet = $request->input('tweet');
    if ($fileName) {
      $tweet->file = $path . $fileName;
      $tweet->is_video = $extension === 'mp4' ? true : false;
      $file->move(public_path() . $path, $fileName);
    }
    $tweet->comments = rand(5, 500);
    $tweet->retweets = rand(5, 500);
    $tweet->likes = rand(5, 500);
    $tweet->analytics = rand(5, 500);

    $tweet->save();
  }


  /**
   * Display the specified resource.
   */
  public function show(Tweet $tweet)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Tweet $tweet)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Tweet $tweet)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    $tweet = Tweet::find($id);

    if (!is_null($tweet->file) && file_exists(public_path() . $tweet->file)) {
      unlink(public_path() . $tweet->file);
    }

    $tweet->delete();

    return redirect()->route('tweets.index');
  }
}
