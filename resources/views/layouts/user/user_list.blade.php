@extends('layouts.admin')

@section('content')

    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách thành viên</h5>

                <div class="form-search form-inline">
                    <form action="#">
                        <input type="text" class="form-control form-search" name="keyword"
                            placeholder="Nhập tên user cần tìm" value="{{ request()->input('keyword') }}">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="" class="text-primary">Trạng thái 1<span class="text-muted">(10)</span></a>
                    <a href="" class="text-primary">Trạng thái 2<span class="text-muted">(5)</span></a>
                    <a href="" class="text-primary">Trạng thái 3<span class="text-muted">(20)</span></a>
                </div>
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" id="">
                        <option>Chọn</option>
                        <option>Tác vụ 1</option>
                        <option>Tác vụ 2</option>
                    </select>
                    <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                </div>
                @if (session('success'))
                    <div>{{ session('success') }}</div>
                @endif
                @if ($users->count() >= 1)
                    <table class="table table-striped  table-checkall">
                        <thead>
                            <tr class="text-center">
                                <th>
                                    <input type="checkbox" name="checkall">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Quyền</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $index = 1;
                            @endphp

                            @foreach ($users as $user)
                                <tr class="text-center">
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td scope="row">{{ $index++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @php
                                            echo $user->role_id == 1 ? 'Admintrator' : 'User';
                                        @endphp
                                    </td>
                                    <td>
                                        @php
                                            if ($user->email_verified_at != null) {
                                                echo $user->email_verified_at;
                                            } else {
                                                echo "<p  class='btn btn-warning text-dark'>Chưa xác nhận email</p>";
                                            }
                                        @endphp
                                    </td>
                                    <td>
                                        @if (Auth::id() != $user->id)
                                            <a href="#" class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                    class="fa fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                @else
                    <div class="p-3 mb-2 bg-warning text-dark">Không tìm thấy dữ liệu!</div>
                @endif
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
