<?php

$db = new PDO('mysql:host=localhost;dbname=exo1_userslist;charset=utf8', 'root', '', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
