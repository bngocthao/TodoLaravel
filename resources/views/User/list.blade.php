@extends('home')
@section('content')

<div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <!-- Zero config.table start -->
                <div class="card">
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="simpletable_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 112.5px;">Ảnh</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 185.5px;">Họ tên</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 185.5px;">Giới tính</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 84.5px;">Email</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 30px;">Địa chỉ</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 73px;">Vai trò</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1"  style="width: 50.5px;">Nhóm</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1"  style="width: 50.5px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $item)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1"></td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->gender }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->address ?? 'None' }}</td>
                                                    <td>{{ $item->position_id ?? 'None' }}</td>
                                                    <td>{{ $item->group_belong ?? 'None' }}</td>
                                                    <td>
                                                        <!-- Example single danger button -->
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{route('users.show', $item)}}">Chi tiết</a>
                                                                <a class="dropdown-item" href="{{ route('users.edit', $item) }}">Chỉnh sửa</a>
                                                                <form method="POST" action=" {{ route('users.destroy', $item) }}">
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
