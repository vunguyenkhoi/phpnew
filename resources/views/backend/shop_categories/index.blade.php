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
                    <h4 class="card-title mb-0">Danh sách Danh mục</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="listjs-table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{route('backend.shop_category.create')}}" class="btn btn-success add-btn"
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
                                        <th class="" data-sort="email">Mã</th>
                                        <th class="" data-sort="phone">Tên</th>
                                        <th class="" data-sort="status">Hình ảnh</th>
                                        <th class="" data-sort="status">Mô tả</th>
                                        <th class="" data-sort="action">Ngày tạo</th>
                                        <th class="" data-sort="action">Ngày cập nhật</th>
                                        <th class="" data-sort="action">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach ($ShopCategory as $item)
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="chk_child"
                                                    value="option1">
                                            </div>
                                        </th>
                                        <td>{{ ($ShopCategory->currentPage() - 1) * $ShopCategory->perPage() +
                                            $loop->iteration }}
                                        </td>
                                        <td class="id"><a href="javascript:void(0);"
                                                class="fw-medium link-primary">{{$item->id}}</a></td>
                                        <td class="customer_name">{{$item->category_code}}</td>
                                        <td class="customer_name">{{$item->category_name}}</td>
                                        <td class="phone rounded mx-auto ">
                                            <img class="rounded-circle img-fluid avatar-xs" data-bs-trigger="hover"
                                                data-bs-toggle="tooltip"
                                                src="{{ asset('uploads/shop_categories/' . $item->image) }}"
                                                alt="hình ảnh hiện tại" width="45px" height="45px">
                                        </td>
                                        <td class="email">{{$item->description}}</td>

                                        <td class="date">{{$item->created_at->format('d/m/Y H:i:s')}}</td>
                                        <td class="date">{{$item->updated_at->diffForHumans()}}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <a href="{{route('backend.shop_category.edit',['id'=> $item->id])}}"
                                                        class="btn btn-sm btn-success edit-item-btn">Sửa</a>
                                                </div>
                                                <form
                                                    action="{{route('backend.shop_category.destroy',['id'=> $item->id])}}"
                                                    method="POST">
                                                    @csrf @method('delete')
                                                    <div class="remove">
                                                        <button
                                                            class="btn btn-sm btn-danger remove-item-btn btn-delete">Xoá</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div>
                            {{ $ShopCategory->links() }}
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