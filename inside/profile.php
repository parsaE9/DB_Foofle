<?php include "include/inside_header.php"; ?>
    <div id="wrapper">
    <?php include "include/inside_navigation.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Profile
                    </h1>

                    <?php
                    if(isset($_GET['source'])){
                        $source = $_GET['source'];
                    }else{
                        $source = "";
                    }
                    switch ($source){
                        case 'view_profile':
                            include "include/profile_view.php";
                            break;
                        case 'search_others':
                            include "include/profile_search.php";
                            break;
                        default:
                            include "include/profile_edit.php";
                            break;
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
<?php include "include/inside_footer.php"; ?>