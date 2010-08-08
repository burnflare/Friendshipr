<?php
include_once 'db2.php';
/////////////////////////////////////There are only functions here//////////////
//generates sparse matrix for wins
function winnermatrixgenerator(){
	for($pic1=0;$pic1<13;$pic1++){
		$x=0;
		for($pic2=0;$pic2<13;$pic2++){
		if(winexists(($pic1+1),($pic2+1))){	
				$array1[$pic1][$x] = $pic2+1;
				$x++;
		}
		}		
	}
	return $array1;
}

//function transposematrix($matrixer)-yet to code
//function matrix multiply();-yet to code
//generates sparse matrix for loses	
function losermatrixgenerator(){
	for($pic1=0;$pic1<13;$pic1++){
		$x=0;
		for($pic2=0;$pic2<13;$pic2++){
		if(loseexists(($pic1+1),($pic2+1))){
				$array1[$pic1][$x] = $pic2+1;
				$x++;
		}
		}
	}
	return $array1;
}

//first direct wins vector
function vector1generator($array1){
	for($x=0;$x<13;$x++){
		$vector1[$x] = sizeof($array1[$x]);
	}
	return $vector1;
}
//1,1,1,1,1,1,1,1,1
function vector2generator($array1){
for($a=0; $a<13; $a++)
	{
	$vector2[$a] = 1;
	}
	return $vector2;
}				 
					 
function alphavalue($arraywin,$arraylose)
{
    $sum = 0;
    $sumsquare = 0;
    for ($i=0;$i<sizeof($arraywin);$i++)
    {
        $temp = sizeof($arraywin[$i]) + sizeof($arraylose[$i]);
        $sum = $sum + $temp;
        $sumsquare = $sumsquare + $temp*$temp;
    }
    
    $mean = $sum/sizeof($arraywin);
    $sumsquare = $sumsquare/sizeof($arraywin);
    return -2*$mean/($sumsquare-$mean);
}

function remaining($array1,$vector2,$n,$array2){
	//$remainingsum = 0;
	$arraywin = $array1;
	$arraylose = $array2;
	$alpha = alphavalue($arraywin,$arraylose);//need to use formula, value is already negated in alpha value function
	//$alpha=0;
		for($a=0;$a<sizeof($array1[$n]);$a++){
		$remainingsum = $alpha*$vector2[$array1[$n][$a]] + $remainingsum;}
	//$remainingsum = $alpha*sizeof($array1[$n]);
	return $remainingsum;
		}
					 
function gausser($array1, $vector1,$vector2,$array2){
	for($y=0; $y<sizeof($array1); $y++){
			$vector2[$y] = $vector1[$y] - remaining($array1,$vector2,$y,$array2);
				}
	return $vector2;
				}

function mainresult1($array1,$vector1,$vector2,$array2){
for($a=0;$a<20;$a++){
	$gausstester = gausser($array1,$vector1,$vector2,$array2);
	//$temporary = $vector2;
	$vector2 = $gausstester;
/*	for ($k=0;$k<sizeof($gausstester);$k++) {
                echo $gausstester[$k];
                echo "</br>";
				}
	echo "</br>";
*/	
	}
	return $gausstester;
}
function finalscore($arraywin,$arraylose,$vector1,$vector2,$vector3){
	$winscore = mainresult1($arraywin,$vector1,$vector2,$arraylose);
	$losescore = mainresult1($arraylose,$vector3,$vector2,$arraywin);
	for($x=0;$x<13;$x++){
		$finalscore[$x] = $winscore[$x] - $losescore[$x];

	}
	return $finalscore;
}

//echo "this is only the win score.";
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