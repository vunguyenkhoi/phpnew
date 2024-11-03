<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShopSetting;
use Carbon\Carbon;

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