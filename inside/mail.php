<?php include "include/inside_header.php"; ?>
    <div id="wrapper">
<?php include "include/inside_navigation.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Mail
                    </h1>

                    <?php

                    if (isset($_GET['read'])) {
                        $mail_ID2 = $_GET['read'];
                        mysqli_query($connection, "CALL mail_read('{$mail_ID2}')");
                        header("Location: index.php");
                    }

                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = "";
                    }
                    switch ($source) {
                        case 'read_mail':
                            include "include/mail_inbox.php";
                            break;
                        case 'sent_mail':
                            include "include/mail_sent.php";
                            break;
                        default:
                            include "include/mail_compose.php";
                            break;
                    }

                    if (isset($_GET['delete'])) {
                        $mail_ID = $_GET['delete'];
                        mysqli_query($connection, "CALL mail_delete('{$mail_ID}')");
                        header("Location: index.php");
                    }
                    if (isset($_GET['delete2'])) {
                        $mail_ID2 = $_GET['delete2'];
                        mysqli_query($connection, "CALL mail_delete('{$mail_ID2}')");
                        header("Location: index.php");
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>
<?php include "include/inside_footer.php"; ?>