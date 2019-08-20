<!DOCTYPE html>
<html lang="en">

<?php include_once('./components/head.php') ?>

<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1440, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Health - About</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head> -->

<body class="bg-light">
    <?php include_once('./components/nav.php') ?>
    
    <section class="container  my-5  py-5">
		<div class="row">
			<div class="col-md-5 py-5 my-5 px-3">
                <h4>E - Health web aplikacioni</h4>
				<p>E - Health sherben per komunikim sa me te leht mes pacienteve dhe doktoreve per shkembimin e recetave per semundje te pa sherueshme por jo 
                    vdekjeprurese. Platforma gjate zhvillimit eshte ndar ne dy njesi. Pjesa semantike ku eshte perdorur HTML, CSS, Javascript, jQuery dhe bootstrap.
                    Dhe ne pjesen e backend-it (api) ku eshte perdoru php frameworku Laravel. Me kete platforme pacientet do te mund te zgjedhin doktorin qe do i sherbej
                    dhe doktori do te ket qasje ne datajet e pacientit te diagnostifikoj pacientin me njeren nga semundjet e perkrahura per momentin. Do te mund te shtoj receta per
                    semundje te caktuara dhe njekohesisht te komunikoj ne chat me pacienta dhe e kunderta. 
                </p>
			</div>
			<div class="col-md-7 py-5">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
				    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				  </ol>
				  <div class="carousel-inner">
				    <div class="carousel-item about-1 active">
				    </div>
				    <div class="carousel-item about-2">
                    </div>
                    <div class="carousel-item about-3">
                    </div>
                    <div class="carousel-item about-4">
				    </div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
                </div>
			</div>
		</div>
		
	</section>
    

    <?php include_once('./components/footer.php') ?>


</body>

</html> 