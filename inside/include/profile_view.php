<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Canonical Name</th>
        <th>Security Phone Number</th>
        <th>Phone Number</th>
        <th>NID</th>
        <th>Address</th>
        <th>Birth Date</th>
        <th>Access</th>
    </tr>
    </thead>
    <tbody>

    <?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $query = "SELECT * FROM personal_info WHERE username = '{$username}'";
        $query2 = "SELECT * FROM system_info WHERE username = '{$username}'";
        $select_user_profile_query = mysqli_query($connection, $query);
        $select_user_profile_query2 = mysqli_query($connection, $query2);

        while ($row = mysqli_fetch_array($select_user_profile_query)) {
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $canonical_name = $row["canonical_name"];
            $phone_number = $row["phone_number"];
            $address = $row["address"];
            $NID = $row["NID"];
            $access = $row["access"];
            $birth_date = $row["birth_date"];
        }
        while ($row = mysqli_fetch_array($select_user_profile_query2)) {
            $password = $row["password"];
            $security_phone_number = $row["phone_number"];
        }
    }
    echo "<tr>";
    ?>
    <?php
    echo "<td>$username</td>";
    echo "<td>$first_name</td>";
    echo "<td>$last_name</td>";
    echo "<td>$canonical_name</td>";
    echo "<td>$security_phone_number</td>";
    echo "<td>$phone_number</td>";
    echo "<td>$NID</td>";
    echo "<td>$address</td>";
    echo "<td>$birth_date</td>";
    echo "<td>$access</td>";
    echo "</tr>";
    ?>
    </tbody>
</table>