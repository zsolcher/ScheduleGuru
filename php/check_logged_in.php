<?php


if(!(isset($_SESSION['id_user']) && $_SESSION['id_user'] != '')) {
    header("Location: ./login.php");
}
