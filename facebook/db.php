<?php
//Connect to Database With error message if errored
function mysql_get_db_conn(){
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	//Connecting to MySQL Database
	mysql_select_db("friendsh_facebook", $con);
}
//Disconnecting mysql connection 
function mysql_disconnect(){
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	mysql_close($con) or die(mysql_error());
}
//Insert into table 'members' user parameters $user and $name
function mysql_insert_members($user, $name){
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	$sql = "INSERT IGNORE INTO members (memberid, membername) VALUES('$user','$name')";
	mysql_query($sql,$con) or die(mysql_error());
}
//Insert into table 'relation' user parameters $ownerid and $friendid
function mysql_insert_relation($ownerid, $friendid){
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	$sql = "INSERT INTO relation (ownerid, friendid)
	VALUES ('$ownerid','$friendid')";
	mysql_query($sql,$con);
	$sql = "INSERT INTO relation (ownerid, friendid)
	VALUES ('$friendid','$ownerid')";
	mysql_query($sql,$con);
}
//Calculates position of friend and updates a table
function mysql_calculate_position(){
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	$result = mysql_query("SELECT memberid, position FROM `members` ORDER BY memberid");
	$position = 0;
	while($row = mysql_fetch_array($result))
	  {
		mysql_query("UPDATE `members` SET position = '$position' WHERE memberid = '$row[memberid]'");
		$position++;
	  }
}
function mysql_get_position($user){
	$result = mysql_query("SELECT position FROM `members` WHERE memberid = $user");
	$row = mysql_fetch_array($result);
	$position = $row['position'];
	return $position;
}
//Counts the number of friends of $user and returns the number of friends
function mysql_friendcount($user){
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	$result = mysql_query("SELECT ownerid, memberid, friendid FROM `relation`, `members` WHERE ownerid = memberid AND ownerid = $user");
	$friendcount = mysql_num_rows($result); 
	mysql_query("UPDATE `members` SET `friendcount` = $friendcount WHERE `memberid`=$user");
	return $friendcount;
}
function mysql_updateall_friendcount(){
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	$result = mysql_query("SELECT memberid FROM `members` WHERE 1");
	while($row = mysql_fetch_array($result)){
		mysql_friendcount($row['memberid']);
	}
}
//Calculates and updates table on Friendcounted ranking
function mysql_friendcount_ranking(){
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	$result = mysql_query("SELECT memberid, friendcount FROM `members` WHERE 1 ORDER BY friendcount DESC");
	$ranking = 1; 
	while($row = mysql_fetch_array($result)){
		mysql_query("UPDATE `members` SET friendcount_position = '$ranking' WHERE memberid = '$row[memberid]'");
		$ranking++;
	}
}
function mysql_get_friendcount_ranking($user){
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	$result = mysql_query("SELECT `friendcount_position` FROM `members` WHERE `memberid` = $user");
	$ranking;
	while($row = mysql_fetch_array($result)){
		$ranking = $row['friendcount_position'];
	}
	return $ranking;
}

//Counts the ranking of a friend using the number of friends. Returns ranking
function mysql_get_ranking($user){
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	$result = mysql_query("SELECT eigen_position FROM `members` WHERE memberid = $user") or die(mysql_error());
	$ranking;
	while($row = mysql_fetch_array($result)) {
		$ranking = $row['eigen_position'];
	}
	return $ranking;
}
function mysql_ranking_total($user){
	return mysql_get_totalmembers();
}
function mysql_ranking(){          
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	$result = mysql_query("SELECT memberid, eigen FROM `members` WHERE 1 ORDER BY eigen DESC");
	$ranking = 1; 
	while($row = mysql_fetch_array($result)) {
		mysql_query("UPDATE `members` SET eigen_position = '$ranking' WHERE memberid = '$row[memberid]'");
		$friendid = $row['memberid_count'];
		$ranking++;
	}
	return $ranking;
}
//Returns total members in table 'members'
function mysql_get_totalmembers(){
	$result = mysql_query("SELECT * FROM `members` WHERE 1");
	$totalmembers = mysql_num_rows($result);
	return $totalmembers;
}
function mysql_update_eigen($array){
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	$totalmembers = mysql_get_totalmembers();
	$result = mysql_query("SELECT memberid, position FROM `members` WHERE 1 ORDER BY position");
	$x = 1;
	while($row = mysql_fetch_array($result))
	  {
		mysql_query("UPDATE `members` SET eigen = '$array[$x]' WHERE memberid = '$row[memberid]'") or die(mysql_error());
		$x++;
	  }
}
function mysql_search_friends($string){
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	$query =  mysql_query("SELECT memberid FROM `members` WHERE membername LIKE '%$string%' ORDER BY eigen_position ASC") or die(mysql_error());
	$result;
	$x=0;
	while($row = mysql_fetch_array($query))
	{
		$result[$x]=$row['memberid'];
		$x++;
	}
	return $result;
}
function mysql_top_5_friends(){
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	$query =  mysql_query("SELECT memberid FROM `members` WHERE eigen_position <= 5 ORDER BY eigen_position ASC") or die(mysql_error());
	$result;
	$x=0;
	while($row = mysql_fetch_array($query))
	{
		$result[$x]=$row['memberid'];
		$x++;
	}
	return $result;
}
function mysql_top_5_in_network($uid){
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	$query =  mysql_query("SELECT friendid, eigen_position FROM `relation`, `members` WHERE friendid = memberid AND ownerid = $uid ORDER BY eigen_position ASC") or die(mysql_error());
	$result;
	$x=0;
	while($row = mysql_fetch_array($query))
	{
		$result[$x]=$row['friendid'];
		$x++;
	}
	return $result;
}
function user_existance($user){
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	$query =  mysql_query("SELECT memberid FROM `members` WHERE memberid LIKE $user") or die(mysql_error());
	$firsttime = false;
	while($row = mysql_fetch_array($query))
	{
		if($row['memberid']==null){
			$firstime = true;
		}
	}
	return $firsttime;
}
function mysql_extract_members(){
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	$result = mysql_query("SELECT memberid, membername FROM `members` WHERE 1=1");
	while($row = mysql_fetch_array($result)){
		//$string = urlencode(%3Cnode+id%3D%22);
		//echo $string;
		//echo '<a href="mycgi?foo=', urlencode($userinput), '">';
		
		echo "< node id=\"";		
		echo $row[memberid];
		echo "\">";
		echo "<br />";
		echo "< data key=\"name\">";
		echo $row[membername];
		echo "< /data>";
		echo "<br />";
		
		echo "< /node>";
		echo "<br />";
	
		//	 <data key="name">Jeff</data>
		//	 <data key="gender">M</data>
		//	 </node>
		}
}

function mysql_extract_friends($user){
	$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");
	$result = mysql_query("SELECT ownerid, friendid FROM `relation` WHERE ownerid=$user");
	while($row = mysql_fetch_array($result)){
		echo "< edge source=\"";
		echo $row[ownerid];
		echo " \" target=\"";
		echo $row[friendid];
		echo "\">< /edge>";
		echo "<br />";	
	}
}

?>