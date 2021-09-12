@extends('layouts.admin')

@section('content')

    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold text-primary">
                Cập nhập thông tin
            </div>

            <div class="card-body">
                <form method="POST" action="{{ url('/dashboard/user/update', $user->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
                        @error('name')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}"
                            disabled>

                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input class="form-control" type="password" name="password" id="password">
                        @error('password')
                            <small class="text-danger">
                                {{ $message }}

                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">
                            Xác nhận mật khẩu </label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <label for="">Nhóm quyền</label>
                        <select class="form-control" id="">
                            <option>Chọn quyền</option>
                            <option>Danh mục 1</option>
                            <option>Danh mục 2</option>

                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="btn_edit" value="add-edit">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>

@endsection
