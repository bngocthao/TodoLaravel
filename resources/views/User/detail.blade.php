@extends('home')
@section('content')
    <style>
        .image-cropper {
            width: 200px;
            height: 200px;
            position: relative;
            overflow: hidden;
            border-radius: 50%;

        }
        img {
            display: inline;
            margin: 0 auto;
            height: 100%;
            width: auto;
        }
    </style>
    <div class="card-block">
        <div class="form-group" style="margin-left: 43%; margin-right: 50%">
            <div class="image-cropper">
                <img src="/avatar_upload/{{$users->avatar ?? "Trống"}}" class="rounded" />
            </div>
        </div>
        <div class="view-info">
            <div class="row">
                <div class="col-lg-12">
                    <div class="general-info">
                        <div class="row">
                            <div class="col-lg-12 col-xl-6">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <tbody>
                                        <tr>
                                            <th scope="row">Họ Tên</th>
                                            <td>{{$users->name}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Giới tính</th>
                                            @if($users->gender == 0)
                                                <td>Nam</td>
                                            @elseif($users->gender == 1)
                                                <td>Nữ</td>
                                            @elseif($users->gender == 2)
                                                <td>Khác</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">Ngày Gia Nhập</th>
                                            <td>{{$users->dateJoin}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Trạng Thái</th>
                                            @if($users->status == '1')
                                                <td>Active</td>
                                            @else
                                                <td>Deactive</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">Địa Chỉ</th>
                                            <td>{{ $users->address }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end of table col-lg-6 -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td><span class="__cf_email__" data-cfemail="4206272f2d02273a232f322e276c212d2f">{{ $users->email }}</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Số Điện Thoại</th>
                                            <td>{{ $users->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Vai Trò</th>
                                            @if($users->role == 0)
                                                <td>Admin</td>
                                            @elseif($users->role == 1)
                                                <td>Quản lý</td>
                                            @else
                                                <td>Thành viên</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">Phòng Ban</th>
                                            <td>{{ $users->department->departmentName ?? 'Trống'}}</td>
                                        </tr>
                                        <tr>
                                                <th scope="row">Chức Vụ</th>
                                            <td>{{ $users->position->positionName ?? 'Trống'}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{route('users.edit', $users->id)}}" type="submit" class="btn btn-info float-right btn-round">Chỉnh sửa thông tin</a>

                            </div>
                            <!-- end of table col-lg-6 -->
                        </div>
                        <!-- end of row -->
                    </div>
                    <!-- end of general info -->
                </div>
                <!-- end of col-lg-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of view-info -->

@include('Notification')
@endsection
