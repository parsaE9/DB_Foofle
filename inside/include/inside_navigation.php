<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Foofle Mail Service</a>
    </div>
    <ul class="nav navbar-right top-nav">
        <li><a href="index.php"><i class="fa fa-user"></i><?php echo " " . $_SESSION['username']; ?></a></li>
        <li><a href="../include/logout.php"><i class="fa fa-fw fa-power-off"></i>Log Out</a></li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i
                            class="fa fa-user"></i> Profile<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="profile.php?source=view_profile">View Profile</a>
                    </li>
                    <li>
                        <a href="profile.php">Edit Profile</a>
                    </li>
                    <li>
                        <a href="profile.php?source=allowed_unallowed">Allowed & Unallowed Users</a>
                    </li>
                    <li>
                        <a href="profile.php?source=search_others">Search Others</a>
                    </li>
                    <li>
                        <a onclick="javascript : return confirm('Are you sure you want to delete your account'); "
                           href="../include/logout.php?source=delete_account">Delete Account</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i
                            class="fa fa-fw fa-file"></i> Mail <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="posts_dropdown" class="collapse">
                    <li>
                        <a href="mail.php">Compose</a>
                    </li>
                    <li>
                        <a href="mail.php?source=read_mail">Inbox</a>
                    </li>
                    <li>
                        <a href="mail.php?source=sent_mail">Sent</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="news.php"><i class="fa fa-arrow-circle-right"></i> News</a>
            </li>
        </ul>
    </div>
</nav>