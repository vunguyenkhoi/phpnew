@extends('backend.layouts.master')
@section('title')
Thêm mới cấu hình
@endsection

@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
            <h4 class="mb-sm-0">thêm mới cấu hình</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('backend.shop_setting.index') }}">Danh sách</a></li>
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
        <form id="frmCreate" name="frmCreate" action="{{ route('backend.shop_setting.store') }}" method="POST">
            @csrf @method('post')
            <div class="row gy-2">
                <div class="col-6">
                    <div>
                        <label for="group" class="form-label">Tên nhóm</label>
                        <input type="text" name="group" class=" form-control" id="group" value="{{ old('group') }}"
                            placeholder="Nhập tên nhóm">
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <label for="key" class="form-label">Tên khoá</label>
                        <input type="text" name="key" class="form-control" id="key" value="{{ old('key') }}"
                            placeholder="Nhập vào tên khoá">
                    </div>
                </div>
                <div class="col-12">
                    <div>
                        <label for="value" class="form-label">Tên giá trị</label>
                        <input type="text" name="value" class="form-control" id="value" value="{{ old('value') }}"
                            placeholder="Nhập vào giá trị">
                    </div>
                </div>
                <div class="col-12">
                    <label for="description" class="form-label ">Mô tả </label>
                    <textarea name="description" class="form-control " id="description"
                        placeholder="Nhập vào Diễn giải">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success waves-effect waves-light">Lưu</button>
                <a href="{{ route('backend.shop_setting.index') }}" class="btn btn-info waves-effect waves-light">Quay
                    về</a>
            </div>

        </form>
    </div>
</div>
@endsection

@section('custom-js')
<script>
    // $(function() {
        //     $('#frmCreate').validate({
        //         rules: {
        //             group: {
        //                 required: true,
        //                 minlength: 3,
        //                 maxlength: 50
        //             },
        //             key: {
        //                 required: true,
        //                 minlength: 3,
        //                 maxlength: 50
        //             },
        //             value: {
        //                 required: true,
        //                 minlength: 3,
        //                 maxlength: 50
        //             },
        //             description: {
        //                 required: true,
        //                 minlength: 3,
        //                 maxlength: 255
        //             },
        //         },
        //         messages: {
        //             group: {
        //                 required: 'Vui lòng nhập tên nhóm',
        //                 minlength: 'Tên nhóm phải từ 3 ký tự',
        //                 maxlength: 'Tên nhóm tối đa 50 ký tự'
        //             },
        //             key: {
        //                 required: 'Vui lòng nhập khoá',
        //                 minlength: 'Tên khoá phải từ 3 ký tự',
        //                 maxlength: 'Tên khoá tối đa 50 ký tự'
        //             },
        //             value: {
        //                 required: 'Vui lòng nhập giá trị',
        //                 minlength: 'Giá trị phải từ 3 ký tự',
        //                 maxlength: 'Giá trị tối đa 50 ký tự'
        //             },
        //             description: {
        //                 required: 'Vui lòng nhập mô tả',
        //                 minlength: 'Mô tả phải từ 3 ký tự',
        //                 maxlength: 'Mô tả tối đa 255 ký tự'
        //             },
        //         },
        //         errorElement: "em",
        //         errorPlacement: function(error, element) {
        //             // Thêm class `invalid-feedback` cho field đang có lỗi
        //             error.addClass("invalid-feedback");
        //             if (element.prop("type") === "checkbox") {
        //                 error.insertAfter(element.parent("label"));
        //             } else {
        //                 error.insertAfter(element);
        //             }
        //             // Thêm icon "Kiểm tra không Hợp lệ"
        //             if (!element.next("span")[0]) {
        //                 $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>")
        //                     .insertAfter(element);
        //             }
        //         },
        //         success: function(label, element) {
        //             // Thêm icon "Kiểm tra Hợp lệ"
        //             if (!$(element).next("span")[0]) {
        //                 $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>")
        //                     .insertAfter($(element));
        //             }
        //         },
        //         highlight: function(element, errorClass, validClass) {
        //             $(element).addClass("is-invalid").removeClass("is-valid");
        //         },
        //         unhighlight: function(element, errorClass, validClass) {
        //             $(element).addClass("is-valid").removeClass("is-invalid");
        //         }
        //     });
        // })
</script>
@endsection