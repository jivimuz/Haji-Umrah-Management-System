<div class="card">

    <div class="card-body">
        <form id="add-form" class="text-center mt-3">
            <ul id="top-tab-list" class="p-0 row list-inline">
                <li class="col-lg-3 col-md-6 text-start mb-2 active" id="account" name="account">
                    <a href="javascript:void();">
                        <div class="iq-icon me-3">
                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span>Account</span>
                    </a>
                </li>
                <li id="personal" class="col-lg-3 col-md-6 mb-2 text-start">
                    <a href="javascript:void();">
                        <div class="iq-icon me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <span>Personal</span>
                    </a>
                </li>
                <li id="payment" class="col-lg-3 col-md-6 mb-2 text-start">
                    <a href="javascript:void();">
                        <div class="iq-icon me-3">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M14.2882 15.3584H8.88818" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M12.2432 11.606H8.88721" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <span>Banking</span>
                    </a>
                </li>
                <li id="confirm" class="col-lg-3 col-md-6 mb-2 text-start">
                    <a href="javascript:void();">
                        <div class="iq-icon me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span>Finish</span>
                    </a>
                </li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <div id="alert1" hidden>
                    <div class="alert alert-primary alert-sm d-flex align-items-center" role="alert">
                        <svg width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4"
                                d="M22 11.9998C22 17.5238 17.523 21.9998 12 21.9998C6.477 21.9998 2 17.5238 2 11.9998C2 6.47776 6.477 1.99976 12 1.99976C17.523 1.99976 22 6.47776 22 11.9998Z"
                                fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.8701 12.6307C12.8701 13.1127 12.4771 13.5057 11.9951 13.5057C11.5131 13.5057 11.1201 13.1127 11.1201 12.6307V8.21069C11.1201 7.72869 11.5131 7.33569 11.9951 7.33569C12.4771 7.33569 12.8701 7.72869 12.8701 8.21069V12.6307ZM11.1251 15.8035C11.1251 15.3215 11.5161 14.9285 11.9951 14.9285C12.4881 14.9285 12.8801 15.3215 12.8801 15.8035C12.8801 16.2855 12.4881 16.6785 12.0051 16.6785C11.5201 16.6785 11.1251 16.2855 11.1251 15.8035Z"
                                fill="currentColor"></path>
                        </svg>
                        <div id="ainfo1">
                        </div>
                    </div>
                </div>
                <div class="form-card text-start">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email: <span class="text-danger">*</span></label>
                                <input type="email" class="form-control required"
                                    onchange="step1();cekEmail(); $('#personal_email').val($(this).val())"
                                    id="email" name="email" placeholder="Email" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Username: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control required" onchange="step1();cekUsername();"
                                    id="username" name="username" placeholder="Username" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Password: <span class="text-danger">*</span></label>
                                <input type="password" class="form-control required" onchange="step1()"
                                    id="pwd" name="pwd" placeholder="Password" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Confirm Password: <span class="text-danger">*</span></label>
                                <input type="password" class="form-control required" onchange="step1()"
                                    id="cpwd" name="cpwd" placeholder="Confirm Password" />
                            </div>
                        </div>
                    </div>
                </div>


                <button type="button" name="next"
                    class="btn btn-primary next action-button float-end rounded step1" hidden value="Next">Next <svg
                        width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.6308 13.131C16.5743 13.189 16.3609 13.437 16.1622 13.641C14.9971 14.924 11.9576 17.024 10.3668 17.665C10.1252 17.768 9.51437 17.986 9.18802 18C8.8753 18 8.5772 17.928 8.29274 17.782C7.93814 17.578 7.65368 17.257 7.49781 16.878C7.39747 16.615 7.2416 15.828 7.2416 15.814C7.08573 14.953 7 13.554 7 12.008C7 10.535 7.08573 9.193 7.21335 8.319C7.22796 8.305 7.38383 7.327 7.55431 6.992C7.86702 6.38 8.47784 6 9.13151 6H9.18802C9.61374 6.015 10.509 6.395 10.509 6.409C12.0141 7.051 14.9834 9.048 16.1768 10.375C16.1768 10.375 16.5129 10.716 16.659 10.929C16.887 11.235 17 11.614 17 11.993C17 12.416 16.8724 12.81 16.6308 13.131Z"
                            fill="currentColor"></path>
                    </svg> </button>
            </fieldset>
            <fieldset style="display: none">
                <div id="alert2" hidden>
                    <div class="alert alert-primary alert-sm d-flex align-items-center" role="alert">
                        <svg width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4"
                                d="M22 11.9998C22 17.5238 17.523 21.9998 12 21.9998C6.477 21.9998 2 17.5238 2 11.9998C2 6.47776 6.477 1.99976 12 1.99976C17.523 1.99976 22 6.47776 22 11.9998Z"
                                fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.8701 12.6307C12.8701 13.1127 12.4771 13.5057 11.9951 13.5057C11.5131 13.5057 11.1201 13.1127 11.1201 12.6307V8.21069C11.1201 7.72869 11.5131 7.33569 11.9951 7.33569C12.4771 7.33569 12.8701 7.72869 12.8701 8.21069V12.6307ZM11.1251 15.8035C11.1251 15.3215 11.5161 14.9285 11.9951 14.9285C12.4881 14.9285 12.8801 15.3215 12.8801 15.8035C12.8801 16.2855 12.4881 16.6785 12.0051 16.6785C11.5201 16.6785 11.1251 16.2855 11.1251 15.8035Z"
                                fill="currentColor"></path>
                        </svg>
                        <div id="ainfo2">
                        </div>
                    </div>
                </div>
                <div class="form-card text-start">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Full Name: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control required" id="fullname" name="fullname"
                                    placeholder="First Name" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">NIK: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control required" id="nik" name="nik"
                                    value="{{ $top }}" placeholder="Contact No." />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Job Level: <span class="text-danger">*</span></label>
                                <select class="form-control select2modal required" id="fk_joblevel"
                                    name="fk_joblevel" style="width:100% !important">
                                    <option hidden value="" selected>Choose one</option>
                                    @foreach ($jl as $i)
                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Job Type: <span class="text-danger">*</span></label>
                                <select class="form-control select2modal required" id="fk_jobtype" name="fk_jobtype"
                                    style="width:100% !important">
                                    <option hidden value="" selected>Choose one</option>
                                    @foreach ($jt as $i)
                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Designation: <span class="text-danger">*</span></label>
                                <select class="form-control select2modal required" id="fk_designation"
                                    name="fk_designation" style="width:100% !important">
                                    <option hidden value="" selected>Choose one</option>
                                    @foreach ($ds as $i)
                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Basic Salary: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control required" id="gajipokok" name="gajipokok"
                                    placeholder="Basic Salary (Gaji Pokok)." />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">PTKP: <span class="text-danger">*</span></label>
                                <select class="form-control select2modal required" id="fk_ptkp" name="fk_ptkp"
                                    style="width:100% !important">
                                    <option hidden value="" selected>Choose one</option>
                                    @foreach ($ptkp as $i)
                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">NPWP: </label>
                                <input type="text" class="form-control" id="npwp" name="npwp"
                                    placeholder="NPWP" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Join Date: <span class="text-danger">*</span></label>
                                <input type="date" class="form-control required" id="joindate" name="joindate"
                                    value="{{ date('Y-m-d') }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Out Date: <small>(*only if the employee
                                        resign)</small></label>
                                <input type="date" class="form-control" id="outdate" name="outdate" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Born place: </label>
                                <input type="text" class="form-control" id="bornloc" name="bornloc" />
                                {{-- <select class="form-control select2modal " id="bornloc" name="bornloc"
                                    style="width:100% !important">
                                    <option hidden value="" selected>Choose one</option>

                                </select> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Born Date: </label>
                                <input type="text" class="form-control" id="born_date" name="born_date"
                                    max="{{ date('Y-m-d', strtotime('-10 Years')) }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Gender: </label>
                                <select class="form-control select2modal " id="gender" name="gender"
                                    style="width:100% !important">
                                    <option hidden value="" selected>-</option>
                                    <option value="LAKI-LAKI">LAKI-LAKI</option>
                                    <option value="PEREMPUAN">PEREMPUAN</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Personal Email:</label>
                                <input type="text" class="form-control" id="personal_email" name="personal_email"
                                    placeholder="Personal Email" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Phone Number: </label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Marial Status: </label>
                                <select class="form-control select2modal " id="fk_marialstatus"
                                    name="fk_marialstatus" style="width:100% !important">
                                    <option hidden value="" selected>Choose one</option>
                                    @foreach ($ms as $i)
                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Religion: </label>
                                <select class="form-control select2modal " id="fk_religion" name="fk_religion"
                                    style="width:100% !important">
                                    <option hidden value="" selected>Choose one</option>
                                    @foreach ($rl as $i)
                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Alamat: </label>
                                <textarea rows="1" type="text" class="form-control" id="alamat" name="alamat"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <button type="button" name="next" class="btn btn-primary next action-button float-end rounded"
                    value="Next"> Next <svg width="25" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.6308 13.131C16.5743 13.189 16.3609 13.437 16.1622 13.641C14.9971 14.924 11.9576 17.024 10.3668 17.665C10.1252 17.768 9.51437 17.986 9.18802 18C8.8753 18 8.5772 17.928 8.29274 17.782C7.93814 17.578 7.65368 17.257 7.49781 16.878C7.39747 16.615 7.2416 15.828 7.2416 15.814C7.08573 14.953 7 13.554 7 12.008C7 10.535 7.08573 9.193 7.21335 8.319C7.22796 8.305 7.38383 7.327 7.55431 6.992C7.86702 6.38 8.47784 6 9.13151 6H9.18802C9.61374 6.015 10.509 6.395 10.509 6.409C12.0141 7.051 14.9834 9.048 16.1768 10.375C16.1768 10.375 16.5129 10.716 16.659 10.929C16.887 11.235 17 11.614 17 11.993C17 12.416 16.8724 12.81 16.6308 13.131Z"
                            fill="currentColor"></path>
                    </svg> </button>
                <button type="button" name="previous"
                    class="btn btn-dark previous action-button-previous float-end me-3 rounded" value="Previous">
                    <svg width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.36922 10.869C7.42572 10.811 7.63906 10.563 7.8378 10.359C9.00292 9.076 12.0424 6.976 13.6332 6.335C13.8748 6.232 14.4856 6.014 14.812 6C15.1247 6 15.4228 6.072 15.7073 6.218C16.0619 6.422 16.3463 6.743 16.5022 7.122C16.6025 7.385 16.7584 8.172 16.7584 8.186C16.9143 9.047 17 10.446 17 11.992C17 13.465 16.9143 14.807 16.7867 15.681C16.772 15.695 16.6162 16.673 16.4457 17.008C16.133 17.62 15.5222 18 14.8685 18H14.812C14.3863 17.985 13.491 17.605 13.491 17.591C11.9859 16.949 9.01656 14.952 7.82319 13.625C7.82319 13.625 7.48709 13.284 7.34096 13.071C7.11301 12.765 7 12.386 7 12.007C7 11.584 7.12762 11.19 7.36922 10.869Z"
                            fill="currentColor"></path>
                    </svg> Previous</button>
            </fieldset>
            <fieldset style="display: none">
                <div class="form-card text-start">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Bank Name: <span class="text-danger">*</span></label>
                                <select class="form-control select2modal required" id="fk_bank" name="fk_bank"
                                    style="width:100% !important">
                                    <option hidden value="" selected>Choose one</option>
                                    @foreach ($bk as $i)
                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Account Number: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control required" id="accountnumber"
                                    name="accountnumber" placeholder="..." />
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" name="next" class="btn btn-primary next action-button float-end rounded">
                    Next <svg width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.6308 13.131C16.5743 13.189 16.3609 13.437 16.1622 13.641C14.9971 14.924 11.9576 17.024 10.3668 17.665C10.1252 17.768 9.51437 17.986 9.18802 18C8.8753 18 8.5772 17.928 8.29274 17.782C7.93814 17.578 7.65368 17.257 7.49781 16.878C7.39747 16.615 7.2416 15.828 7.2416 15.814C7.08573 14.953 7 13.554 7 12.008C7 10.535 7.08573 9.193 7.21335 8.319C7.22796 8.305 7.38383 7.327 7.55431 6.992C7.86702 6.38 8.47784 6 9.13151 6H9.18802C9.61374 6.015 10.509 6.395 10.509 6.409C12.0141 7.051 14.9834 9.048 16.1768 10.375C16.1768 10.375 16.5129 10.716 16.659 10.929C16.887 11.235 17 11.614 17 11.993C17 12.416 16.8724 12.81 16.6308 13.131Z"
                            fill="currentColor"></path>
                    </svg> </button>
                <button type="button" name="previous"
                    class="btn btn-dark previous action-button-previous float-end me-3 rounded" value="Previous"> <svg
                        width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.36922 10.869C7.42572 10.811 7.63906 10.563 7.8378 10.359C9.00292 9.076 12.0424 6.976 13.6332 6.335C13.8748 6.232 14.4856 6.014 14.812 6C15.1247 6 15.4228 6.072 15.7073 6.218C16.0619 6.422 16.3463 6.743 16.5022 7.122C16.6025 7.385 16.7584 8.172 16.7584 8.186C16.9143 9.047 17 10.446 17 11.992C17 13.465 16.9143 14.807 16.7867 15.681C16.772 15.695 16.6162 16.673 16.4457 17.008C16.133 17.62 15.5222 18 14.8685 18H14.812C14.3863 17.985 13.491 17.605 13.491 17.591C11.9859 16.949 9.01656 14.952 7.82319 13.625C7.82319 13.625 7.48709 13.284 7.34096 13.071C7.11301 12.765 7 12.386 7 12.007C7 11.584 7.12762 11.19 7.36922 10.869Z"
                            fill="currentColor"></path>
                    </svg> Previous</button>
            </fieldset>
            <fieldset style="display: none">
                <div class="form-card text-start">
                    <div class="form-card text-center">
                        <h2 class="text-success text-center"><strong>Finish !</strong></h2>
                        <br>
                        <i class="fa fa-question text-center" style="color: black; font-size: 100px"></i>
                        <br>
                        <br>
                        <h5 class="purple-text text-center">Save the data?</h5>
                    </div>
                </div>
                <button type="submit" name="next" class="btn btn-success  float-end rounded"> Submit <svg
                        width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21.4354 2.58198C20.9352 2.0686 20.1949 1.87734 19.5046 2.07866L3.408 6.75952C2.6797 6.96186 2.16349 7.54269 2.02443 8.28055C1.88237 9.0315 2.37858 9.98479 3.02684 10.3834L8.0599 13.4768C8.57611 13.7939 9.24238 13.7144 9.66956 13.2835L15.4329 7.4843C15.723 7.18231 16.2032 7.18231 16.4934 7.4843C16.7835 7.77623 16.7835 8.24935 16.4934 8.55134L10.72 14.3516C10.2918 14.7814 10.2118 15.4508 10.5269 15.9702L13.6022 21.0538C13.9623 21.6577 14.5826 22 15.2628 22C15.3429 22 15.4329 22 15.513 21.9899C16.2933 21.8893 16.9135 21.3558 17.1436 20.6008L21.9156 4.52479C22.1257 3.84028 21.9356 3.09537 21.4354 2.58198Z"
                            fill="currentColor"></path>
                    </svg> </button>
                <button type="button" name="previous"
                    class="btn btn-dark previous action-button-previous float-end me-3 rounded" value="Previous"> <svg
                        width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.36922 10.869C7.42572 10.811 7.63906 10.563 7.8378 10.359C9.00292 9.076 12.0424 6.976 13.6332 6.335C13.8748 6.232 14.4856 6.014 14.812 6C15.1247 6 15.4228 6.072 15.7073 6.218C16.0619 6.422 16.3463 6.743 16.5022 7.122C16.6025 7.385 16.7584 8.172 16.7584 8.186C16.9143 9.047 17 10.446 17 11.992C17 13.465 16.9143 14.807 16.7867 15.681C16.772 15.695 16.6162 16.673 16.4457 17.008C16.133 17.62 15.5222 18 14.8685 18H14.812C14.3863 17.985 13.491 17.605 13.491 17.591C11.9859 16.949 9.01656 14.952 7.82319 13.625C7.82319 13.625 7.48709 13.284 7.34096 13.071C7.11301 12.765 7 12.386 7 12.007C7 11.584 7.12762 11.19 7.36922 10.869Z"
                            fill="currentColor"></path>
                    </svg> Previous</button>
            </fieldset>
        </form>
    </div>
</div>

<script src="../assets/js/form-wizard.js"></script>
<script>
    $(document).ready(function() {

    })

    function step1() {
        if (!$('#email').val().includes('@')) {
            $('#ainfo1').html("Please check the email format!")
            $('#alert1').attr('hidden', false)
            $('.step1').attr('hidden', true)
            return;
        }
        if (!$('#email').val() || !$('#username').val() || !$('#pwd').val() || !$('#cpwd').val()) {
            var notif = 'Please insert ('
            if (!$('#email').val()) {
                notif += 'Email'
            }
            if (!$('#username').val()) {
                if (notif != 'Please insert (') {
                    notif += ', '
                }
                notif += 'Username'
            }

            if (!$('#pwd').val()) {
                if (notif != 'Please insert (') {
                    notif += ', '
                }
                notif += 'Password'
            }
            if (!$('#cpwd').val()) {
                if (notif != 'Please insert (') {
                    notif += ', '
                }
                notif += 'Confirm Password'
            }
            notif += ') before next step'

            $('#ainfo1').html(notif)
            $('#alert1').attr('hidden', false)
            $('.step1').attr('hidden', true)

        } else {
            if ($('#pwd').val() != $('#cpwd').val()) {
                $('#ainfo1').html("Password & Confirm Password didn't same!")
                $('#alert1').attr('hidden', false)
                $('.step1').attr('hidden', true)
            } else {
                $('#alert1').attr('hidden', true)
                $('.step1').attr('hidden', false)
            }
        }
    }

    $('#add-form').on('submit', function(e) {
        e.preventDefault();

        var form = $(this);
        var isValid = true;

        form.find('.required').each(function() {
            var input = $(this);
            if (!input.val()) {
                isValid = false;
                input.addClass('is-invalid');
            } else {
                input.removeClass('is-invalid');
            }
        });

        if (isValid) {
            var formData = new FormData(form[0]);

            $.ajax({
                url: "{{ url('users/saveData') }}",
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    getList();
                    closeModal('ThisModal')
                    Swal.fire({
                        icon: 'success',
                        title: 'User Created!',
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: JSON.parse(xhr.responseText).error
                    });
                }
            });

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Please fill in all required fields!',
            });
        }
    });


    function cekEmail() {
        if (!$('#email').val().includes('@')) {
            $('#email').addClass('is-invalid');
            $('#ainfo1').html("Please check the email format!")
            $('#alert1').attr('hidden', false)
            $('.step1').attr('hidden', true)
            return;
        }
        $.ajax({
            url: "{{ url('users/cekEmail') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                email: $('#email').val()
            },
            success: function(data) {
                if (data.isValid) {
                    $('#email').addClass('is-valid');
                    $('#email').removeClass('is-invalid');
                } else {
                    $('#email').val('')
                    $('#email').addClass('is-invalid');
                    $('#email').removeClass('is-valid');
                    Toast.fire({
                        icon: 'error',
                        title: 'Email already registered, please change!',
                    });
                }
            },
            error: function(xhr, status, error) {
                $('#email').removeClass('is-valid');
                $('#email').addClass('is-invalid');
                Toast.fire({
                    icon: "error",
                    title: JSON.parse(xhr.responseText).error
                });

            }
        });
    }

    function cekUsername() {
        if (!$('#username').val()) {
            $('#username').addClass('is-invalid');
            $('#ainfo1').html("Username cannot empty!")
            $('#alert1').attr('hidden', false)
            $('.step1').attr('hidden', true)
            return;
        }
        $.ajax({
            url: "{{ url('users/cekUsername') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                username: $('#username').val()
            },
            success: function(data) {
                if (data.isValid) {
                    $('#email').removeClass('is-invalid');
                    $('#username').addClass('is-valid');
                } else {
                    $('#email').removeClass('is-valid');
                    $('#username').addClass('is-invalid');
                    $('#username').val('')
                    Toast.fire({
                        icon: 'error',
                        title: 'Username already registered, please change!',
                    });
                }
            },
            error: function(xhr, status, error) {
                $('#email').removeClass('is-valid');
                $('#username').addClass('is-invalid');
                Toast.fire({
                    icon: "error",
                    title: JSON.parse(xhr.responseText).error
                });

            }
        });
    }
</script>
