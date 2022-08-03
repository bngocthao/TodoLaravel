@extends('home')
@section('content')

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Zero config.table start -->
            <div class="card">
            <div class="card-header">
                <h2>Danh sách tài khoản <a href="{{route('accounts.create')}}" class="btn btn-danger">Thêm mới tài khoản</a></h2>
            </div>
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="simpletable_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 112.5px;">#</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 112.5px;">Mã tài khoản</th>
                                            <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 185.5px;">Họ và tện</th>

                                            <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 30px;">Phòng ban</th>
                                            <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 73px;">Chức vụ</th>
                                            <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1"  style="width: 50.5px;">Trạng thái tài khoản</th>
                                            <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1"  style="width: 50.5px;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($accounts as $item)
                                            <tr role="row" class="odd">
                                                <td>
                                                    <span class="media-left media-middle" href="#">
                                                        <img style="max-width: 100px" class="media-object m-r-10 m-l-10" src="/avatar_upload/{{$item->avatar}}" alt="Chưa có ảnh đại diện">
                                                    </span>
                                                </td>
                                                <td>{{$item->accountCode}}</td>
                                                <td>{{$item->fullName}}</td>
                                                <td>{{$item->department->departmentName}}</td>
                                                <td>{{$item->position->positionName}}</td>
                                                @if($item->status == 1)
                                                    <td><span class="btn btn-success">Đã kích hoạt</span></td>
                                                @else
                                                    <td><span class="btn btn-danger">Đã khóa</span></td>
                                                @endif
                                                <td>
                                                    <!-- Example single danger button -->
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{route('projects.show', $item)}}">Chi tiết</a>
                                                            <a class="dropdown-item" href="{{ route('accounts.edit', $item) }}">Chỉnh sửa</a>
                                                            <form method="POST" action=" {{ route('accounts.destroy', $item) }}">
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
