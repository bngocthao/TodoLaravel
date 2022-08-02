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
                            <input required name="description" type="text" class="form-control" value="{{ $project->description }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                        <div class="col-sm-10">
                            <input required name="start_at" type="date" class="form-control" value="{{ $project->start_at }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày kết thúc</label>
                        <div class="col-sm-10">
                            <input required name="end_at" type="date" class="form-control" value="{{ $project->end_at }}">
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
