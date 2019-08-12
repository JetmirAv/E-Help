<footer id="main-footer" class="footer text-center p-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <p>Copyright &copy;
                    <span id="year"></span> E-Help</p>
            </div>
        </div>
    </div>
</footer>

<script>
    function refreshToken() {
        let token = "<?=$_SESSION['token'] ?>"
        console.log(token)
        $.ajax({
            url: 'http://127.0.0.1:8000/' + 'api/auth/refresh',
            type: 'POST',
            beforeSend: function(request) {
                request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                request.setRequestHeader("Authorization", "Bearer " + token);
                request.setRequestHeader("Access-Control-Allow-Origin", "*");
                request.setRequestHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');  
            },
            
            success: function(response) {
                console.log(response)
                $.post('helpers/authorization.php', {
                    token: response
                }, (e) => {
                    console.log("Another log")
                    console.log(e)
                    console.log("Another log")
                })
            },
            error: (response) => {
                console.log("error")
                console.log(response)

            }
        });
    }
    setInterval(refreshToken, 1000 * 60 * 10);
</script>