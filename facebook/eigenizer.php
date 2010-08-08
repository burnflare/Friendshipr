<?php
include_once 'appinclude.php';
include_once 'db.php';
include_once 'display.php';
include_once 'profile.php';
include_once 'calculate.php';
function eigen_repopulate_static_position(){
	//Updates Table with Position Values
	mysql_calculate_position();
}
function eigen_mastermind(){
//Calculating Ranking(running on db.php)
$matrix = matrix_generator();
$multiplier = multiplier_generator();
$result = array_divide($multiplier,0.1);
$epsilon = 0.00001;
while(error_norm2($multiplier,$result) > $epsilon){
       $multiplier = $result;
	$result = multiply($matrix, $multiplier);
	$max = array_maxvalve($result);
	$result = array_divide($result, $max);
}
return $multiplier;
}
function eigen_update($result){
	mysql_update_eigen($result);
	mysql_ranking();
}
?>