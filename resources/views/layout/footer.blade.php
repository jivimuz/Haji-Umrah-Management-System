 <!-- Footer Section Start -->
 <?php
 use App\Models\Setting;
 $app_name = Setting::where('parameter', 'app_name')->first()->value ?: 'AppName';
 ?>
 <footer class="footer">
     <div class="footer-body">
         <ul class="left-panel list-inline mb-0 p-0">
             {{-- <li class="list-inline-item"><a href="extra/privacy-policy.html">Privacy Policy</a></li>
            <li class="list-inline-item"><a href="extra/terms-of-service.html">Terms of Use</a></li> --}}
         </ul>
         <div class="right-panel">
             {{ $app_name }} ©
             <script>
                 document.write(new Date().getFullYear())
             </script>
             <span class="text-gray">
                 <svg width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd"
                         d="M15.85 2.50065C16.481 2.50065 17.111 2.58965 17.71 2.79065C21.401 3.99065 22.731 8.04065 21.62 11.5806C20.99 13.3896 19.96 15.0406 18.611 16.3896C16.68 18.2596 14.561 19.9196 12.28 21.3496L12.03 21.5006L11.77 21.3396C9.48102 19.9196 7.35002 18.2596 5.40102 16.3796C4.06102 15.0306 3.03002 13.3896 2.39002 11.5806C1.26002 8.04065 2.59002 3.99065 6.32102 2.76965C6.61102 2.66965 6.91002 2.59965 7.21002 2.56065H7.33002C7.61102 2.51965 7.89002 2.50065 8.17002 2.50065H8.28002C8.91002 2.51965 9.52002 2.62965 10.111 2.83065H10.17C10.21 2.84965 10.24 2.87065 10.26 2.88965C10.481 2.96065 10.69 3.04065 10.89 3.15065L11.27 3.32065C11.3618 3.36962 11.4649 3.44445 11.554 3.50912C11.6104 3.55009 11.6612 3.58699 11.7 3.61065C11.7163 3.62028 11.7329 3.62996 11.7496 3.63972C11.8354 3.68977 11.9247 3.74191 12 3.79965C13.111 2.95065 14.46 2.49065 15.85 2.50065ZM18.51 9.70065C18.92 9.68965 19.27 9.36065 19.3 8.93965V8.82065C19.33 7.41965 18.481 6.15065 17.19 5.66065C16.78 5.51965 16.33 5.74065 16.18 6.16065C16.04 6.58065 16.26 7.04065 16.68 7.18965C17.321 7.42965 17.75 8.06065 17.75 8.75965V8.79065C17.731 9.01965 17.8 9.24065 17.94 9.41065C18.08 9.58065 18.29 9.67965 18.51 9.70065Z"
                         fill="currentColor"></path>
                 </svg>
             </span> by <a href="#">Jivimuz</a>.
         </div>
     </div>
 </footer>
 </main>


 <div class="modal fade" id="changePass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="changePassLabel">Change Password</h5>
                 <a type="button" class="btn rounded-pill btn-outline-dark btn-sm r" onclick="closeModal('changePass')"
                     aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </a>
             </div>
             <div class="modal-body" id="changePassBody">
                 <div class="form-group">
                     <label for="accLog">Username</label>
                     <input type="text" disabled class="form-control" value="{{ auth()->user()->username }}"
                         id="accLog">
                 </div>
                 <div class="form-group">
                     <label for="newPass">New Password</label>
                     <input type="password" class="form-control cpinput " id="newPass">
                 </div>
                 <div class="form-group">
                     <label for="newPassConfirm">Confirm Password</label>
                     <input type="password" class="form-control cpinput " id="newPassConfirm">
                 </div>
                 <div class="float-end">
                     <a class="btn btn-outline-success btn-sm rounded-pill" id="submitPass"> <svg width="32"
                             viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                             <path opacity="0.4"
                                 d="M12.0865 22C11.9627 22 11.8388 21.9716 11.7271 21.9137L8.12599 20.0496C7.10415 19.5201 6.30481 18.9259 5.68063 18.2336C4.31449 16.7195 3.5544 14.776 3.54232 12.7599L3.50004 6.12426C3.495 5.35842 3.98931 4.67103 4.72826 4.41215L11.3405 2.10679C11.7331 1.96656 12.1711 1.9646 12.5707 2.09992L19.2081 4.32684C19.9511 4.57493 20.4535 5.25742 20.4575 6.02228L20.4998 12.6628C20.5129 14.676 19.779 16.6274 18.434 18.1581C17.8168 18.8602 17.0245 19.4632 16.0128 20.0025L12.4439 21.9088C12.3331 21.9686 12.2103 21.999 12.0865 22Z"
                                 fill="currentColor"></path>
                             <path
                                 d="M11.3194 14.3209C11.1261 14.3219 10.9328 14.2523 10.7838 14.1091L8.86695 12.2656C8.57097 11.9793 8.56795 11.5145 8.86091 11.2262C9.15387 10.9369 9.63207 10.934 9.92906 11.2193L11.3083 12.5451L14.6758 9.22479C14.9698 8.93552 15.448 8.93258 15.744 9.21793C16.041 9.50426 16.044 9.97004 15.751 10.2574L11.8519 14.1022C11.7049 14.2474 11.5127 14.3199 11.3194 14.3209Z"
                                 fill="currentColor"></path>
                         </svg> Change</a>
                 </div>
             </div>
         </div>
     </div>
 </div>


 <div class="modal fade" id="expiredAlert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog  modal-dialog-centered" role="document">
         <div class="modal-content ">
             <div class="modal-header">
                 <h5 class="modal-title">
                     Serial Expired Alert!!
                 </h5>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-10">

                         @if (session('expiredDate'))
                             {{ session('expiredDate') }}
                             <br>
                             Please Contact: +6282120741970 (Jivi)
                         @endif
                     </div>
                     <div class="col-md-2">
                         <h1 id='expiredCount'>6</h1>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>



 <!-- Required Library Bundle Script -->
 <script src="../assets/js/core/libs.min.js"></script>

 <!-- External Library Bundle Script -->
 <script src="../assets/js/core/external.min.js"></script>

 <!-- Widgetchart JavaScript -->
 {{-- <script src="../assets/js/charts/admin.js"></script> --}}

 <!-- fslightbox JavaScript -->
 <script src="../assets/js/fslightbox.js"></script>

 <!-- GSAP Animation -->
 <script src="../assets/vendor/gsap/gsap.min.js"></script>
 <script src="../assets/vendor/gsap/ScrollTrigger.min.js"></script>
 <script src="../assets/js/animation/gsap-init.js"></script>

 <!-- Stepper Plugin -->
 <script src="../assets/js/stepper.js"></script>

 <!-- Form Wizard Script -->

 <!-- app JavaScript -->
 <script src="../assets/js/app.js"></script>

 <!-- moment JavaScript -->
 <script src="../assets/vendor/moment.min.js"></script>
 <script src="../assets/js/jquery.min.js"></script>
 <script src="../assets/js/datatables.min.js"></script>

 <script src="../assets/js/sweetalert2.min.js"></script>
 <script src="../assets/js/select2.min.js"></script>
 <script src="../assets/js/responsive.dataTables.min.js"></script>
 <script src="../assets/js/dropify.min.js"></script>
 <script src="../assets/js/customFunction.js"></script>
 @if (session('expiredAlert'))
     <script>
         $(document).ready(function() {
             // Tampilkan modal
             showModal('expiredAlert');

             // Inisialisasi penghitung mundur
             var nu = 5;
             $('#expiredCount').html(nu);

             // Interval untuk menghitung mundur
             var aInt = setInterval(() => {
                 nu--;
                 $('#expiredCount').html(nu);

                 if (nu <= 3) {
                     $('#expiredCount').addClass('text-danger');
                 }

                 if (nu <= 0) {
                     clearInterval(aInt); // Hentikan interval jika sudah mencapai 0
                     closeModal('expiredAlert');
                 }
             }, 1000);

             // Penutupan modal dan penghentian interval setelah durasi
             setTimeout(() => {
                 clearInterval(aInt); // Pastikan interval dihentikan
                 closeModal('expiredAlert');
             }, 5000); // Ini akan menutup modal setelah 5 detik
         });
     </script>

     @php
         session()->forget('expiredAlert');
     @endphp
 @endif


 <script>
     function changePass() {
         showModal('expiredAlert');
     }

     $('#submitPass').on('click', function() {

         var np = $('#newPass').val();
         var cp = $('#newPassConfirm').val();
         if (!cp || !np) {
             return Toast.fire({
                 icon: 'warning',
                 title: "Please Insert new password!"
             })
         }
         if (np.length < 8 || cp.length < 8) {
             return Toast.fire({
                 icon: 'warning',
                 title: "Passwords must be at least 8 characters long!"
             });
         }

         if (cp !== np) {
             return Toast.fire({
                 icon: 'warning',
                 title: "New Password & Confirmation didn't same!"
             })
         }

         $.ajax({
             url: "{{ url('profile/changePassword') }}",
             method: 'POST',
             headers: {
                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
             },
             data: {
                 np: np,
             },
             success: function(data) {
                 Toast.fire({
                     icon: "success",
                     title: "Password Updated"
                 });
                 $('#newPass').val('');
                 $('#newPassConfirm').val('');
                 closeModal('changePass')
             },
             error: function(xhr, status, error) {
                 Toast.fire({
                     icon: "error",
                     title: JSON.parse(xhr.responseText).error
                 });

             }
         });

     })
 </script>
