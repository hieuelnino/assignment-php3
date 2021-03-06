<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use App\Models\DanhMuc;


class HomeController extends Controller
{
    function index()
    {
        $blogs = BaiViet::paginate(10)->sortByDesc('id');
        $blogLastests = BaiViet::all()->sortByDesc('id')->take(3);
        $cates = DanhMuc::all();
        return view('home.index', ['blogLastests' => $blogLastests, 'cates' => $cates, 'blogs' => $blogs]);
    }
    function category($id)
    {
        $cate = DanhMuc::find($id);
        $cates = DanhMuc::all();
        $blogsCate = DanhMuc::find($id)->blog()->get();

        return view('home.category', ['blogsCate' => $blogsCate, 'cates' => $cates, 'cate' => $cate]);
    }
    function detail($id)
    {
        $blog = BaiViet::find($id);
        $cates = DanhMuc::all();
        $blogsCate = DanhMuc::find($blog->cate->id)
            ->blog()
            ->take(2)
            ->get();
        return view('home.detail', ['blog' => $blog, 'blogsCate' => $blogsCate, 'cates' => $cates]);
    }
}
