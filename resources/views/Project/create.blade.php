@extends('home')
@section('content')
    <style>
        form .error {
            color: #ff0000;
        }
    </style>

    <div class="col-sm-12">
        <!-- Basic Form Inputs card start -->
        <div class="card">
            <div class="card-header">
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>
                <a href="{{route('tasks.create')}}" class="btn btn-primary loat-right btn-round"> Thêm mới công việc</a>
            </div>

            <div class="card-block">
                {{--Trả về lỗi ràng buộc ngày--}}
                @if (count($errors) > 0)
                    <ul class="alert alert-danger pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <h4 class="sub-title">THÊM MỚI DỰ ÁN</h4>
                <form action="{{route('projects.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên dự án</label>
                        <div class="col-sm-10">
                            <input required name="nameProject" type="text" class="form-control" id="search" placeholder="Điền tên dự án">
                            <span id="error_name"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ảnh (nếu có)</label>
                        <div class="col-sm-10">
                            <input class="form-group" type="file" name="image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mô tả dự án</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="editor" name="description"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                        <div class="col-sm-10">
                            <input min="{{$today}}" name="start_at" type="date" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày kết thúc</label>
                        <div class="col-sm-10">
                            <input min="{{$today}}" name="end_at" type="date" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Trạng thái</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control">
                                <option value="{{\App\Enums\ProjectStatus::On}}">On</option>
                                <option value="{{\App\Enums\ProjectStatus::Off}}">Off</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Người quản lý</label>
                        <div class="col-sm-10">
                            <select name="user_id" class="form-control">
                                @foreach($users as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <style>
                        .select2-selection__choice{
                            background: deepskyblue!important;
                        }
                    </style>
                    <!-- Hiển thị thành viên có vai trò là nhân viên -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thành viên</label>
                        <div class="col-sm-10">
                            <select name="users->user_id" class="js-example-basic-multiple col-sm-12 select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
                                @foreach($empU as $usr)
                                    @if($usr->project_id == '')
                                        @if($usr->role == 2)
                                            <option value="{{ $usr->id }}">{{ $usr->name }}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="btn_confirm" class="btn btn-info float-right btn-round">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('Notification')
    <script>
        $(document).ready(function (){
           $('#search').blur(function (){
             var err_name = '';
             var nameProject = $('#search').val();
             var _token = $('input[name="_token"]').val();

             if(nameProject == '')
             {
                $('#error').addClass('has-error');
                $('#error_name').html('<lable class="text-danger">Tên dự án đang trống</lable>')
             }else{
                $.ajax({
                   url: "{{route('project.checkName')}}",
                   method: "POST",
                   data: {nameProject: nameProject, _token: _token},
                   success:function (result)
                   {
                       if(result == 'unique')
                       {
                           $('#error_name').html('<lable class="text-success">Tên hợp lệ</lable>');
                           $('#search').removeClass('has-error');
                           $('#btn_confirm').attr('disabled', false)
                       }else{
                           $('#error_name').html('<lable class="text-danger">Đã tồn tại</lable>');
                           $('#search').addClass('has-error');
                           $('#btn_confirm').attr('disabled', 'disabled')
                       }
                   }
                });
             }

           });
        });

    </script>
    <script type="text/javascript" src="\template\files\ckeditor5-build-classic\ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
                //image upload
                // ckfinder: {
                //     uploadUrl: 'https://ckeditor.com/apps/ckfinder/3.5.0/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                // }
            } )
            .then( editor => {
                window.editor = editor;
            } )
        // .catch( err => {
        //     console.error( err.stack );
        // } );
    </script>
@endsection
