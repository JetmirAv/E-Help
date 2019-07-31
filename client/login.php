<!DOCTYPE html>
<html lang="en">

<?php include_once('./components/head.php') ?>



<body>
  <?php include_once('./components/nav.php') ?>

  <div class="container mt-2 mb-4">
    <div class="col-sm-8 ml-auto mr-auto">
      <ul class="nav nav-pills nav-fill mb-1" id="pills-tab" role="tablist">
        <li class="nav-item"> <a class="nav-link active" onclick="changeView" id="pills-signin-tab" data-toggle="pill" href="#pills-signin" role="tab" aria-controls="pills-signin" aria-selected="true">Sign In</a> </li>
        <li class="nav-item"> <a class="nav-link" onclick="changeView" id="pills-signup-tab" data-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup" aria-selected="false">Sign Up</a> </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-signin" role="tabpanel" aria-labelledby="pills-signin-tab">
          <div class="col-sm-12 border border-dark shadow rounded pt-2">
            <div class="text-center"><img src="https://placehold.it/80x80" class="rounded-circle border p-1"></div>

            <!-- Sign in -->
            <form id="singninForm" action="#">
              <div class="form-group">
                <label class="font-weight-bold">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter valid email" required>
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" id="password" class="form-control" placeholder="***********" required>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <label><input type="checkbox" name="condition" id="condition"> Remember me.</label>
                  </div>
                  <div class="col text-right">
                    <a href="javascript:;" data-toggle="modal" data-target="#forgotPass">Forgot Password?</a>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input id="singninButton" type="submit" name="submit" value="Sign In" class="btn btn-block btn-dark">
              </div>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">
          <div class="col-sm-12 border border-dark shadow rounded pt-2">
            <div class="text-center"><img src="https://placehold.it/80x80" class="rounded-circle border p-1"></div>

            <!-- Sign Up -->
            <form method="post" id="singnupFrom">
              <div class="form-group">
                <label class="font-weight-bold">Email <span class="text-danger">*</span></label>
                <input type="email" name="signupemail" id="signupemail" class="form-control" placeholder="Enter valid email" required>
              </div>
              <div class="form-group">
                <label class="font-weight-bold">User Name <span class="text-danger">*</span></label>
                <input type="text" name="signupusername" id="signupusername" class="form-control" placeholder="Choose your user name" required>
                <div class="text-danger"><em>This will be your login name!</em></div>
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Phone #</label>
                <input type="text" name="signupphone" id="signupphone" class="form-control" placeholder="(000)-(0000000)">
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Password <span class="text-danger">*</span></label>
                <input type="password" name="signuppassword" id="signuppassword" class="form-control" placeholder="***********" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" required>
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Confirm Password <span class="text-danger">*</span></label>
                <input type="password" name="signupcpassword" id="signupcpassword" class="form-control" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="***********" required>
              </div>
              <div class="form-group">
                <label><input type="checkbox" name="signupcondition" id="signupcondition" required> I agree with the <a href="javascript:;">Terms &amp; Conditions</a> for Registration.</label>
              </div>
              <div class="form-group">
                <input type="submit" name="signupsubmit" value="Sign Up" class="btn btn-block btn-dark">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="forgotPass" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form method="post" id="forgotpassForm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Forgot Password</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Email <span class="text-danger">*</span></label>
                <input type="email" name="forgotemail" id="forgotemail" class="form-control" placeholder="Enter your valid email..." required>
              </div>
              <div class="form-group">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Sign In</button>
              <button type="submit" name="forgotPass" class="btn btn-dark"><i class="fa fa-envelope"></i> Send
                Request</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <footer id="main-footer" class="text-center p-4 mt-5">
    <div class="container">
      <div class="row">
        <div class="col">
          <p>Copyright &copy;
            <span id="year"></span> E-Help</p>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script>
    $('#singninForm').submit(function(e) {
      e.preventDefault()
      console.log("e")
      var email = $('#email').val()
      var password = $('#password').val()
      console.log(baseUrl)
      $.ajax({
        url: baseUrl + 'api/auth/login',
        type: 'POST',
        beforeSend: function(request) {
          request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          request.setRequestHeader("Accept", "application/json");
        },
        data: {
          email: email,
          password: password
        },
        success: function(data) {
          if (data) {
            console.log("data")
            console.log(data)
            console.log("data")
          } else {
            console.log("Error")
          }
        }
      });
    })

    function changeView() {
      let sigInModal = document.getElementById('pills-signin')
      let sigUpModal = document.getElementById('pills-signup')
      $('#pills-signin').toggleClass('active')
      $('#pills-signup').toggleClass('active')
    }
  </script>
</body>

</html>