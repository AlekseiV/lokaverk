<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Validator;
use App\Comment;

class NewsController extends Controller
{
  public function index(){
    $news = News::latest()->get();
    return view('news.index', compact("news"));
  }

  public function create(){
    return view('news.create');
  }

  public function show(News $news){
    $comments = Comment::where("news_id", "=", $news->id)->get();

    return view("news.show", compact("news", "comments"));
  }

  public function store(Request $request){
    $news = new News;
    $news->title = $request->title;
    $news->picture = $request->picture;
    $news->message = $request->message;
    $news->owner = Auth()->id();

    $validator = Validator::make($request->all(), [
      "title" => "required",
      "message" => "required",
      "picture" => "required"
    ]);

    if($validator->fails()){
      return redirect()->back()
        ->withInput()
        ->withErrors($validator);
    }

    \Session::flash("flash_message", "Your article has been created!");

    $news->save();
    return redirect("/news");
  }

  public function dlt(Request $request){
          $id = $request->id;
          $nCard= News::find($id);
          $nCard->delete();
          return redirect("/news")->with('info','Article removed successfully');

  }
}
