<?php
session_start();

require 'includes/functions.php';

if (!authenticate()) {
    header("Location:login.php");
}

if (!still_active() ) {
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
            <th scope="col">Deal Name</th>
            <th scope="col">Client Name</th>
            <th scope="col">Deal Creator</th>
            <th scope="col">Deal Manager</th>
            <th scope="col">Loan Status</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

       <?php foreach ($deals as $row): ?>
            <tr>
                <td><?=$row['dealId']?></td>
                <td><?=$row['dealName']?></td>
                <td><?=$row['borrower']?></td>
                <td><?=$row['dealCreator']?></td>
                <td><?=$row['loanManager']?></td>
                <td><?=$row['loanStatus']?></td>
                <td><a href="<?="edit-forum.php?dealId=" . $row['dealId'] . "&user_id=" . $row['id']?>" class="btn btn-warning">Edit</a></td>
            </tr>

        <?php endforeach;?>

        </tbody>
    </table>
    </main>

    <!-- Main Content -->

<?php include "includes/footer.php"?>