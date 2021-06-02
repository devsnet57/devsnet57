<?php

require 'includes/functions.php';


if(authenticate()) header("Location:form.php");

header("Location:login.php")


?>