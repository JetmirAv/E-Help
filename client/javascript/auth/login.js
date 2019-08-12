import {
    baseUrl
} from '../constants'

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

  // $('#singnupFrom').submit(function(e) {
  //   e.preventDefault()
  //   let formInput = {
  //     email: $('#signupEmail').val(),
  //     state: $('#signupState').val(),
  //     postal: $('#signupPostal').val(),
  //     phone_number: $('#signupPhone').val(),
  //     name: $('#signupFirstName').val(),
  //     surname: $('#signupLastName').val(),
  //     address: $('#signupAddress').val(),
  //     city: $('#signupCity').val(),
  //     pos: $('#signupPosition').val(),
  //     password: $('#signupPassword').val(),
  //     c_password: $('#signupCPassword').val(),
  //     birthday: $('#signupBirthday').val()
  //   }


  //   $.ajax({
  //     url: 'http://127.0.0.1:8000/' + 'api/auth/register',
  //     type: 'POST',
  //     beforeSend: function(request) {
  //       request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  //       request.setRequestHeader("Accept", "application/json");
  //     },
  //     data: formInput,
  //     success: function(response) {
  //       $.post('helpers/authorization.php', {
  //         token: response
  //       }, (e) => {
  //         if (e)
  //           window.location.href = "index.php";
  //       })
  //     },
  //     error: (response) => {
  //       console.log(response)

  //     }
  //   });
  })