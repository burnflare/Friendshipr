  <?php
include_once 'appinclude.php';
include_once 'db.php';
function matrix_generator(){
	$totalmembers = mysql_get_totalmembers();
	$result = mysql_query("SELECT memberid, position FROM `members` ORDER BY memberid");
	$num1=1;
	$matrix[$totalmembers][$totalmembers];
	while($row = mysql_fetch_array($result))
	{
		$result2 = mysql_query("SELECT ownerid, memberid, friendid FROM `relation`, `members` WHERE ownerid = memberid AND ownerid = $row[memberid]");
		$num2=1;
		while($row2 = mysql_fetch_array($result2))
		{
			$position = mysql_get_position($row2['friendid']);
			$matrix[$num1][$num2]= $position;
			$num2++;
		}
		$num1++;
	}
	return $matrix;
}
function multiply($matrix,$vector){
  $totalmembers = mysql_get_totalmembers();
  for($x=0;$x<=$totalmembers;$x++)
  {
    $resultvec[$x] = 0.0;
	for($y=0;$y<=$totalmembers;$y++)
		{
			$resultvec[$x]=$resultvec[$x]+$matrix[$x][$y]*$vector[$y];
	//		echo "Colum: $y";
	//		echo $resultvec[$x];
		} 
	//	echo "Row : $x";
  	}
  	return $resultvec;
}
function array_maxvalve($array){
	$totalmembers = mysql_get_totalmembers();
	$max = 0.0;
	for($x=1;$x<=$totalmembers;$x++){
		if($array[$x]>$max)
		{$max=$array[$x];}
	}
	return $max;
}
function array_divide($array,$division){
	$totalmembers=mysql_get_totalmembers();
	for($x=1;$x<=$totalmembers;$x++){
		$array[$x]/=$division;
	}
	return $array;
}
function error_norm2($vector1,$vector2){
	$totalmembers = mysql_get_totalmembers();
	$norm2 = 0.0;
	for($x=1;$x<=$totalmembers;$x++) {
		$z = $vector1[$x]-$vector2[$x];
		$norm2 += $z*$z;
	}
	return $norm2;
}
function multiplier_generator(){
	$totalmembers=mysql_get_totalmembers();
	$array=array();
	for($x=1;$x<=$totalmembers;$x++){
		$array[$x]=1;
	}
	return $array;
}
?>