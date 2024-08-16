<div class="form-group ">
    <label for="">Fee Yang Belum Cair: <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="unpaid" placeholder="0" inputmode="numeric" maxlength="50" readonly>
</div>
<hr>
<label for="">List Fee (Per Paket):</label>
<div class="table-responsive">
    <table class="table table-striped" style="width: 100%" id="pct-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Paket</th>
                <th>Jamaah</th>
                <th>Unpaid Fee</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<hr>
<label for="">History Fee :</label>
<div class="table-responsive">
    <table class="table table-striped" style="width: 100%" id="htf-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Paid at</th>
                <th>Nominal</th>
                <th>remark</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<hr>

<script>
    $(document).ready(function() {

        let noc = 1
        const Ccolumns = [{
                data: "agen_id",
                render: function(data, b, c) {

                    return `${noc++}.`
                },
                className: 'text-center'
            },

            {
                data: "paket",
            },
            {
                data: "tjamaah",
            },

            {
                data: "fee",
                render: function(data, b, c) {
                    return (parseFloat(data) + parseFloat(c.paidFee)).toLocaleString("id-ID", {
                        style: "currency",
                        currency: "IDR"
                    });
                },
            },
        ]

        var tablec = $('#pct-table').DataTable({
            searching: true,
            destroy: true,
            lengthChange: false,
            responsive: true,
            pageLength: 5,
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{ url('payment/getAgenFee') }}",
                type: "POST",
                data: {
                    id: <?= $id ?>
                }

            },
            columns: Ccolumns,
            initComplete: function(settings, json) {
                let tfee = 0;
                json.data.map((item) => {
                    tfee = parseFloat(tfee) + (parseFloat(item.fee) + parseFloat(item
                        .paidFee))
                })
                $('#unpaid').val(tfee.toLocaleString("id-ID", {
                    style: "currency",
                    currency: "IDR"
                }))


            },
        });

        // table 2

        let nod = 1
        const Dcolumns = [{
                data: "agen_id",
                render: function(data, b, c) {

                    return `${nod++}.`
                },
                className: 'text-center'
            },

            {
                data: "paid_at",
            },


            {
                data: "nominal",
                render: function(data, b, c) {
                    return parseFloat(data).toLocaleString("id-ID", {
                        style: "currency",
                        currency: "IDR"
                    });
                },
            },
            {
                data: "remark",
            },
        ]

        var tabled = $('#htf-table').DataTable({
            searching: true,
            destroy: true,
            lengthChange: false,
            responsive: true,
            pageLength: 5,
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{ url('payment/getAgenHistory') }}",
                type: "POST",
                data: {
                    id: <?= $id ?>
                }

            },
            columns: Dcolumns,
        });
    })
</script>
