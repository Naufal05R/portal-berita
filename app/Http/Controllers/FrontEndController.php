<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $title = 'Welcome';
        $news = News::latest()->get();
        $nav_category = Category::all();
        $slider = Slider::all();
        $side_news = News::inRandomOrder()->limit('4')->get();

        return view('frontend.index', compact('slider', 'news', 'nav_category', 'slider', 'side_news'));
    }

    public function detailCategory($slug)
    {
        $title = 'Welcome';
        $category = Category::where('slug', $slug)->first();
        $news = News::where('category_id', $category->id)->paginate(10);
        $nav_category = Category::all();
        $side_news = News::inRandomOrder()->limit('4')->get();

        return view('frontend.detail-category', compact('news', 'nav_category', 'side_news', 'title'));
    }

    public function detailNews($slug)
    {
        $title = 'Welcome';
        $news = News::where('slug', $slug)->first();
        $text = News::findOrFail($news->id);
        $title = 'Berita - $text';
        $nav_category = Category::all();
        $side_news = News::inRandomOrder()->limit('4')->get();

        return view('frontend.detail-news', compact('title', 'news', 'text', 'title', 'nav_category', 'side_news'));
    }

    public function searchNewsEnd(Request $request)
    {
        $keyword = $request->keyword;
        $news = News::where('title', 'like', '%' . $keyword . '%')->paginate(10);
        $title = 'Welcome';
        $nav_category = Category::all();
        $slider = Slider::all();
        $side_news = News::inRandomOrder()->limit('4')->get();

        return view('frontend.index', compact('keyword', 'news', 'title', 'nav_category', 'slider', 'side_news',));
    }
}
