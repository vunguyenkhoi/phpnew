@extends('backend.layouts.master')
@section('title')
    Danh sách cấu hình
@endsection
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Danh sách cấu hình</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="listjs-table" id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href="{{ route('backend.shop_setting.create') }}" class="btn btn-success add-btn"
                                            data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i>Thêm
                                            mới</a>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <input type="text" class="form-control search" placeholder="tìm kiếm...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th class="" data-sort="stt">STT</th>
                                            <th class="" data-sort="customer_name">ID</th>
                                            <th class="" data-sort="email">Nhóm</th>
                                            <th class="" data-sort="phone">Mã</th>
                                            <th class="" data-sort="date">Giá trị</th>
                                            <th class="" data-sort="status">Mô tả</th>
                                            <th class="" data-sort="action">Ngày tạo</th>
                                            <th class="" data-sort="action">Ngày cập nhật</th>
                                            <th class="" data-sort="action">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($ShopSetting as $item)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child"
                                                            value="option1">
                                                    </div>
                                                </th>
                                                <td>{{ ($ShopSetting->currentPage() - 1) * $ShopSetting->perPage() + $loop->iteration }}
                                                </td>
                                                <td class="id"><a href="javascript:void(0);"
                                                        class="fw-medium link-primary">{{ $item->id }}</a></td>
                                                <td class="customer_name">{{ $item->group }}</td>
                                                <td class="customer_name">{{ $item->key }}</td>

                                                <td class="email">{{ $item->value }}</td>
                                                <td class="phone">{{ $item->description }}</td>
                                                <td class="date">{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
                                                <td class="date">{{ $item->updated_at->diffForHumans() }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <a href="{{ route('backend.shop_setting.edit', ['id' => $item->id]) }}"
                                                                class="btn btn-sm btn-success edit-item-btn">Sửa</a>
                                                        </div>
                                                        {{-- <form
                                                    action="{{route('backend.shop_setting.destroy',['id'=> $item->id])}}"
                                                    method="POST">
                                                    @csrf @method('delete')
                                                    <div class="remove">
                                                        <button
                                                            class="btn btn-sm btn-danger remove-item-btn btn-delete">Xoá</button>
                                                    </div>
                                                </form> --}}
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                            data-id="{{ $item->id }}"
                                                            data-delete-url="{{ route('backend.shop_setting.destroy', ['id' => $item->id]) }}">Xoá</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <div>
                                {{ $ShopSetting->links() }}
                            </div>

                        </div>
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    </div>
    {{-- sjandjksnadks --}}
@endsection
@section('custom-js')
    <script>
        $('.btn-delete').on('click', function() {
            var id = $(this).attr("data-id");
            var deleteURL = $(this).attr("data-delete-url");
            var btnDelete = $(this);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {

                    var postData = {
                        '_token': '{{ csrf_token() }}',
                        '_method': 'DELETE',
                        'id': id
                    }
                    $.post(deleteURL, postData).done(function() {
                            btnDelete.parent().parent().remove();
                        })
                        .fail(function(e) {
                            alert('error')
                        })
                }
            });
        })
    </script>
@endsection
