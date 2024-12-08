@extends('dashboard.layouts.main')

@push('scripts')
    <script>
        var options = {
                chart: {
                    height: 380,
                    type: "bar",
                    stacked: !0,
                    toolbar: {
                        show: !1
                    },
                    zoom: {
                        enabled: !0
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: !1,
                        columnWidth: "20%",
                        endingShape: "rounded"
                    },
                },
                dataLabels: {
                    enabled: !0
                },
                series: [{
                        name: "Ditutup",
                        data: {!! json_encode($closedPostChartData) !!}
                    },
                    {
                        name: "Dibuka",
                        data: {!! json_encode($openedPostChartData) !!}
                    },
                ],
                xaxis: {
                    categories: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dec",
                    ],
                },
                colors: ["#525ce5", "#edf1f5"],
                legend: {
                    show: !1
                },
                fill: {
                    opacity: 1
                },
            },
            chart = new ApexCharts(
                document.querySelector("#stacked-column-chart"),
                options
            );
        chart.render();
    </script>
@endpush

@section('header')
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="page-title">
                        <h4>{{ $title }}</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title mb-4 float-sm-start">Jumlah Postingan</h4>

                    <div class="clearfix"></div>


                    <div class="row align-items-center">
                        <div class="col-12">
                            <div>
                                <div id="stacked-column-chart" class="apex-charts" dir="ltr">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-4">
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <p class="font-size-16">Postingan</p>
                                <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                    <span class="avatar-title rounded-circle bg-soft-primary">
                                        <i class="mdi mdi-post-outline text-primary font-size-20"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-22">{{ number_format($postCount) }}</h5>

                                <div class="progress mt-3" style="height: 4px;">
                                    <div class="progress-bar progress-bar bg-primary" role="progressbar" style="width: 100%"
                                        aria-valuenow="70" aria-valuemin="0" aria-valuemax="70">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <p class="font-size-16">Kategori</p>
                                <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                    <span class="avatar-title rounded-circle bg-soft-success">
                                        <i class="mdi mdi-tag-outline text-success font-size-20"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-22">{{ number_format($categoryCount) }}</h5>

                                <div class="progress mt-3" style="height: 4px;">
                                    <div class="progress-bar progress-bar bg-success" role="progressbar" style="width: 100%"
                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="80">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <p class="font-size-16">Komentar</p>
                                <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                    <span class="avatar-title rounded-circle bg-soft-warning">
                                        <i class="mdi mdi-comment-outline text-warning font-size-20"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-22">{{ number_format($commentCount) }}</h5>

                                <div class="progress mt-3" style="height: 4px;">
                                    <div class="progress-bar progress-bar bg-warning" role="progressbar" style="width: 100%"
                                        aria-valuenow="70" aria-valuemin="0" aria-valuemax="70">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <p class="font-size-16">Reaksi</p>
                                <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                    <span class="avatar-title rounded-circle bg-soft-danger">
                                        <i class="mdi mdi-emoticon-outline text-danger font-size-20"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-22">{{ number_format($reactionCount) }}</h5>

                                <div class="progress mt-3" style="height: 4px;">
                                    <div class="progress-bar progress-bar bg-danger" role="progressbar" style="width: 100%"
                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="80">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <div class="row">

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">
                        Pengguna Teraktif
                    </h4>

                    <ul class="inbox-wid list-unstyled mb-0">
                        @foreach ($activeUsers as $user)
                            <li class="inbox-list-item">
                                <a href="#">
                                    <div class="media">
                                        <div class="me-3 align-self-center">
                                            <div class="avatar-sm rounded bg-primary align-self-center">
                                                <span class="avatar-title">
                                                    <i class="ti-facebook text-white font-size-18"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="media-body overflow-hidden mt-1">
                                            <h5 class="font-size-15 mb-1">{{ $user->name }}</h5>
                                            <p class="text-muted mb-0">
                                                {{ number_format($user->posts_count) }} Postingan -
                                                {{ number_format($user->comments_count) }} Komentar
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Postingan Terpopuler</h4>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Penulis</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($popularPosts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->user->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
