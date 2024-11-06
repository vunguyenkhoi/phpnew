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
                    <li class="breadcrumb-item"><a href="{{ route('backend.shop_category.index') }}">Danh sách</a>
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
    {{-- Hiển thị lỗi --}}

    {{-- kết thúc hiển thị lỗi --}}
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        <form id="frmCreate" name="frmCreate" action="{{ route('backend.shop_category.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf @method('post')
            <div class="row gy-2">
                <div class="col-6">
                    <div>
                        <label for="category_code" class="form-label">Mã</label>
                        <input type="text" name="category_code" class=" form-control" id="category_code"
                            value="{{ old('category_code') }}" placeholder="Nhập mã">
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <label for="category_name" class="form-label">Tên danh mục</label>
                        <input type="text" name="category_name" class="form-control" id="category_name"
                            value="{{ old('category_name') }}" placeholder="Nhập vào tên danh mục">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <label for="image" class="form-label">Hình ảnh</label>
                        <p class="text-muted">Chỉ Upload <code>file</code> với các định dạng
                            <code>jpg,png,jpeg,gif,avif</code>
                        </p>
                        <input value="{{ old('image') }}" class="form-control" type="file" id="image"
                            accept=".jpg,.jpeg,.png,.avif" name="image">
                    </div>
                </div>
                <div class="col-12">
                    <label for="description" class="form-label ">Diễn giải</label>
                    <textarea name="description" class="form-control" id="description"
                        placeholder="Nhập vào Diễn giải">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success waves-effect waves-light">Lưu</button>
                <a href="{{ route('backend.shop_category.index') }}" class="btn btn-info waves-effect waves-light">Quay
                    về</a>
            </div>
        </form>
    </div>
</div>
@endsection
@section('custom-js')
<script>
    $(function() {
            $('#frmCreate').validate({
                rules: {
                    category_code: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    category_name: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    image: {
                        required: true,
                        extension: "jpg,jpeg,png,gif,avif"
                    },
                    description: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    },
                },
                messages: {
                    category_code: {
                        required: 'Bạn chưa nhập mã danh mục',
                        minlength: 'Mã danh mục phải từ 3 ký tự',
                        maxlength: 'Mã danh mục tối đa 50 ký tự'
                    },
                    category_name: {
                        required: 'Bạn chưa nhập tên danh mục',
                        minlength: 'Tên danh mục phải từ 3 ký tự',
                        maxlength: 'Tên danh mục tối đa 50 ký tự'
                    },
                    image: {
                        required: 'Bạn cần upload hình ảnh',
                        extension: 'Chỉ upload hình ảnh với các định dạng jpg,jpeg,png,gif,avif'
                    },
                    description: {
                        required: 'Vui lòng nhập mô tả',
                        minlength: 'Tên nhóm phải từ 3 ký tự',
                        maxlength: 'Mô tả tối đa 255 ký tự'
                    },
                },
                errorElement: "em",
                errorPlacement: function(error, element) {
                    // Thêm class `invalid-feedback` cho field đang có lỗi
                    error.addClass("invalid-feedback");
                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }
                    // Thêm icon "Kiểm tra không Hợp lệ"
                    if (!element.next("span")[0]) {
                        $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>")
                            .insertAfter(element);
                    }
                },
                success: function(label, element) {
                    // Thêm icon "Kiểm tra Hợp lệ"
                    if (!$(element).next("span")[0]) {
                        $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>")
                            .insertAfter($(element));
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                }
            });
        })
</script>
@endsection