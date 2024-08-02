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
    {{-- <div id="loading">
        <div class="loader simple-loader">
            <img src="assets/images/logo.png" style="width: 50%" alt="">
        </div>
    </div> --}}
@endsection

@section('content')
    <div class="content-inner mt-5 py-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40" data-iq-duration=".6"
                    data-iq-delay=".4" data-iq-trigger="scroll" data-iq-ease="none">
                    <div class="card-header">
                        <div class="float-end">
                            <input type="search" class="form-control" placeholder="Search..."
                                data-listener-added_aa86fd06="true"id="namaMenu" onchange="searchMenu()"
                                style="width: 200px">
                        </div>
                        <h4 class="card-title">Home</h4>
                        <small>List Menu</small>
                    </div>
                    <div class="card-body" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                        data-iq-duration=".6" data-iq-delay=".6" data-iq-trigger="scroll" data-iq-ease="none"
                        style="padding-left: 40px; padding-right:40px">

                        {{-- isi Content --}}
                        <div class="row">
                            <div class="row" id="menuList">
                                Loading...
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
        $(document).ready(function() {
            searchMenu()
        })

        function searchMenu() {
            $.ajax({
                url: "{{ url('menu') }}",
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    menu: $('#namaMenu').val(),
                },
                success: function(data) {
                    $('#menuList').html(data)

                },
                error: function(xhr, status, error) {
                    Toast.fire({
                        icon: "error",
                        title: JSON.parse(xhr.responseText).error
                    });

                }
            });
        }

        // document.addEventListener('DOMContentLoaded', (event) => {
        //     loaderInit()
        // });
        // const loaderInit = () => {
        //     const loader = document.querySelector('.loader')

        //     loader.classList.add('animate__animated', 'animate__fadeOut')
        //     setTimeout(() => {
        //         loader.classList.add('d-none')
        //     }, 1000)
        // }
    </script>
@endsection
