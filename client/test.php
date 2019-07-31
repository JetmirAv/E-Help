<!DOCTYPE html>
<html lang="en">
<?php include_once('./components/head.php') ?>




<body>
    <form action="#" id="sigin" method="POST">
        <input type="text" name="email" id="email">
        <input type="text" name="password" id="password">
        <input type="submit" name="sub" id="submit">
    </form>
</body>
<script>
    jQuery('#sigin').submit(function(e){
        e.preventDefault()
        console.log('ckemi')
        var email = $('#email').val()
        var password = $('#password').val()
        console.log(email, password)
        // $.post('http://127.0.0.1:8000/api/auth/login', {email: email, password: password}, function(data){
        //     console.log(data)
        // });
        $.ajax({
            url:  'http://127.0.0.1:8000/api/auth/login',
            type: 'POST',
            beforeSend: function(request) {
              request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
              request.setRequestHeader("Accept", "application/json");
            },
            data: {
                email: email,
                password: password
            },
            success: function (data) {
              if (data) {
                  console.log("data")
                  console.log(data)
                  console.log("data")
              } else {
                console.log("Error")
              }
            },
            error: function (err){
                console.log(err)
            }
            
          });
    })


    $('#singninForm').submit(function(e){
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
            success: function (data) {
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
</script>
</html>