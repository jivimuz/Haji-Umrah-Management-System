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
         showModal('changePass');
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
