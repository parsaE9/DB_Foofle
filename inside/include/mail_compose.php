<?php

if (isset($_POST['send'])) {

    $username = $_SESSION['username'];
    $title = $_POST['send'];
    $receiver1 = $_POST['receiver1'];
    $receiver2 = $_POST['receiver2'];
    $receiver3 = $_POST['receiver3'];
    $CC1= $_POST['CC1'];
    $CC2= $_POST['CC2'];
    $CC3= $_POST['CC3'];
    $content = $_POST['content'];

    $query = "CALL mail_compose('{$username}', '{$title}', '{$content}', 
              '{$receiver1}', '{$receiver2}','{$receiver3}', '{$CC1}', '{$CC2}', '{$CC3}')";

    $send_mail_query = mysqli_query($connection, $query);

    header("Location: index.php");
}
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="author">Receivers</label>
        <input type="text" class="form-control" name="receiver1" placeholder="Receiver1@foofle.com">
        <input type="text" class="form-control" name="receiver2" style="margin-top: 5px" placeholder="Receiver2@foofle.com">
        <input type="text" class="form-control" name="receiver3" style="margin-top: 5px" placeholder="Receiver3@foofle.com">
    </div>

    <div class="form-group">
        <label for="author">CC Receivers</label>
        <input type="text" class="form-control" name="CC1" placeholder="CC Receiver1@foofle.com">
        <input type="text" class="form-control" name="CC2" style="margin-top: 5px" placeholder="CC Receiver2@foofle.com">
        <input type="text" class="form-control" name="CC3" style="margin-top: 5px" placeholder="CC Receiver3@foofle.com">
    </div>

    <div class="form-group">
        <label for="post_content">Content</label>
        <textarea class="form-control" name="content" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="send" value="Send">
    </div>

</form>