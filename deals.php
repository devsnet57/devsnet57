<?php
session_start();

require 'includes/functions.php';

if (!authenticate()) {
    header("Location:login.php");
}

$deals = fetch_all_deals_db();
?>



<?php
include "includes/header.php";
?>

    <!-- Main Content -->

    <main class="h-100 p-5 pt-5 mt-5">
    <h1>Deals</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Deal Id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

       <?php foreach ($deals as $row): ?>
            <tr>
                <td><?=$row['dealId']?></td>
                <td><?=$row['first_name']?></td>
                <td><?=$row['last_name']?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['role']?></td>
                <td><a href="<?="edit-forum.php?dealId=" . $row['dealId'] . "&user_id=" . $row['id']?>" class="btn btn-warning">Edit</a></td>
            </tr>

        <?php endforeach;?>

        </tbody>
    </table>
    </main>

    <!-- Main Content -->

<?php include "includes/footer.php"?>