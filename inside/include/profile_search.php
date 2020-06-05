<form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Search Others Profile</label>
        <input class="form-control" type="text" name="username" placeholder="Enter Username">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Search">
    </div>
</form>
<br>
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Canonical Name</th>
        <th>Phone Number</th>
        <th>NID</th>
        <th>Address</th>
        <th>Birth Date</th>
    </tr>
    </thead>
    <tbody>

    <?php
    if (isset($_SESSION['username'])) {
        $username = "";
        $first_name = "";
        $last_name = "";
        $canonical_name = "";
        $phone_number = "";
        $address = "";
        $NID = "";
        $birth_date = "";
        $access = "";
    }

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $first_name = "";
        $last_name = "";
        $canonical_name = "";
        $phone_number = "";
        $address = "";
        $NID = "";
        $birth_date = "";
        $access = "";

        $sql = "CALL profile_view('{$username}')";
        $q = $pdo->query($sql);
        $q -> setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $q -> fetch()) {
            $username = $row["username"];
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $canonical_name = $row["canonical_name"];
            $phone_number = $row["phone_number"];
            $address = $row["address"];
            $NID = $row["NID"];
            $birth_date = $row["birth_date"];
            $access = $row["access"];
        }
        if ($access == "private"){
            $first_name = "*";
            $last_name = "*";
            $canonical_name = "*";
            $phone_number = "*";
            $address = "*";
            $NID = "*";
            $birth_date = "*";
        }else if ($access == null){
            $username = "";
        }
    }
    
    echo "<tr>";
    ?>
    <?php
    echo "<td>$username</td>";
    echo "<td>$first_name</td>";
    echo "<td>$last_name</td>";
    echo "<td>$canonical_name</td>";
    echo "<td>$phone_number</td>";
    echo "<td>$NID</td>";
    echo "<td>$address</td>";
    echo "<td>$birth_date</td>";
    echo "</tr>";
    ?>
    </tbody>
</table>