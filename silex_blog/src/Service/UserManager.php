<?php
namespace Service;


class UserManager {
    public function encodePassword($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
