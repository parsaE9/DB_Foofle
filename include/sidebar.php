<div class="col-md-4" style="margin-top: 80px">
    <div class="well">
        <h4>Login</h4>
        <form action="include/login.php" method="post">
            <div class="form-group">
                <input name="username" type="text" placeholder="Username" class="form-control">

                <div class="input-group" style="margin-top: 15px;">
                    <input name="password" type="password" placeholder="Password" class="form-control">
                    <span class="input-group-btn">
                            <button name="login" class="btn btn-primary" type="submit">Login</button>
                    </span>
                </div>
        </form>
        <hr>
        <h4><a href="registration.php">Don't have an account?</a></h4>
        <form action="registration.php" method="post">
        <span class="input-group-btn">
                    <button name="register" class="btn btn-primary" type="submit"
                            style="margin-left: 250px">Register</button>
        </span>
        </form>
    </div>
</div>