<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShopSetting;
use Carbon\Carbon;
use Nette\Utils\Validators;
use Validator;

class ShopSettingController extends Controller
{
    public function index()
    {
        // $shopSettingList = ShopSetting::all();
        $ShopSetting = ShopSetting::orderBy('id', 'DESC')->paginate();
        return view('backend.shop_setting.index')->with('ShopSetting', $ShopSetting);
    }

    public function create()
    {
        return view('backend.shop_setting.create');
    }

    public function edit($id)
    {
        $ShopSetting = ShopSetting::find($id);
        return view('backend.shop_setting.edit')->with('ShopSetting', $ShopSetting);
    }

    public function destroy($id)
    {
        $ShopSetting = ShopSetting::findOrFail($id);
        $name = $ShopSetting->group;
        $ShopSetting->delete();
        flash()->addSuccess("Xoá cấu hình <strong style='color:red'>$name</strong> thành công");
        return redirect()->route('backend.shop_setting.index');
    }

    public function store(Request $request)
    {
        $validator =  Validator::make(
            $request->all(),
            [
                'group' => 'required|min:3|max:50',
                'key' => 'required|min:3|max:50',
                'value' => 'required|min:3|max:50',
                'description' => 'required|min:3|max:1000'
            ],
            [
                'group.required' => 'Tên nhóm bắt buộc nhập',
                'group.min' => 'Tên nhóm phải từ 3 ký tự trở lên',
                'group.max' => 'Tên nhóm không vuuợt quá 50 ký tự',
                'key.required' => 'Tên Khoá bắt buộc nhập',
                'key.min' => 'Khoá phải từ 3 ký tự trở lên',
                'key.max' => 'Khoá không vuợt quá 50 ký tự',
                'value.required' => 'Giá trị bắt buộc phải nhập',
                'value.min' => 'Giá trị phải từ 3 ký tự',
                'value.max' => 'Giá trị không vượt quá 50 ký tự',
                'description.required' => 'Mô tả bắt buộc nhập',
                'description.min' => 'Mô tả phải từ 3 ký tự',
                'description.max' => 'Mô tả không vượt quá 1000 ký tự'
            ]
        );

        //Kiểm tra logic,nếu đúg thì lưu, k thì chuyển hướng
        if ($validator->fails()) {
            return redirect()->route('backend.shop_setting.create')->withErrors($validator)->withInput();
        }

        $ShopSetting = new ShopSetting();
        $ShopSetting->group = $request->group;
        $ShopSetting->key = $request->key;
        $ShopSetting->value = $request->value;
        $ShopSetting->description = $request->description;
        $ShopSetting->created_at = date('Y-m-d H:i:s');
        $ShopSetting->save();
        flash()->addSuccess("Thêm mới cấu hình <strong style='color:red'>$ShopSetting->group</strong> thành công");
        return redirect()->route('backend.shop_setting.index');
    }

    public function update($id, Request $request)
    {
        $ShopSetting = ShopSetting::find($id);
        $ShopSetting->group = $request->group;
        $ShopSetting->key = $request->key;
        $ShopSetting->value = $request->value;
        $ShopSetting->description = $request->description;
        $ShopSetting->updated_at = Carbon::now();
        $ShopSetting->save();
        flash()->addSuccess("Cập nhật cấu hình <strong style='color:red'>$ShopSetting->group</strong> thành công");
        return redirect()->route('backend.shop_setting.index');
    }
}
