<?php
session_unset();
session_destroy();

header("Location: ../View/index.html");
?>