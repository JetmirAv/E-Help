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
            <form id="update_profile" action="#">

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
                                        <input type="text" class="form-control" id="update_name" value="<?= $response['name'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="surname">Surname:</label>
                                        <input type="text" class="form-control" id="update_surname" value="<?= $response['surname'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="birthday">Birthdate:</label>
                                        <input type="date" class="form-control" id="update_birthday" value="<?= $response['birthday'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number">Phone number:</label>
                                        <input type="text" class="form-control" id="update_phone_number" value="<?= $response['phone_number'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email address:</label>
                                        <input type="email" class="form-control" id="update_email" value="<?= $response['email'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" id="update_password">
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
                                        <input type="text" class="form-control" name="address" id="update_address" value="<?= $response['address'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City:</label>
                                        <input type="text" class="form-control" name="city" id="update_city" value="<?= $response['city'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state">State:</label>
                                        <input type="text" class="form-control" name="state" id="update_state" value="<?= $response['state'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="zip">Zip Code:</label>
                                        <input type="text" class="form-control" name="zip" id="update_zip" value="<?= $response['postal'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-end">
                                <input type="submit" value="Save" class="btn btn-primary btn-180" />
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
            </div>
            <div class="container-fluid">
                <div style="border: 1px solid #888;" class="row mb-4 py-4 px-1 d-flex justify-content-center">

                    <?php if (sizeof($response['diseases']) !== 0) {
                            foreach ($response['diseases'] as $disease) : ?>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="images/diabet1-semundja.jpg" class="card-img-top" alt="images/diabet1-semundja.jpg">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-center"><?= $disease['name'] ?></h5>
                                <a href="<?= "/disease" . "/" . $disease['id'] ?>" class="btn btn-primary">Shiko me shume</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;
                        } else { ?>
                    <h4>Ju nuk jeni diagnostifikuar ende me ndonje semundje</h4>
                    <?php } ?>
                </div>
            </div>
            <div class="row mb-1 mt-4">
                <div class="col">
                    <h4 class="text-muted">Doctor</h4>
                </div>
                <div class="col d-flex justify-content-end">
                    <button id="add_doctors_to_patient" type="button" class="btn btn-primary btn-180" data-toggle="modal" data-target="#exampleModalCenter">
                        <?php if (isset($response['doctor'])) { ?>
                        Change
                        <?php  } else { ?>
                        Add
                        <?php } ?>
                    </button>
                    <!-- <a href="#" class="btn btn-primary btn-180">Add More</a> -->
                </div>
            </div>
            <div class="container-fluid">
                <div style="border: 1px solid #888;" class="row mb-4 py-4 d-flex justify-content-center">
                    <?php if (isset($response['doctor'])) { ?>
                    <div class="col-md-5 mt-3">
                        <div class="card profile-card-5">
                            <div class="card-img-block">
                                <img class="card-img-top" src="<?= $response['doctor']['img'] ?>" alt="Card image cap">
                            </div>
                            <div class="card-body mt-1 ">
                                <h5 class="patient_name d-flex justify-content-center"><span class="h6">name: </span> <?= $response['doctor']['name'] ?></h5>
                                <h5 class="patient_name d-flex justify-content-center"><span class="h6">surname: </span><?= $response['doctor']['surname'] ?></h5>
                                <h5 class="patient_text d-flex justify-content-center"><span class="h6">email: </span><?= $response['doctor']['email'] ?></h5>
                                <!-- <a href="<?= $response['doctor']['id'] ?>" class="btn btn-primary">View profile</a> -->
                            </div>
                        </div>
                    </div>
                    <?php  } else { ?>
                    <h4>You did not add any doctor yet</h4>
                    <?php } ?>
                </div>
            </div>
            <?php endif ?>
        </div>
        <?php if ($response['role_id'] === 2) : ?>

        <div class="row mb-1 mt-4">
            <div class="col">
                <h4 class="text-muted">Patients</h4>
            </div>
        </div>
        </div>
        <div class="container-fluid mb-5 pb-5">
            <div style="border: 1px solid #888;" class="row mb-4 py-4">
                <?php foreach ($response['patients'] as $patient) : ?>

                <div class="col-md-3 mt-3">
                    <div class="card profile-card-5">
                        <div class="card-img-block">
                            <img class="card-img-top" src="<?= $patient['img'] ?>" alt="Card image cap">
                        </div>
                        <div class="card-body pt-0 d-flex justify-content-center">
                            <h5 class="patient_name"><?= $patient['name'] . " " . $patient['surname'] ?></h5>
                        </div>
                        <a href="<?= "/patient" . "/" . $patient['id'] ?>" class="btn btn-primary">View profile</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif ?>
        </div>

    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option selected value="null" disabled>Chose</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="save-doctor-for-patient" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

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

        $("#add_doctors_to_patient").on('click', e => {
            $.ajax({
                url: 'http://127.0.0.1:8000/' + 'api/patient/get_patient_doctors',
                type: 'GET',
                beforeSend: function(request) {
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    request.setRequestHeader("Accept", "application/json");
                    request.setRequestHeader("Authorization", "Bearer " + "<?= $_SESSION['token'] ?>");
                },
                success: function(response) {
                    let data = response.count
                    $("#exampleFormControlSelect1").empty()
                    $("#exampleFormControlSelect1").append(`
                            <option selected value="null" disabled>Chose</option>
                        `)
                    data.map(e => {
                        $("#exampleFormControlSelect1").append(`
                            <option value="${e.id}">${e.name + " " + e.surname}</option>
                        `)
                    })
                },
                error: (response) => {
                    console.log(response)

                }
            });
        })
        $("#save-doctor-for-patient").on('click', e => {
            $.ajax({
                url: 'http://127.0.0.1:8000/' + 'api/patient/add_doctor_to_patient',
                type: 'POST',
                beforeSend: function(request) {
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    request.setRequestHeader("Accept", "application/json");
                    request.setRequestHeader("Authorization", "Bearer " + "<?= $_SESSION['token'] ?>");
                },
                data: {
                    doctor_id: $("#exampleFormControlSelect1 :selected").val()
                },
                success: function(response) {
                    if (response.success) {
                        window.location.reload()
                    }
                },
                error: (response) => {
                    console.log(response)

                }
            });
        })

        $('#update_profile').submit(function(e) {
            e.preventDefault()
            if (img) {
                let formInput = {
                    email: $('#update_email').val(),
                    state: $('#update_state').val(),
                    postal: $('#update_zip').val(),
                    phone_number: $('#update_phone_number').val(),
                    name: $('#update_name').val(),
                    surname: $('#update_surname').val(),
                    address: $('#update_address').val(),
                    city: $('#update_city').val(),
                    password: $('#update_password').val(),
                    birthday: $('#update_birthday').val(),
                    // img: img
                }


                $.ajax({
                    url: 'http://127.0.0.1:8000/' + 'api/patient/update',
                    type: 'POST',
                    // contentType: 'multipart/form-data',
                    // processData : false, /// Add this line without processing parameters
                    contentType: false,
                    beforeSend: function(request) {
                        request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        request.setRequestHeader("Accept", "application/json");
                        request.setRequestHeader("Authorization", "Bearer " + "<?= $_SESSION['token'] ?>");
                        // console.log(request)
                    },
                    data: formInput,
                    success: function(response) {
                        if (response) {
                            $.post('helpers/update_user.php', {
                                user: response.user
                            }, (e) => {
                                if (e)
                                    window.location.reload()
                            })
                        }
                    },
                    error: (response) => {
                        console.log(response)

                    }
                });
            } else {

            }

        })
    </script>
    <hr />
    <?php include_once('./components/footer.php') ?>

</body>

</html>