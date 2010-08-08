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
function multiply($matrixposition,$multiplier){
$totalmembers = mysql_get_totalmembers();
for($x=0;$x<=$totalmembers;$x++)
{
	for($y=0;$y<=$totalmembers;$y++)
	{
		$z=$matrixposition[$x][$y];
		$resultvec[$x]=$multiplier[$z]+$resultvec[$x];}
	} 
return $resultvec;
}
function array_maxvalve($array){
	$totalmembers = mysql_get_totalmembers();
	$max = 0;
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
function looplimiter($result, $multiplier){
		$totalmembers=mysql_get_totalmembers();

		$array2;
		for($x=1;$x<=$totalmembers;$x++){
			$array2[$x]=$result[$x]-$multiplier[$x];
		}
		$sumofarray2=0;
		for($x=1;$x<=$totalmembers;$x++){
			$sumofarray2=$sumofarray2+$array2[$x]*$array2[$x];
		}
	if($sumofarray2<0)
		$sumofarray2=$sumofarray2*-1;
	else
		$sumofarray2=$sumofarray2;
		
	$sumofarray2 = sqrt($sumofarray2);
	return $sumofarray2;
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