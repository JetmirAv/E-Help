<!DOCTYPE html>
<html lang="en">

<?php include_once './components/head.php' ?>

<body>
  <?php include_once './components/nav.php' ?>

  <div class="container mt-2 mb-4">
    <div class="col-sm-8 ml-auto mr-auto">
      <ul class="nav nav-pills nav-fill mb-1" id="pills-tab" role="tablist">
        <li class="nav-item"> <a class="nav-link active" onclick="changeView" id="pills-signin-tab" data-toggle="pill" href="#pills-signin" role="tab" aria-controls="pills-signin" aria-selected="true">Sign In</a> </li>
        <li class="nav-item"> <a class="nav-link" onclick="changeView" id="pills-signup-tab" data-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup" aria-selected="false">Sign Up</a> </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-signin" role="tabpanel" aria-labelledby="pills-signin-tab" style="margin-bottom: 200px">
          <div class="col-sm-12 border border-dark shadow rounded pt-2">
            <div class="text-center"><img width="80px" height="80px" src="images/profile.png" class="rounded-circle border p-1"></div>

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


            <!-- Sign Up -->
            <form action="#" id="singnupFrom" enctype="multipart/form-data">
              <div class="text-center" style="margin-bottom: 20px">
                <label class="font-weight-bold">Profile Picture <span class="text-danger">*</span></label><br />
                <img id="profileImg" onclick="profileUpload()" width="80px" height="80px" src="images/profile.png" class="rounded-circle border p-1">
                <input id="profileInput" type="file" style="position: fixed; top: -200px">
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <label class="font-weight-bold">First Name <span class="text-danger">*</span></label>
                    <input type="text" name="signupFirstName" id="signupFirstName" class="form-control" placeholder="First Name" required>
                  </div>
                  <div class="col">
                    <label class="font-weight-bold">First Name <span class="text-danger">*</span></label>
                    <input type="text" name="signupLastName" id="signupLastName" class="form-control" placeholder="Last Name" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-4">
                    <label for="signupPosition">Position</label>
                    <select id="signupPosition" name="signupPosition" class="form-control">
                      <option value="1" selected>Patient</option>
                      <option value="2">Doctor</option>
                    </select>
                  </div>
                  <div class="col">
                    <label class="font-weight-bold">Email <span class="text-danger">*</span></label>
                    <input type="email" name="signupEmail" id="signupEmail" class="form-control" placeholder="Enter valid email" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <label class="font-weight-bold">Password <span class="text-danger">*</span></label>
                    <input type="password" name="signupPassword" id="signupPassword" class="form-control" placeholder="***********" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" required>
                  </div>
                  <div class="col">
                    <label class="font-weight-bold">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" name="signupCPassword" id="signupCPassword" class="form-control" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="***********" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <label class="font-weight-bold">Address</label>
                    <input type="text" name="signupAddress" id="signupAddress" class="form-control" placeholder="Address">
                  </div>
                  <div class="col">
                    <label class="font-weight-bold">City</label>
                    <input type="text" name="signupCity" id="signupCity" class="form-control" placeholder="City">
                  </div>
                  <div class="col-4">
                    <label class="font-weight-bold">Birthdate</label>
                    <input type="date" name="signupBirthdate" id="signupBirthday" class="form-control" placeholder="City">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-5">
                    <label class="font-weight-bold">State</label>
                    <input type="text" name="signupState" id="signupState" class="form-control" placeholder="State">
                  </div>
                  <div class="col-2">
                    <label class="font-weight-bold">Postal</label>
                    <input type="text" name="signupPostal" id="signupPostal" class="form-control" placeholder="Postal">
                  </div>
                  <div class="col">
                    <label class="font-weight-bold">Phone</label>
                    <input type="text" name="signupPhone" id="signupPhone" class="form-control" placeholder="Phone">
                  </div>
                </div>
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
  <?php include_once './components/footer.php' ?>
  <script>
    $('#singninForm').submit(function(e) {
      e.preventDefault()
      console.log("po")
      var email = $('#email').val()
      var password = $('#password').val()
      $.ajax({
        url: 'http://127.0.0.1:8000/' + 'api/auth/login',
        type: 'POST',
        beforeSend: function(request) {
          request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          request.setRequestHeader("Accept", "application/json");
        },
        data: {
          email: email,
          password: password
        },
        success: function(response) {
          console.log(response);

          $.post('helpers/authorization.php', {
            token: response
          }, (e) => {
            console.log(e);

            if (e)
              window.location.href = "/";
          })
        },
        error: (response) => {
          console.log(response)

        }
      });
    })

    let img = null;

    $('#singnupFrom').submit(function(e) {
      e.preventDefault()
      console.log("signup")
      if (img) {
        let formInput = {
          email: $('#signupEmail').val(),
          state: $('#signupState').val(),
          postal: $('#signupPostal').val(),
          phone_number: $('#signupPhone').val(),
          name: $('#signupFirstName').val(),
          surname: $('#signupLastName').val(),
          address: $('#signupAddress').val(),
          city: $('#signupCity').val(),
          pos: $('#signupPosition').val(),
          password: $('#signupPassword').val(),
          password_confirmation: $('#signupCPassword').val(),
          birthday: $('#signupBirthday').val(),
          // img: img
        }
        console.log(img);


        $.ajax({
          url: 'http://127.0.0.1:8000/' + 'api/auth/register',
          type: 'POST',
          // contentType: 'multipart/form-data',
          // processData : false, /// Add this line without processing parameters
          contentType: false,
          beforeSend: function(request) {
            request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            request.setRequestHeader("Accept", "application/json");
            // console.log(request)
          },
          data: formInput,
          success: function(response) {
            alert("response")
            console.log(response)
            alert(response)
            $.post('helpers/authorization.php', {
              token: response
            }, (e) => {
              if (e)
                window.location.href = "/";
            })
          },
          error: (response) => {
            console.log(response)

          }
        });
      } else {

      }

    })

    function profileUpload() {
      document.getElementById('profileInput').click()
    }

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#profileImg').attr('src', e.target.result);
        }
        img = input.files[0];
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#profileInput").change(function() {
      readURL(this);
    });

    function changeView() {
      let sigInModal = document.getElementById('pills-signin')
      let sigUpModal = document.getElementById('pills-signup')
      $('#pills-signin').toggleClass('active')
      $('#pills-signup').toggleClass('active')
    }
  </script>
</body>

</html>