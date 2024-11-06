<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShopCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator;

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
            return response()->json([
                'status' => 'error',
                'message' => "Không thể xoá danh mục <strong style='color:red'>$name</strong> vì có sản phẩm liên quan."
            ], 400);
        }
        $ShopCategory->delete();
        return response()->json([
            'status' => 'success',
            'message' => "Xoá danh mục <strong style='color:red'>$name</strong> thành công."
        ]);
        return redirect()->route('backend.shop_category.index');
    }

    public function store(Request $request)
    {
        $validator =  Validator::make(
            $request->all(),
            [
                'category_code' => 'required|min:3|max:50',
                'category_name' => 'required|min:3|max:50',
                'description' => 'required|min:3|max:50',
                'image' => 'required|mimes:jpg,jpeg,png,gif,avif'
            ],
            [
                'category_code.required' => 'Mã danh mục bắt buộc nhập',
                'category_code.min' => 'Mã danh mục phải từ 3 ký tự trở lên',
                'category_code.max' => 'Mã danh mục không vuuợt quá 50 ký tự',
                'category_name.required' => 'Tên danh mục bắt buộc nhập',
                'category_name.min' => 'Tên danh mục phải từ 3 ký tự trở lên',
                'category_namey.max' => 'Tên danh mục không vuợt quá 50 ký tự',
                'description.required' => 'Mô tả bắt buộc phải nhập',
                'description.min' => 'Mô tả phải từ 3 ký tự',
                'description.max' => 'Mô tả không vượt quá 50 ký tự',
                'image.required' => 'Hình ảnh không được để trống',
                'image.mimes' => 'Hình ảnh không đúng định dạng',

            ]
        );
        if ($validator->fails()) {
            return redirect()->route('backend.shop_category.create')->withErrors($validator)->withInput();
        }
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
