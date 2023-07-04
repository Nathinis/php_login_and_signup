<?php

$dbhost = "localhost";
$dbuser = "nathi";
$dbpass = "NathiNis";
$dbname = "learnDB";

$conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){
    
    die("failed to connect!");
}