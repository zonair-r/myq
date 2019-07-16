<?php
require('db.php');
require_once "../vendor/autoload.php";

$faker = Faker\Factory::create();

for ($i=0; $i < 1; $i++) { 
$fname = $faker-> firstNameMale;
$lname = $faker -> lastName;
$gender = 'Male';
$date = $faker -> date($format = 'Y-m-d', $max = 'now');
$city = $faker->city;
$country = $faker -> country;
$email = $faker -> email;
$username = $faker->username;
$password = $faker ->password;

$query = "INSERT INTO `user_table` (`user_id`, `fname`, `lname`, `gender`, `dob`, `city`, `country`, `email`, `username`, `password`) VALUES (NULL, '$fname', '$lname', '$gender', '$date', '$city', '$country', '$email', '$username', '$password')";

$result = mysqli_query($conn, $query);
}
mysqli_close();
?>