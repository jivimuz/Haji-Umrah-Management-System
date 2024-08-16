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
                            <a class="btn btn-sm btn-outline-primary rounded-pill mt-2 ml-2" onclick="addModal()">
                                <svg width="23" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5026 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0453C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.298 9.012 20.0465 9.013C19.6247 9.016 19.1168 9.021 18.8088 9.021Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.4"
                                        d="M16.0842 2.56737C15.7852 2.25637 15.2632 2.47037 15.2632 2.90137V5.53837C15.2632 6.64437 16.1742 7.55437 17.2792 7.55437C17.9772 7.56237 18.9452 7.56437 19.7672 7.56237C20.1882 7.56137 20.4022 7.05837 20.1102 6.75437C19.0552 5.65737 17.1662 3.69137 16.0842 2.56737Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M14.3672 12.2364H12.6392V10.5094C12.6392 10.0984 12.3062 9.7644 11.8952 9.7644C11.4842 9.7644 11.1502 10.0984 11.1502 10.5094V12.2364H9.4232C9.0122 12.2364 8.6792 12.5704 8.6792 12.9814C8.6792 13.3924 9.0122 13.7264 9.4232 13.7264H11.1502V15.4524C11.1502 15.8634 11.4842 16.1974 11.8952 16.1974C12.3062 16.1974 12.6392 15.8634 12.6392 15.4524V13.7264H14.3672C14.7782 13.7264 15.1122 13.3924 15.1122 12.9814C15.1122 12.5704 14.7782 12.2364 14.3672 12.2364Z"
                                        fill="currentColor"></path>
                                </svg>
                                Add Payment
                            </a>

                            <a class="btn btn-sm btn-outline-danger rounded-pill mt-2 ml-2" onclick="outTransaction()">
                                <svg width="23" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M18.8089 9.021C18.3574 9.021 17.7594 9.011 17.0149 9.011C15.199 9.011 13.7059 7.508 13.7059 5.675V2.459C13.7059 2.206 13.503 2 13.2525 2H7.96337C5.49604 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59109 22 8.1703 22H16.0455C18.5059 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.298 9.012 20.0465 9.013C19.6238 9.016 19.1168 9.021 18.8089 9.021Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.4"
                                        d="M16.0842 2.56737C15.7862 2.25637 15.2632 2.47037 15.2632 2.90137V5.53837C15.2632 6.64437 16.1742 7.55437 17.2802 7.55437C17.9772 7.56237 18.9452 7.56437 19.7672 7.56237C20.1882 7.56137 20.4022 7.05837 20.1102 6.75437C19.0552 5.65737 17.1662 3.69137 16.0842 2.56737Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M12.9349 12.9854L14.1559 11.7634C14.4469 11.4734 14.4469 11.0024 14.1559 10.7114C13.8649 10.4204 13.3939 10.4204 13.1029 10.7114L11.8819 11.9314L10.6609 10.7114C10.3699 10.4204 9.89792 10.4204 9.60692 10.7114C9.31592 11.0024 9.31592 11.4734 9.60692 11.7634L10.8289 12.9854L9.60692 14.2064C9.31592 14.4974 9.31592 14.9684 9.60692 15.2584C9.75292 15.4044 9.94292 15.4774 10.1339 15.4774C10.3249 15.4774 10.5149 15.4044 10.6609 15.2584L11.8819 14.0384L13.1029 15.2584C13.2479 15.4044 13.4389 15.4774 13.6299 15.4774C13.8199 15.4774 14.0109 15.4044 14.1559 15.2584C14.4469 14.9684 14.4469 14.4974 14.1559 14.2064L12.9349 12.9854Z"
                                        fill="currentColor"></path>
                                </svg>
                                Out Payment
                            </a>
                        </div>
                        <h4 class="card-title">Payment</h4>
                        <small>List of Payment History</small>
                    </div>
                    <div class="row p-4">

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Income (Per-Month)</label>
                                <h4 id="income" class="text-success">Rp.</h4>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Expense (Per-Month)</label>
                                <h4 id="expense" class="text-danger">Rp.</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Total (Per-Month)</label>
                                <h4 id="ttotal" style="text-decoration-line: underline">Rp.</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Month</label>
                                <input type="month" class="form-control" id="month" value="{{ date('Y-m') }}"
                                    max="{{ date('Y-m') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">&nbsp;</label>
                                <p>
                                    <a class="btn btn-sm rounded-pill mt-2 ml-2 btn-outline-warning"
                                        onclick="openPopup('{{ url('print/monthlyReport?month=') }}'+$('#month').val())">
                                        <svg width="23" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M16.8843 5.11485H13.9413C13.2081 5.11969 12.512 4.79355 12.0474 4.22751L11.0782 2.88762C10.6214 2.31661 9.9253 1.98894 9.19321 2.00028H7.11261C3.37819 2.00028 2.00001 4.19201 2.00001 7.91884V11.9474C1.99536 12.3904 21.9956 12.3898 21.9969 11.9474V10.7761C22.0147 7.04924 20.6721 5.11485 16.8843 5.11485Z"
                                                fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M20.8321 6.54353C21.1521 6.91761 21.3993 7.34793 21.5612 7.81243C21.8798 8.76711 22.0273 9.77037 21.9969 10.7761V16.0292C21.9956 16.4717 21.963 16.9135 21.8991 17.3513C21.7775 18.1241 21.5057 18.8656 21.0989 19.5342C20.9119 19.8571 20.6849 20.1553 20.4231 20.4215C19.2383 21.5089 17.665 22.0749 16.0574 21.9921H7.93061C6.32049 22.0743 4.74462 21.5086 3.55601 20.4215C3.2974 20.1547 3.07337 19.8566 2.88915 19.5342C2.48475 18.8661 2.21869 18.1238 2.1067 17.3513C2.03549 16.9142 1.99981 16.4721 2 16.0292V10.7761C1.99983 10.3374 2.02357 9.89902 2.07113 9.46288C2.08113 9.38636 2.09614 9.31109 2.11098 9.23659C2.13573 9.11241 2.16005 8.99038 2.16005 8.86836C2.25031 8.34204 2.41496 7.83116 2.64908 7.35101C3.34261 5.86916 4.76525 5.11492 7.09481 5.11492H16.8754C18.1802 5.01401 19.4753 5.4068 20.5032 6.21522C20.6215 6.3156 20.7316 6.4254 20.8321 6.54353ZM6.97033 15.5412H17.0355H17.0533C17.2741 15.5507 17.4896 15.4717 17.6517 15.3217C17.8137 15.1716 17.9088 14.963 17.9157 14.7425C17.9282 14.5487 17.8644 14.3577 17.7379 14.2101C17.5924 14.0118 17.3618 13.8935 17.1155 13.8907H6.97033C6.51365 13.8907 6.14343 14.2602 6.14343 14.7159C6.14343 15.1717 6.51365 15.5412 6.97033 15.5412Z"
                                                fill="currentColor"></path>
                                        </svg>
                                        Print Report
                                    </a>
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="card-body" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                        data-iq-duration=".6" data-iq-delay=".6" data-iq-trigger="scroll" data-iq-ease="none"
                        style="padding-left: 40px; padding-right:40px">


                        <div class="table-responsive">
                            <table class="table table-striped" id="main-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Paid at</th>
                                        <th>Name</th>
                                        <th>Paket</th>
                                        <th>remark</th>
                                        <th>Nominal</th>
                                        <th>Type</th>
                                        <th>-</th>
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
    @include('component/modal-full')
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            getList()
            var table = $('#main-table').DataTable();
        })
        $('#month').on('change', function() {
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
                    data: "paid_at",
                },
                {
                    data: "jamaah",
                    render: function(data, b, c) {
                        return data ?? (c.agen ?? 'System')
                    },
                },

                {
                    data: "paket",
                    render: function(data, b, c) {
                        return data ?? '-'
                    },
                },
                {
                    data: "remark",
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

                {
                    width: '50px',
                    data: "id",
                    render: function(data, b, c) {
                        var url = "<?= url('print/kwitansi') ?>/" + encodeURIComponent(btoa(data.toString()))
                        var a = ''
                        if (!c.void_by) {
                            a += `<a  class="btn btn-sm btn-outline-primary rounded-pill " onclick="openPopup('${url}')">
                                    <svg width="23" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M16.8843 5.11485H13.9413C13.2081 5.11969 12.512 4.79355 12.0474 4.22751L11.0782 2.88762C10.6214 2.31661 9.9253 1.98894 9.19321 2.00028H7.11261C3.37819 2.00028 2.00001 4.19201 2.00001 7.91884V11.9474C1.99536 12.3904 21.9956 12.3898 21.9969 11.9474V10.7761C22.0147 7.04924 20.6721 5.11485 16.8843 5.11485Z" fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8321 6.54353C21.1521 6.91761 21.3993 7.34793 21.5612 7.81243C21.8798 8.76711 22.0273 9.77037 21.9969 10.7761V16.0292C21.9956 16.4717 21.963 16.9135 21.8991 17.3513C21.7775 18.1241 21.5057 18.8656 21.0989 19.5342C20.9119 19.8571 20.6849 20.1553 20.4231 20.4215C19.2383 21.5089 17.665 22.0749 16.0574 21.9921H7.93061C6.32049 22.0743 4.74462 21.5086 3.55601 20.4215C3.2974 20.1547 3.07337 19.8566 2.88915 19.5342C2.48475 18.8661 2.21869 18.1238 2.1067 17.3513C2.03549 16.9142 1.99981 16.4721 2 16.0292V10.7761C1.99983 10.3374 2.02357 9.89902 2.07113 9.46288C2.08113 9.38636 2.09614 9.31109 2.11098 9.23659C2.13573 9.11241 2.16005 8.99038 2.16005 8.86836C2.25031 8.34204 2.41496 7.83116 2.64908 7.35101C3.34261 5.86916 4.76525 5.11492 7.09481 5.11492H16.8754C18.1802 5.01401 19.4753 5.4068 20.5032 6.21522C20.6215 6.3156 20.7316 6.4254 20.8321 6.54353ZM6.97033 15.5412H17.0355H17.0533C17.2741 15.5507 17.4896 15.4717 17.6517 15.3217C17.8137 15.1716 17.9088 14.963 17.9157 14.7425C17.9282 14.5487 17.8644 14.3577 17.7379 14.2101C17.5924 14.0118 17.3618 13.8935 17.1155 13.8907H6.97033C6.51365 13.8907 6.14343 14.2602 6.14343 14.7159C6.14343 15.1717 6.51365 15.5412 6.97033 15.5412Z" fill="currentColor"></path>
                                        </svg>
                                               </a>`

                            <?php if(auth()->user()->id == 1){?>
                            a += ` <a class="btn btn-sm btn-outline-warning rounded-pill " onclick="cancelPayment(${data})">

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
                                Cancel
                            </a>`
                            <?php }?>
                        }
                        return a
                    },
                },
            ]

            var tabled = $('#main-table').DataTable({
                searching: true,
                destroy: true,
                lengthChange: false,
                responsive: true,
                // pageLength: 2,
                ajax: {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: "{{ url('payment/getList') }}",
                    type: "POST",
                    data: {
                        month: $('#month').val()
                    }

                },
                columns: columns,
                initComplete: function(data, json) {
                    let td = 0;
                    let tp = 0;
                    let tt = 0;

                    json.data.forEach(item => {
                        const nominal = parseFloat(item.nominal);
                        if (!item.void_by) {
                            if (nominal > 0) {
                                td += nominal;
                            } else {
                                tp += nominal;
                            }
                            tt += nominal;
                        }

                    });


                    $('#income').html(parseFloat(td).toLocaleString("id-ID", {
                        style: "currency",
                        currency: "IDR"
                    }))
                    $('#expense').html(parseFloat(tp).toLocaleString("id-ID", {
                        style: "currency",
                        currency: "IDR"
                    }))
                    $('#ttotal').html(parseFloat(tt).toLocaleString("id-ID", {
                        style: "currency",
                        currency: "IDR"
                    }))
                }
            });

        }


        function addModal() {
            $.ajax({
                url: "{{ url('payment/add') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#ThisModalLabel').html("Payment Transaction")
                    $('#thisModalBody').html(data)
                    $('#ThisModal').modal('show')
                },
                error: function(xhr, status, error) {
                    Toast.fire({
                        icon: "error",
                        title: JSON.parse(xhr.responseText).error
                    });

                }
            });
        }

        function outTransaction() {
            $.ajax({
                url: "{{ url('payment/outTransaction') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#ThisModalLabel').html("Out Payment")
                    $('#thisModalBody').html(data)
                    $('#ThisModal').modal('show')
                },
                error: function(xhr, status, error) {
                    Toast.fire({
                        icon: "error",
                        title: JSON.parse(xhr.responseText).error
                    });

                }
            });
        }

        <?php if(auth()->user()->id == 1){?>

        function cancelPayment(id) {
            Swal.fire({
                title: "Anda yakin?",
                text: "Transaksi akan dibatalkan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('payment/cancelPayment') }}",
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            id: id
                        },
                        success: function(data) {
                            getList()
                            Toast.fire({
                                icon: "success",
                                title: "Transaction Canceled"
                            });
                        },
                        error: function(xhr, status, error) {
                            Toast.fire({
                                icon: "error",
                                title: JSON.parse(xhr.responseText).error
                            });

                        }
                    });
                }
            });
        }
        <?php }?>
    </script>
@endsection
