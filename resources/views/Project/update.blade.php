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
                <form action="/projects/{{$project->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên dự án</label>
                        <div class="col-sm-10">
                            <input required name="nameProject" type="text" class="form-control" value="{{ $project->nameProject }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mô tả dự án</label>
                        <div class="col-sm-10">
                            <textarea class="ckeditor form-control" name="description"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                        <div class="col-sm-10">
                            <input min="{{$today}}" required name="start_at" type="date" class="form-control" value="{{ $project->start_at }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày kết thúc</label>
                        <div class="col-sm-10">
                            <input min="{{$today}}" name="end_at" type="date" class="form-control" value="{{ $project->end_at }}">
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
                            <select name="users->user_id" class="js-example-basic-multiple col-sm-12 select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
                                @foreach($users as $usr)
                                    @if($usr->role == 2)
                                        @foreach($pUsers as $ePUser)
                                            @if($usr->id == $ePUser->user_id && $ePUser->project_id == $project->id)
                                                <option value="{{ $usr->id }}" selected>{{ $usr->name }}</option>
                                            @else
                                                <option value="{{ $usr->id }}">{{ $usr->name }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div  class="d-flex">
                        <button type="submit" class="btn btn-success float-right btn-round">Cập nhật</button>
                        &nbsp;&nbsp;<a href="{{route('projects.index')}}" class="btn btn-warning float-right btn-round">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@include('Notification')
@endsection
