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
                        $sql = "CALL news_view('{$username}')";
                        $q = $pdo -> query($sql);
                        $q -> setFetchMode(PDO::FETCH_ASSOC);

                        while ($row = $q -> fetch()) {
                            $news_ID = $row["news_ID"];
                            $date = $row["date"];
                            $content = $row["content"];
                            echo "<tr>";
                            echo "<td>$date</td>";
                            echo "<td>$content</td>";
                            echo "<td style='width: 100px'><a href='news.php?delete={$news_ID}'>Delete</a></td>";
                            echo "</tr>";

                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
if (isset($_GET['delete'])) {
    $the_news_ID = $_GET['delete'];
    mysqli_query($connection, "CALL news_delete('{$the_news_ID}')");
    header("Location: news.php");
}
?>
<?php include "include/inside_footer.php"; ?>