<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" id="name">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="">Department</label>
            <select type="text" class="form-control" id="department" style="width: 100%">
                <option value="" selected disabled>Select or Add</option>
                @foreach ($department as $i)
                    <option value="{{ $i->id }}">{{ $i->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <br>
            <a class="btn btn-sm btn-outline-success rounded-pill mt-2 ml-2" onclick="saveJabatan()">
                <svg width="23" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4"
                        d="M16.3405 1.99976H7.67049C4.28049 1.99976 2.00049 4.37976 2.00049 7.91976V16.0898C2.00049 19.6198 4.28049 21.9998 7.67049 21.9998H16.3405C19.7305 21.9998 22.0005 19.6198 22.0005 16.0898V7.91976C22.0005 4.37976 19.7305 1.99976 16.3405 1.99976Z"
                        fill="currentColor"></path>
                    <path
                        d="M10.8134 15.248C10.5894 15.248 10.3654 15.163 10.1944 14.992L7.82144 12.619C7.47944 12.277 7.47944 11.723 7.82144 11.382C8.16344 11.04 8.71644 11.039 9.05844 11.381L10.8134 13.136L14.9414 9.00796C15.2834 8.66596 15.8364 8.66596 16.1784 9.00796C16.5204 9.34996 16.5204 9.90396 16.1784 10.246L11.4324 14.992C11.2614 15.163 11.0374 15.248 10.8134 15.248Z"
                        fill="currentColor"></path>
                </svg> Save
            </a>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped" id="jabatan-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Department</th>
                <th>-</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#department').select2({
            dropdownParent: $('#ThisModal'),
            tags: true
        })
        getJabatanList()
    })

    function getJabatanList() {
        let noD = 1
        const columns = [{
                data: "id",
                render: function(data, b, c) {

                    return `${noD++}.`
                },
                className: 'text-center'
            },
            {
                data: "name",
            },
            {
                data: "department",
            },
            {
                data: "id",
                render: function(data, b, c) {
                    if (parseFloat(c.used) <= 0) {
                        return `<a  class="btn btn-sm btn-outline-danger rounded-pill mt-2 ml-2" onclick="deleteJabatan(${data})">
                                                <svg width="23" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2871 5.24297C20.6761 5.24297 21 5.56596 21 5.97696V6.35696C21 6.75795 20.6761 7.09095 20.2871 7.09095H3.71385C3.32386 7.09095 3 6.75795 3 6.35696V5.97696C3 5.56596 3.32386 5.24297 3.71385 5.24297H6.62957C7.22185 5.24297 7.7373 4.82197 7.87054 4.22798L8.02323 3.54598C8.26054 2.61699 9.0415 2 9.93527 2H14.0647C14.9488 2 15.7385 2.61699 15.967 3.49699L16.1304 4.22698C16.2627 4.82197 16.7781 5.24297 17.3714 5.24297H20.2871ZM18.8058 19.134C19.1102 16.2971 19.6432 9.55712 19.6432 9.48913C19.6626 9.28313 19.5955 9.08813 19.4623 8.93113C19.3193 8.78413 19.1384 8.69713 18.9391 8.69713H5.06852C4.86818 8.69713 4.67756 8.78413 4.54529 8.93113C4.41108 9.08813 4.34494 9.28313 4.35467 9.48913C4.35646 9.50162 4.37558 9.73903 4.40755 10.1359C4.54958 11.8992 4.94517 16.8102 5.20079 19.134C5.38168 20.846 6.50498 21.922 8.13206 21.961C9.38763 21.99 10.6811 22 12.0038 22C13.2496 22 14.5149 21.99 15.8094 21.961C17.4929 21.932 18.6152 20.875 18.8058 19.134Z" fill="currentColor"></path>
                                                    </svg>
                                               </a>`
                    } else {
                        return ''
                    }

                },
            },
        ]

        var tabled = $('#jabatan-table').DataTable({
            searching: true,
            destroy: true,
            lengthChange: false,
            responsive: true,
            // pageLength: 2,
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{ url('users/getJabatanList') }}",
                type: "POST",
                data: {}

            },
            columns: columns,
            // initComplete: function(data) {}
        });

    }

    function saveJabatan() {
        if (!$('#name').val() || !$('#department').val()) {
            return Toast.fire({
                icon: "error",
                title: 'Please Insert Name'
            });
        }
        $.ajax({
            url: "{{ url('users/saveJabatan') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                name: $('#name').val(),
                department: $('#department').val(),
            },
            success: function(data) {
                getJabatanList()
                $('#name').val('')
                $('#department').val('').change()
            },
            error: function(xhr, status, error) {
                Toast.fire({
                    icon: "error",
                    title: JSON.parse(xhr.responseText).error
                });

            }
        });
    }

    function deleteJabatan(id) {
        Swal.fire({
            title: "Anda yakin?",
            text: "This jabatan will be deleted!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('users/deleteJabatan') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        id: id
                    },
                    success: function(data) {
                        getJabatanList()
                    },
                    error: function(xhr, status, error) {
                        Toast.fire({
                            icon: "error",
                            title: JSON.parse(xhr.responseText).error
                        });

                    }
                });
            };
        });
    }
</script>
