<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $req)
    {
        $cats = Category::orderBy('id','DESC')->paginate(5); // SELECT * FROM category

        if ($req->keyword) {
            $cats = Category::where('name','like','%'.$req->keyword.'%')
                    ->orderBy('id','DESC')
                    ->paginate(5); // SELECT * FROM category
        }

        return view('admin.category.index', compact('cats'));
    }

    public function create ()
    {
        return view('admin.category.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|unique:category|min:3|max:100'
        ], [
            'name.required' => 'Tên danh mục không để trống',
            'name.unique' => 'Tên danh mục đã được sử dụng, chọn tên khác',
            'name.min' => 'Tên danh mục tối thiểu là 3 ký tự',
            'name.max' => 'Tên danh mục tối đa là 100 ký tự',
        ]);

        $form_data = $req->all('name','status');

        Category::create($form_data); // INSERT INTO category.....
        return redirect()->route('category.index');
    }

    public function edit(Category $cat)
    {
        // $cat = Category::find($id); // select * from category where id = $id
        // if ($cat) {
        //     return view('admin.category.edit', compact('cat'));
        // } else {
        //     return abort(404); // 405, 419, 403, 500
        // }
        return view('admin.category.edit', compact('cat'));
        
    }

    public function update(Request $req, Category $cat)
    {
        $req->validate([
            // 'name' => 'required|min:3|max:100|unique:category,name,'.$cat->id,
            'name' => [
                'required',
                'min:3',
                'max:100',
                'unique:category,name,'.$cat->id
            ]
        ], [
            'name.required' => 'Tên danh mục không để trống',
            'name.unique' => 'Tên danh mục đã được sử dụng, chọn tên khác',
            'name.min' => 'Tên danh mục tối thiểu là 3 ký tự',
            'name.max' => 'Tên danh mục tối đa là 100 ký tự',
        ]);

        $form_data = $req->all('name','status');

        $cat->update($form_data); // INSERT INTO category.....
        return redirect()->route('category.index');
    }

    public function delete(Category $cat)
    {
        $cat->delete();
        return redirect()->route('category.index');
    }
}