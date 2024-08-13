<input type="number" hidden id="is_refund" value="1">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Nama Jamaah: <span class="text-danger">*</span></label>
            <select id="jamaah" class="form-control select2modal " style="width: 100%">
                <option value="" disabled selected>Select</option>
                @foreach ($jamaah as $i)
                    <option value="{{ $i->id }}" jname="{{ $i->nama }}">Nama: {{ $i->nama }} ||
                        KTP:
                        {{ $i->no_ktp }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group isHide" hidden>
            <label for="">Nominal Refund: <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="nominal" placeholder="Nominal Refund" inputmode="numeric"
                maxlength="50">
        </div>
        <div class="form-group isHide" hidden>
            <label for="">Remark: <span class="text-danger">*</span></label>
            <select id="remark" class="form-control  " style="width: 100%">
                <option value="" disabled selected>Select or Add</option>
                <option value="Pembatalan telat bayar">Pembatalan telat bayar</option>
                <option value="Pembatalan dari jamaah">Pembatalan dari jamaah</option>

            </select>
        </div>
    </div>
    <div class="col-md-6 isHide" hidden>
        <div class="table-responsive">
            <table class="table table-striped" style="width: 100%" id="sec-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Paid at</th>
                        <th>Paket</th>
                        <th>Nominal</th>
                        <th>remark</th>
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
        Cancel
    </a>
    <a class="btn btn-sm btn-outline-success rounded-pill isHide" hidden id="saveData" onclick="pushData()">
        Save
        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M21.4274 2.5783C20.9274 2.0673 20.1874 1.8783 19.4974 2.0783L3.40742 6.7273C2.67942 6.9293 2.16342 7.5063 2.02442 8.2383C1.88242 8.9843 2.37842 9.9323 3.02642 10.3283L8.05742 13.4003C8.57342 13.7163 9.23942 13.6373 9.66642 13.2093L15.4274 7.4483C15.7174 7.1473 16.1974 7.1473 16.4874 7.4483C16.7774 7.7373 16.7774 8.2083 16.4874 8.5083L10.7164 14.2693C10.2884 14.6973 10.2084 15.3613 10.5234 15.8783L13.5974 20.9283C13.9574 21.5273 14.5774 21.8683 15.2574 21.8683C15.3374 21.8683 15.4274 21.8683 15.5074 21.8573C16.2874 21.7583 16.9074 21.2273 17.1374 20.4773L21.9074 4.5083C22.1174 3.8283 21.9274 3.0883 21.4274 2.5783Z"
                fill="currentColor"></path>
            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                d="M3.01049 16.8079C2.81849 16.8079 2.62649 16.7349 2.48049 16.5879C2.18749 16.2949 2.18749 15.8209 2.48049 15.5279L3.84549 14.1619C4.13849 13.8699 4.61349 13.8699 4.90649 14.1619C5.19849 14.4549 5.19849 14.9299 4.90649 15.2229L3.54049 16.5879C3.39449 16.7349 3.20249 16.8079 3.01049 16.8079ZM6.77169 18.0003C6.57969 18.0003 6.38769 17.9273 6.24169 17.7803C5.94869 17.4873 5.94869 17.0133 6.24169 16.7203L7.60669 15.3543C7.89969 15.0623 8.37469 15.0623 8.66769 15.3543C8.95969 15.6473 8.95969 16.1223 8.66769 16.4153L7.30169 17.7803C7.15569 17.9273 6.96369 18.0003 6.77169 18.0003ZM7.02539 21.5683C7.17139 21.7153 7.36339 21.7883 7.55539 21.7883C7.74739 21.7883 7.93939 21.7153 8.08539 21.5683L9.45139 20.2033C9.74339 19.9103 9.74339 19.4353 9.45139 19.1423C9.15839 18.8503 8.68339 18.8503 8.39039 19.1423L7.02539 20.5083C6.73239 20.8013 6.73239 21.2753 7.02539 21.5683Z"
                fill="currentColor"></path>
        </svg>
    </a>
</div>
<script>
    $('.select2modal').select2({
        dropdownParent: $('#ThisModal')
    });
    $('#remark').select2({
        dropdownParent: $('#ThisModal'),
        tags: true
    })

    $('#jamaah').on('change', function() {
        $('.isHide').attr('hidden', false)

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
                    return parseFloat(data).toLocaleString("id-ID", {
                        style: "currency",
                        currency: "IDR"
                    });
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
                url: "{{ url('payment/getJamaahHistory') }}",
                type: "POST",
                data: {
                    id: $(this).val()
                }

            },
            columns: Ccolumns,
            initComplete: function(settings, json) {
                console.log(json)
                $('#nominal').attr('max', json.paid);
                $('#nominal').val(json.paid);
                $('#nominal').attr('onkeypress',
                    `noMinus(this); maxValue($('#nominal'), ${json.paid})`)
                $('#nominal').attr('onchange',
                    `maxValue(this, '${json.paid}')`)

                if (json.paid <= 0) {
                    $('#saveData').attr('hidden', true)
                }
            },
        });
    })

    function pushData() {
        var is_refund = $('#is_refund').val()
        var nominal = $('#nominal').val()
        var jamaah_id = $('#jamaah').val()
        var jamaah_name = $("#jamaah option:selected").attr('jname');
        var remark = $('#remark').val()

        if (!nominal || !jamaah_id || !jamaah_name || !remark) {
            return Toast.fire({
                icon: "warning",
                title: "Silahkan isi data wajib!"
            });
        }
        if (parseFloat(nominal) < 1000) {
            return Toast.fire({
                icon: "warning",
                title: "Nominal minimal 1000!"
            });
        }
        $.ajax({
            url: "{{ url('payment/saveData') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                is_refund: is_refund,
                jamaah_id: jamaah_id,
                jamaah_name: jamaah_name,
                nominal: nominal,
                remark: remark,
            },
            success: function(data) {
                Toast.fire({
                    icon: "success",
                    title: "Data Updated"
                });
                closeModal('ThisModal')
                getList()
            },
            error: function(xhr, status, error) {
                Toast.fire({
                    icon: "error",
                    title: JSON.parse(xhr.responseText).error
                });

            }
        });

    }
</script>
