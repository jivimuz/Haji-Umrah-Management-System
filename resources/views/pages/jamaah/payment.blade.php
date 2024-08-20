<div class="row  bg-soft-warning p-4">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="card-header">
                    <div class="float-end">
                        <a class="btn btn-sm btn-outline-warning rounded-pill mt-2 ml-2"
                            onclick="openPopup(`{{ url('print/jamaahInfo') }}/${encodeURIComponent(btoa('{{ $id }}'.toString()))}`)">
                            <svg width="23" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M16.8843 5.11485H13.9413C13.2081 5.11969 12.512 4.79355 12.0474 4.22751L11.0782 2.88762C10.6214 2.31661 9.9253 1.98894 9.19321 2.00028H7.11261C3.37819 2.00028 2.00001 4.19201 2.00001 7.91884V11.9474C1.99536 12.3904 21.9956 12.3898 21.9969 11.9474V10.7761C22.0147 7.04924 20.6721 5.11485 16.8843 5.11485Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.8321 6.54353C21.1521 6.91761 21.3993 7.34793 21.5612 7.81243C21.8798 8.76711 22.0273 9.77037 21.9969 10.7761V16.0292C21.9956 16.4717 21.963 16.9135 21.8991 17.3513C21.7775 18.1241 21.5057 18.8656 21.0989 19.5342C20.9119 19.8571 20.6849 20.1553 20.4231 20.4215C19.2383 21.5089 17.665 22.0749 16.0574 21.9921H7.93061C6.32049 22.0743 4.74462 21.5086 3.55601 20.4215C3.2974 20.1547 3.07337 19.8566 2.88915 19.5342C2.48475 18.8661 2.21869 18.1238 2.1067 17.3513C2.03549 16.9142 1.99981 16.4721 2 16.0292V10.7761C1.99983 10.3374 2.02357 9.89902 2.07113 9.46288C2.08113 9.38636 2.09614 9.31109 2.11098 9.23659C2.13573 9.11241 2.16005 8.99038 2.16005 8.86836C2.25031 8.34204 2.41496 7.83116 2.64908 7.35101C3.34261 5.86916 4.76525 5.11492 7.09481 5.11492H16.8754C18.1802 5.01401 19.4753 5.4068 20.5032 6.21522C20.6215 6.3156 20.7316 6.4254 20.8321 6.54353ZM6.97033 15.5412H17.0355H17.0533C17.2741 15.5507 17.4896 15.4717 17.6517 15.3217C17.8137 15.1716 17.9088 14.963 17.9157 14.7425C17.9282 14.5487 17.8644 14.3577 17.7379 14.2101C17.5924 14.0118 17.3618 13.8935 17.1155 13.8907H6.97033C6.51365 13.8907 6.14343 14.2602 6.14343 14.7159C6.14343 15.1717 6.51365 15.5412 6.97033 15.5412Z"
                                    fill="currentColor"></path>
                            </svg>
                            Print Information
                        </a>
                    </div>
                    <h4 class="card-title">Payment Information</h4>
                    <small>Informasi Pembayaran</small>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6" style="border-right: 1px solid grey">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="float-end"> : </div>
                                    <label for="">Nama Jamaah </label>
                                </div>
                                <div class="col-md-8">
                                    <label for=""><b>{{ $data->nama }}</b> </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6" style="border-right: 1px solid grey">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="float-end"> : </div>
                                    <label for="">Tipe </label>
                                </div>
                                <div class="col-md-8">
                                    <label for="">{{ $data->type }} </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6" style="border-right: 1px solid grey">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="float-end"> : </div>
                                    <label for="">No Ktp </label>
                                </div>
                                <div class="col-md-8">
                                    <label for="">{{ $data->no_ktp }} </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6" style="border-right: 1px solid grey">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="float-end"> : </div>
                                    <label for="">Paket </label>
                                </div>
                                <div class="col-md-8">
                                    <label for="">{{ $data->paket }} </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6" style="border-right: 1px solid grey">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="float-end"> : </div>
                                    <label for="">Passport </label>
                                </div>
                                <div class="col-md-8">
                                    <label for="">{{ $data->no_passport ?: '-' }} </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6" style="border-right: 1px solid grey">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="float-end"> : </div>
                                    <label for="">Program </label>
                                </div>
                                <div class="col-md-8">
                                    <label for="">{{ $data->program ?: '-' }} </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6" style="border-right: 1px solid grey">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="float-end"> : </div>
                                    <label for="">Tgl DP </label>
                                </div>
                                <div class="col-md-8">
                                    <label
                                        for="">{{ $data->firstpaid_date ? date('d-m-Y', strtotime($data->firstpaid_date)) : '-' }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6" style="border-right: 1px solid grey">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="float-end"> : </div>
                                    <label for="">Harga Paket </label>
                                </div>
                                <div class="col-md-8">
                                    <label for="">Rp {{ number_format($data->price ?: 0, 2) }} </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6" style="border-right: 1px solid grey">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="float-end"> : </div>
                                    <label for="">Tgl Pelunasan </label>
                                </div>
                                <div class="col-md-8">
                                    <label
                                        for="">{{ $data->donepaid_date ? date('d-m-Y', strtotime($data->donepaid_date)) : '-' }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6" style="border-right: 1px solid grey">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="float-end"> : </div>
                                    <label for="">Discount </label>
                                </div>
                                <div class="col-md-8">
                                    <label for="">Rp {{ number_format($data->discount ?: 0, 2) }} </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6" style="border-right: 1px solid grey">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="float-end"> : </div>
                                    <label for="">Alamat </label>
                                </div>
                                <div class="col-md-8">
                                    <label for="" class="text-success">
                                        {{ $data->alamat ?: '-' }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6" style="border-right: 1px solid grey">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="float-end"> : </div>
                                    <label for="">Terbayar </label>
                                </div>
                                <div class="col-md-8">
                                    <label for="" class="text-success">Rp
                                        {{ number_format($data->paid ?: 0, 2) }} </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6" style="border-right: 1px solid grey">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="float-end"> : </div>
                                    <label for="">Status </label>
                                </div>
                                <div class="col-md-8">
                                    @php
                                        if ($data->is_done) {
                                            $badgeClass = 'bg-success';
                                            $badgeText = 'Lunas';
                                        } elseif ($data->is_firstpaid) {
                                            $badgeClass = 'bg-primary';
                                            $badgeText = 'Kurang Bayar';
                                        } else {
                                            $badgeClass = 'bg-warning';
                                            $badgeText = 'Belum Bayar';
                                        }
                                    @endphp

                                    <label for="" class="text-success">
                                        <span
                                            class="badge rounded-pill {{ $badgeClass }}">{{ $badgeText }}</span>
                                    </label>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6" style="border-right: 1px solid grey">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="float-end"> : </div>
                                    <label for="">Biaya Lain-lain </label>
                                </div>
                                <div class="col-md-8">
                                    <a class="btn btn-sm btn-outline-dark rounded-pill"
                                        onclick="morePayment({{ $data->id }})">Rp
                                        {{ number_format($data->morepayment ?: 0, 2) }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6" style="border-right: 1px solid grey">
                        </div>
                        <div class="col-xl-6" style="border-right: 1px solid grey">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="float-end"> : </div>
                                    <label for="">Sisa </label>
                                </div>
                                <div class="col-md-8">
                                    <label for="" class="text-danger">Rp
                                        {{ number_format($data->price - $data->discount + $data->morepayment - $data->paid ?: 0, 2) }}
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Payment History</h4>
                    <small>Riwayat Pembayaran</small>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" style="width: 100%" id="sec-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Paid at</th>
                                    <th>Paket</th>
                                    <th>Nominal</th>
                                    <th>remark</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="float-end">
    <a class="btn btn-sm btn-outline-warning rounded-pill" onclick="closeModal('ThisModal')">

        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16.8397 20.1642V6.54639" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round"></path>
            <path d="M20.9173 16.0681L16.8395 20.1648L12.7617 16.0681" stroke="currentColor" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M6.91102 3.83276V17.4505" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round"></path>
            <path d="M2.8335 7.92894L6.91127 3.83228L10.9891 7.92894" stroke="currentColor" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
        Close
    </a>

</div>
@include('component/submodal')

<script>
    $(document).ready(function() {

        let noc = 1
        const Ccolumns = [{
                data: "id",
                render: function(data, b, c) {

                    return `${noc++}.`
                },
                className: 'text-center'
            },
            {
                data: "paid_at",
            },

            {
                data: "paket",
            },

            {
                data: "nominal",
                render: function(data, b, c) {
                    return parseFloat(data).toLocaleString("id-ID", {
                        style: "currency",
                        currency: "IDR"
                    });
                },
                className: 'text-end'
            },
            {
                data: "remark",
            },
            {
                data: "nominal",
                render: function(data, b, c) {
                    // return "<span class='badge rounded-pill bg-success'>Success</span>"
                    var a = '';
                    if (c.void_by) {
                        a += "<span class='badge rounded-pill bg-danger'>Canceled</span>"
                    } else {
                        a += parseFloat(data) <= 0 ?
                            "<span class='badge rounded-pill bg-warning'>Out</span>" :
                            "<span class='badge rounded-pill bg-success'>In</span>"
                    }
                    return a
                },
            },

        ]

        var tablec = $('#sec-table').DataTable({
            searching: true,
            destroy: true,
            lengthChange: false,
            responsive: true,
            pageLength: 5,
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{ url('jamaah/getListPayment') }}",
                type: "POST",
                data: {
                    id: {{ $id }}
                }

            },
            columns: Ccolumns,
        });
    })
</script>
