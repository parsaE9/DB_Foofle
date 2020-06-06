<?php
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}

if (isset($_POST['allowed_btn'])) {

    $allowed_user = $_POST['allowed'];
    $query = "CALL profile_add_allowed_user('{$username}','{$allowed_user}', @result)";
    mysqli_query($connection, $query);
    $res = mysqli_query($connection, "SELECT @result as _p_out");
    $row = mysqli_fetch_assoc($res);
    $a = $row['_p_out'];
    if($a == 1){
        echo '<script>alert("Operation Completed Successfully!")</script>';
    }else if($a == 0){
        echo '<script>alert("Username Does Not exist!")</script>';
    }
}
if (isset($_POST['unallowed_btn'])) {

    $unallowed_user = $_POST['unallowed'];
    $query = "CALL profile_add_unallowed_user('{$username}','{$unallowed_user}', @result)";
    mysqli_query($connection, $query);
    $res = mysqli_query($connection, "SELECT @result as _p_out");
    $row = mysqli_fetch_assoc($res);
    $a = $row['_p_out'];
    if($a == 1){
        echo '<script>alert("Operation Completed Successfully!")</script>';
    }else if($a == 0){
        echo '<script>alert("Username Does Not exist!")</script>';
    }
}

?>

<div class="container-fluid" style="margin-left: -15px">
    <div class="row">
        <div class="col-lg-12">

            <form action="" method="post" enctype="multipart/form-data">

                <div class="input-group" style="width:400px ; margin-top: 15px; margin-bottom: 15px">
                    <input name="allowed" type="text" placeholder="Enter Username Who Can See Your profile" class="form-control">
                    <span class="input-group-btn">
                            <button name="allowed_btn" style="width: 70px;" class="btn btn-primary" type="submit">Add</button>
                    </span>
                </div>

                <div class="input-group" style="width:400px ; margin-top: 15px; margin-bottom: 15px">
                    <input name="unallowed" type="text" placeholder="Enter Username Who Can't See Your profile" class="form-control">
                    <span class="input-group-btn">
                            <button name="unallowed_btn" style="background-color: green; width: 70px;" class="btn btn-primary" type="submit">Add</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
</div>