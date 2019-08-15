<?php

if (isset(($_SESSION['token']))) {
    ?>
<script>
    window.location.replace("profile");
</script>
<?php
}


require('./view/login.php');
