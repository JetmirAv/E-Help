<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<?php include_once('./components/head.php') ?>

<!-- 
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog Post - Start Bootstrap Template</title>
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head> -->


<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a href="index.html" class="navbar-brand">E-Help</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="tour.html" class="nav-link">Tour</a>
                    </li>
                    <li class="nav-item">
                        <a href="forum.html" class="nav-link">Forum</a>
                    </li>
                    <li class="nav-item active">
                        <a href="account.html" class="nav-link ">My Account</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.html" class="nav-link">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row m-y-2 align-middle">
            <!-- edit form column -->
            <div class="col text-lg-center">
                <h2>Edit Profile</h2>
            </div>
            <div class="col">
                <div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a>
                    This is an <strong>.alert</strong>. Use this to show important messages to the user.
                </div>
            </div>
            <div class="col-lg-10 push-lg-4 personal-info">
                <form role="form">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">First name</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="email" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Address</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                        <div class="col-lg-6">
                            <input class="form-control" type="text" />
                        </div>
                        <div class="col-lg-3">
                            <input class="form-control" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Time Zone</label>
                        <div class="col-lg-9">
                            <select id="user_time_zone" class="form-control" size="0">
                                <option>(GMT-10:00) Hawaii</option>
                                <option>(GMT-09:00) Alaska</option>
                                <option>(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                <option>(GMT-07:00) Arizona</option>
                                <option>(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                <option selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                <option>(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                <option>(GMT-05:00) Indiana (East)</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Username</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Password</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="password" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="password" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                        <div class="col-lg-9">
                            <input type="reset" class="btn btn-secondary" value="Cancel" />
                            <input type="button" class="btn btn-primary" value="Save Changes" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 pull-lg-8 text-xs-center">
                <img src="//placehold.it/150" class="m-x-auto img-fluid img-circle" alt="avatar" />
                <h6 class="m-t-2">Upload a different photo</h6>
                <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input">
                    <span class="custom-file-control">Choose file</span>
                </label>
            </div>
        </div>
    </div>
    <hr />
</body>