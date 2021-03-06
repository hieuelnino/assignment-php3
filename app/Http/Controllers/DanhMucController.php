<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;

use Illuminate\Http\Request;


class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (strlen($request->keyword) > 0) {
            $cates = DanhMuc::where('name', 'like', '%' . $request->keyword . '%')->paginate(10);
            $cates->withPath('?keyword=' . $request->keyword);
        } else {

            $cates = DanhMuc::paginate(10);
        }

        return view('admin.cate.index', ['cates' => $cates, 'keyword' => $request->keyword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cate.create');
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
            'name' => 'required|unique:danh-muc,name',
            'logo' => 'image'
        ]);

        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                $imageName = $request->logo->getClientOriginalName();
                $request->logo->storeAs('public/images/danh-muc', $imageName);
                DanhMuc::create([
                    'name' => $request->name,
                    'logo' => $imageName
                ]);
            }
        } else {
            DanhMuc::create([
                'name' => $request->name
            ]);
        };
        return redirect(route('danh-muc.index'));
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
        $model = DanhMuc::find($id);
        if (!$model) return redirect(route('danh-muc.index'));
        return  view('admin.cate.edit', ['model' => $model]);
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
        $model = DanhMuc::find($id);
        $this->validate($request, [
            'name' => 'required|max:99',
            'logo' => 'image',
        ]);
        $model->name = $request->name;
        if ($request->hasFile('logo')) {
            $imageName = $request->logo->getClientOriginalName();
            $request->logo->storeAs('public/images/danh-muc', $imageName);
            $model->logo = $imageName;
        }

        $model->save();
        return redirect(route('danh-muc.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DanhMuc::destroy($id);
        return redirect(route('danh-muc.index'));
    }
}
