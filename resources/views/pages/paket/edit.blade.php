<form id="edit-form">
    <input type="hidden" name="id" value="{{ $id }}">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Nama Paket: <span class="text-danger">*</span></label>
                <input type="text" disabled class="form-control editable" id="nama_paket" name="nama_paket"
                    placeholder="Nama Paket" value="{{ $data->nama }}" maxlength="50" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="">Program: <span class="text-danger">*</span></label>
                <select id="program" name="program" disabled class="form-control editable select2modal "
                    style="width: 100%" required>
                    <option value="" disabled selected>Select</option>
                    @foreach ($program as $i)
                        <option value="{{ $i->id }}" {{ $i->id == $data->program_id ? 'selected' : '' }}>
                            {{ $i->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Type: <span class="text-danger">*</span></label>
                <select id="type" name="type" class="form-control select2modal editable" disabled
                    style="width: 100%" required>
                    <option value="" disabled selected>Select</option>
                    <option value="Umrah" {{ $data->type == 'Umrah' ? 'selected' : '' }}>Umrah</option>
                    <option value="Haji" {{ $data->type == 'Haji' ? 'selected' : '' }}>Haji</option>

                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="">Publish Price: <span class="text-danger">*</span></label>
                <input type="text" disabled class="form-control editable" id="publish_price" name="publish_price"
                    placeholder="Publish price" inputmode="numeric" value="{{ $data->publish_price }}"
                    onkeypress="return /[0-9]/i.test(event.key)" onchange="noMinus(this)" maxlength="50" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="">Basic Price: <span class="text-danger">*</span></label>
                <input type="text" disabled class="form-control editable" id="basic_price"
                    name="basic_price"placeholder="Basic price" inputmode="numeric" value="{{ $data->basic_price }}"
                    onkeypress="return /[0-9]/i.test(event.key)" onchange="noMinus(this)" maxlength="50" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Flight Date: <span class="text-danger">*</span></label>
                <input type="date" value="{{ date('Y-m-d', strtotime($data->flight_date)) }}" disabled
                    class="form-control editable" id="flight_date" name="flight_date" min="{{ date('Y-m-d') }}"
                    required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Return Date: <span class="text-danger">*</span></label>
                <input type="date" value="{{ date('Y-m-d', strtotime($data->return_date)) }}"
                    class="form-control editable" disabled required id="return_date" name="return_date"
                    min="{{ date('Y-m-d') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Paket Type: <span class="text-danger">*</span></label>
                <select id="paket_type" name="paket_type" class="form-control select2modal editable" disabled required
                    style="width: 100%">
                    <option value="" disabled selected>Select</option>
                    <option value="Umrah" {{ $data->type == 'Umrah' ? 'selected' : '' }}>Umrah</option>
                    <option value="Haji Reguler" {{ $data->type == 'Haji Reguler' ? 'selected' : '' }}>Haji Reguler
                    </option>
                    <option value="Haji Plus" {{ $data->type == 'Haji Plus' ? 'selected' : '' }}>Haji Plus</option>
                    <option value="Haji Furoda" {{ $data->type == 'Haji Furoda' ? 'selected' : '' }}>Haji Furoda
                    </option>
                    <option value="Haji Khusus" {{ $data->type == 'Haji Khusus' ? 'selected' : '' }}>Haji Furoda
                    </option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <label for="">Image: </label>
            <input type="file" accept="image/*" data-default-file="{{ $data->attachment }}"
                class=" dropify editable" disabled id="attachment" name="attachment[]" disabled>
        </div>

        @if ($total->total > 0)
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Jamaah Registered:</label>
                    <input type="text" value="{{ $total->total }}" disabled class="form-control ">
                </div>
            </div>
        @endif

    </div>
    <div class="float-end" id="isHide" hidden>
        <a class="btn btn-sm btn-outline-warning rounded-pill" onclick="isView(true)">

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
        <button type="submit" class="btn btn-sm btn-outline-success rounded-pill">
            Save
            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M21.4274 2.5783C20.9274 2.0673 20.1874 1.8783 19.4974 2.0783L3.40742 6.7273C2.67942 6.9293 2.16342 7.5063 2.02442 8.2383C1.88242 8.9843 2.37842 9.9323 3.02642 10.3283L8.05742 13.4003C8.57342 13.7163 9.23942 13.6373 9.66642 13.2093L15.4274 7.4483C15.7174 7.1473 16.1974 7.1473 16.4874 7.4483C16.7774 7.7373 16.7774 8.2083 16.4874 8.5083L10.7164 14.2693C10.2884 14.6973 10.2084 15.3613 10.5234 15.8783L13.5974 20.9283C13.9574 21.5273 14.5774 21.8683 15.2574 21.8683C15.3374 21.8683 15.4274 21.8683 15.5074 21.8573C16.2874 21.7583 16.9074 21.2273 17.1374 20.4773L21.9074 4.5083C22.1174 3.8283 21.9274 3.0883 21.4274 2.5783Z"
                    fill="currentColor"></path>
                <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                    d="M3.01049 16.8079C2.81849 16.8079 2.62649 16.7349 2.48049 16.5879C2.18749 16.2949 2.18749 15.8209 2.48049 15.5279L3.84549 14.1619C4.13849 13.8699 4.61349 13.8699 4.90649 14.1619C5.19849 14.4549 5.19849 14.9299 4.90649 15.2229L3.54049 16.5879C3.39449 16.7349 3.20249 16.8079 3.01049 16.8079ZM6.77169 18.0003C6.57969 18.0003 6.38769 17.9273 6.24169 17.7803C5.94869 17.4873 5.94869 17.0133 6.24169 16.7203L7.60669 15.3543C7.89969 15.0623 8.37469 15.0623 8.66769 15.3543C8.95969 15.6473 8.95969 16.1223 8.66769 16.4153L7.30169 17.7803C7.15569 17.9273 6.96369 18.0003 6.77169 18.0003ZM7.02539 21.5683C7.17139 21.7153 7.36339 21.7883 7.55539 21.7883C7.74739 21.7883 7.93939 21.7153 8.08539 21.5683L9.45139 20.2033C9.74339 19.9103 9.74339 19.4353 9.45139 19.1423C9.15839 18.8503 8.68339 18.8503 8.39039 19.1423L7.02539 20.5083C6.73239 20.8013 6.73239 21.2753 7.02539 21.5683Z"
                    fill="currentColor"></path>
            </svg>
        </button>
    </div>
    <div class="float-end" id="isShown">
        @if ($total->total == 0)
            <a class="btn btn-sm btn-outline-warning rounded-pill" onclick="isView(false)">
                Edit
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4"
                        d="M19.9927 18.9534H14.2984C13.7429 18.9534 13.291 19.4124 13.291 19.9767C13.291 20.5422 13.7429 21.0001 14.2984 21.0001H19.9927C20.5483 21.0001 21.0001 20.5422 21.0001 19.9767C21.0001 19.4124 20.5483 18.9534 19.9927 18.9534Z"
                        fill="currentColor"></path>
                    <path
                        d="M10.309 6.90385L15.7049 11.2639C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8344 7.72908 20.8452L4.23696 20.8882C4.05071 20.8903 3.88775 20.7613 3.84542 20.5764L3.05175 17.1258C2.91419 16.4915 3.05175 15.8358 3.45388 15.3306L9.88256 6.95545C9.98627 6.82108 10.1778 6.79743 10.309 6.90385Z"
                        fill="currentColor"></path>
                    <path opacity="0.4"
                        d="M18.1208 8.66544L17.0806 9.96401C16.9758 10.0962 16.7874 10.1177 16.6573 10.0124C15.3927 8.98901 12.1545 6.36285 11.2561 5.63509C11.1249 5.52759 11.1069 5.33625 11.2127 5.20295L12.2159 3.95706C13.126 2.78534 14.7133 2.67784 15.9938 3.69906L17.4647 4.87078C18.0679 5.34377 18.47 5.96726 18.6076 6.62299C18.7663 7.3443 18.597 8.0527 18.1208 8.66544Z"
                        fill="currentColor"></path>
                </svg>
            </a>
        @else
            <a class="btn btn-sm btn-outline-warning rounded-pill" onclick="closeModal('ThisModal')">

                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.8397 20.1642V6.54639" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M20.9173 16.0681L16.8395 20.1648L12.7617 16.0681" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M6.91102 3.83276V17.4505" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M2.8335 7.92894L6.91127 3.83228L10.9891 7.92894" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                Close
            </a>
        @endif
    </div>
</form>

<script>
    $('.select2modal').select2({
        dropdownParent: $('#ThisModal'),
        tags: true
    });
    $('.dropify').dropify();

    function isView(bool) {
        $('.editable').attr('disabled', bool)
        $('#isHide').attr('hidden', bool)
        $('#attachment').attr('disabled', bool)


        if (bool) {
            $('#isShown').attr('hidden', false)
        } else {
            $('#isShown').attr('hidden', true)
        }
    }


    $('#edit-form').on('submit', function(e) {
        e.preventDefault()
        var form = $(this);
        var isValid = true;

        // form.find('.required').each(function() {
        //     var input = $(this);
        //     if (!input.val()) {
        //         isValid = false;
        //         input.addClass('is-invalid');
        //     } else {
        //         input.removeClass('is-invalid');
        //     }
        // });

        if (isValid) {
            var formData = new FormData(form[0]);
            $.ajax({
                url: "{{ url('paket/updateData') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                contentType: false,
                processData: false,
                data: formData,
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
    })
</script>
