<?php include "include/inside_header.php"; ?>
    <div id="wrapper">
<?php include "include/inside_navigation.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        News
                    </h1>

                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="width: 200px">Date</th>
                            <th>Content</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $username = $_SESSION['username'];
                        $query = "SELECT * FROM news WHERE username = '{$username}' ";
                        $select_news = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_news)) {
                            $date = $row["date"];
                            $content = $row["content"];

                            echo "<tr>";
                            echo "<td>$date</td>";
                            echo "<td>$content</td>";
                            echo "<td style='width: 100px'><a href='users.php?delete={$username}'>Delete</a></td>";
                            echo "</tr>";

                        }
                        ?>
                        </tbody>
                    </table>

                    <?php
                    if (isset($_GET['delete'])) {
                        if (isset($_SESSION['user_role'])) {
                            if ($_SESSION['user_role'] == 'admin') {
                                $the_user_id = mysqli_real_escape_string($connection, $_GET['delete']);
                                $query = "DELETE FROM users WHERE user_id={$the_user_id}";
                                $delete_user_query = mysqli_query($connection, $query);
                                header("Location: users.php");
                            }
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
<?php include "include/inside_footer.php"; ?>