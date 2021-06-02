<?php if(isset($_SESSION['success'])): ?>
    <div class="alert alert-success" role="alert">
    <?= $_SESSION['success'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; unset($_SESSION['success']); ?>


<?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger" role="alert">
    <?= $_SESSION['error'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; unset($_SESSION['error']); ?>


