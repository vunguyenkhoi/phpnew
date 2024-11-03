@extends('backend.layouts.master')
@section('title')
Cập nhật cấu hình
@endsection

@section('main-content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
            <h4 class="mb-sm-0">Cập nhật cấu hình</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('backend.shop_setting.index')}}">Danh sách</a></li>
                    <li class="breadcrumb-item active">Cập nhật</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="card">
    <div class="card-header align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Cập nhật dữ liệu <span class="fw-bold">{{$ShopSetting->group}}</span>
        </h4>
    </div>
    <!-- end card header -->
    <div class="card-body">
        <form name="frmEdit" action="{{route('backend.shop_setting.update',['id' => $ShopSetting->id])}}" method="POST">
            @csrf @method('put')
            <div class="row gy-2">
                <div class="col-6">
                    <div>
                        <label for="group" class="form-label">Tên nhóm</label>
                        <input type="text" name="group" class="form-control" id="group" value="{{$ShopSetting->group}}"
                            placeholder="Nhập tên nhóm">
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <label for="key" class="form-label">Tên khoá</label>
                        <input type="text" name="key" class="form-control" id="key" value="{{$ShopSetting->key}}"
                            placeholder="Nhập vào tên khoá">
                    </div>
                </div>
                <div class="col-12">
                    <div>
                        <label for="value" class="form-label">Tên giá trị</label>
                        <input type="text" name="value" class="form-control" id="value" value="{{$ShopSetting->value}}"
                            placeholder="Nhập vào giá trị">
                    </div>
                </div>
                <div class="col-12">
                    <label for="description" class="form-label ">Diễn giải</label>
                    <textarea name="description" class="form-control ckeditor-classic" id="description"
                        placeholder="Nhập vào Diễn giải">{{$ShopSetting->description}}</textarea>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success waves-effect waves-light">Cập nhật</button>
                <a href="{{route('backend.shop_setting.index')}}" class="btn btn-info waves-effect waves-light">Quay
                    về</a>
            </div>

        </form>
    </div>
</div>
@endsection