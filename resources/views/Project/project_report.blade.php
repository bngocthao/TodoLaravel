<!-- Hiển thị report dự án (trên đầu) -->
@if(\Illuminate\Support\Facades\Auth::user()->role == 0)
<div class="row">
    <!-- task, page, download counter  start -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-yellow update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h6 class="text-white m-b-0"><b>Số lượng dự án hiện tại</b></h6>
                        <br>
                        <h4 class="text-white">{{$numberOfProject}}</h4>
                    </div>
                    <div class="col-4 text-right">
                        <canvas id="update-chart-1" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer">
{{--                <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>--}}
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-green update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h6 class="text-white m-b-0"><b>Số lượng công việc hiện tại</b></h6>
                        <br>
                        <h4 class="text-white">{{$numberOfTask}}</h4>

                    </div>
                    <div class="col-4 text-right">
                        <canvas id="update-chart-2" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer">
{{--                <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>--}}
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-pink update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h6 class="text-white m-b-0"><b>Dự án đã hoàn thành</b></h6>
                        <br>
                        <h4 class="text-white">{{$doneProject}}</h4>
                    </div>
                    <div class="col-4 text-right">
                        <canvas id="update-chart-3" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer">
{{--                <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>--}}
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-lite-green update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h6 class="text-white m-b-0"><b>Công việc đã hoàn thành</b></h6>
                        <br>
                        <h4 class="text-white">{{$doneTask}}</h4>
                    </div>
                    <div class="col-4 text-right">
                        <canvas id="update-chart-4" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer">
{{--                <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>--}}
            </div>
        </div>
    </div>
</div>
@endif

