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
                        <img src="/avatar_upload/{{$accounts->avatar}}" class="rounded" />
                    </div>
                </div>
                <h6 style="margin-left: 44%"><span style="font-size: 15px" class="badge bg-info">{{$accounts->position->positionName}}</span>  {{$accounts->fullName}}</h6><br>
                <h4 class="sub-title">CẬP NHẬT THÔNG TIN TÀI KHOẢN</h4>
                <form action="{{route('accounts.update', $accounts)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input hidden name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mã tài khoản</label>
                        <div class="col-sm-10">
                            <input required name="accountCode" type="text" class="form-control" value="{{$accounts->accountCode}}" style="color: red; font-weight: bold">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Họ và tên</label>
                        <div class="col-sm-10">
                            <input required name="fullName" type="text" class="form-control" value="{{$accounts->fullName}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Giới tính </label>
                        <div class="col-sm-10">
                            <select name="gender" class="form-control">
                                <option @if($accounts -> gender == 1) selected @endif value="1">Nam</option>
                                <option @if($accounts -> gender == 2) selected @endif value="2">Nữ</option>
                                <option @if($accounts -> gender == 3) selected @endif value="3">Khác</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input required name="address" type="text" class="form-control"value="{{$accounts->address}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email tài khoản</label>
                        <div class="col-sm-10">
                            <input required name="email" type="text" class="form-control" value="{{$accounts->email}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mật khẩu</label>
                        <div class="col-sm-10">
                            <input required name="password" type="text" class="form-control" min="5" value="{{$accounts->password}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Số điện thoại</label>
                        <div class="col-sm-10">
                            <input required name="phone" type="number" class="form-control" value="{{$accounts->phone}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày tham gia</label>
                        <div class="col-sm-10">
                            <input required name="dateJoin" type="date" class="form-control" value="{{$accounts->dateJoin}}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thuộc phòng ban <span style="color: red; font-weight: bold">(*)</span></label>
                        <div class="col-sm-10">
                            <select name="department_id" class="form-control">
                                @foreach($department as $item)
                                    <option @if($item->id == $get_id_dp) selected @endif value="{{$item->id}}">{{$item->departmentName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Chức vụ người dùng <span style="color: red; font-weight: bold">(*)</span></label>
                        <div class="col-sm-10">
                            <select name="position_id" class="form-control">
                                @foreach($positions as $item)
                                    <option @if($item->id == $get_id_ps) selected @endif value="{{$item->id}}">{{$item->positionName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Trạng thái tài khoản</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control">
                                <option @if($accounts->status == 1) selected @endif value="1">Kích hoạt</option>
                                <option @if($accounts->status == 2) selected @endif value="2">Tạm ẩm</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ảnh đại diện (Không bắt buộc)</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="avatar_upload" accept="image/*">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right btn-round">Cập nhật tài khoản</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('Notification')
@endsection
