<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Models\BaiViet;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (strlen($request->keyword) > 0) {
            $blogs = BaiViet::where('title', 'like', '%' . $request->keyword . '%')->paginate(10);
            $blogs->withPath('?keyword=' . $request->keyword);
        } else {
            $blogs = Baiviet::paginate(10);
        }
        return view('admin.bai-viet.index', ['blogs' => $blogs, 'keyword' => $request->keyword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = DanhMuc::all();
        return view('admin.bai-viet.create', ['cates' => $cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:bai-viet,title',
            'image' => 'image|required',
            'content' => 'required',
            'cate_id' => 'required',
            'short_desc' => 'required'
        ]);
        $imageName = $request->image->getClientOriginalName();
        $request->image->storeAs('public/images/bai-viet', $imageName);
        BaiViet::create([
            'title' => $request->title,
            'image' => $imageName,
            'content' => $request->content,
            'danh-muc_id' => $request->cate_id,
            'author_id' => $request->user_id,
            'short_desc' => $request->short_desc
        ]);

        return redirect(route('bai-viet.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = BaiViet::find($id);
        $cates = DanhMuc::all();
        return view('admin.bai-viet.edit', ["blog" => $blog, 'cates' => $cates]);
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
        $model = BaiViet::find($id);
        $this->validate($request, [
            'title' => 'required|unique:bai-viet,title',
            'image' => 'image',
            'content' => 'required',
            'cate_id' => 'required',
            'short_desc' => 'required'
        ]);
        Rule::unique('title')->ignore($model->title);
        $model->title = $request->title;
        $model->content = $request->content;

        $model->short_desc = $request->short_desc;

        if ($request->hasFile('iamge')) {
            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('public/images/bai-viet', $imageName);
            $model->image = $imageName;
        }

        $model->save();
        return redirect(route('bai-viet.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BaiViet::destroy($id);
        return redirect()->route('bai-viet.index');
    }
}
