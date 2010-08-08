<?php
//Connect to Database With error message if errored
function mysql_get_db_conn(){
	$con = mysql_connect("localhost","friendsh_nface","Xf%p4A3H74T8");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	//Connecting to MySQL Database
	mysql_select_db("friendsh_nexusfacebook", $con);
}
//Disconnecting mysql connection 
function mysql_disconnect(){
	$con = mysql_connect("localhost","friendsh_nface","Xf%p4A3H74T8");
	mysql_close($con) or die(mysql_error());
}
//Insert into table 'pictureinfo' picture parameters $picnumber
function mysql_insert_pictureinfo($picnumber){
	$con = mysql_connect("localhost","friendsh_nface","Xf%p4A3H74T8");
	$sql = "INSERT IGNORE INTO pictureinfo (picturenumber) VALUES('$picnumber')";
	mysql_query($sql,$con) or die(mysql_error());
}
//Insert into table 'relationr' user parameters $winner and $loser
function mysql_insert_relation($userid,$winner, $loser){
	$con = mysql_connect("localhost","friendsh_nface","Xf%p4A3H74T8");
	$sql = "INSERT INTO relationr (userid,winner, loser) VALUES ('$userid','$winner','$loser')";
	mysql_query($sql,$con) or die(mysql_error());
//	$sql = "INSERT INTO relationr (winner, loser)
//	VALUES ('$winner','$loser')";
//	mysql_query($sql,$con);
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//function mysql_num_rows($result){
function novoteexceed($userid){
	$con = mysql_connect("localhost","friendsh_nface","Xf%p4A3H74T8");
	$result = mysql_query("SELECT userid FROM relationr WHERE userid='$userid'",$con);
	if(mysql_numrows($result)>10){
			return false;
		}
	else{
			return true;
	}
}
function winexists($pic1,$pic2){
	$con = mysql_connect("localhost","friendsh_nface","Xf%p4A3H74T8");
	$result = mysql_query("SELECT winner, loser FROM relationr WHERE winner='$pic1' && loser='$pic2'",$con);
	if(mysql_numrows($result)>0){
			return true;
		}
	else{
			return false;
	}
}

function loseexists($pic1,$pic2){
	$con = mysql_connect("localhost","friendsh_nface","Xf%p4A3H74T8");
	$result2 = mysql_query("SELECT winner, loser FROM relationr WHERE winner='$pic2' && loser='$pic1'",$con);
	if(mysql_numrows($result2)>0){
			return true;
		}
	else{
			return false;
	}
}

function numberofwingamesby($pic){
	$con = mysql_connect("localhost","friendsh_nface","Xf%p4A3H74T8");
	$result = mysql_query("SELECT winner FROM relationr WHERE winner='$pic'",$con);
	return mysql_numrows($result);
}

function numberoflosegamesby($pic){
	$con = mysql_connect("localhost","friendsh_nface","Xf%p4A3H74T8");
	$result = mysql_query("SELECT loser FROM relationr WHERE loser='$pic'",$con);
	return mysql_numrows($result);
}

function totalgames(){
	$con = mysql_connect("localhost","friendsh_nface","Xf%p4A3H74T8");
	$result = mysql_query("SELECT winner FROM relationr WHERE winner!='0'",$con);
	return mysql_numrows($result);
}

function absolutewinnerinpair($pic1,$pic2){
	$con = mysql_connect("localhost","friendsh_nface","Xf%p4A3H74T8");
	$result = mysql_query("SELECT winner, loser FROM relationr WHERE winner='$pic1' && loser='$pic2'",$con);
	$result2 = mysql_query("SELECT winner, loser FROM relationr WHERE winner='$pic2' && loser='$pic1'",$con);
	if(mysql_numrows($result2)>mysql_numrows($result)){
		return $pic2;
	}
	else{
		return $pic1;
	}
}

function mysql_scoreupdate($finalscore){
	$con = mysql_connect("localhost","friendsh_nface","Xf%p4A3H74T8");
	for($x=0;$x<13;$x++){
		$y = $x+1;
		$sql = "UPDATE pictureinfo SET gaussscore='$finalscore[$x]' WHERE picturenumber='$y'";
	mysql_query($sql,$con) or die(mysql_error());
	}
}		

function mysql_resultsinasc(){
	$con = mysql_connect("localhost","friendsh_nface","Xf%p4A3H74T8");
	$sql = "SELECT * FROM pictureinfo ORDER BY gaussscore DESC";
	$result = mysql_query($sql,$con) or die(mysql_error());
	$x=0;
	while($row = mysql_fetch_array($result))
	{
		$scoresasc[$x]=$row['picturenumber'];
		$x++;
	}
	return $scoresasc;
}


?>