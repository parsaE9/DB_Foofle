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
                    if(isset($_GET['source'])){
                        $source = $_GET['source'];
                    }else{
                        $source = "";
                    }
                    switch ($source){
                        case 'read_mail':
                            include "include/mail_read.php";
                            break;
                        case 'sent_mail':
                            include "include/mail_sent.php";
                            break;
                        default:
                            include "include/mail_compose.php";
                            break;
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
<?php include "include/inside_footer.php"; ?>