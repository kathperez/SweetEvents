<?php

include "../app/config.php";
$conMySql = new Connect();

try {
        $conMySql->openConnection();

        $sql = "SELECT * FROM `company`";

        try {

        $execute = mysqli_query($conMySql->getConnection(),$sql);

        $array = mysqli_fetch_array($execute);



        } catch (Exception $e) {
        	
        }