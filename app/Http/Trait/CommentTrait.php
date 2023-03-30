<?php

namespace App\Http\Trait;

use App\Http\Requests\Comment\StoreRequest;
use App\Models\Comment;

trait CommentTrait
{

    public function commentStore(StoreRequest $request)
    {
        $requestArray = $request->validated() + ['user_id' => auth()->id()];
        Comment::create($requestArray);

        return redirect()->back();
    }
    public function commentDelete(Comment $comment)
    {
        $comment->delete();

        return redirect()->back();
    }

    public function commentUpdate(Comment $comment, StoreRequest $request)
    {
        $comment->update($request->validated());

        return redirect()->back();
    }
}
