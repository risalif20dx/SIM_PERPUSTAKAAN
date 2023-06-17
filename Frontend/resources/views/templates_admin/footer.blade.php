 <!-- Footer -->
 <footer class="sticky-footer bg-white">
 	<div class="container my-auto">
 		<div class="copyright text-center my-auto">
 			<span>Copyright &copy; Your Website 2021</span>
 		</div>
 	</div>
 </footer>
 <!-- End of Footer -->

 </div>
 <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
 	<i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 	<div class="modal-dialog" role="document">
 		<div class="modal-content">
 			<div class="modal-header">
 				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
 				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true">×</span>
 				</button>
 			</div>
 			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
 			<div class="modal-footer">
 				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
 				<a class="btn btn-primary" href="login.html">Logout</a>
 			</div>
 		</div>
 	</div>
 </div>





 <!-- Bootstrap core JavaScript-->
 <script src="{{asset('/assets/vendor/jquery/jquery.min.js')}}"></script>
 <script src="{{asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

 <!-- Core plugin JavaScript-->
 <script src="{{asset('/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

 <!-- Custom scripts for all pages-->
 <script src="{{asset('/assets/js/sb-admin-2.min.js')}}"></script>

 <!-- Page level plugins -->


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.2/chart.min.js"></script> -->

 <!-- Page level custom scripts -->
 <!-- <script src="{{asset('/assets/js/demo/chart-area-demo.js')}}"></script> -->
 <!-- <script src="{{asset('/assets/js/demo/chart-pie-demo.js')}}"></script> -->

 <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 

 @yield('script')
 </body>

 </html>
