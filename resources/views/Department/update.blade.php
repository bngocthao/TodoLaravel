@extends('home')
@section('content')
    <div class="col-sm-12">
        <!-- Basic Form Inputs card start -->
        <div class="card">
            <div class="card-header">
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>

            </div>
            <div class="card-block">
                <h4 class="sub-title">THÊM PHÒNG BAN</h4>
                <form action="{{route('departments.update', $departments)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mã phòng ban</label>
                        <div class="col-sm-10">
                            <input required name="departmentCode" type="text" style="font-weight: bold; color: red" class="form-control" value="{{$departments->departmentCode}}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên phòng ban</label>
                        <div class="col-sm-10">
                            <input required name="departmentName" type="text" class="form-control" value="{{$departments->departmentName}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thông tin phòng ban</label>
                        <div class="col-sm-10">
                            <textarea class="ckeditor form-control" name="departmentDes" >{{$departments->departmentDes}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Số lượng thành viên</label>
                        <div class="col-sm-10">
                            <input required name="slotAccount" type="number" class="form-control" value="{{$departments->slotAccount}}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Quản lý phòng</label>
                        <div class="col-sm-10">
                            <select name="manager_id" class="form-control">
                                @foreach($users as $i)
                                    @if($i->role == '2')
                                        <option value="{{$i->id}}">{{$i->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right btn-round">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'ckeditor', {
            filebrowserUploadUrl: "{{route('departments.store', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    @include('Notification')
@endsection
