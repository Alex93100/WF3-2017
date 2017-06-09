<?php
namespace Repository;

use Doctrine\DBAL\Connection;

abstract class RepositoryAbstract {
    protected $db;

    public function __construct(Connection $db){
        $this-> db = $db;
    }
}
