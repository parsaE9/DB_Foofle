<?php
if (isset($_POST['checkBoxArray'])) {
    foreach ($_POST['checkBoxArray'] as $postValueID) {
        $bulk_options = $_POST['bulk_options'];
        switch ($bulk_options) {
            case "published":
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueID}";
                mysqli_query($connection, $query);
                break;
            case "draft":
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueID}";
                mysqli_query($connection, $query);
                break;
            case "delete":
                $query = "DELETE FROM posts WHERE post_id = {$postValueID}";
                mysqli_query($connection, $query);
                break;
            case "clone":
                $query = "SELECT * FROM posts WHERE post_id = '{$postValueID}'";
                $select_post_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_array($select_post_query)) {
                    $post_title = $row["post_title"];
                    $post_category_id = $row["post_category_id"];
                    $post_date = $row["post_date"];
                    $post_author = $row["post_author"];
                    $post_status = $row["post_status"];
                    $post_image = $row["post_image"];
                    $post_content = $row["post_content"];
                    $post_tag = $row["post_tag"];
                }
                $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date,post_image,
              post_content, post_tag, post_status) VALUES ('{$post_category_id}',
               '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}',
                '{$post_tags}', '{$post_status}')";
                $create_post_query = mysqli_query($connection, $query);
                header("Location: posts.php");
                break;
        }
    }
}

?>


<form method="post" action="">
    <table class="table table-bordered table-hover">
        <div id="bulkOptionsContainer" class="col-xs-2">
            <select class="form-control" id="" name="bulk_options">
                <option value="">Select Option</option>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
                <option value="clone">Clone</option>
            </select>
        </div>

        <div>
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="posts.php?source=add_post">Add Post</a>
        </div>

        <thead>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Images</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Views</th>
            <th>View Post</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $query = "SELECT * FROM posts";
        $select_posts = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_posts)) {
            $post_id = $row["post_id"];
            $post_author = $row["post_author"];
            $post_title = $row["post_title"];
            $post_category_id = $row["post_category_id"];
            $post_status = $row["post_status"];
            $post_image = $row["post_image"];
            $post_tag = $row["post_tag"];
            $post_comment_count = $row["post_comment_count"];
            $post_date = $row["post_date"];
            $post_view_count = $row["post_view_count"];

            echo "<tr>";
            ?>
            <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="<?php echo $post_id; ?>"</td>
            <?php
            echo "<td>$post_id</td>";
            echo "<td>$post_author</td>";
            echo "<td>$post_title</td>";

            $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
            $select_categories_id = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_categories_id)) {
                $cat_id = $row["cat_id"];
                $cat_title = $row["cat_title"];

                echo "<td>{$cat_title}</td>";
            }

            echo "<td>$post_status</td>";
            echo "<td><img width='100' height='60' src='images/$post_image' alt='post_image'></td>";
            echo "<td>$post_tag</td>";
            echo "<td><a href='post_comments.php?p_id={$post_id}'>$post_comment_count</a></td>";
            echo "<td>$post_date</td>";
            echo "<td><a href='posts.php?reset={$post_id}'>$post_view_count</a></td>";
            echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
            echo "<td><a onclick=\"javascript : return confirm('Are you sure you want to delete this post'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
            echo "</tr>";

        }
        ?>
        </tbody>
    </table>
</form>

<?php

if (isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];
    $delete_comment_query = "DELETE FROM comments WHERE comment_post_id = {$the_post_id}";
    mysqli_query($connection, $delete_comment_query);
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
    $delete_post_query = mysqli_query($connection, $query);
    header("Location: posts.php");
}

if (isset($_GET['reset'])) {
    $the_post_id = $_GET['reset'];
    $query = "UPDATE posts SET post_view_count = 0 WHERE post_id={$the_post_id}";
    $reset_post_query = mysqli_query($connection, $query);
    header("Location: posts.php");
}
?>
