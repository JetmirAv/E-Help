<!DOCTYPE html>
<html>
<?php include('components/head.php'); ?>

<body>
    <?php include('components/nav.php'); ?>


    <section class="container">
        <div class="conatiner-fluid mt-4">
            <div class="row">
                <div style="border:#343A40 1px solid; height:600px" class="col-md-3 p-2">
                    <div class="row d-flex justify-content-center">
                        <h4>Recent Chats</h4>
                    </div>
                    <hr>
                    <div class="message-list">


                        <?php foreach ($contacts as $contact) : ?>
                            <div class="row mx-1 my-1 rounded" style="background: #ddd; height: 80px">
                                <div class="profile-pic-message">
                                    <img src="<?= $contact['img'] ?>" alt="" class="img-fluid rounded">
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
                            <img src="<?= $lastContact['img'] ?>" alt="" class="img-fluid rounded">
                        </div>
                        <div class="col-md-11">
                            <h4><?= $lastContact === null ? "No chat has been made" : $lastContact['name'] . " " . $lastContact['surname'] ?></h4>
                        </div>
                    </div>
                    <hr>
                    <div class="message-view " id="message-view">
                        <?php
                        if ($chats) {
                            foreach ($chats as $message) :
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
                            <?php endforeach;
                        } ?>
                    </div>
                    <div>
                        <form action="#" class="px-2" id="send_message_form">
                            <div class="row px-4 py-2" style=" border-top:#343A40 1px solid">
                                <div class="col-md-11">
                                    <div class="form-group">
                                        <textarea style="resize: none;" placeholder="Write your message ..." class="form-control" id="message_content" rows="2"></textarea>
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
    let receiver = "<?= $lastContact['id'] ?>"
    let last_fetched_id = "<?= $last_chat['id'] ?>"

    function updateScroll() {
        var element = document.getElementById("message-view");
        element.scrollTop = element.scrollHeight;
    }
    updateScroll()

    $('#send_message_form').submit(function(e) {
        e.preventDefault()
        console.log("po")
        var content = $('#message_content').val()
        $.ajax({
            url: 'http://127.0.0.1:8000/' + 'api/chat',
            type: 'POST',
            beforeSend: function(request) {
                request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                request.setRequestHeader("Accept", "application/json");
                request.setRequestHeader("Authorization", "Bearer <?= $_SESSION['token'] ?>");
            },
            data: {
                content: content,
                receiver: receiver
            },
            success: function(response) {
                // console.log(response);
                updateChat()
            },
            error: (response) => {
                console.log(response)

            }
        });
    })

    function updateChat() {
        $.ajax({
            url: 'http://127.0.0.1:8000/' + 'api/chat/refresh',
            type: 'POST',
            beforeSend: function(request) {
                request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                request.setRequestHeader("Accept", "application/json");
                request.setRequestHeader("Authorization", "Bearer <?= $_SESSION['token'] ?>");
            },
            data: {
                receiver: receiver,
                last_fetched_id: last_fetched_id
            },
            success: function(response) {
                
                $("#message_content").val('');
                var view = $("#message-view");
                for (var i = 0; i < response.length; i++) {
                    let chat = response[i]
                    if (chat.receiver === parseInt(receiver)) {
                        view.append(`
                            <div class="row justify-content-end mr-2">
                                <div class="col-md-8 d-flex justify-content-end">
                                    <p class="message-box">${chat.content}</p>
                                </div>
                            </div>
                            `)
                    } else {
                        view.append(`
                            <div class="row justify-content-start ml-2 ">
                                <div class="col-md-8 d-flex justify-content-end">
                                    <p class="message-box">${chat.content}</p>
                                </div>
                            </div>
                            `)
                    }
                }
                updateScroll();

            },
            error: (response) => {
                console.log(response)

            }
        });
    }

    setInterval(updateChat, 1000);
</script>

</html>