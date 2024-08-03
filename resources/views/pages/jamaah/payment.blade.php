<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped" style="width: 100%" id="sec-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Paid at</th>
                        <th>Paket</th>
                        <th>Nominal</th>
                        <th>remark</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
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
                data: "remark",
            },
            {
                data: "nominal",
                render: function(data, b, c) {
                    return data.toLocaleString("id-ID", {
                        style: "currency",
                        currency: "IDR"
                    });
                },
            },
            {
                data: "nominal",
                render: function(data, b, c) {
                    // return "<span class='badge rounded-pill bg-success'>Success</span>"
                    return parseFloat(data) <= 0 ?
                        "<span class='badge rounded-pill bg-danger'>Refund</span>" :
                        "<span class='badge rounded-pill bg-success'>Payment</span>"
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
