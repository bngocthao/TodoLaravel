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
        /*img {*/
        /*    display: inline;*/
        /*    margin: 0 auto;*/
        /*    height: 100%;*/
        /*    width: auto;*/
        /*}*/
    </style>
    <div class="col-sm-12">
        <!-- Basic Form Inputs card start -->
        <div class="card">
            <div class="card-header">
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>
            </div>

            <div class="card-block">
                <div class="form-group" style="margin-left: 43%; margin-right: 50%">
                    <div class="image-cropper">
                        <img src="/avatar_upload/{{$users->avatar}}" style="display: inline;margin: 0 auto;height: 100%;width: auto;" class="rounded" />
                    </div>
                </div>
                <h6 style="margin-left: 44%">
                    <span style="font-size: 15px" class="badge bg-info">{{$users->position->positionName ?? 'None'}}</span>  {{$users->name}}</h6><br>
                <h4 class="sub-title">CẬP NHẬT THÔNG TIN TÀI KHOẢN</h4>
                <form action="{{route('users.update', $users)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input hidden name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mã tài khoản</label>
                        <div class="col-sm-10">
                            @if($users->userCode == '')
                                <input required name="userCode" type="text" class="form-control" value="{{$accountCode}}" style="color: red; font-weight: bold" disabled>
                            @else
                                <input required name="userCode" type="text" class="form-control" value="{{$users->userCode}}" style="color: red; font-weight: bold" disabled>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Vai trò</label>
                        <div class="col-sm-10">
                            <select name="role" class="form-control">
                                @if(Auth::user()->role == 0 )
                                    <option @if($users->role == 0) selected @endif value="0">Admin</option>
                                @endif
                                <option @if($users->role == 1) selected @endif value="1">Quản lý</option>
                                <option @if($users->role == 2) selected @endif value="2">Nhân viên</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thuộc phòng ban <span style="color: red; font-weight: bold">(*)</span></label>
                        <div class="col-sm-10">
                            <select name="department_id" class="form-control">
                                @if(\Illuminate\Support\Facades\Auth::user()->role == 0)
                                    @foreach($department as $item)
                                        <option @if($item->id == $get_id_dp) selected @endif value="{{$item->id}}">{{$item->departmentName ?? 'None'}}</option>
                                    @endforeach
                                @elseif(\Illuminate\Support\Facades\Auth::user()->role == 1)
                                    <option value="{{Auth::user()->department_id}}">{{Auth::user()->department->departmentName}}</option>
                                    <option value=" ">Xóa</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Chức vụ người dùng <span style="color: red; font-weight: bold">(*)</span></label>
                        <div class="col-sm-10">
                            <select name="position_id" class="form-control">
                                @foreach($positions as $item)
                                    <option @if($item->id == $get_id_ps) selected @endif value="{{$item->id}}">{{$item->positionName ?? 'None'}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-2 col-form-label">Trạng thái tài khoản</label>--}}
{{--                        <div class="col-sm-10">--}}
{{--                            <select name="status" class="form-control">--}}
{{--                                <option @if($users->status == 1) selected @endif value="1">Kích hoạt</option>--}}
{{--                                <option @if($users->status == 2) selected @endif value="2">Tạm ẩn</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right btn-round">Cập nhật tài khoản</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('Notification')
@endsection
