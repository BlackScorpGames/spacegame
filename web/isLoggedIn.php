<?php
if(isset($_SESSION['userId'])){
    header( "location:game.php" );
}