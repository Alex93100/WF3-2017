<?php

$pdo = new PDO('mysql:host=localhost;dbname=blog_ajax', 'root', '', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));