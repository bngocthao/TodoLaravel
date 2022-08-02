@extends('home')
@section('content')
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Zero config.table start -->
            <div class="card">
                <div class="card-header">
                    <h3 style="font-weight: bold">QUẢN LÝ CHỨC VỤ <a href="{{route('positions.create')}}" style="font-weight: bold; color: white" class="btn btn-success">Thêm mới chức vụ</a></h3>
                    <span>Hiển thị các chức vụ hiện tại trong hệ thống</span>
                </div>
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="simpletable_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 112.5px;">Mã chức vụ</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 112.5px;">Tên chức vụ</th>
                                            <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 185.5px;">Mô tả</th>
                                            <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1"  style="width: 50.5px;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($positions as $item)
                                            <tr role="row" class="odd">
                                                <td><span style="font-size: 15px" class="badge bg-info">{{$item -> postionCode}}</span></td>
                                                <td>{{$item -> positionName}}</td>
                                                <td>{{$item -> positionDes}}</td>
                                                <td>
                                                    <!-- Example single danger button -->
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Chi tiết</a>
                                                            <a class="dropdown-item" href="{{ route('positions.edit', $item) }}">Chỉnh sửa</a>
                                                            <form method="POST" action=" {{ route('positions.destroy', $item) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn dropdown-item" type="submit" onclick="return confirm('Xác nhận xóa ?')">Xóa</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Notification')
@endsection
