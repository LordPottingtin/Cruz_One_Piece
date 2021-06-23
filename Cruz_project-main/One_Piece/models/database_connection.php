<?php
//pulled from https://www.studentstutorial.com/
//example copnnection to a make believe DB

// after making the ChartJS work with the CSV file I realized that 
// I should have perhaps written some code to parse the CSV into a phpMyAdmin DB
// from there I could have actually utlizied the model file with actual data rather
// than explaining what it should be doing
$servername='One_Piece_DB';
$username='someUsername';
$password='password123';
$dbname = "database";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql');
}
?>