@extends('home')
@section('content')
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
                <h4 class="sub-title">THÊM MỚI DỰ ÁN</h4>
                <form action="{{route('projects.store')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên dự án</label>
                        <div class="col-sm-10">
                            <input required name="nameProject" type="text" class="form-control" placeholder="Điền tên dự án">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mô tả dự án</label>
                        <div class="col-sm-10">
                            <input required name="description" type="text" class="form-control" placeholder="Mô tả dự án">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                        <div class="col-sm-10">
                            <input required name="start_at" type="date" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày kết thúc</label>
                        <div class="col-sm-10">
                            <input required name="end_at" type="date" class="form-control">
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

                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right btn-round">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('Notification')
@endsection
