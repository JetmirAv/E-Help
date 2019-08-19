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
                                            <img style="max-width:95%;" src="<?= 'data:image/jpeg;base64,' . $response['img'] ?>" alt="">
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
                <?php if ($_SESSION['user_role'] == 2) { ?>
                <div class="col d-flex justify-content-end">
                    <button id="add_disease_to_patient" type="button" class="btn btn-primary btn-180" data-toggle="modal" data-target="#diseaseModal">
                        Add
                    </button>
                    <!-- <a href="#" class="btn btn-primary btn-180">Add More</a> -->
                </div>
                <?php } ?>

            </div>
            <div class="container-fluid">
                <div style="border: 1px solid #888;" class="row mb-4 py-4 px-1 d-flex justify-content-center">

                    <?php if (sizeof($response['diseases']) !== 0) {
                            foreach ($response['diseases'] as $disease) : ?>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="<?= 'data:image/jpeg;base64,' . $disease['img'] ?>" class="card-img-top" alt="images/diabet1-semundja.jpg">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-center"><?= $disease['name'] ?></h5>
                                <div class="row d-flex justify-content-center p-1">
                                    <button onclick="seeReceipts(<?= $disease['id'] ?>)" id="see_receipts" type="button" class="btn btn-primary btn-180" data-toggle="modal" data-target="#receiptShowModal">
                                        See all receipts</button>
                                </div>
                                <?php if ($_SESSION['user_role'] == 3) { ?>
                                <div class="row d-flex justify-content-center p-1">
                                    <a href="<?= "/diseases#" . "" . $disease['id'] ?>" class="btn btn-primary">See more</a>
                                </div>
                                <?php } else { ?>
                                <div class="row d-flex justify-content-center">
                                    <button onclick="changeDisease(<?= $disease['id'] ?>)" id="add_doctors_to_patient" type="button" class="btn btn-primary btn-180" data-toggle="modal" data-target="#receiptModal">
                                        Add Receipt</button>
                                </div>
                                <?php } ?>
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

                <?php if ($_SESSION['user_role'] == 3) { ?>
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
                <?php } ?>
            </div>
            <div class="container-fluid">
                <div style="border: 1px solid #888;" class="row mb-4 py-4 d-flex justify-content-center">
                    <?php if (isset($response['doctor'])) { ?>
                    <div class="col-md-5 mt-3">
                        <div class="card profile-card-5">
                            <div class="card-img-block">
                                <img class="card-img-top" src="<?= 'data:image/jpeg;base64,' . $response['doctor']['img'] ?>" alt="Card image cap">
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
                            <img class="card-img-top" src="<?= 'data:image/jpeg;base64,' . $patient['img'] ?>" alt="Card image cap">
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add or change doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select the doctor you want</label>
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

    <!-- Receipt Modal -->
    <div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Receipt</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div>
                    <div class="row d-flex justify-content-center">
                        <div class="form-group" style="width: 85%;">
                            <label class="h5" for="exampleFormControlSelect1">Content</label>
                            <textarea style="resize: none; " placeholder="Write your receipt here ..." class="form-control" id="receipt_content" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="add-receipt" type="button" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="receiptShowModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Receipts for <span id="diseaseTitleReceipt"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="receiptShowModalContent">
                    <div class="row d-flex justify-content-center py-2">
                        <div class="form-group" style="width: 85%;">
                            No receipts for this disease yet!
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button id="add-receipt" type="button" class="btn btn-primary">Add</button> -->
                </div>
            </div>
        </div>
    </div>


    <!-- Disease Modal -->
    <div class="modal fade" id="diseaseModal" tabindex="-1" role="dialog" aria-labelledby="diseaseModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="diseaseModalTitle">Add disease</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <div class="form-group">
                        <label for="diseaseControl">Select the disease</label>
                        <select class="form-control" id="diseaseControl">
                            <option selected value="null" disabled>Chose</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="save-disease-for-patient" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        let img = null;
        let disease_id = null

        function changeDisease(id) {
            disease_id = id;
            console.log(disease_id);
        }
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

            img = input.files[0];
            reader.readAsDataURL(e.target.files[0]);
        })

        function seeReceipts(id) {
            $("#receiptShowModalContent").empty()

            $.ajax({
                url: 'http://127.0.0.1:8000/' + 'api/patient/see_receipts',
                type: 'POST',
                beforeSend: function(request) {
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    request.setRequestHeader("Accept", "application/json");
                    request.setRequestHeader("Authorization", "Bearer " + "<?= $_SESSION['token'] ?>");
                },
                data: {
                    disease_id: id,
                    patient_id: <?= $response['id'] ?>
                },
                success: function(response) {
                    data = response.receipts
                    console.log(data)
                    if (data) {
                        $("#diseaseTitleReceipt").append(`
                            ${data[0].disease.name} from Dr.${data[0].doctor.name}
                            `)

                        data.map(res => {
                            $("#receiptShowModalContent").append(`
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-6 ml-5">
                                    Content: ${res.content}   
                                </div>  
                                <div class="col">
                                    Date: ${res.created_at}
                                </div>
                            </div>
                            `)
                        })
                    } else {
                        $("#receiptShowModalContent").append(`
                        <div class="row d-flex justify-content-center py-2">
                            <div class="form-group" style="width: 85%;">
                                No receipts for this disease yet!
                            </div>
                        </div>
                        `)
                    }
                },
                error: (response) => {
                    console.log(response)

                }
            });
        }


        $("#add_disease_to_patient").on('click', e => {

            $.ajax({
                url: 'http://127.0.0.1:8000/' + 'api/doctor/get_diseases',
                type: 'GET',
                beforeSend: function(request) {
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    request.setRequestHeader("Accept", "application/json");
                    request.setRequestHeader("Authorization", "Bearer " + "<?= $_SESSION['token'] ?>");
                },
                success: function(response) {
                    console.log(response)
                    let data = response.diseases
                    $("#diseaseControl").empty()
                    $("#diseaseControl").append(`
                            <option selected value="null" disabled>Chose</option>
                        `)
                    data.map(e => {
                        $("#diseaseControl").append(`
                            <option value="${e.id}">${e.name}</option>
                        `)
                    })
                },
                error: (response) => {
                    console.log(response)

                }
            });
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


        $("#save-disease-for-patient").on('click', e => {
            $.ajax({
                url: 'http://127.0.0.1:8000/' + 'api/doctor/add_disease_to_patient',
                type: 'POST',
                beforeSend: function(request) {
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    request.setRequestHeader("Accept", "application/json");
                    request.setRequestHeader("Authorization", "Bearer " + "<?= $_SESSION['token'] ?>");
                },
                data: {
                    disease: $("#diseaseControl :selected").val(),
                    patient: <?= $response['id'] ?>
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



        $("#add-receipt").on('click', e => {
            e.preventDefault()
            $.ajax({
                url: 'http://127.0.0.1:8000/' + 'api/doctor/add_receipt',
                type: 'POST',
                beforeSend: function(request) {
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    request.setRequestHeader("Accept", "application/json");
                    request.setRequestHeader("Authorization", "Bearer " + "<?= $_SESSION['token'] ?>");
                },
                data: {
                    patient_id: <?= $response['id'] ?>,
                    content: $("#receipt_content").val(),
                    disease_id: disease_id
                },
                success: function(response) {
                    if (response.success) {
                        window.location.reload()
                    }
                },
                error: (response) => {
                    console.log(response)

                }
            })
        })



        $('#update_profile').submit(function(e) {
            e.preventDefault()

            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    $.post('helpers/update_user.php', {
                        user: this.response
                    }, (e) => {
                        if (e)
                            window.location.reload()
                    })
                }
            };

            request.open('post', 'http://localhost:8000/api/auth/update')

            var form = new FormData();
            form.append('email', $('#update_email').val())
            form.append('state', $('#update_state').val())
            form.append('postal', $('#update_zip').val())
            form.append('phone_number', $('#update_phone_number').val())
            form.append('name', $('#update_name').val())
            form.append('surname', $('#update_surname').val())
            form.append('address', $('#update_address').val())
            form.append('city', $('#update_city').val())
            form.append('password', $('#update_password').val())
            form.append('birthday', $('#update_birthday').val())

                !img ? null : form.append('img', img);


            request.send(form)

            


        })
    </script>
    <hr />
    <?php include_once('./components/footer.php') ?>

</body>

</html>