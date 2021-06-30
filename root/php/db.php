<?php

function createDB(){
    $servername = "localhost";
    $username = "root";
    $password = "";

    $dbname = "bookstore";

    $con = mysqli_connect($servername,$username,$password);

    if(!$con) {
        die("Connection Failed!" .mysqli_connect_error());
    }

    //create DB
    $sql = "create database if not exists $dbname";

    if(mysqli_query($con,$sql)) {
        $con = mysqli_connect($servername,$username,$password,$dbname);

        $sql = " 
            create table if not exists books (
                id INT(11) NOT NULL AUTO_INCREMENT primary key,
                book_name varchar(25) not null,
                book_publisher varchar(20),
                book_price float
            );
            ";

        if(mysqli_query($con, $sql)){
           return $con;
            // echo "table created";
        }else{
            echo "table cannot be created!";
        }

        echo "DB created";
    }else {
        echo "Error creating db" .mysqli_error($con);
    }
}
