@extends('backend.layouts.master')
@section('title')
Thêm mới Danh mục
@endsection

@section('main-content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
            <h4 class="mb-sm-0">thêm mới Danh mục</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('backend.shop_category.index')}}">Danh sách</a>
                    </li>
                    <li class="breadcrumb-item active">Thêm mới</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="card">
    <div class="card-header align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Thêm mới dữ liệu</h4>
    </div>
    <!-- end card header -->
    <div class="card-body">
        <form name="frmCreate" action="{{route('backend.shop_category.store')}}" method="POST"
            enctype="multipart/form-data">
            @csrf @method('post')
            <div class="row gy-2">
                <div class="col-6">
                    <div>
                        <label for="category_code" class="form-label">Mã</label>
                        <input type="text" name="category_code" class=" form-control" id="category_code"
                            placeholder="Nhập mã">
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <label for="category_name" class="form-label">Tên danh mục</label>
                        <input type="text" name="category_name" class="form-control" id="category_name"
                            placeholder="Nhập vào tên danh mục">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <label for="name" class="form-label">Hình ảnh</label>
                        <p class="text-muted">Chỉ Upload <code>file</code> với các định dạng
                            <code>jpg,png,jpeg,gif</code>
                        </p>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                </div>
                <div class="col-12">
                    <label for="description" class="form-label ">Diễn giải</label>
                    <textarea name="description" class="form-control ckeditor-classic" id="description"
                        placeholder="Nhập vào Diễn giải"></textarea>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success waves-effect waves-light">Lưu</button>
                <a href="{{route('backend.shop_category.index')}}" class="btn btn-info waves-effect waves-light">Quay
                    về</a>
            </div>

        </form>
    </div>
</div>
@endsection