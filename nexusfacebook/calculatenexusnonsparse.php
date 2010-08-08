<?php
		  $arraytester = array(array(1,-0.25,-0.25,-0.25,0,-0.25,0,0,0,0),
					 array(0,1,0,0,0,0,0,0,0,0),
					 array(0,0,1,0,0,0,0,0,0,0),
					 array(0,0,0,1,0,-0.25,0,0,0,0),
					 array(-0.25,0,0,0,1,0,0,0,0,0),
					 array(0,0,0,0,0,1,0,0,0,0),
					 array(0,0,0,0,0,0,1,0,-0.25,0),
					 array(0,-0.25,-0.25,-0.25,0,0,0,1,0,0),
					 array(0,0,0,0,0,0,0,0,1,-0.25),
					 array(0,0,0,0,0,0,0,0,-0.25,0));
$vec11 = array(1,2,3,5);
$vec12 = array();
$vec13 = array();
$vec14 = array(5);
$vec15 = array(0);
$vec16 = array();
$vec17 = array(8);
$vec18 = array(1,2,3);
$vec19 = array(9);
$vec110 = array(8);
$alpha = 0.25;
$vector12 = array(4,0,0,1,1,0,1,3,1,1);
$array12 = array($vec11,$vec12,$vec13,$vec14,$vec15,$vec16,$vec17,$vec18,$vec19,$vec110);

$vec111 = array(12,3,-5);
$vec112 = array(1,5,3);
$vec113 = array(3,7,13);
$array111 = array($vec111,$vec112,$vec113);
$vector111 = array(1,28,76);
$vector112 = array(1,0,1);

$vector1110 = array(1,-0.25,-0.25,-0.25,0,-0.25,0,0,0,0);
$vector1111 = array(0,1,0,0,0,0,0,0,0,0);
$vector1112 = array(0,0,1,0,0,0,0,0,0,0);
$vector1113 = array(0,0,0,1,0,-0.25,0,0,0,0);
$vector1114 = array(-0.25,0,0,0,1,0,0,0,0,0);
$vector1115 = array(0,0,0,0,0,1,0,0,0,0);
$vector1116 = array(0,0,0,0,0,0,1,0,-0.25,0);
$vector1117 = array(0,-0.25,-0.25,-0.25,0,0,0,1,0,0);
$vector1118 = array(0,0,0,0,0,0,0,0,1,-0.25);
$vector1119 = array(0,0,0,0,0,0,0,0,-0.25,1);

$array11= array($vector1110,$vector1111,$vector1112,$vector1113,$vector1114,$vector1115,$vector1116,$vector1117,$vector1118,$vector1119);
$vector1 = array(4,0,0,1,1,0,1,3,1,1);
for($a=0; $a<sizeof($vector1110); $a++)
	{
	$vector2[$a] = 1;
	}
				 
					 
function remaining($array1,$vector2,$n){
	$remainingsum = 0;
	$alpha=0.25;
	for($a=0;$a<sizeof($array1[$n]);$a++){
		$remainingsum = $array1[$n][$a]*$vector2[$a] + $remainingsum;
		}
	$remainingsum = $remainingsum - $array1[$n][$n]*$vector2[$n];
	return $remainingsum;
	}
					 
function gausser($array1, $vector1,$vector2){
	for($y=0; $y<sizeof($array1); $y++){
			$vector2[$y] = ($vector1[$y] - remaining($array1,$vector2,$y))/($array1[$y][$y]);
				}
	return $vector2;
				}

for($a=0;$a<100;$a++){
	$gausstester = gausser($array11,$vector1,$vector2);
	$temporary = $vector2;
	$vector2 = $gausstester;
	for ($k=0;$k<sizeof($gausstester);$k++) {
                echo $gausstester[$k];
                echo "</br>";
				}
	echo "</br>";			
	}

echo "this is only the win score.";
/*for ($k=0;$k<sizeof($gausstester);$k++) {
                echo $gausstester[$k];
                echo "</br>";
				}
echo "</br>";
for ($k=0;$k<sizeof($gausstester2);$k++) {
                echo $gausstester2[$k];
                echo "</br>";
				}

for ($k=0;$k<sizeof($gausstester3);$k++) {
                echo $gausstester3[$k];
                echo "</br>";
				}				
*/
				?>