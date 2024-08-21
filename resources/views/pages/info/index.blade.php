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
@endsection

@section('content')
    <div class="content-inner mt-5 py-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40" data-iq-duration=".6"
                    data-iq-delay=".4" data-iq-trigger="scroll" data-iq-ease="none">
                    <div class="card-header">
                        <div class="float-end">
                            <a class="btn btn-sm btn-primary rounded-pill mt-2 ml-2" id="btn-haji"
                                onclick="showHaji(true)">
                                <svg width="23" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                                Haji
                            </a>
                            <a class="btn btn-sm btn-outline-warning rounded-pill mt-2 ml-2" id="btn-umrah"
                                onclick="showHaji(false)">
                                <svg width="23" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                                Umrah
                            </a>
                        </div>
                        <h4 class="card-title">Information</h4>
                        <small>Menu Informasi</small>
                    </div>
                    {{-- Haji Field --}}
                    <div class="card-body" style="padding-left: 40px; padding-right:40px" id="haji">
                        <div class="row">
                            <div class="col-xl-7">
                                <h4 for="">Hajj Waiting List </h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="wait-table">
                                        <thead>
                                            <tr>
                                                <th>Wilayah</th>
                                                <th>Kuota</th>
                                                <th>Masa Tunggu (Th)</th>
                                                <th>Porsi Terakhir</th>
                                                <th>Jumlah Pendaftar</th>
                                                <th>Lunas Tunda</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <h4 for="">Cek Hajj Depature Estimation </h4>
                                <br>
                                <div
                                    style="overflow: hidden; left: 0px; top: 0px;  width:454px; height:702px;  position: relatice">
                                    <div style="overflow: hidden; margin-top: -100px; margin-left: -25px;">
                                    </div>

                                    <iframe src="https://haji.kemenag.go.id/v5/?search=estimation" scrolling="no"
                                        style="height: 900px; border: 0; width: 450px; margin-top: -60px; margin-left: -24px; position: relative; z-index: 1;">
                                    </iframe>
                                    <div
                                        style="position: absolute; left: 0;margin-top: -500px; width: 450px; height: 500px; background-color: rgba(255, 255, 255, 0); z-index: 2;">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{--  Umrah Field --}}
                    <div class="card-body" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                        data-iq-duration=".6" data-iq-delay=".6" data-iq-trigger="scroll" data-iq-ease="none"
                        style="padding-left: 40px; padding-right:40px" id="umrah" hidden>
                        <div class="text-center">
                            No information updated yet
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        var sArray = [];
        $(document).ready(function() {
            getWaitingList()
        })

        function getWaitingList() {
            $.ajax({
                url: "https://haji.kemenag.go.id/v5/page-data/index/page-data.json?search=waiting-list",
                method: 'GET',

                success: function(res) {
                    data = res.result.serverData.additionalSearchData.Data
                    sArray = data
                    console.log(sArray)
                    drawTable()
                },
                error: function(xhr, status, error) {
                    Toast.fire({
                        icon: "error",
                        title: JSON.parse(xhr.responseText).error
                    });

                }
            });
        }

        function drawTable() {
            var dataTable = $('#wait-table').DataTable({
                responsive: true,
                searching: true,
                destroy: true,
                lengthChange: false,
                paging: true,
                info: true,
                ordering: true,
                columns: [{
                        data: "wilayah",
                    },
                    {
                        data: "kuota",
                        render: function(data, a, b) {
                            return new Intl.NumberFormat("de-DE").format(data)
                        }
                    },
                    {
                        data: "masa_tunggu",
                    },
                    {
                        data: "porsi_terakhir",
                    },
                    {
                        data: "jumlah_pendaftar",
                        render: function(data, a, b) {
                            return new Intl.NumberFormat("de-DE").format(data)
                        }
                    },
                    {
                        data: "lunas_tunda",
                        render: function(data, a, b) {
                            return new Intl.NumberFormat("de-DE").format(data)
                        }
                    },
                ],
            });

            dataTable.clear();

            sArray.forEach(function(item) {
                dataTable.row.add({
                    wilayah: item.wilayah,
                    jumlah_pendaftar: item.jumlah_pendaftar,
                    kuota: item.kuota,
                    lunas_tunda: item.lunas_tunda,
                    masa_tunggu: item.masa_tunggu,
                    porsi_terakhir: item.porsi_terakhir,
                });
            });
            dataTable.draw();

        }

        function showHaji(bool) {
            if (bool) {
                $('#btn-haji').addClass('btn-primary')
                $('#btn-haji').removeClass('btn-outline-primary')
                $('#btn-umrah').removeClass('btn-warning')
                $('#btn-umrah').addClass('btn-outline-warning')
                $('#haji').attr('hidden', false)
                $('#umrah').attr('hidden', true)
            } else {
                $('#btn-haji').addClass('btn-outline-primary')
                $('#btn-haji').removeClass('btn-primary')
                $('#btn-umrah').removeClass('btn-outline-warning')
                $('#btn-umrah').addClass('btn-warning')
                $('#haji').attr('hidden', true)
                $('#umrah').attr('hidden', false)
            }
        }
    </script>
@endsection
