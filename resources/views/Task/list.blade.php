@extends('home')
@section('content')

    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <!-- Zero config.table start -->
                <div class="card">
                    <div class="card-header">
                        <h3 style="font-weight: bold">DANH SÁCH CÔNG VIỆC</h3>
                        <span>Hiển thị chi tiết các công việc trong những dự án khác nhau</span>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="simpletable_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 112.5px;">Dự án</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 112.5px;">Tên công việc</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 185.5px;">Mô tả công việc</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 84.5px;">Ngày bắt đầu</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 30px;">Ngày kết thúc</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" style="width: 73px;">Trạng thái</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1"  style="width: 50.5px;">Độ ưu tiên</th>
                                                <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1"  style="width: 50.5px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($task_list as $item)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">
                                                        <span class="badge bg-primary">
                                                            {{ $item->project->nameProject ?? 'None' }}
                                                        </span>
                                                    </td>
                                                    <td class="sorting_1">{{ $item->taskName }}</td>
                                                    <td>{{ $item -> description }}</td>
                                                    <td>{{ $item -> start_at }}</td>
                                                    <td>{{ $item -> end_at }}</td>
                                                    @if($item->status == \App\Enums\TaskStatus::On)
                                                        <td>
                                                            <span class="badge bg-success">Đang mở</span>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <span class="badge bg-danger">Đang đóng</span>
                                                        </td>
                                                    @endif
                                                    @if($item->priority == \App\Enums\Priority::Low)
                                                        <td>
                                                            <span class="badge bg-info">Thấp</span>
                                                        </td>
                                                    @elseif($item->priority == \App\Enums\Priority::Medium)
                                                        <td>
                                                            <span class="badge bg-warning">Trung bình</span>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <span class="badge bg-danger">Cao</span>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <!-- Example single danger button -->
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">Chi tiết</a>
                                                                <a class="dropdown-item" href="{{ route('tasks.edit', $item) }}">Chỉnh sửa</a>
                                                                <form method="POST" action=" {{ route('tasks.destroy', $item) }}">
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
