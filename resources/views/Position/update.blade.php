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
                <h4 class="sub-title">CHỈNH SỬA VỤ MỚI</h4>
                <form action="{{route('positions.update', $positions)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mã chức vụ</label>
                        <div class="col-sm-10">
                            <input required name="postionCode" type="text" class="form-control" style="font-weight: bold; color: red" value="{{$positions->postionCode}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên chức vụ</label>
                        <div class="col-sm-10">
                            <input required name="positionName" type="text" class="form-control" value="{{$positions->positionName}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mô tả chức vụ</label>
                        <div class="col-sm-10">
                            <input name="positionDes" type="text" class="form-control" value="{{$positions->positionDes}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Trạng thái chức vụ</label>
                        <div class="col-sm-10">
                            <select name="positionStatus" class="form-control">
                                <option @if($positions->positionStatus == \App\Enums\TaskStatus::On) selected @endif value="{{\App\Enums\TaskStatus::On}}">On</option>
                                <option @if($positions->positionStatus == \App\Enums\TaskStatus::Off) selected @endif value="{{\App\Enums\TaskStatus::Off}}">Off</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right btn-round">Cập nhật chức vụ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('Notification')
@endsection
