<?php

session_start();

require_once 'includes/functions.php';

if (isset($_POST['lawyer-ref-horizontal'])) {
  submit_forum();
}

