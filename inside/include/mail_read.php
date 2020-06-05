<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Sender</th>
        <th>Title</th>
        <th>Date</th>
        <th>Content</th>
        <th>Receiver1</th>
        <th>Receiver2</th>
        <th>Receiver3</th>
        <th>CC Receiver1</th>
        <th>CC Receiver2</th>
        <th>CC Receiver3</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $username = $_SESSION['username'];
    $sql = "CALL mail_inbox('{$username}')";
    $q = $pdo->query($sql);
    $q -> setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $q -> fetch()) {
        $sender= $row["sender"];
        $title = $row["title"];
        $date = $row["date"];
        $content = $row["content"];
        $receiver1= $row["receiver1"];
        $receiver2= $row["receiver2"];
        $receiver3= $row["receiver3"];
        $CC1= $row["CCreceiver1"];
        $CC2= $row["CCreceiver2"];
        $CC3= $row["CCreceiver3"];

        echo "<tr>";
        echo "<td>$sender</td>";
        echo "<td>$title</td>";
        echo "<td>$date</td>";
        echo "<td>$content</td>";
        echo "<td>$receiver1</td>";
        echo "<td>$receiver2</td>";
        echo "<td>$receiver3</td>";
        echo "<td>$CC1</td>";
        echo "<td>$CC2</td>";
        echo "<td>$CC3</td>";
        echo "<td><a href='users.php?delete={$sender}'>Delete</a></td>";
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