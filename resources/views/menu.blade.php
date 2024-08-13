@extends('layout/main')
@section('style')
    <style>
        .menu-list:hover {
            background-color: #B6E2FF;
        }

        .menu-list {
            width: 100%;
            height: 130px;
            vertical-align: middle;
        }
    </style>
    {{-- <div id="loading">
        <div class="loader simple-loader">
            <img src="assets/images/logo.png" style="width: 50%" alt="">
        </div>
    </div> --}}
@endsection

@section('content')
    <div class="content-inner mt-5 py-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40" data-iq-duration=".6"
                    data-iq-delay=".4" data-iq-trigger="scroll" data-iq-ease="none">
                    <div class="card-header">
                        <div class="float-end">
                            <a class="btn btn-sm btn-outline-danger rounded-pill mt-2 ml-2" onclick="LoadPage()">
                                <svg width="23" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M6.70555 12.8906C6.18944 12.8906 5.77163 13.3146 5.77163 13.8384L5.51416 18.4172C5.51416 19.0847 6.04783 19.6251 6.70555 19.6251C7.36328 19.6251 7.89577 19.0847 7.89577 18.4172L7.63947 13.8384C7.63947 13.3146 7.22167 12.8906 6.70555 12.8906Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M7.98037 3.67345C7.98037 3.67345 7.71236 3.39789 7.54618 3.27793C7.30509 3.09264 7.00783 3 6.71173 3C6.37936 3 6.07039 3.10452 5.81877 3.30169C5.77313 3.34801 5.57886 3.5226 5.41852 3.68532C4.41204 4.6367 2.76539 7.12026 2.26215 8.42083C2.18257 8.618 2.01053 9.11685 2 9.38409C2 9.63827 2.05618 9.88294 2.17087 10.1145C2.3312 10.4044 2.58282 10.6372 2.88009 10.7642C3.08606 10.8462 3.70282 10.9733 3.71453 10.9733C4.38981 11.1016 5.48757 11.1704 6.70003 11.1704C7.85514 11.1704 8.90727 11.1016 9.59308 10.997C9.60478 10.9852 10.3702 10.8581 10.6335 10.7179C11.1133 10.4626 11.4118 9.96371 11.4118 9.43041V9.38409C11.4001 9.03608 11.1016 8.30444 11.0911 8.30444C10.5879 7.07394 9.02079 4.64858 7.98037 3.67345Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.4"
                                        d="M17.2949 11.1096C17.811 11.1096 18.2288 10.6856 18.2288 10.1618L18.4851 5.58296C18.4851 4.91543 17.9526 4.375 17.2949 4.375C16.6372 4.375 16.1035 4.91543 16.1035 5.58296L16.361 10.1618C16.361 10.6856 16.7788 11.1096 17.2949 11.1096Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M21.8293 13.8853C21.6689 13.5955 21.4173 13.3638 21.1201 13.2356C20.9141 13.1536 20.2961 13.0265 20.2856 13.0265C19.6103 12.8982 18.5126 12.8293 17.3001 12.8293C16.145 12.8293 15.0929 12.8982 14.4071 13.0028C14.3954 13.0146 13.63 13.1429 13.3666 13.2819C12.8856 13.5373 12.5884 14.0361 12.5884 14.5706V14.6169C12.6001 14.9649 12.8973 15.6954 12.909 15.6954C13.4123 16.9259 14.9782 19.3525 16.0198 20.3265C16.0198 20.3265 16.2878 20.6021 16.454 20.7208C16.6939 20.9073 16.9911 21 17.2896 21C17.6208 21 17.9286 20.8954 18.1814 20.6983C18.227 20.652 18.4213 20.4774 18.5816 20.3158C19.5869 19.3632 21.2347 16.8796 21.7368 15.5802C21.8176 15.383 21.9896 14.883 22.0001 14.6169C22.0001 14.3616 21.944 14.1169 21.8293 13.8853Z"
                                        fill="currentColor"></path>
                                </svg>
                                Refresh
                            </a>
                        </div>
                        <h4 class="card-title">Dashboard</h4>
                        <small>Welcome</small>
                    </div>
                    <div class="card-body" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                        data-iq-duration=".6" data-iq-delay=".6" data-iq-trigger="scroll" data-iq-ease="none"
                        style="padding-left: 40px; padding-right:40px">

                        {{-- isi Content --}}
                        <div class="row">
                            {{-- <div class="row" id="menuList">
                                Loading...
                            </div> --}}
                            <div class="col-md-4">
                                <div class="card" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                                    data-iq-duration=".6" data-iq-delay=".4" data-iq-trigger="scroll" data-iq-ease="none">
                                    <div class="card-header">
                                        <h4 class="card-title">Total Jamaah Umrah</h4>
                                        <small>This Year</small>
                                    </div>
                                    <div class="card-body" data-iq-gsap="onStart" data-iq-opacity="0"
                                        data-iq-position-y="-40" data-iq-duration=".6" data-iq-delay=".6"
                                        data-iq-trigger="scroll" data-iq-ease="none">
                                        <div id="admin-chart-1" class="admin-chart-1 apexcharts-active"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-soft-success">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="bg-soft-success rounded p-3">
                                                IDR
                                            </div>
                                            <div class="text-end">
                                                <h2 class="counter"id="earn" style="text-decoration-line: underline">Rp. 0
                                                </h2>
                                                Current Asset
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card bg-soft-primary">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="bg-soft-primary rounded p-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20px"
                                                            height="20px" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <div class="text-end">
                                                        <h2 class="counter"id="utp">0</h2>
                                                        Total Umrah
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card bg-soft-warning">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <div class="text-end">
                                                        <h2 class="counter" id="ulp">0</h2>
                                                        Umrah L/P
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card bg-soft-primary">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="bg-soft-primary rounded p-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20px"
                                                            height="20px" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <div class="text-end">
                                                        <h2 class="counter"id="htp">0</h2>
                                                        Total Haji
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card bg-soft-warning">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <div class="text-end">
                                                        <h2 class="counter"id="hlp">0</h2>
                                                        Haji L/P
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                                    data-iq-duration=".6" data-iq-delay=".4" data-iq-trigger="scroll"
                                    data-iq-ease="none">
                                    <div class="card-header">
                                        <h4 class="card-title">Total Jamaah Haji</h4>
                                        <small>This Year</small>
                                    </div>
                                    <div class="card-body" data-iq-gsap="onStart" data-iq-opacity="0"
                                        data-iq-position-y="-40" data-iq-duration=".6" data-iq-delay=".6"
                                        data-iq-trigger="scroll" data-iq-ease="none">
                                        <div id="admin-chart-2" class="admin-chart-2 apexcharts-active"
                                            style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-soft-primary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>
                                        Monthly Report
                                    </h5>
                                    <div class="text-end">
                                        <div class="text-center">

                                            <label for="month">Month</label>
                                            <input type="month" class="form-control" id="month"
                                                value="{{ date('Y-m') }}" max="{{ date('Y-m') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Best Agen Performance</h4>
                                <small>Top 5</small>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="main-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Total Jamaah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card bg-soft-success">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="bg-soft-success  rounded p-3">
                                        IDR
                                    </div>
                                    <div class="text-end">
                                        <h6 class="counter" id="mIncome">0</h6>
                                        Income
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-soft-danger">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="bg-soft-danger rounded p-3">
                                        IDR
                                    </div>
                                    <div class="text-end">
                                        <h6 class="counter" id="mExpense">0</h6>
                                        Expense
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-soft-info">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="bg-soft-info rounded p-3">
                                        IDR
                                    </div>
                                    <div class="text-end">
                                        <h6 class="counter" id="mTotal">0</h6>
                                        Total
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-soft-warning">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>
                                        Alert
                                    </h5>
                                    <div class="text-end">
                                        Have to pay in 40 Days
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Jamaah Haji & Umrah</h4>
                                <small>Deficiency Alert</small>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="jamaah-table">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Type</th>
                                                <th>Deficiency</th>
                                                <th>Flight Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script>
            $(document).ready(function() {
                LoadPage()
                setTimeout(() => {
                    LoadPage()
                }, 2000);
            })

            function LoadPage() {
                (function(jQuery) {
                    "use strict";
                    let lastDate = 0
                    let TICKINTERVAL = 864e5;
                    let XAXISRANGE = 7776e5;
                    const chartFunction = {
                        chartDummySearies: (e, t, refData) => {
                            let data = refData
                            const a = e + TICKINTERVAL;
                            lastDate = a;
                            for (let n = 0; n < data.length - 50; n++) data[n].x = a - XAXISRANGE -
                                TICKINTERVAL, data[
                                    n].y = 0;
                            data.push({
                                x: a,
                                y: Math.floor(Math.random() * (t.max - t.min + 1)) + t.min
                            })
                            return data
                        },
                        generateDayWiseTimeSeries(baseval, count, yrange) {
                            let i = 0;
                            let series = [];
                            while (i < count) {
                                let x = baseval;
                                let y =
                                    Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

                                series.push([x, y]);
                                baseval += 86400000;
                                i++;
                            }
                            return series;
                        }
                    }
                    if (jQuery('#admin-chart-1').length) {
                        $.ajax({
                            url: "{{ url('getJamaahUmrahInYear') }}",
                            method: 'post',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },

                            success: function(data) {
                                $('#earn').attr('class', data.earn > 0 ? 'text-success' : 'text-danger')
                                $('#earn').html(parseFloat(data.earn).toLocaleString("id-ID", {
                                    style: "currency",
                                    currency: "IDR"
                                }))
                                $('#ulp').html(data.cjp + "/" + data.cjl)
                                $('#utp').html(parseFloat(data.cjl) + parseFloat(data.cjp))

                                const options = {
                                    series: [{
                                            type: 'column',
                                            name: 'Laki-laki',
                                            data: data.jl,
                                        }, {
                                            type: 'column',
                                            name: 'Perempuan',
                                            data: data.jp
                                        },
                                        {
                                            type: 'line',
                                            curve: 'smooth',
                                            name: 'higher',
                                            data: data.tt
                                        }
                                    ],

                                    chart: {
                                        height: 350,
                                        type: 'line',
                                        animations: {
                                            enabled: true,
                                            easing: 'easeinout',
                                            speed: 800,
                                            animateGradually: {
                                                enabled: false,
                                                delay: 150
                                            },
                                            dynamicAnimation: {
                                                enabled: true,
                                                speed: 350
                                            }
                                        },
                                        zoom: {
                                            enabled: false,
                                        },
                                        toolbar: {
                                            show: false
                                        }
                                    },
                                    tooltip: {
                                        enabled: true,
                                    },
                                    stroke: {
                                        width: [0, 2]
                                    },
                                    dataLabels: {
                                        enabled: true,
                                        enabledOnSeries: [1],
                                        offsetX: 3.0,
                                        offsetY: -1.6,
                                        style: {
                                            fontSize: '1px',
                                            fontFamily: 'Helvetica, Arial, sans-serif',
                                            fontWeight: 'bold',
                                        },
                                        background: {
                                            enabled: true,
                                            foreColor: '#fff',
                                            color: '#fff',
                                            padding: 10,
                                            borderRadius: 10,
                                            borderWidth: 0,
                                            borderColor: '#fff',
                                            opacity: 1,
                                        }

                                    },
                                    colors: ["#ECC812", "#EA6A12", "#8EEC12"],
                                    plotOptions: {
                                        bar: {
                                            horizontal: false,
                                            columnWidth: '16%',
                                            endingShape: 'rounded',
                                            borderRadius: 5,
                                        },
                                    },
                                    legend: {
                                        show: false,
                                        offsetY: -25,
                                        offsetX: -5
                                    },
                                    xaxis: {
                                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                                            'Jul', 'Aug',
                                            'Sep', 'Oct', 'Nov',
                                            'Dec'
                                        ],
                                        labels: {
                                            minHeight: 20,
                                            maxHeight: 20,
                                        }
                                    },
                                    yaxis: {
                                        labels: {
                                            minWidth: 20,
                                            maxWidth: 20,
                                        }
                                    },
                                };

                                const chart = new ApexCharts(document.querySelector("#admin-chart-1"),
                                    options);
                                chart.render();
                            },
                            error: function(xhr, status, error) {
                                Toast.fire({
                                    icon: "error",
                                    title: JSON.parse(xhr.responseText).error
                                });

                            }
                        });
                    }

                    if (jQuery('#admin-chart-2').length) {
                        $.ajax({
                            url: "{{ url('getJamaahHajiInYear') }}",
                            method: 'post',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },

                            success: function(data) {
                                $('#hlp').html(data.cjp + "/" + data.cjl)
                                $('#htp').html(parseFloat(data.cjl) + parseFloat(data.cjp))

                                const options = {
                                    series: [{
                                            type: 'column',
                                            name: 'Laki-laki',
                                            data: data.jl,
                                        }, {
                                            type: 'column',
                                            name: 'Perempuan',
                                            data: data.jp
                                        },
                                        {
                                            type: 'line',
                                            curve: 'smooth',
                                            name: 'higher',
                                            data: data.tt
                                        }
                                    ],

                                    chart: {
                                        height: 350,
                                        type: 'line',
                                        animations: {
                                            enabled: true,
                                            easing: 'easeinout',
                                            speed: 800,
                                            animateGradually: {
                                                enabled: false,
                                                delay: 150
                                            },
                                            dynamicAnimation: {
                                                enabled: true,
                                                speed: 350
                                            }
                                        },
                                        zoom: {
                                            enabled: false,
                                        },
                                        toolbar: {
                                            show: false
                                        }
                                    },
                                    tooltip: {
                                        enabled: true,
                                    },
                                    stroke: {
                                        width: [0, 2]
                                    },
                                    dataLabels: {
                                        enabled: true,
                                        enabledOnSeries: [1],
                                        offsetX: 3.0,
                                        offsetY: -1.6,
                                        style: {
                                            fontSize: '1px',
                                            fontFamily: 'Helvetica, Arial, sans-serif',
                                            fontWeight: 'bold',
                                        },
                                        background: {
                                            enabled: true,
                                            foreColor: '#fff',
                                            color: '#fff',
                                            padding: 10,
                                            borderRadius: 10,
                                            borderWidth: 0,
                                            borderColor: '#fff',
                                            opacity: 1,
                                        }

                                    },
                                    colors: ["#ECC812", "#EA6A12", "#8EEC12"],
                                    plotOptions: {
                                        bar: {
                                            horizontal: false,
                                            columnWidth: '16%',
                                            endingShape: 'rounded',
                                            borderRadius: 5,
                                        },
                                    },
                                    legend: {
                                        show: false,
                                        offsetY: -25,
                                        offsetX: -5
                                    },
                                    xaxis: {
                                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                                            'Jul', 'Aug',
                                            'Sep', 'Oct', 'Nov',
                                            'Dec'
                                        ],
                                        labels: {
                                            minHeight: 20,
                                            maxHeight: 20,
                                        }
                                    },
                                    yaxis: {
                                        labels: {
                                            minWidth: 20,
                                            maxWidth: 20,
                                        }
                                    },
                                };

                                const chart2 = new ApexCharts(document.querySelector("#admin-chart-2"),
                                    options);
                                chart2.render();
                            },
                            error: function(xhr, status, error) {
                                Toast.fire({
                                    icon: "error",
                                    title: JSON.parse(xhr.responseText).error
                                });

                            }
                        });
                    }

                })(jQuery)

                getList()
                get40Days()
            }

            $('#month').change(function() {
                getList()
            })


            function getList() {
                let noD = 1
                const columns = [{
                        data: "id",
                        render: function(data, b, c) {

                            return `${noD++}.`
                        },
                        className: 'text-center'
                    },
                    {
                        data: "nama",
                    },

                    {
                        data: "tjamaah",
                        className: 'text-center text-success'
                    },

                ]

                var tabled = $('#main-table').DataTable({
                    searching: false,
                    destroy: true,
                    lengthChange: false,
                    responsive: true,
                    sort: false,
                    // pageLength: 2,
                    info: false,
                    paging: false,
                    ajax: {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        url: "{{ url('getTopAgen') }}",
                        type: "POST",
                        data: {
                            month: $('#month').val()
                        }

                    },
                    columns: columns,
                    initComplete: function(data, json) {
                        $('#mIncome').html(parseFloat(json.income).toLocaleString("id-ID", {
                            style: "currency",
                            currency: "IDR"
                        }))
                        $('#mExpense').html(parseFloat(json.expense).toLocaleString("id-ID", {
                            style: "currency",
                            currency: "IDR"
                        }))
                        $('#mTotal').html(parseFloat(json.total).toLocaleString("id-ID", {
                            style: "currency",
                            currency: "IDR"
                        }))
                    }
                });

            }

            function get40Days() {
                let noD = 1
                const columns = [{
                        data: "nama",
                        render: function(data, b, c) {
                            return data.substring(0, 20)
                        },
                    },
                    {
                        data: "type",
                        render: function(data, b, c) {
                            var a = ''
                            if (data == 'Umrah') {
                                a += `<span class="btn btn-xs rounded-pill btn-warning">Umrah</span>`
                            } else {
                                a += `<span class="btn btn-xs rounded-pill btn-primary">Haji</span>`
                            }
                            return a
                        }
                    },
                    {
                        data: "nama",
                        render: function(data, b, c) {
                            let a = parseFloat(c.price) - parseFloat(c.paid);
                            return parseFloat(a).toLocaleString("id-ID", {
                                style: "currency",
                                currency: "IDR"
                            })
                        },
                        className: 'text-center text-danger'
                    },
                    {
                        data: "tgl"
                    }
                ]

                var tabled = $('#jamaah-table').DataTable({
                    searching: true,
                    destroy: true,
                    lengthChange: false,
                    responsive: true,
                    sort: true,
                    // pageLength: 2,
                    info: false,
                    paging: true,
                    ajax: {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        url: "{{ url('get40Days') }}",
                        type: "POST",
                    },
                    columns: columns,
                });

            }
        </script>
    @endsection
