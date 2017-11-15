<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Thread;
use Auth;
use Validator;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
  public function store(Request $request, $id){
    $comment = new Comment;
    $comment->comment = $request->comment;
    $comment->news_id = $id;
    $comment->owner = Auth::id();

    $validator = Validator::make($request->all(), [
      'comment' => 'required',
    ]);

    if($validator->fails()){
      return redirect()->back()
        ->withInput()
        ->withErrors($validator);
    }

    $comment->save();

    return back()->with('success','Comment posted successfully');
  }

  public function dlt(Request $request){
          $id = $request->id;
          $nCard= Comment::find($id);
          $nCard->delete();
          return back()->with('info','Comment removed successfully');

  }
}
