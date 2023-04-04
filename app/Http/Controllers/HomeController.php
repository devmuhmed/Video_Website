<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Skill;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->paginate(30);
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
}
