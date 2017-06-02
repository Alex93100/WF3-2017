<?php
require 'App\autoload.php';
use Model\User;

$users = User::findAll();

include './views/index.views.php';
