<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShopCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ShopCategoriesController extends Controller
{
    public function index()
    {
        $ShopCategory = ShopCategory::orderBy('id', 'DESC')->paginate(10);
        return view('backend.shop_categories.index')->with('ShopCategory', $ShopCategory);
    }

    public function create()
    {
        return view('backend.shop_categories.create');
    }

    public function edit($id)
    {
        $ShopCategory = ShopCategory::find($id);
        return view('backend.shop_categories.edit')->with('ShopCategory', $ShopCategory);
    }

    public function destroy($id)
    {
        // ShopCategory::destroy($id);
        $ShopCategory = ShopCategory::findOrFail($id);
        $name = $ShopCategory->category_name;
        if ($ShopCategory->products()->exists()) {
            return redirect()->back()->with('error', "Không thể xoá Danh mục <strong style='color:red'>$name</strong> này vì tồn tại sản phẩm");
        }
        $ShopCategory->delete();
        flash()->addSuccess("Xoá danh mục <strong style='color:red'>$name</strong> thành công");
        return redirect()->route('backend.shop_category.index');
    }

    public function store(Request $request)
    {
        $ShopCategory = new ShopCategory();
        $ShopCategory->category_code = $request->category_code;
        $ShopCategory->category_name = $request->category_name;
        $ShopCategory->description = $request->description;
        $ShopCategory->created_at = date('Y-m-d H:i:s');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/shop_categories/', $filename);
            $ShopCategory->image = $filename;
        }
        $ShopCategory->save();
        flash()->addSuccess("Thêm mới danh mục <strong style='color:red'>$ShopCategory->category_name</strong> thành công");
        return redirect()->route('backend.shop_category.index');
    }

    public function update($id, Request $request)
    {
        $ShopCategory = ShopCategory::findOrFail($id);
        $ShopCategory->category_code = $request->category_code;
        $ShopCategory->category_name = $request->category_name;
        $ShopCategory->description = $request->description;
        $ShopCategory->updated_at = Carbon::now();
        //Xoá ảnh cũ
        if ($request->hasFile('image')) {
            $old_image = 'uploads/shop_categories/' . $ShopCategory->image;
            if (File::exists($old_image)) {
                File::delete($old_image);
            }
            //lưu ảnh mới
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid() . '.' . time() . '.' . $extension;
            $file->move(public_path('uploads/shop_categories/'), $filename);
            $ShopCategory->image = $filename;
        }
        $ShopCategory->update();
        flash()->addSuccess("Cập nhật danh mục <strong style='color:red'>$ShopCategory->category_name</strong> thành công");
        return redirect()->route('backend.shop_category.index');
    }
}