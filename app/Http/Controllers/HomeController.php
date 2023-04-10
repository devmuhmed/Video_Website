<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Skill;
use App\Models\Video;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\FrontEnd\Comment\Update;
use App\Http\Requests\FrontEnd\Comment\StoreRequest;
use App\Http\Requests\FrontEnd\Contact\StoreRequest as ContactStoreRequest;
use App\Models\Contact;
use App\Models\Page;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only([
            'commentStore', 'commentupdate'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::orderBy('id', 'desc');
        if (request()->has('search') && request()->get('search') != '') {
            $videos = $videos->where('name', 'like', "%" . request()->get('search') . "%");
        }
        $videos = $videos->paginate(30);
        return view('home', compact('videos'));
    }

    public function category(Category $category)
    {
        $videos = Video::where('category_id', $category->id)->orderBy('id', 'desc')->paginate(30);
        return view('front-end.category.index', compact('videos', 'category'));
    }

    public function skills(Skill $skill)
    {
        $videos = Video::whereHas('skills', function ($query) use ($skill) {
            $query->where('skill_id', $skill->id);
        })->orderBy('id', 'desc')->paginate(30);
        return view('front-end.skill.index', compact('videos', 'skill'));
    }
    public function tags(Tag $tag)
    {
        $videos = Video::whereHas('tags', function ($query) use ($tag) {
            $query->where('tag_id', $tag->id);
        })->orderBy('id', 'desc')->paginate(30);
        return view('front-end.tag.index', compact('videos', 'tag'));
    }

    public function video(Video $video)
    {
        return view('front-end.video.index', compact('video'));
    }

    public function commentUpdate(Comment $comment, Update $request)
    {
        if ($comment->user_id == auth()->id() || auth()->user()->group == 'admin') {
            $comment->update($request->validated());
        }
        return redirect()->route('frontend.video', [$comment->video_id, '#comments']);
    }

    public function commentStore(Video $video, StoreRequest $request)
    {
        Comment::create([
            'user_id' => auth()->id(),
            'video_id' => $video->id,
        ] + $request->validated());
        return redirect()->route('frontend.video', [$video->id, '#comments']);
    }

    public function contact(ContactStoreRequest $request)
    {
        Contact::create($request->all());

        return redirect()->route('frontend.landing');
    }

    public function welcome()
    {
        $videos = Video::orderBy('id', 'desc')->paginate(9);
        $videosCount = Video::count();
        $commentsCount = Comment::count();
        $tagsCount = Tag::count();
        return view('welcome', compact('videos', 'videosCount', 'commentsCount', 'tagsCount'));
    }

    public function page(Page $page, $slug = null)
    {
        return view('front-end.page.index', compact('page'));
    }

    public function profile(User $user, $slug = null)
    {
        return view('front-end.profile.index', compact('user'));
    }
}
