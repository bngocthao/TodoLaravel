@extends('home')
@section('content')
    <div class="page-body">
        <div class="row">
            <!-- Task-detail-right start -->
            <div class="col-xl-4 col-lg-12 push-xl-8 task-detail-right">
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        Hiển thị thời hạn công việc--}}
{{--                        <h5 class="card-header-text"><i class="icofont icofont-clock-time m-r-10"></i>Thời gian còn lại</h5>--}}
{{--                    </div>--}}
{{--                    <div class="card-block">--}}
{{--                        <div class="counter">--}}
{{--                            <div class="yourCountdownContainer">{{ $timeRemain }} ngày</div>--}}
{{--                            <!-- end of yourCountdown -->--}}
{{--                        </div>--}}
{{--                        <!-- end of counter -->--}}
{{--                    </div>--}}
{{--                    <div class="card-footer">--}}
{{--                        <div class="f-left">--}}
{{--                            <i class="icofont icofont-rewind"></i> <i class="icofont icofont-pause"></i> <i class="icofont icofont-play-alt-1"></i>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text"><i class="icofont icofont-ui-note m-r-10"></i> Chi tiết công việc</h5>
                    </div>
                    <div class="card-block task-details">
                        <table class="table table-border table-xs">
                            <tbody>
                            <tr>
                                <td><i class="icofont icofont-contrast"></i> Thuộc dự án:</td>
                                <td class="text-right"><span class="f-right">{{$task->project_info->nameProject}}</span></td>
                            </tr>
                            <tr>
                                <td><i class="icofont icofont-meeting-add"></i> Ngày bắt đầu:</td>
                                <td class="text-right">{{ date('d-m-y', $task->started_at) }}</td>

                            </tr>
                            <tr>
                                <td><i class="icofont icofont-id-card"></i> Ngày kết thúc:</td>
                                <td class="text-right">{{ date('d-m-y', strtotime($task->end_at)) }}</td>
                            </tr>
                            <tr>
                                <td><i class="icofont icofont-spinner-alt-5"></i> Mức độ ưu tiên:</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                            @if($task->priority == '1')
                                            <i class="icofont icofont-upload m-r-5"></i>Thấp
                                            @elseif($task->priority == '2')
                                                <i class="icofont icofont-upload m-r-5"></i>Trung bình
                                            @else
                                                <i class="icofont icofont-upload m-r-5"></i>Cao
                                            @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="icofont icofont-washing-machine"></i> Trạng thái:</td>
                                @if($task->status == '1')
                                    <td class="text-right">Đang tiến hành</td>
                                @elseif($task->status == '2')
                                    <td class="text-right">Dừng</td>
                                @elseif($task->status == '3')
                                    <td class="text-right">Hoàn tất</td>
                                @elseif($task->status == '4')
                                    <td class="text-right">Đúng hạn</td>
                                @else()
                                    <td class="text-right">Trễ hạn</td>
                                @endif
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div>
                                                            <span>
                                  <a href="#!" class="text-muted m-r-10 f-16"><i class="icofont icofont-random"></i> </a>
                                </span>
                            <span class="m-r-10">
                                   <a href="#!" class="text-muted f-16"><i class="icofont icofont-options"></i></a>
                                </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Task-detail-right start -->
            <!-- Task-detail-left start -->
            <div class="col-xl-8 col-lg-12 pull-xl-4">
                <div class="card">
{{--                    <div class="card-header">--}}
{{--                        <h3><i class="icofont icofont-tasks-alt m-r-5"></i>{{ $task->taskName }}</h3>--}}
{{--                        <button class="btn btn-sm btn-primary f-right"><i class="icofont icofont-ui-alarm"></i>Hoàn thành</button>--}}
{{--                    </div>--}}
                    <div class="card-block">
                        <div class="">
                            <div class="m-b-20">
                                <h6 class="sub-title m-b-15">Mô tả</h6>
                                <p>
                                    {!! $task->description !!}
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="f-left">
                                    <span class=" txt-primary"> <i class="icofont icofont-chart-line-alt"></i>
                                Trạng thái công việc:</span>
                            <div class=" d-inline-block">
                                @if($task->status == '1')
                                <p><b>Đang tiến hành</b></p>
                                @endif

                                <!-- end of dropdown menu -->
                            </div>

{{--                        <!-- Danh sách thành viên tham gia -->--}}
{{--                        <div class="f-left">--}}
{{--                                <div class="card-header">--}}
{{--                                    <h5 class="card-header-text"><i class="icofont icofont-users-alt-4"></i> Thành viên tham gia </h5>--}}
{{--                                </div>--}}
{{--                            @foreach($users as $i)--}}
{{--                                <div class="card-block user-box assign-user">--}}
{{--                                    <div class="media">--}}
{{--                                        <div class="media-left media-middle photo-table">--}}
{{--                                            <a href="#">--}}
{{--                                                <img class="img-radius" src="{{ asset('/avatar_upload/'.$i->avatar) }}" alt="chat-user">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6>{{$i->name}}</h6>--}}
{{--                                            @if($i->role == '0')--}}
{{--                                                <p>Admin</p>--}}
{{--                                            @elseif($i->role == '1')--}}
{{--                                                <p>Quản lý</p>--}}
{{--                                            @else--}}
{{--                                                <p>Nhân viên</p>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <a href="#!" class="text-muted"> <i class="icon-options-vertical"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                        </div>--}}
{{--                        </div>--}}

{{--                        <div class="f-right d-flex">--}}
{{--                            <span>--}}
{{--                              <a href="#!" class="text-muted m-r-10 f-16"><i class="icofont icofont-edit"></i> </a>--}}
{{--                            </span>--}}
{{--                            <span class="m-r-10">--}}
{{--                                   <a href="#!" class="text-muted f-16"><i class="icofont icofont-ui-delete"></i></a>--}}
{{--                                </span>--}}
{{--                            <div class="dropdown-secondary dropdown d-inline-block">--}}
{{--                                <button class="btn btn-sm btn-primary dropdown-toggle waves-light bg-white b-none txt-muted" type="button" id="dropdown5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>--}}
{{--                                <div class="dropdown-menu" aria-labelledby="dropdown5" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">--}}
{{--                                    <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-ui-alarm m-r-10"></i>Check in</a>--}}
{{--                                    <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-attachment m-r-10"></i>Attach screenshot</a>--}}
{{--                                    <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-spinner-alt-5 m-r-10"></i>Reassign</a>--}}
{{--                                    <div class="dropdown-divider"></div>--}}
{{--                                    <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-ui-edit m-r-10"></i>Edit task</a>--}}
{{--                                    <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-close-line m-r-10"></i>Remove</a>--}}
{{--                                </div>--}}
{{--                                <!-- end of dropdown menu -->--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>

            </div>
            <!-- Task-detail-left end -->
        </div>
    </div>
@include('Notification')
@endsection