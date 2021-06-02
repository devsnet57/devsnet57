<?php
session_start();

require 'includes/functions.php';

if (!authenticate()) {
    header("Location:login.php");
}

if (!authorize(array('director'))) {
    header("Location:forum.php");
}

$stats = fetch_dashboard_stats_db();
?>



<?php
include "includes/header.php";
?>

    <!-- Main Content -->

    <main class="h-100 p-5 pt-5 mt-5">
    <h1 class="">Loan Preview</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Deal ID</th>
            <th scope="col">Loan Status</th>
            <th scope="col">Legal Start Date</th>
            <th scope="col">Max Date</th>
            <th scope="col">Months Active</th>
            <th scope="col">Days Active</th>
            <th scope="col">Days To Expire</th>
            <th scope="col">Redeemed Date</th>
            <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>

       <?php foreach ($stats as $row): ?>
            <tr>
                <td><?=$row['dealId']?></td>
                <td><?=$row['loanStatus']?></td>
                <td><?=$row['legalStartDate']?></td>
                <td><?=$row['maxDate']?></td>
                <td><?=$row['daysActive']?></td>
                <td><?=$row['monthsActive']?></td>
                <td><?=$row['daysExpiry']?></td>
                <td><?=$row['redeemedDate']?></td>
                <td><a href="<?="edit-forum.php?dealId=" . $row['dealId'] . "&user_id=" . $row['id']?>" class="btn btn-warning">Edit</a></td>
            </tr>

        <?php endforeach;?>

        </tbody>
    </table>
    </main>

    <!-- Main Content -->

<?php include "includes/footer.php"?>