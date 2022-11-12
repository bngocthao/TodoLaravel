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
                <h4 class="sub-title">CHỈNH SỬA DỰ ÁN</h4>
                {{--Trả về lỗi ràng buộc ngày--}}
                @if (count($errors) > 0)
                    <ul class="alert alert-danger pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="/projects/{{$project->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên dự án</label>
                        <div class="col-sm-10">
                            <input required name="nameProject" type="text" class="form-control" value="{{ $project->nameProject }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thay ảnh</label>
                        <div class="col-sm-10">
                            <input class="form-group" type="file" name="image" value="{{ $project->image }}">
                            <img class="col-sm-10" src="/project_upload/{{ $project->image }}"  />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mô tả dự án</label>
                        <div class="col-sm-10">
                            <textarea class="ckeditor form-control" id="editor" name="description" value="{{ $project->description }}">
{{--                            <img src="{{ $project->description }}" />--}}
                            </textarea>
{{--                            <input class="ckeditor form-control" id="editor" name="description" value="{{ $project->description }}" >{{ $project->description }}--}}

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                        <div class="col-sm-10">
                            <input required name="start_at" id="date" type="date" class="form-control" value="{{ $project->start_at }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày kết thúc</label>
                        <div class="col-sm-10">
                            <input min="{{$project->start_at}}" id="date" name="end_at" type="date" class="form-control" value="{{ $project->end_at }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Trạng thái</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control">
                                <option @if($project->status == \App\Enums\ProjectStatus::On) selected @endif value="{{\App\Enums\ProjectStatus::On}}">On</option>
                                <option @if($project->status == \App\Enums\ProjectStatus::Off) selected @endif value="{{\App\Enums\ProjectStatus::Off}}">Off</option>
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Người quản lý</label>
                        <div class="col-sm-10">
                            <select name="user_id" class="form-control">
                                @foreach($users as $u)
                                    <option @if($u->id == $get_id_user) selected @endif value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <style>
                        .select2-selection__choice{
                            background: deepskyblue!important;
                        }
                    </style>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thành viên</label>
                        <!-- Hiển thị thành viên đã được thêm và những thành viên chưa được thêm -->
                        <div class="col-sm-10">
                            {{-- pUsers truy vấn tới bảng pj --}}
                            <select name="users->user_id" class="js-example-basic-multiple col-sm-12 select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">

                                @foreach($empU as $usr)
                                    @if($usr->project_id == $project->id)
                                            <option value="{{ $usr->id }}" selected>{{ $usr->name }}</option>
                                    @endif
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
                    <button type="submit" class="btn btn-success float-right btn-round">Cập nhật</button>
                        &nbsp;&nbsp;<a href="{{route('projects.index')}}" class="btn btn-warning float-right btn-round">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>

    </div>

@include('Notification')

@endsection
