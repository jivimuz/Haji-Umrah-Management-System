<div class="row">
    <div class="col-md-12" id="addF" hidden>
        <div class="p-4">
            <h4>Add Biaya</h4>
            <hr>
            <div class="form-group">
                <label for="">Nominal <span class="text-danger">*</span></label>
                <input type="number" class="form-control" onkeypress="noMinus(this)" value="0" id="nominal">
            </div>
            <div class="form-group">
                <label for="">Remark <span class="text-danger">*</span></label>
                <textarea id="remark" rows="1" class="form-control" maxlength="50"></textarea>
            </div>
        </div>


        <div class="float-end">
            <a class="btn btn-sm btn-outline-warning rounded-pill" onclick="addField(false)">

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
            <a class="btn btn-sm btn-outline-success rounded-pill" onclick="saveAddBiaya()">
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
        <br>
    </div>
    <div class="col-md-12" id="addN">
        <div class="float-end">
            @if (!$jamaah->is_done)
                <a class="btn btn-sm btn-outline-primary rounded-pill mt-2 ml-2" onclick="addField(true)">
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
                    Add Biaya
                </a>
            @endif
            <br>
        </div>
    </div>
    <div class="col-md-12">
        <hr>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Remark</th>
                        <th>Nominal</th>
                        <th>-</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                        $total = 0;
                    @endphp
                    @if (count($data) > 0)
                        @foreach ($data as $i)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $i->remark }}</td>
                                <td>Rp {{ number_format($i->nominal, 2) }}</td>
                                <th>
                                    @if ($jamaah->price >= $jamaah->paid)
                                        <a class="btn btn-xs btn-outline-danger rounded-pill mt-2 ml-2"
                                            onclick="deleteMorePayment({{ $i->id }})">
                                            <svg width="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M20.2871 5.24297C20.6761 5.24297 21 5.56596 21 5.97696V6.35696C21 6.75795 20.6761 7.09095 20.2871 7.09095H3.71385C3.32386 7.09095 3 6.75795 3 6.35696V5.97696C3 5.56596 3.32386 5.24297 3.71385 5.24297H6.62957C7.22185 5.24297 7.7373 4.82197 7.87054 4.22798L8.02323 3.54598C8.26054 2.61699 9.0415 2 9.93527 2H14.0647C14.9488 2 15.7385 2.61699 15.967 3.49699L16.1304 4.22698C16.2627 4.82197 16.7781 5.24297 17.3714 5.24297H20.2871ZM18.8058 19.134C19.1102 16.2971 19.6432 9.55712 19.6432 9.48913C19.6626 9.28313 19.5955 9.08813 19.4623 8.93113C19.3193 8.78413 19.1384 8.69713 18.9391 8.69713H5.06852C4.86818 8.69713 4.67756 8.78413 4.54529 8.93113C4.41108 9.08813 4.34494 9.28313 4.35467 9.48913C4.35646 9.50162 4.37558 9.73903 4.40755 10.1359C4.54958 11.8992 4.94517 16.8102 5.20079 19.134C5.38168 20.846 6.50498 21.922 8.13206 21.961C9.38763 21.99 10.6811 22 12.0038 22C13.2496 22 14.5149 21.99 15.8094 21.961C17.4929 21.932 18.6152 20.875 18.8058 19.134Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </a>
                                    @else
                                        -
                                    @endif
                                </th>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="4"><i>Tidak Ada Data</i></th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function addField(bool) {
        $('#addN').attr('hidden', bool)
        $('#addF').attr('hidden', bool ? false : true)
    }

    function saveAddBiaya() {
        if ($('#nominal').val() == 0 || !$('#nominal').val() || !$('#remark').val()) {
            return Toast.fire({
                icon: "error",
                title: "Please Insert Mandatory Input!"
            });
        }
        $.ajax({
            url: "{{ url('jamaah/saveAddBiaya') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                id: <?= $id ?>,
                nama: '<?= $jamaah->nama ?>',
                nominal: $('#nominal').val(),
                remark: $('#remark').val(),
            },
            success: function(data) {
                closeModal('SubModal')
                checkPayment(<?= $id ?>, '<?= $jamaah->nama ?>')
                morePayment(<?= $id ?>)
                Toast.fire({
                    icon: "success",
                    title: "Data Saved"
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


    function deleteMorePayment(id) {
        Swal.fire({
            title: "Anda yakin?",
            text: "Data akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('jamaah/deleteMorePayment') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        id: id
                    },
                    success: function(data) {
                        Toast.fire({
                            icon: "success",
                            title: "Data berhasil dihapus"
                        });
                        closeModal('SubModal')
                        checkPayment(<?= $id ?>, '<?= $jamaah->nama ?>')
                        morePayment(<?= $id ?>)
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
</script>
