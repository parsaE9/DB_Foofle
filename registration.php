<?php include "include/db.php"; ?>
<?php include "include/header.php"; ?>

<?php
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $backup_phone = $_POST['backup_phone'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $canonical_name = $_POST['canonical_name'];
    $NID = $_POST['NID'];
    $access = $_POST['access'];
    $birth_date = $_POST['birth_date'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    $backup_phone = mysqli_real_escape_string($connection, $backup_phone);
    $first_name = mysqli_real_escape_string($connection, $first_name);
    $last_name = mysqli_real_escape_string($connection, $last_name);
    $phone_number = mysqli_real_escape_string($connection, $phone_number);
    $address = mysqli_real_escape_string($connection, $address);
    $canonical_name = mysqli_real_escape_string($connection, $canonical_name);
    $NID = mysqli_real_escape_string($connection, $NID);
    $access = mysqli_real_escape_string($connection, $access);
    $birth_date = mysqli_real_escape_string($connection, $birth_date);

    $query = "CALL register('{$username}','{$password}','{$backup_phone}', '{$first_name}','{$last_name}','{$canonical_name}',
        '{$phone_number}','{$address}','{$NID}','{$access}','{$birth_date}', @result)";
    mysqli_query($connection, $query);
    $res = mysqli_query($connection, "SELECT @result as _p_out");
    $row = mysqli_fetch_assoc($res);
    $a = $row['_p_out'];

    if($a == 2){
        echo '<script>alert("Registration Successful!")</script>';
        //header("Location: home_page.php");
    }else{
        echo '<script>alert("Registration Failed : \\n- Fill All Fields\\n- Username And Password Length Must Be At Least 6 Character\\n- Your Desired Username Already Exists")</script>';
    }

}
?>

<?php include "include/navigation.php"; ?>

    <div class="container">
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                       placeholder="Enter Desired Username">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                       placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="backup_phone" class="sr-only">backup_phone</label>
                                <input type="text" name="backup_phone" id="backup_phone" class="form-control"
                                       placeholder="Security Phone number : 09xx xxx xxxx">
                            </div>
                            <div class="form-group">
                                <label for="first_name" class="sr-only">first_name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control"
                                       placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="sr-only">last_name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control"
                                       placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label for="canonical_name" class="sr-only">canonical_name</label>
                                <input type="text" name="canonical_name" id="canonical_name" class="form-control"
                                       placeholder="Canonical Name">
                            </div>
                            <div class="form-group">
                                <label for="phone_number" class="sr-only">phone_number</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control"
                                       placeholder="Public Phone Number : 09xx xxx xxxx">
                            </div>
                            <div class="form-group">
                                <label for="address" class="sr-only">address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                       placeholder="Address">
                            </div>
                            <div class="form-group">
                                <label for="NID" class="sr-only">NID</label>
                                <input type="text" name="NID" id="NID" class="form-control"
                                       placeholder="National ID">
                            </div>
                            <div class="form-group">
                                <label for="birth_date" class="sr-only">birth_date</label>
                                <input type="date" name="birth_date" id="birth_date" class="form-control"
                                       placeholder="Birth Date - example : 1999-02-20">
                            </div>
                            <div class="form-group">
                                <label for="author">Access</label>
                                <select name="access" id="">
                                    <?php
                                    echo "<option value='public'>Public</option>";
                                    echo "<option value='private'>Private</option>";
                                    ?>
                                </select>
                            </div>
                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block"
                                   value="Register">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
<?php include "include/footer.php"; ?>