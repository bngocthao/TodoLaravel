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
                <h2 class="sub-title">CHỈNH SỬA CÔNG VIỆC</h2>
                {{--Trả về lỗi ràng buộc ngày--}}
                @if (count($errors) > 0)
                    <ul class="alert alert-danger pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{route('tasks.update', $tasks)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên công việc</label>
                        <div class="col-sm-10">
                            <input required name="taskName" type="text" class="form-control" value="{{$tasks->taskName}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mô tả công việc</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="editor" type="text" class="form-control">
                                {{$tasks->description}}
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                        <div class="col-sm-10">
                            <input name="start_at" type="date" class="form-control" value="{{$tasks->start_at}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày kết thúc</label>
                        <div class="col-sm-10">
                            <input min="{{$tasks->start_at}}" name="end_at" type="date" class="form-control" value="{{$tasks->end_at}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Trạng thái công việc</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control">
                                <option @if($tasks->status == \App\Enums\TaskStatus::On) selected @endif value="{{\App\Enums\TaskStatus::On}}">Đang tiến hành</option>
                                <option @if($tasks->status == \App\Enums\TaskStatus::Off) selected @endif value="{{\App\Enums\TaskStatus::Off}}">Dừng</option>
                                <option @if($tasks->status == \App\Enums\TaskStatus::Complete) selected @endif value="{{\App\Enums\TaskStatus::Off}}">Hoàn tất</option>
                                <option @if($tasks->status == \App\Enums\TaskStatus::OnSchedule) selected @endif value="{{\App\Enums\TaskStatus::Off}}">Đúng hạn</option>
                                <option @if($tasks->status == \App\Enums\TaskStatus::BehindSchedule) selected @endif value="{{\App\Enums\TaskStatus::Off}}">Trễ hạn</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Độ ưu tiên</label>
                        <div class="col-sm-10">
                            <select name="priority" class="form-control">
                                <option @if($tasks->priority == \App\Enums\Priority::Low) selected @endif value="{{\App\Enums\Priority::Low}}">Thấp</option>
                                <option @if($tasks->priority == \App\Enums\Priority::Medium) selected @endif value="{{\App\Enums\Priority::Medium}}">Trung bình</option>
                                <option @if($tasks->priority == \App\Enums\Priority::High) selected @endif value="{{\App\Enums\Priority::High}}">Cao</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thuộc dự án</label>
                        <div class="col-sm-10">
                            <select name="project_id" class="form-control">
                                @foreach($project_list as $pj)
                                    <option @if($pj->id == $get_id_project) selected @endif value="{{$pj->id}}">{{$pj->nameProject}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right btn-round">Cập nhật công việc</button>
                        &nbsp;&nbsp;<a href="{{route('tasks.index')}}" class="btn btn-warning float-right btn-round">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- CK editor -->
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
    @include('Notification')
@endsection
