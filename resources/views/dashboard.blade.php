@extends('layouts.master')
@section('main-content')
    <div class="breadcrumb">
        <h1>Halaman Utama</h1>
        <ul>
            <li><a href="">Dashboard</a></li>
        </ul>
    </div>

    <div class="separator-breadcrumb border-top"></div>

    <div class="row">
        <!-- ICON BG -->
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center">
                    <i class="i-Add-User"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">Pengguna</p>
                        <p class="text-primary text-24 line-height-1 mb-2">{{ $user }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center">
                    <i class="i-Truck"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">Jentera</p>
                        <p class="text-primary text-24 line-height-1 mb-2">{{ $vehicle }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center">
                    <i class="i-Gears"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">Penyelenggaraan</p>
                        <p class="text-primary text-24 line-height-1 mb-2">{{ $service_total }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center">
                    <i class="i-Money-2"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">Kos</p>
                        <p class="text-primary text-16 line-height-1 mb-2">{{ $service_cost }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title">Jumlah Penyelenggaraan Untuk Tahun 2020</div>
                    <div id="echartBar" style="height: 300px;"></div>
                </div>
            </div>
        </div>
{{--        <div class="col-lg-4 col-sm-12">--}}
{{--            <div class="card mb-4">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="card-title">5 Jenis Penyelenggaran Terbanyak</div>--}}
{{--                    <div id="echartPie" style="height: 300px;"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>



@endsection

@section('page-js')
    <script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
    <script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
    <script>

        function getData(url){
            return $.getJSON(url, function(data){
                return data;
            });
        }

        $(document).ready(function () {

            // Chart in Dashboard version 1
            var echartElemBar = document.getElementById('echartBar');
            if (echartElemBar) {
                var echartBar = echarts.init(echartElemBar);

                getData("{{ route('total.services') }}").then(function(data) {

                    echartBar.setOption({
                        legend: {
                            borderRadius: 0,
                            orient: 'horizontal',
                            x: 'right',
                            data: ['Jumlah Penyelenggaraan']
                        },
                        grid: {
                            left: '8px',
                            right: '8px',
                            bottom: '0',
                            containLabel: true
                        },
                        tooltip: {
                            show: true,
                            backgroundColor: 'rgba(0, 0, 0, .8)'
                        },
                        xAxis: [{
                            type: 'category',
                            data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                            axisTick: {
                                alignWithLabel: true
                            },
                            splitLine: {
                                show: false
                            },
                            axisLine: {
                                show: true
                            }
                        }],
                        yAxis: [{
                            type: 'value',
                            min: 0,
                            max: 10,
                            interval: 1,
                            axisLine: {
                                show: false
                            },
                            splitLine: {
                                show: true,
                                interval: 'auto'
                            }
                        }],

                        series: [{
                            name: 'Jumlah Penyelenggaraan',
                            data: data,
                            label: {show: false, color: '#0168c1'},
                            type: 'bar',
                            barGap: 0,
                            color: '#bcbbdd',
                            smooth: true,
                            itemStyle: {
                                emphasis: {
                                    shadowBlur: 10,
                                    shadowOffsetX: 0,
                                    shadowOffsetY: -2,
                                    shadowColor: 'rgba(0, 0, 0, 0.3)'
                                }
                            }
                        }]
                    });
                });
                $(window).on('resize', function () {
                    setTimeout(function () {
                        echartBar.resize();
                    }, 500);
                });
            }

            // Chart in Dashboard version 1
            var echartElemPie = document.getElementById('echartPie');
            if (echartElemPie) {
                var echartPie = echarts.init(echartElemPie);
                echartPie.setOption({
                    color: ['#62549c', '#7566b5', '#7d6cbb', '#8877bd', '#9181bd', '#6957af'],
                    tooltip: {
                        show: true,
                        backgroundColor: 'rgba(0, 0, 0, .8)'
                    },

                    series: [{
                        name: 'Sales by Country',
                        type: 'pie',
                        radius: '60%',
                        center: ['50%', '50%'],
                        data: [{ value: 535, name: 'USA' }, { value: 310, name: 'Brazil' }, { value: 234, name: 'France' }, { value: 155, name: 'BD' }, { value: 130, name: 'UK' }, { value: 348, name: 'India' }],
                        itemStyle: {
                            emphasis: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }]
                });
                $(window).on('resize', function () {
                    setTimeout(function () {
                        echartPie.resize();
                    }, 500);
                });
            }

            // Chart in Dashboard version 1
            var echartElem1 = document.getElementById('echart1');
            if (echartElem1) {
                var echart1 = echarts.init(echartElem1);
                echart1.setOption(_extends({}, echartOptions.lineFullWidth, {
                    series: [_extends({
                        data: [30, 40, 20, 50, 40, 80, 90]
                    }, echartOptions.smoothLine, {
                        markArea: {
                            label: {
                                show: true
                            }
                        },
                        areaStyle: {
                            color: 'rgba(102, 51, 153, .2)',
                            origin: 'start'
                        },
                        lineStyle: {
                            color: '#663399'
                        },
                        itemStyle: {
                            color: '#663399'
                        }
                    })]
                }));
                $(window).on('resize', function () {
                    setTimeout(function () {
                        echart1.resize();
                    }, 500);
                });
            }
            // Chart in Dashboard version 1
            var echartElem2 = document.getElementById('echart2');
            if (echartElem2) {
                var echart2 = echarts.init(echartElem2);
                echart2.setOption(_extends({}, echartOptions.lineFullWidth, {
                    series: [_extends({
                        data: [30, 10, 40, 10, 40, 20, 90]
                    }, echartOptions.smoothLine, {
                        markArea: {
                            label: {
                                show: true
                            }
                        },
                        areaStyle: {
                            color: 'rgba(255, 193, 7, 0.2)',
                            origin: 'start'
                        },
                        lineStyle: {
                            color: '#FFC107'
                        },
                        itemStyle: {
                            color: '#FFC107'
                        }
                    })]
                }));
                $(window).on('resize', function () {
                    setTimeout(function () {
                        echart2.resize();
                    }, 500);
                });
            }
            // Chart in Dashboard version 1
            var echartElem3 = document.getElementById('echart3');
            if (echartElem3) {
                var echart3 = echarts.init(echartElem3);
                echart3.setOption(_extends({}, echartOptions.lineNoAxis, {
                    series: [{
                        data: [40, 80, 20, 90, 30, 80, 40, 90, 20, 80, 30, 45, 50, 110, 90, 145, 120, 135, 120, 140],
                        lineStyle: _extends({
                            color: 'rgba(102, 51, 153, 0.8)',
                            width: 3
                        }, echartOptions.lineShadow),
                        label: { show: true, color: '#212121' },
                        type: 'line',
                        smooth: true,
                        itemStyle: {
                            borderColor: 'rgba(102, 51, 153, 1)'
                        }
                    }]
                }));
                $(window).on('resize', function () {
                    setTimeout(function () {
                        echart3.resize();
                    }, 500);
                });
            }
        });

    </script>

@endsection
