<html>
<body bgcolor=white>
<h2>Two dimensional array</h2><br>

<?php

function adjmat($count){
$col = 10;
$row = 10;
$adjmatrix[$col][$row];

for($i = 1, $i<=$col, $i++){
	for($j = 1, $j<=$row, $j++){
		$adjmatrix[$i][$j]= $count;
		$count++;
	}
	$count++;
}
echo $adjmatrix[1][1];
echo $adjmatrix[1][2];
echo $adjmatrix[1][3];
echo $adjmatrix[1][4];
echo $adjmatrix[2][1];
echo $adjmatrix[2][2];

return $adjmatrix;
}

adjmat(1);

?>

</body>
</html>