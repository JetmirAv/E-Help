<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a href="/index" class="navbar-brand">E-Health</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li id="index" class="nav-item">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li id="diseases" class="nav-item">
                    <a href="/diseases" class="nav-link">Diseases</a>
                </li>
                <li id="chat" class="nav-item">
                    <a href="/chat" class="nav-link">Chat</a>
                </li>
                <?php
                if (!isset($_SESSION['token'])) {

                    ?>

                <li id="login" class="nav-item">
                    <a href="/login" class="nav-link">login</a>
                </li>
                <?php
                } else {
                    ?>
                <li id="profile" class="nav-item">
                    <a href="/profile" class="nav-link">Profile</a>
                </li>

                <?php
                }
                ?>
                <li id="about" class="nav-item">
                    <a href="/about" class="nav-link">About</a>
                </li>
                <?php
                if (isset($_SESSION['token'])) {

                    ?>
                <li id="profile" class="nav-item">
                    <a id="logout" href="logout" class="nav-link btn btn-danger">Logout</a>
                </li>

                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<script>
    $('#logout').click(e => {
        e.preventDefault();
        $.post('../helpers/authorization.php', {
            logout: true
        }, (e) => {
            window.location.href = "/login";
        })
    })



    let path = window.location.pathname.split('/');
    if (path.includes('index')) {
        document.getElementById("index").setAttribute('class', 'active')
    } else if (path.includes('diseases')) {
        document.getElementById("diseases").setAttribute('class', 'active')
    } else if (path.includes('chat')) {
        document.getElementById("chat").setAttribute('class', 'active')
    } else if (path.includes('login')) {
        document.getElementById("login").setAttribute('class', 'active')
    } else if (path.includes('register')) {
        document.getElementById("login").setAttribute('class', 'active')
    } else if (path.includes('about')) {
        document.getElementById("about").setAttribute('class', 'active')
    } else if (path.includes('profile')) {
        document.getElementById("profile").setAttribute('class', 'active')
    } else if (path.includes('patient')) {
        document.getElementById("profile").setAttribute('class', 'active')
    } else {
        document.getElementById("index").setAttribute('class', 'active')
    }

</script>