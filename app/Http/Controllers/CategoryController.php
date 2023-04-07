<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $category = Category::latest()->paginate('2');

        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //upload image
        $image = $request->file('image');
        $image->storeAs('public/categories/', $image->hashName());

        //save to DB
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'image' => $image->hashName()
        ]);

        return redirect()->route('category.index')->with([
            Alert::success('Success Title', 'Success Message')
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,' . $category->id
        ]);

        // check jika image kosong
        if ($request->file('image') == '') {
            $category = Category::findOrFail($category->id);
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name, '-')
            ]);
        } else {
            Storage::disk('local')->delete('public/categories/' . basename($category->image));

            $image = $request->file('image');
            $image->storeAs('public/categories', $image->hashName());

            $category = Category::findOrFail($category->id);
            $category->update([
                'image' => $image->hashName(),
                'name' => $request->name,
                'slug' => Str::slug($request->name, '-')
            ]);
        }

        return redirect()->route('category.index')->with([
            Alert::success('success', 'Berhasil diupdate'
        )]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        Storage::disk('local')->delete('public/categories/' . basename($category->image));
        $category->delete();

        return redirect()->route('category.index')->with([Alert::success('success', 'Berhasil dihapus')]);
    }

    public function searchCategory(Request $request)
    {
        $keyword = $request->keyword;
        $category = Category::where('name', 'like', '%'. $keyword. '%')->paginate(5);

        return view('admin.category.index', compact('keyword', 'category'));
    }
}
