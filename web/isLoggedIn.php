<?php
if(!isset($_SESSION['userId'])){
    header( "location:index.php" );
}