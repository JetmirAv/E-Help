<!DOCTYPE html>
<html>
<?php include_once('./components/head.php') ?>


<?php

if (!isset(($_SESSION['token']))) {
    header("Location: /login");
}
?>


<body>
    <?php include_once('./components/nav.php') ?>

    <section class="container my-5">
        <div class="container-fluid">
            <form action="/action_page.php">

                <div class="row">
                    <div class="col-md-3">
                        <div class="row">
                            <div class="row my-3 d-flex justify-content-center">
                                <h5 class="text-muted">Profile Picture</h5>
                                <div style="padding-top: 10px" class="col-md-12 ">
                                    <div class="form-group d-flex justify-content-center">
                                        <br>
                                        <input style="display: none;" type="file" accept="image/*" class="form-control" id="img">
                                        <div id="profile_image_place" class="col-md-9 d-flex justify-content-center align-items-center" style="border: 1px solid #aaa; height: 180px">
                                            <?php if ($response['img']) { ?>
                                                <img style="max-width:95%;" src="<?= $response['img'] ?>" alt="">
                                            <?php } else { ?>
                                                <p>Upload profile picture</p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div style="border: 1px #888 solid; border-radius: 1%" class="container py-4">

                            <h5 class="text-muted">Basic Information</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" value="<?= $response['name'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="surname">Surname:</label>
                                        <input type="text" class="form-control" id="surname" value="<?= $response['surname'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="birthday">Birthdate:</label>
                                        <input type="date" class="form-control" id="birthday" value="<?= $response['birthday'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number">Phone number:</label>
                                        <input type="text" class="form-control" id="phone_number" value="<?= $response['phone_number'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email address:</label>
                                        <input type="email" class="form-control" id="email" value="<?= $response['email'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" id="password">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h5 class="text-muted">Address Information</h5>
                            <hr>
                            <div class="row">
                                <hr>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" class="form-control" name="address" id="address" value="<?= $response['address'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City:</label>
                                        <input type="text" class="form-control" name="city" id="city" value="<?= $response['city'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state">State:</label>
                                        <input type="text" class="form-control" name="state" id="state" value="<?= $response['state'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="zip">Zip Code:</label>
                                        <input type="text" class="form-control" name="zip" id="zip" value="<?= $response['postal'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-end">
                                <a href="#" class="btn btn-primary btn-180">Save</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="container-fluid my-5 py-4">
            <?php if ($response['role_id'] === 3) : ?>
                <div class="row mt-4 mb-1">
                    <div class="col">
                        <h4 class="text-muted">Diseases</h4>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="#" class="btn btn-primary btn-180">Add More</a>
                    </div>
                </div>
                <div class="container-fluid">
                    <div style="border: 1px solid #888;" class="row mb-4 py-4 px-1">
                        <?php foreach ($response['diseases'] as $disease) : ?>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="images/diabet1-semundja.jpg" class="card-img-top" alt="images/diabet1-semundja.jpg">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $disease['name'] ?></h5>
                                        <a href="<?= "/disease" . "/" . $disease['id'] ?>" class="btn btn-primary">Shiko me shume</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="row mb-1 mt-4">
                    <div class="col">
                        <h4 class="text-muted">Doctors</h4>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="#" class="btn btn-primary btn-180">Add More</a>
                    </div>
                </div>
                <div class="container-fluid">
                    <div style="border: 1px solid #888;" class="row mb-4 py-4">

                        <?php foreach ($response['doctors'] as $doctor) : ?>

                            <div class="col-md-3 mt-3">
                                <div class="card profile-card-5">
                                    <div class="card-img-block">
                                        <img class="card-img-top" src="<?= $doctor['img'] ?>" alt="Card image cap">
                                    </div>
                                    <div class="card-body pt-0">
                                        <h5 class="patient_name"><?= $doctor['name'] ?></h5>
                                        <p class="patient_text"><?= $doctor['email'] ?></p>
                                        <a href="<?= "/doctor" . "/" . $doctor['id'] ?>" class="btn btn-primary">View profile</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif ?>
            <?php if ($response['role_id'] === 2) : ?>

                <div class="row mb-1 mt-4">
                    <div class="col">
                        <h4 class="text-muted">Patients</h4>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="#" class="btn btn-primary btn-180">Add More</a>
                    </div>
                </div>
                <div class="container-fluid">
                    <div style="border: 1px solid #888;" class="row mb-4 py-4">
                        <?php foreach ($response['patients'] as $patient) : ?>

                            <div class="col-md-3 mt-3">
                                <div class="card profile-card-5">
                                    <div class="card-img-block">
                                        <img class="card-img-top" src="<?= $patient['img'] ?>" alt="Card image cap">
                                    </div>
                                    <div class="card-body pt-0">
                                        <h5 class="patient_name"><?= $patient['name'] ?></h5>
                                        <a href="<?= "/patient" . "/" . $patient['id'] ?>" class="btn btn-primary">View profile</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif ?>
        </div>

    </section>

    <script>
        $('#profile_image_place').click(e => {
            $('#img').click()
        })
        $('#img').change(e => {
            $('#profile_image_place').children().remove()
            $('#profile_image_place').append('<img style="max-width:95%" id="img_placeholder"></img>')
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img_placeholder').attr('src', e.target.result);
            }

            reader.readAsDataURL(e.target.files[0]);
        })
    </script>
    <hr />
    <?php include_once('./components/footer.php') ?>

</body>

</html>