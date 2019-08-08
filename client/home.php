<!DOCTYPE html>
<html lang="en">

<?php include_once('./components/head.php') ?>

<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1440, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Shendeti - Homepage</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head> -->

<body class="bg-light">
    <?php include_once('./components/nav.php') ?>


    <section class="showcase">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item carousel-image-1 active">
                    <div class="container">
                        <div class="carousel-caption d-none d-sm-block text-right mb-5">
                            <h1 class="display-3">Heading 1</h1>
                            <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus
                                deserunt cum architecto voluptatem laborum qui culpa ad ratione accusamus
                                exercitationem.</p>
                            <a href="#" class="btn btn-danger btn-lg">Sign Up now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-image-2">
                    <div class="container">
                        <div class="carousel-caption d-none d-sm-block mb-5">
                            <h1 class="display-3">Learn more</h1>
                            <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus
                                deserunt cum architecto voluptatem laborum qui culpa ad ratione accusamus
                                exercitationem.</p>
                            <a href="#" class="btn btn-primary btn-lg">Sign Up now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-image-3">
                    <div class="container">
                        <div class="carousel-caption d-none d-sm-block text-right mb-5">
                            <h1 class="display-3">Heading 3</h1>
                            <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus
                                deserunt cum architecto voluptatem laborum qui culpa ad ratione accusamus
                                exercitationem.</p>
                            <a href="#" class="btn btn-success btn-lg">Sign Up now</a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#myCarousel" id="myCarousel" data-slide="prev" class="carousel-control-prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a href="#myCarousel" id="myCarousel" data-slide="next" class="carousel-control-next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </section>
    <div class="container">
        <div class="row bg-dark">
            <h3 class="text-light my-1 ml-3 w-100 ">E-Shendeti</h3>
        </div>
        <div class="row">
            <div class="col-sm py-sm-auto my-sm-auto py-5 my-5 res-height">
                <img class="w-100 rounded mx-auto d-block img-fluid align-middle" src="images/baner per e-shendeti.jpg" />
            </div>
            <div class="col-sm-7">
                <h2 class="mt-5 mb-3">Qëllimi</h2>
                <p class="lead">Ueb-Aplikacioni E-Shëndeti është në raport me kërkesat e pacientëve dhe stafit shëndetësor për qasje në të arriturat teknologjike dhe për zgjidhjen e problemeve administrative dhe ueb dizajn të përshtatshëm për pajisjet desktop dhe ato mobile.
                </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row bg-dark">
            <h3 class="text-light my-1 ml-3 w-100 ">Rëndësia</h3>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <h2 class="mt-5 mb-3"></h2>
                <p class="lead">Ueb-Aplikacioni E-Shëndeti është mjaft me rëndësi për institucionet shëndetësore pasi mundëson transmetimin e informacionit të pacientit automatikisht midis vendeve të kujdesit shëndetësor duke promovuar shpejtësi dhe zvogëlim të testeve dhe recetave të mjekimit.</p>
            </div>
            <div class="col-sm py-sm-auto my-sm-auto py-5 my-5 res-height">
                <img class="w-100 rounded mx-auto d-block img-fluid align-middle" src="images/image4.gif" />
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row bg-dark">
            <h3 class="text-light my-1 ml-3 w-100 ">Sëmundjet</h3>
        </div>
        <div class="row mb-5 pb-5">
            <div class="col-sm-7 mx-auto my-1">
                <h2 class="mt-5 mb-3"></h2>
                <p class="lead">Ky ueb-aplikacion do te merret lehtësimin e trajtimit të semundjeve kronike si: </p>
            </div>
            <div class="col-sm-8 mx-auto my-1">
                <ul class="list-group-flush">
                    <li class="list-group-item">Hepatiti</li>
                    <li class="list-group-item">Diabeti</li>
                    <li class="list-group-item">Hipertensioni</li>
                    <li class="list-group-item">Lupus</li>
                </ul>
            </div>
        </div>
    </div>
    <?php include_once('./components/footer.php') ?>

</body>

</html>