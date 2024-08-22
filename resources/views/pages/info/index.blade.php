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
                            <a class="btn btn-sm btn-primary rounded-pill mt-2 ml-2 fieldBtn" id="btn-haji"
                                onclick="showField('haji')">
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
                                Kemenag
                            </a>
                            <a class="btn btn-sm btn-outline-warning rounded-pill mt-2 ml-2 fieldBtn" id="btn-nusuk"
                                onclick="showField('nusuk')">
                                <svg width="23" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3 16.8701V9.25708H21V16.9311C21 20.0701 19.0241 22.0001 15.8628 22.0001H8.12733C4.99561 22.0001 3 20.0301 3 16.8701ZM7.95938 14.4101C7.50494 14.4311 7.12953 14.0701 7.10977 13.6111C7.10977 13.1511 7.46542 12.7711 7.91987 12.7501C8.36443 12.7501 8.72997 13.1011 8.73985 13.5501C8.7596 14.0111 8.40395 14.3911 7.95938 14.4101ZM12.0198 14.4101C11.5653 14.4311 11.1899 14.0701 11.1701 13.6111C11.1701 13.1511 11.5258 12.7711 11.9802 12.7501C12.4248 12.7501 12.7903 13.1011 12.8002 13.5501C12.82 14.0111 12.4643 14.3911 12.0198 14.4101ZM16.0505 18.0901C15.596 18.0801 15.2305 17.7001 15.2305 17.2401C15.2206 16.7801 15.5862 16.4011 16.0406 16.3911H16.0505C16.5148 16.3911 16.8902 16.7711 16.8902 17.2401C16.8902 17.7101 16.5148 18.0901 16.0505 18.0901ZM11.1701 17.2401C11.1899 17.7001 11.5653 18.0611 12.0198 18.0401C12.4643 18.0211 12.82 17.6411 12.8002 17.1811C12.7903 16.7311 12.4248 16.3801 11.9802 16.3801C11.5258 16.4011 11.1701 16.7801 11.1701 17.2401ZM7.09989 17.2401C7.11965 17.7001 7.49506 18.0611 7.94951 18.0401C8.39407 18.0211 8.74973 17.6411 8.72997 17.1811C8.72009 16.7311 8.35456 16.3801 7.90999 16.3801C7.45554 16.4011 7.09989 16.7801 7.09989 17.2401ZM15.2404 13.6011C15.2404 13.1411 15.596 12.7711 16.0505 12.7611C16.4951 12.7611 16.8507 13.1201 16.8705 13.5611C16.8804 14.0211 16.5247 14.4011 16.0801 14.4101C15.6257 14.4201 15.2503 14.0701 15.2404 13.6111V13.6011Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.4"
                                        d="M3.00293 9.25699C3.01577 8.66999 3.06517 7.50499 3.15803 7.12999C3.63224 5.02099 5.24256 3.68099 7.54442 3.48999H16.4555C18.7376 3.69099 20.3677 5.03999 20.8419 7.12999C20.9338 7.49499 20.9832 8.66899 20.996 9.25699H3.00293Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M8.30465 6.59C8.73934 6.59 9.06535 6.261 9.06535 5.82V2.771C9.06535 2.33 8.73934 2 8.30465 2C7.86996 2 7.54395 2.33 7.54395 2.771V5.82C7.54395 6.261 7.86996 6.59 8.30465 6.59Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M15.6953 6.59C16.1201 6.59 16.456 6.261 16.456 5.82V2.771C16.456 2.33 16.1201 2 15.6953 2C15.2606 2 14.9346 2.33 14.9346 2.771V5.82C14.9346 6.261 15.2606 6.59 15.6953 6.59Z"
                                        fill="currentColor"></path>
                                </svg>
                                Nusuk
                            </a>
                            <a class="btn btn-sm btn-outline-warning rounded-pill mt-2 ml-2 fieldBtn" id="btn-lainnya"
                                onclick="showField('lainnya')">
                                <svg width="23" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M22 16.084V7.916C22 4.377 19.724 2 16.335 2H7.665C4.276 2 2 4.377 2 7.916V16.084C2 19.622 4.277 22 7.666 22H16.335C19.724 22 22 19.622 22 16.084Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M16.2792 11.1445L12.5312 7.37954C12.2492 7.09654 11.7502 7.09654 11.4672 7.37954L7.71918 11.1445C7.42718 11.4385 7.42818 11.9135 7.72218 12.2055C8.01618 12.4975 8.49018 12.4975 8.78318 12.2035L11.2502 9.72654V16.0815C11.2502 16.4965 11.5862 16.8315 12.0002 16.8315C12.4142 16.8315 12.7502 16.4965 12.7502 16.0815V9.72654L15.2162 12.2035C15.3632 12.3505 15.5552 12.4235 15.7482 12.4235C15.9392 12.4235 16.1312 12.3505 16.2772 12.2055C16.5702 11.9135 16.5712 11.4385 16.2792 11.1445Z"
                                        fill="currentColor"></path>
                                </svg>
                                Lainnya
                            </a>
                        </div>
                        <h4 class="card-title">Information</h4>
                        <small>Menu Informasi</small>
                    </div>
                    {{-- Haji Field --}}
                    <div class="card-body fieldArea" style="padding-left: 40px; padding-right:40px" id="haji">
                        <div class="row">
                            <div class="col-xl-7">
                                <div>
                                    <h4 for="">Hajj Waiting List ( Kemenag ) <a
                                            class="btn btn-sm btn-outline-warning rounded-pill mt-2 ml-2"
                                            onclick="getWaitingList()">
                                            Refresh
                                        </a> </h4>
                                </div>
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
                                <h4 for="">Hajj Depature Estimation </h4>
                                <br>
                                <div
                                    style="overflow: hidden; left: 0px; top: 0px;  width:454px; height:702px;  position: relatice">
                                    <div style="overflow: hidden; margin-top: -100px; margin-left: -25px;">
                                    </div>

                                    <iframe src="https://haji.kemenag.go.id/v5/?search=estimation" scrolling="no"
                                        style="height: 900px; border: 0; width: 450px; margin-top: -60px; margin-left: -24px; position: relative; z-index: 1;">
                                    </iframe>
                                    <div
                                        style="position: absolute; margin-top: -500px; width: 450px; height: 500px; background-color: rgba(255, 255, 255, 0); z-index: 2;">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{--  Nusuk Field --}}
                    <div class="card-body fieldArea" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                        data-iq-duration=".6" data-iq-delay=".6" data-iq-trigger="scroll" data-iq-ease="none"
                        style="padding-left: 40px; padding-right:40px" id="nusuk" hidden>
                        <style>
                            .imageNusuk {
                                border: 1px solid orange;
                                border-radius: 1.3rem;
                                background-size: 80%;
                                background-position: center;
                                background-repeat: no-repeat;
                                min-height: 200px;
                                padding-top: 10px;
                                filter: grayscale(60%);
                            }

                            .imageNusuk:hover {
                                cursor: pointer;
                                filter: grayscale(0);
                            }
                        </style>
                        <div>
                            <h4 for="">Paket List ( Nusuk ) <a
                                    class="btn btn-sm btn-outline-warning rounded-pill mt-2 ml-2"
                                    onclick="refreshNusuk()">
                                    Refresh
                                </a> </h4>
                        </div>
                        <div class="row" id="nusukDiv"></div>
                        <div class="text-center">
                            <a class="btn btn-sm btn-outline-primary rounded-pill mt-2 ml-2 " id="btnLoadMore" hidden
                                onclick="getNusukList()">
                                <svg width="23" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M10.8096 8.20248L10.4824 4.50325C10.4824 3.67308 11.1621 3 12.0003 3C12.8386 3 13.5182 3.67308 13.5182 4.50325L13.1911 8.20248C13.1911 8.85375 12.6579 9.38174 12.0003 9.38174C11.3416 9.38174 10.8096 8.85375 10.8096 8.20248Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M10.8698 20.6247C10.8115 20.5668 10.5647 20.3508 10.3598 20.1479C9.07656 18.9643 6.97815 15.8738 6.33596 14.2571C6.23352 14.0116 6.01542 13.3909 6 13.0582C6 12.7408 6.0738 12.4375 6.2192 12.1484C6.42299 11.7873 6.74463 11.4993 7.12355 11.34C7.38572 11.2386 8.17331 11.0793 8.18763 11.0793C9.04792 10.9211 10.4469 10.835 11.9934 10.835C13.465 10.835 14.8067 10.9211 15.6813 11.051C15.6967 11.0651 16.6738 11.2244 17.0086 11.3979C17.6211 11.7153 18 12.336 18 13.0004V13.0582C17.9857 13.4913 17.6057 14.4011 17.5924 14.4011C16.9502 15.9316 14.9532 18.949 13.6258 20.1621C13.6258 20.1621 13.2844 20.5047 13.0718 20.653C12.7656 20.8843 12.3866 20.9999 12.0077 20.9999C11.5847 20.9999 11.1915 20.8701 10.8698 20.6247Z"
                                        fill="currentColor"></path>
                                </svg>
                                Load more
                            </a>
                            <a class="btn btn-sm btn-outline-secondary rounded-pill mt-2 ml-2 " id="btnLoading" hidden>
                                <svg width="23" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M22 11.9998C22 17.5238 17.523 21.9998 12 21.9998C6.477 21.9998 2 17.5238 2 11.9998C2 6.47776 6.477 1.99976 12 1.99976C17.523 1.99976 22 6.47776 22 11.9998Z"
                                        fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.52075 10.8035C6.85975 10.8035 6.32275 11.3405 6.32275 11.9995C6.32275 12.6595 6.85975 13.1975 7.52075 13.1975C8.18175 13.1975 8.71875 12.6595 8.71875 11.9995C8.71875 11.3405 8.18175 10.8035 7.52075 10.8035ZM11.9999 10.8035C11.3389 10.8035 10.8019 11.3405 10.8019 11.9995C10.8019 12.6595 11.3389 13.1975 11.9999 13.1975C12.6609 13.1975 13.1979 12.6595 13.1979 11.9995C13.1979 11.3405 12.6609 10.8035 11.9999 10.8035ZM15.2813 11.9995C15.2813 11.3405 15.8183 10.8035 16.4793 10.8035C17.1403 10.8035 17.6773 11.3405 17.6773 11.9995C17.6773 12.6595 17.1403 13.1975 16.4793 13.1975C15.8183 13.1975 15.2813 12.6595 15.2813 11.9995Z"
                                        fill="currentColor"></path>
                                </svg>
                                Loading...
                            </a>
                        </div>

                    </div>

                    {{--  Lainnya Field --}}
                    <div class="card-body fieldArea" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                        data-iq-duration=".6" data-iq-delay=".6" data-iq-trigger="scroll" data-iq-ease="none"
                        style="padding-left: 40px; padding-right:40px" id="lainnya" hidden>
                        No Data Updated Yet
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="nusukModal" {{-- data-bs-backdrop="static" --}} data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <style>
                        #imgNusukModal {
                            background-size: 100%;
                            background-position: center;
                            background-repeat: no-repeat;
                            background-color: rgb(211, 211, 211);
                            min-height: 400px;
                            height: 100%;
                        }
                    </style>
                    <div class="row">
                        <div class="col-xl-6">
                            <div id="imgNusukModal"> </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="float-end">
                                <a class="btn btn-sm btn-warning rounded-pill" id="nusukType"></a>
                            </div>
                            <h4 class="card-title" id="nusukTitle"></h4>
                            <hr>
                            <div class="overflow-auto" id="nusukModalVal"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/money.js/0.2.0/money.min.js"></script>

    <script>
        const rates = {
            "SAR": 1, // Mengatur SAR sebagai basis
            "IDR": parseFloat('<?= $idrToSar ?>') // Nilai kurs 1 SAR ke IDR
        };
        fx.base = "SAR";
        fx.rates = rates;

        var sArray = [];
        $(document).ready(function() {
            getWaitingList()
            // getTekomsel()
            getNusukList()
        })

        function getWaitingList() {
            $.ajax({
                url: "https://haji.kemenag.go.id/v5/page-data/index/page-data.json?search=waiting-list",
                method: 'GET',

                success: function(res) {
                    data = res.result.serverData.additionalSearchData.Data
                    sArray = data
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

        function showField(name) {
            if (name) {
                $('.fieldBtn').removeClass('btn-primary')
                $('.fieldBtn').addClass('btn-outline-warning')
                $('.fieldArea').attr('hidden', true)

                $('#btn-' + name).addClass('btn-primary')
                $('#btn-' + name).removeClass('btn-outline-warning')
                $('#' + name).attr('hidden', false)
            }
        }

        let nusukNo = 0
        let pageLimit = 6
        let nusukData = [];

        function getNusukList() {
            $('#btnLoadMore').attr('hidden', true)
            $('#btnLoading').attr('hidden', false)
            $.ajax({
                url: "<?= url('info/getNusukPackages') ?>",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    pageLimit: pageLimit,
                    nusukNo: nusukNo
                },
                success: function(res) {

                    var nusukDiv = '';

                    res.data.forEach(item => {
                        nusukData.push(item)
                        nusukDiv += `
                          <div class="col-md-4 col-xl-3" style="padding:10px">
                            <div class="imageNusuk"
                                style="background-image: url('https://www.nusuk.sa${item.attributes.Partner_Logo.data.attributes.url}'); padding: 5px" onclick="nusukModal(${item.id})">
                                <a class="badge rounded-pill bg-primary">${item.attributes.Nights} Malam</a>
                                <a class="badge rounded-pill bg-primary">${item.attributes.Price} SAR</a>
                                <div class="text-center text-primary"  style="margin-top: 100px; word-wrap: break-word; margin-bottom: 10px;">
                                    <h5 style="text-shadow: 2px 2px white;">
                                    ${item.attributes.Title}</h5>
                                    <small style="text-shadow: 1px 1px black;"><b>${item.attributes.Company_Name}</b> </small>
                                </div>
                            </div>
                          </div>
                            `
                    });
                    $('#nusukDiv').append(nusukDiv)
                    $('#btnLoading').attr('hidden', true)

                    if (parseInt(res.meta.pagination.total) > parseInt(nusukNo)) {
                        $('#btnLoadMore').attr('hidden', false);
                    } else {
                        $('#btnLoadMore').attr('hidden', true);
                    }



                    nusukNo = parseInt(nusukNo) + parseInt(pageLimit)

                },
                error: function(xhr, status, error) {
                    Toast.fire({
                        icon: "error",
                        title: JSON.parse(xhr.responseText).error
                    });

                }
            });
        }

        function refreshNusuk() {
            nusukNo = 0;
            $('#nusukDiv').html('')
            getNusukList()
        }

        function nusukModal(id) {
            console.log(nusukData)
            var index = nusukData.findIndex(function(item) {
                return item.id == id;
            });
            if (index !== -1) {
                var iData = nusukData[index]
                console.log(iData)
                $('#imgNusukModal').attr('style',
                    `background-image: url('https://www.nusuk.sa${iData.attributes.Image.data.attributes.url}');`
                )

                $('#nusukType').html(iData.attributes.Package_Type.data.attributes.Name)
                $('#nusukTitle').html(iData.attributes.Title)

                var includes = ''
                var excludes = ''
                let icl = 0
                iData.attributes.Additional_Package_Inclusions.split("- ").forEach(item => {
                    if (icl > 0) {
                        includes += `<span class="text-success">✔</span> ${item} <br>`
                    }
                    icl = 1
                })
                let ict = 0
                iData.attributes.Not_Included.split("- ").forEach(item => {
                    if (ict > 0) {
                        excludes += `<span class="text-danger">✘</span> ${item} <br>`
                    }
                    ict = 1
                })

                var sosmed = ''

                iData.attributes.Social_Media.forEach(item => {
                    var lType = item.Type.data.attributes.Link_Type.toLowerCase();
                    var lIcon = item.Type.data.attributes.Image.data.attributes.url;
                    var lTitle = item.Type.data.attributes.Title;
                    sosmed += `
                    <div class="col-md-4">
                        <a class="btn btn-outline-primary rounded-pill text-center" style="width:100%; word-wrap: break-word;" target="_blank" href="${ lType == "phone" ?'tel:' : (lType == 'email' || lType == 'mail' ? 'mailto:' : '') }${item.Link}">
                            <img src="https://www.nusuk.sa${lIcon}" width="20px"><br> <span style="font-size:8px" >${ lType == "phone" ? item.Link : lTitle}</span>
                            </a>
                    </div>
                    `
                })

                let nPrice = new Intl.NumberFormat("de-DE").format(parseFloat(iData.attributes.Price))

                let amountInIDR = fx.convert(parseFloat(iData.attributes.Price), {
                    from: "SAR",
                    to: "IDR"
                });

                // Outputhasil

                var n = `
                <h5>
                    <b>Package Provider :</b> <br>
                    <span class="text-primary">${iData.attributes.Company_Name}</span>
                </h5>
                <br>
                <p>
                    <span class="text-primary">Descriptiton :</span><br>
                    ${iData.attributes.Description}
                </p>
                <div style="background-color:rgb(245, 245, 245); margin: 15px; padding: 20px; ">
                    <h5 class="text-primary">Included :</h5>
                    ${includes}
                    <br>
                    <h5 class="text-primary">Excluded :</h5>
                    ${excludes}
                </div>
                <br>
                <h4>Price:</h4>
                <h3 class="text-primary">${nPrice} SAR / ${amountInIDR.toLocaleString("id-ID", {
                            style: "currency",
                            currency: "IDR"
                        })} </h3>
              <p class="text-warning"> (Kurs : IDR <?= number_format($idrToSar, 2) ?>) </small>
                <p>${iData.attributes.Price_Per_Person ? 'Per': iData.attributes.Price_Per_Person} Person ${iData.attributes.Visa_Included || iData.attributes.Vat_Included ? '(' : ''}  ${iData.attributes.Visa_Included ? '' : 'Visa Excluded'} ${iData.attributes.Visa_Included && iData.attributes.Vat_Included ? '&' : ''} ${iData.attributes.Vat_Included ? '' : 'Visa Excluded'} ${iData.attributes.Visa_Included || iData.attributes.Vat_Included ? ')' : ''}</p>
                <div class="row" style="width:100%; overflow-x: hidden">${sosmed}</div>
                `
                $('#nusukModalVal').html(n);
                showModal('nusukModal')
            }

        }
    </script>
@endsection
