<?php

if (isset($_POST['send'])) {

    $username = $_SESSION['username'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $receiver1 = $_POST['receiver1'];
    $receiver2 = $_POST['receiver2'];
    $receiver3 = $_POST['receiver3'];
    $CC1= $_POST['CC1'];
    $CC2= $_POST['CC2'];
    $CC3= $_POST['CC3'];

    $query = "CALL mail_compose('{$title}', '{$content}','{$receiver1}', '{$receiver2}', '{$receiver3}', 
                '{$CC1}', '{$CC2}','{$CC3}', @result, @result2, @result3, @result4, @result5)";
    $send_mail_query = mysqli_query($connection, $query);
    $res = mysqli_query($connection, "SELECT @result as _p_out");
    $row = mysqli_fetch_assoc($res);
    $a = $row['_p_out'];

    if($a == 99)
        echo '<script>alert("Operation Failed: \\n- Fill Required Fields\\n- Check All Email Addresses To Be Valid")</script>';
    elseif ($a == 1 OR $a == 3)
        echo '<script>alert("Operation Completed Successfully!")</script>';

    $title = "";
    $content = "";
    $receiver1 = "";
    $receiver2 = "";
    $receiver3 = "";
    $CC1= "";
    $CC2= "";
    $CC3= "";

}
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <h4>**You Must Fill Required Fields**</h4>
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" placeholder="**REQUIRED FIELD**">
    </div>

    <div class="form-group">
        <label for="author">Receivers</label>
        <input type="text" class="form-control" name="receiver1" placeholder="**REQUIRED FIELD** Receiver1@foofle.com ">
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
        <input type="text" class="form-control" name="content" style="margin-top: 5px" placeholder="**REQUIRED FIELD**">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="send" value="Send">
    </div>

</form>