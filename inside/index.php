<?php include "include/inside_header.php"; ?>
    <div id="wrapper">

    <?php include "include/inside_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome <?php echo $_SESSION['username']; ?></h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $username = $_SESSION['username'];
                                    //
                                    $query = "SELECT * FROM news WHERE username = '{$username}' ";
                                    $select_all_news = mysqli_query($connection, $query);
                                    $news_counts = mysqli_num_rows($select_all_news);
                                    //
                                    $query = "SELECT * FROM mail WHERE sender = '{$username}'";
                                    $select_all_mail_query = mysqli_query($connection, $query);
                                    $mail_counts = mysqli_num_rows($select_all_mail_query);
                                    //
                                    $query = "SELECT * FROM receivers WHERE receiver = '{$username}'";
                                    $select_all_mail_query2 = mysqli_query($connection, $query);
                                    $mail_counts2 = mysqli_num_rows($select_all_mail_query2);
                                    ?>

                                    <div class='huge'><?php echo $mail_counts2?></div>
                                    <div>Inbox</div>
                                </div>
                            </div>
                        </div>
                        <a href="mail.php?source=read_mail">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'><?php echo $mail_counts ?></div>
                                    <div>Sent Mails</div>
                                </div>
                            </div>
                        </div>
                        <a href="mail.php?source=sent_mail">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'><?php echo $news_counts ?></div>
                                    <div>News</div>
                                </div>
                            </div>
                        </div>
                        <a href="news.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'><?php //echo $user_counts ?></div>
                                    <div> Profile</div>
                                </div>
                            </div>
                        </div>
                        <a href="profile.php?source=view_profile">
                            <div class="panel-footer">
                                <span class="pull-left">View Profile</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include "include/inside_footer.php"; ?>