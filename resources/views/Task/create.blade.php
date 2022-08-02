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
                <h4 class="sub-title">THÊM CÔNG VIỆC MỚI</h4>
                <form action="{{route('tasks.store')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên công việc</label>
                        <div class="col-sm-10">
                            <input required name="taskName" type="text" class="form-control" placeholder="Điền tên công việc">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mô tả công việc</label>
                        <div class="col-sm-10">
                            <input required name="description" type="text" class="form-control" placeholder="Mô tả công việc">
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
                        <label class="col-sm-2 col-form-label">Trạng thái công việc</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control">
                                <option value="{{\App\Enums\TaskStatus::On}}">On</option>
                                <option value="{{\App\Enums\TaskStatus::Off}}">Off</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Độ ưu tiên</label>
                        <div class="col-sm-10">
                            <select name="priority" class="form-control">
                                <option value="{{\App\Enums\Priority::Low}}">Thấp</option>
                                <option value="{{\App\Enums\Priority::Medium}}">Trung bình</option>
                                <option value="{{\App\Enums\Priority::High}}">Cao</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thuộc dự án</label>
                        <div class="col-sm-10">
                            <select name="project_id" class="form-control">
                                @foreach($project_list as $pj)
                                    <option value="{{$pj->id}}">{{$pj->nameProject}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right btn-round">Thêm công việc</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('Notification')
@endsection
