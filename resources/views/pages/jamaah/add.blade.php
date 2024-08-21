<form id="add-form">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Nama Jamaah: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nama_jamaah" name="nama_jamaah" placeholder="Nama Jamaah"
                    maxlength="50" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Paket: <span class="text-danger">*</span></label>
                <select id="paket" name="paket" class="form-control select2modal " style="width: 100%" required>
                    <option value="" disabled selected>Select</option>
                    @foreach ($paket as $i)
                        <option value="{{ $i->id }}" price="{{ $i->publish_price }}">
                            ☪️ {{ strlen($i->nama) > 20 ? substr($i->nama, 0, 20) . '...' : $i->nama }} ||
                            🕌 {{ $i->program }}
                            || 🛫 {{ date('d M Y', strtotime($i->flight_date)) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="">Discount: (Rp.)</label>
                <input type="number" class="form-control" id="discount" name="discount" value="0" disabled>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="">L/P: <span class="text-danger">*</span></label>
                <select id="gender" name="gender" class="form-control select2modal " style="width: 100%" required>
                    <option value="" selected>-</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="">No Ktp : <span class="text-danger">*</span></label>
                <input type="number" class="form-control" inputmode="numeric" onchange="noMinus(this)" id="noktp"
                    name="noktp" placeholder="No Ktp" maxlength="16" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="">No Passport:</label>
                <input type="text" class="form-control" id="no_passport" name="no_passport" placeholder="No Passport"
                    maxlength="50">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Passport Date (Issued - Expired)</label>
                <div class="input-group mb-3">
                    <input type="date" class="form-control" id="passport_date" name="passport_date">
                    <input type="date" class="form-control" id="passport_expired" name="passport_expired">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Kota Passport: </label>
                <input type="text" class="form-control" id="city_passport" name="city_passport"
                    placeholder="Kota Passport" maxlength="20">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="">No Hp: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No Hp"
                    maxlength="13" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Vaccine 1</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="..." id="vaccine1" name="vaccine1">
                    <input type="date" class="form-control" id="vaccine1_date" name="vaccine1_date">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Vaccine 2</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="..." id="vaccine2" name="vaccine2">
                    <input type="date" class="form-control" id="vaccine2_date" name="vaccine2_date">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Vaccine 3</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="..." id="vaccine3" name="vaccine3">
                    <input type="date" class="form-control" id="vaccine3_date" name="vaccine3_date">
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="">Agen yang mendaftarkan: <span class="text-danger">*</span></label>
                <select id="agen_id" name="agen_id" class="form-control select2modal " style="width: 100%"
                    required>
                    <option value="" selected>Select</option>
                    <option value="0">No Agent</option>
                    @foreach ($agen as $i)
                        <option value="{{ $i->id }}">
                            {{ $i->nama }} || {{ $i->no_ktp }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="">Alamat : </label>
                <textarea id="alamat" name="alamat" class="form-control" maxlength="200" rows="4" placeholder="Alamat"></textarea>
            </div>
        </div>
        <div class="col-md-6">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tempat Lahir: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="born_place" name="born_place"
                            placeholder="Tempat Lahir" maxlength="50" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tanggal Lahir: <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="born_date" name="born_date"
                            max="{{ date('Y-m-d', strtotime('-2 Years')) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nama Ayah: </label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                            placeholder="Nama Ayah" maxlength="50">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nama Ibu: </label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                            placeholder="Nama Ibu" maxlength="50">
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6">
            <label for="">Image: </label>
            <input type="file" accept="image/*" class=" dropify " id="attachment" name="attachment[]">
        </div>
        @if ($isHaji)
            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">No Porsi: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="no_porsi" name="no_porsi"
                                placeholder="No Porsi" maxlength="50">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Registration Date: <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" min="{{ date('Y-m-d') }}" id="regis_date"
                                name="regis_date">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Estimate Date: <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" min="{{ date('Y-m-d') }}" id="est_date"
                                name="est_date">
                        </div>
                    </div>

                </div>
            </div>
        @endif

    </div>
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
</form>

<script>
    $('.select2modal').select2({
        dropdownParent: $('#ThisModal')
    });

    $('.dropify').dropify();
    $('#paket').change(function() {
        var max = $("#paket option:selected").attr('price');
        console.log(max)
        if (parseFloat($('#discount').val()) > parseFloat(max)) {
            $('#discount').val(max)
        }
        $('#discount').attr('max', max)
        $('#discount').attr('disabled', false)
        $('#discount').attr('onkeypress',
            `noMinus(this); maxValue(this, ${max})`)
        $('#discount').attr('onchange',
            `noMinus(this); maxValue(this, ${max})`)
    })


    $('#add-form').on('submit', function(e) {
        e.preventDefault()
        var form = $(this);
        var isValid = true;
        if (isValid) {
            var formData = new FormData(form[0]);
            $.ajax({
                url: "{{ url('jamaah/saveData') }}",
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
                        title: "Data Saved"
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
