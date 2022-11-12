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
                <form action="{{route('departments.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mã phòng ban</label>
                        <div class="col-sm-10">
                            <input required name="departmentCode" type="text" style="font-weight: bold; color: red" class="form-control" value="{{$codeRandom}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên phòng ban</label>
                        <div class="col-sm-10">
                            <input required name="departmentName" type="text" class="form-control" placeholder="Tên phòng ban">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thông tin phòng ban</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="editor" name="departmentDes"></textarea>
{{--                            <textarea class="ckeditor form-control" name="departmentDes"></textarea>--}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Số lượng thành viên</label>
                        <div class="col-sm-10">
                            <input required name="slotAccount" type="number" class="form-control" placeholder="Số lượng thành viên trong phòng ban">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Quản lý phòng</label>
                        <div class="col-sm-10">
                            <select name="manager_id" class="form-control">
{{--                                @foreach($project_list as $pj)--}}
{{--                                    <option value="{{$pj->id}}">{{$pj->nameProject}}</option>--}}
{{--                                @endforeach--}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right btn-round">Thêm phòng ban</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--activate img upload option--}}
    <script type="text/javascript">
        CKEDITOR.replace('departmentDes', {
            filebrowserUploadUrl: "{{route('departments.store', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>

    @include('Notification')
@endsection
