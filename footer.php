<footer class="container-fluid bg-dark text-center p-2">
  <small class="text-white">Copyright &copy; 2019 || Designed By || <a href="#login" data-toggle="modal" data-target="#adminLoginModalCenter">Admin Login</a></small>
</footer>
<!--end footer-->
<!--start student registration form-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--start student registration form-->
        <?php
        include('studentRegistration.php');
        ?>
        <!--end student registration form-->
    </div>
      <div class="modal-footer">
          <span id="successMsg"></span>
        <button type="button" class="btn btn-primary" onclick="addStu()" id="signup">Sign Up</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--end student registration-->
<!--start student login-->

<!-- Modal -->
<div class="modal fade" id="stuLoginModalCenter" tabindex="-1" aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuLoginModalCenterLabel">Student Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="stuLoginForm">
  <div class="form-group">
    <i class="fas fa-envelope"></i>
    <label for="stueLogmail" class="pl-2 font-weight-bold">Email </label>
    <input type="email" class="form-control" placeholder="Email" name="stuLogemail" id="stuLogemail">
  </div>
  <div class="form-group">
    <i class="fas fa-key"></i>
    <label for="stuLogpass" class="pl-2 font-weight-bold"> Password</label>
    <input type="password" class="form-control" placeholder="Password" name="stuLogpass" id="stuLogpass">
  </div>
</form>
<!--end student login-->
    </div>
      <div class="modal-footer">
        <small id="statusLogMsg"></small>
        <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!--start admin panel-->
<!-- Modal -->
<div class="modal fade" id="adminLoginModalCenter" tabindex="-1" aria-labelledby="adminLoginModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminLoginModalCenterLabel">Admin Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="adminLoginForm">
  <div class="form-group">
    <i class="fas fa-envelope"></i>
    <label for="adminLogemail" class="pl-2 font-weight-bold">Email</label>
    <input type="email" class="form-control" placeholder="Email" name="adminLogemail" id="adminLogemail">
  </div>
  <div class="form-group">
    <i class="fas fa-key"></i>
    <label for="adminLogpass" class="pl-2 font-weight-bold"> Password</label>
    <input type="password" class="form-control" placeholder="Password" name="adminLogpass" id="adminLogpass">
  </div>
</form>
<!--end student login-->
    </div>
      <div class="modal-footer">
   
        <button type="button" class="btn btn-primary" id="adminLoginBtn" onclick="checkAdminLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!--end admin panel-->

<!--end student registration-->
<!--start student login model-->

<!--end student login-->
   <script src="js/jquery.min.js"></script> 
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script> 
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script type="text/javascript" src="js/ajaxrequest.js"></script>
   <script type="text/javascript" src="js/adminajaxrequest.js"></script>
</body>
</html>