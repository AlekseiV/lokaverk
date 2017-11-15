<?php
namespace App\Http\Controllers;

use App\Like;
use App\News;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function likeProduct($id)
    {
        // here you can check if product exists or is valid or whatever

        $this->handleLike('App\Product', $id);
        return redirect()->back();
    }

    public function likePost($id)
    {
        // here you can check if product exists or is valid or whatever

        $this->handleLike('App\News', $id);
        return redirect()->back();
    }

    public function handleLike($type, $id)
    {
        $existing_like = Like::withTrashed()->whereLikeableType($type)->whereLikeableId($id)->whereUserId(Auth::id())->first();

        if (is_null($existing_like)) {
            Like::create([
                'user_id'       => Auth::id(),
                'likeable_id'   => $id,
                'likeable_type' => $type,
            ]);
            $news = News::find($id);
            $news->articlelikes = $news->articlelikes + 1;
            $news->save();
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
                $news = News::find($id);
                $news->articlelikes = $news->articlelikes - 1;
                $news->save();
            } else {
                $existing_like->restore();
                $news = News::find($id);
                $news->articlelikes = $news->articlelikes + 1;
                $news->save();
            }
        }
    }
}
