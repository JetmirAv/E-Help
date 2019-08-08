<!DOCTYPE html>
<html>
<?php include('components/head.php'); ?>

<body>
    <?php include('components/nav.php'); ?>


    <section class="container">
        <div class="conatiner-fluid">
            <div class="row d-flex justify-content-center ml-5">
                <h3>Chat</h3>
            </div>
            <div class="row">
                <div style="border:#343A40 1px solid; height:600px" class="col-md-3 p-2">
                    <div class="row d-flex justify-content-center">
                        <h4>Recent Chats</h4>
                    </div>
                    <hr>
                    <div class="message-list">

                        <div class="row mx-1 my-1 rounded" style="background: #ddd; height: 80px">
                            <div class="profile-pic-message">
                                <img src="images/image1.jpg" alt="" class="img-fluid rounded">
                            </div>
                            <div class="pt-4 pl-2 user-message">
                                <h6><?= $lastContact['name'] . " " . $lastContact['surname'] ?></h6>
                            </div>
                        </div>
                        <?php foreach ($otherContacts as $contact) : ?>
                            <div class="row mx-1 my-1 rounded" style="background: #ddd; height: 80px">
                                <div class="profile-pic-message">
                                    <img src="images/image1.jpg" alt="" class="img-fluid rounded">
                                </div>
                                <div class="pt-4 pl-2 user-message">
                                    <h6><?= $contact['name'] . " " . $contact['surname'] ?></h6>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col p-2 message-main" style="border:#343A40 1px solid; padding: 5px">
                    <div class="row ">
                        <div class="col d-flex justify-content-start">
                            <img src="images/image1.jpg" alt="" class="img-fluid rounded">
                        </div>
                        <div class="col-md-11">
                            <h4>Name</h4>
                        </div>
                    </div>
                    <hr>
                    <div class="message-view " id="message-view">
                        <?php foreach ($chats as $message) :
                            if ($message['receiver'] === $lastContact['id']) {

                                ?>
                                <div class="row justify-content-end mr-2">
                                    <div class="col-md-8 d-flex justify-content-end">
                                        <p class="message-box"><?= $message['content'] ?></p>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="row  justify-content-start ml-2 ">
                                    <div class="col-md-8 ">
                                        <p class="message-box"><?= $message['content'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php endforeach; ?>
                    </div>
                    <div>
                        <form class="px-2">
                            <div class="row px-4 py-2" style=" border-top:#343A40 1px solid">
                                <div class="col-md-11">
                                    <div class="form-group">
                                        <textarea style="resize: none;" placeholder="Write your message ..." class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-1 py-3">
                                    <button class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('components/footer.php'); ?>
</body>
<script>
    function updateScroll() {
        var element = document.getElementById("message-view");
        element.scrollTop = element.scrollHeight;
    }
    updateScroll()
</script>

</html>