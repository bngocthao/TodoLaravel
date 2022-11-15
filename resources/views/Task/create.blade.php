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
{{--                Trả về lỗi ràng buộc ngày--}}
                @if (count($errors) > 0)
                    <ul class="alert alert-danger pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <h4 class="sub-title">THÊM CÔNG VIỆC MỚI</h4>
                <form action="{{route('tasks.store')}}" method="POST" enctype="multipart/form-data">
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
                            <textarea class="form-control" id="editor" name="description"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                        <div class="col-sm-10">
                            <input required name="start_at" min="{{$today}}" type="date" id="#dropper-animation" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày kết thúc</label>
                        <div class="col-sm-10">
                            <input required name="end_at" type="date" id="#dropper-animation" class="form-control">
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
                            <select name="project->project_id" class="form-control">
                                @foreach($project_list as $pj)
                                    <option value="{{$pj->id}}">{{$pj->nameProject}}</option>
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
                        <label class="col-sm-2 col-form-label">Thành viên tham gia</label>
                        <div class="col-sm-10">
                            <select name="users->user_id" class="js-example-basic-multiple col-sm-12 select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
                                @foreach($users as $usr)
                                    @if($usr->role == 2)
                                        <option value="{{ $usr->id }}">{{ $usr->name }}</option>
                                    @endif
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

    {{--Ck editor--}}
    <script type="text/javascript" src="\template\files\ckeditor5-build-classic\ckeditor.js";></script>
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>--}}

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
                //image upload
                // ckfinder: {
                //     uploadUrl: 'https://ckeditor.com/apps/ckfinder/3.5.0/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                // }
            } )
            .then( editor => {
                window.editor = editor;
            } )
    </script>
    @include('Notification')
@endsection
