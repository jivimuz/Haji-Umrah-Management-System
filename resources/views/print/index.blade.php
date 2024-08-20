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
                        {{-- <div class="float-end">
                            <input type="search" class="form-control" placeholder="Search..."
                                data-listener-added_aa86fd06="true"id="namaMenu" onchange="searchMenu()"
                                style="width: 200px">
                        </div> --}}
                        <h4 class="card-title">Print Menu</h4>
                        <small>Menu Cetak</small>
                    </div>
                    <div class="card-body" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                        data-iq-duration=".6" data-iq-delay=".6" data-iq-trigger="scroll" data-iq-ease="none"
                        style="padding-left: 40px; padding-right:40px">
                        <h5 for="">For Jamaah</h5>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Print Type</label>
                                    <select class="select2" id="printType" style="width: 100%">
                                        <option value="" selected disabled>Choose One</option>
                                        <option value="jamaahInfo" is-signature="1" is-to="0">Payment Information
                                        </option>
                                        <option value="surat_rekomendasi" is-signature="1" is-to="0">Surat Rekomendasi
                                            Passport
                                        </option>
                                        <option value="surat_ijin" is-signature="1" is-to="1">Surat Ijin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Jamaah Name</label>
                                    <select class="select2" id="jamaah" style="width: 100%">
                                        <option value="" selected disabled>Choose One</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3" id="isSignature" hidden>
                                <div class="form-group">
                                    <label for="">Signature by</label>
                                    <select class="select2" id="user" style="width: 100%">
                                        <option value="" selected disabled>Choose One</option>
                                        @foreach ($users as $i)
                                            <option value="{{ base64_encode($i->id) }}">{{ $i->fullname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3" id="isTo" hidden>
                                <div class="form-group">
                                    <label for="">To</label>
                                    <input type="text" class="form-control" id="to">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <br>
                                    <a class="btn btn-sm btn-outline-warning rounded-pill " onclick="printProcess() ">
                                        <svg width="23" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M16.8843 5.11485H13.9413C13.2081 5.11969 12.512 4.79355 12.0474 4.22751L11.0782 2.88762C10.6214 2.31661 9.9253 1.98894 9.19321 2.00028H7.11261C3.37819 2.00028 2.00001 4.19201 2.00001 7.91884V11.9474C1.99536 12.3904 21.9956 12.3898 21.9969 11.9474V10.7761C22.0147 7.04924 20.6721 5.11485 16.8843 5.11485Z"
                                                fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M20.8321 6.54353C21.1521 6.91761 21.3993 7.34793 21.5612 7.81243C21.8798 8.76711 22.0273 9.77037 21.9969 10.7761V16.0292C21.9956 16.4717 21.963 16.9135 21.8991 17.3513C21.7775 18.1241 21.5057 18.8656 21.0989 19.5342C20.9119 19.8571 20.6849 20.1553 20.4231 20.4215C19.2383 21.5089 17.665 22.0749 16.0574 21.9921H7.93061C6.32049 22.0743 4.74462 21.5086 3.55601 20.4215C3.2974 20.1547 3.07337 19.8566 2.88915 19.5342C2.48475 18.8661 2.21869 18.1238 2.1067 17.3513C2.03549 16.9142 1.99981 16.4721 2 16.0292V10.7761C1.99983 10.3374 2.02357 9.89902 2.07113 9.46288C2.08113 9.38636 2.09614 9.31109 2.11098 9.23659C2.13573 9.11241 2.16005 8.99038 2.16005 8.86836C2.25031 8.34204 2.41496 7.83116 2.64908 7.35101C3.34261 5.86916 4.76525 5.11492 7.09481 5.11492H16.8754C18.1802 5.01401 19.4753 5.4068 20.5032 6.21522C20.6215 6.3156 20.7316 6.4254 20.8321 6.54353ZM6.97033 15.5412H17.0355H17.0533C17.2741 15.5507 17.4896 15.4717 17.6517 15.3217C17.8137 15.1716 17.9088 14.963 17.9157 14.7425C17.9282 14.5487 17.8644 14.3577 17.7379 14.2101C17.5924 14.0118 17.3618 13.8935 17.1155 13.8907H6.97033C6.51365 13.8907 6.14343 14.2602 6.14343 14.7159C6.14343 15.1717 6.51365 15.5412 6.97033 15.5412Z"
                                                fill="currentColor"></path>
                                        </svg>
                                        Process Print
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.select2').select2();
        $('#jamaah').select2({
            ajax: {
                url: "<?= url('jamaah/jamaahListByParams') ?>",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                delay: 500,
                datatype: 'json',
                minimumInputLength: 2,
                data: function(params) {
                    var selectTitle = $('#jamaah option:selected').html()
                    var selectVal = $('#jamaah option:selected').val()
                    return {
                        selectTitle: selectTitle,
                        selectVal: selectVal,
                        params: params.term
                    }
                },
                processResults: function(response) {
                    var option = [];
                    if (response.selectVal) {
                        option.push({
                            text: response.selectTitle,
                            id: response.selectVal,
                            selected: true
                        })
                    }
                    for (data of response.data) {
                        if (btoa(data.id) != response.selectVal) {
                            option.push({
                                text: data.nama + ' || ' + data.no_ktp,
                                id: btoa(data.id),
                            })
                        }
                    }
                    return {
                        results: option
                    };
                },
                placeholder: 'get Jamaah',
            },
        })

        $('#printType').on('change', function() {
            var aa = $('#printType option:selected').attr('is-signature');
            var ab = $('#printType option:selected').attr('is-to');
            if (parseInt(aa) == 1) {
                $('#isSignature').attr('hidden', false);
            } else {
                $('#isSignature').attr('hidden', true);
            }
            if (parseInt(ab) == 1) {
                $('#isTo').attr('hidden', false);
            } else {
                $('#isTo').attr('hidden', true);
            }
        })

        function printProcess() {
            var a = $('#printType').val();
            var aa = $('#printType option:selected').attr('is-signature');
            var ab = $('#printType option:selected').attr('is-to');

            var b = $('#jamaah').val();
            var c = $('#user').val();
            var d = $('#to').val();
            if (!a || !b) {
                return Toast.fire({
                    icon: 'error',
                    title: 'Please Choose Data First'
                })
            }

            if (parseInt(aa) == 1 && !c) {
                return Toast.fire({
                    icon: 'error',
                    title: 'Please Choose Signature!'
                })
            }
            url = `<?= url('print') ?>/${a}/${b ?? ''}?a=0`
            if (parseInt(aa) == 1) {
                url += `&&by=${c ?? ''}`
            }
            if (parseInt(ab) == 1) {
                url += `&&to=${btoa(d) ?? ''}`
            }
            openPopup(url)
        }
    </script>
@endsection
