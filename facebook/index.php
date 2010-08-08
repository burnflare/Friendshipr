≤<?php

include_once 'appinclude.php';
include_once 'db.php';
include_once 'display.php';
include_once 'profile.php';
include_once 'calculate.php';
include_once 'eigenizer.php';
//include_once 'publish.php';
render_canvas_header(index); 

//Connecting to MySQL Server
mysql_get_db_conn();

//*****Begining of Facebook Retrival*****

	//Retrieving Logged-in Users' Information
	$uid = $facebook->api_client->users_getLoggedInUser();
	$desired_details = array('name');
	$user_details = $facebook->api_client->users_getInfo($uid, $desired_details);
	$name = $user_details[0]['name'];

	//Insert members id and name into members table
	mysql_insert_members($user, $name);

	if($page==recalculate){
		//Retrieving Friends Infomation into Array '$friends_details'
		$friends = $facebook->api_client->friends_getAppUsers();
		$desired_details = array('name','uid');
		$friends_details = $facebook->api_client->users_getInfo($friends, $desired_details);	
		
		//This foreach goes through every element in the array and inserts
		//them into the MySQL table
		if($friends_details){
			foreach($friends_details as $user_details){
				$friendname = $user_details['name'];
				$friendid = $user_details['uid'];
				mysql_insert_members($friendid,$friendname);
				mysql_insert_relation($user, $friendid);
			}
		}
	}
//*****END of Facebook Retrival*****	

if($page==recalculate){
	eigen_repopulate_static_position();
	$result = eigen_mastermind();
	eigen_update($result);
	echo "Rankings have been recalculated!";
	//Recalculating Friendcount rankings!
	mysql_friendcount_ranking();
	mysql_updateall_friendcount();
}
$friendcount = mysql_friendcount($user);
$friendranking = mysql_get_friendcount_ranking($user);
$ranking_total = mysql_ranking_total($user);
$totalmembers = mysql_get_totalmembers();

$top5friends = mysql_top_5_friends();
$top5network = mysql_top_5_in_network($uid);
?>

<style>
  <?php include("style.css"); ?>
</style>

<fb:google-analytics uacct="UA-5837543-1" />

<h3>Welcome <fb:name uid="loggedinuser" firstnameonly="true" useyou="false" captialize="true"/> to Friendshipr, the friendship ranking experiment</h3>
<br />
<br />
<div>
	<table class="lists" cellspacing="0" border="0">
		<tr>
		<th class="spacer"></th>
		<th>
			<h4>Top People WorldWide!</h4>
		</th>
		</tr>
		
		<tr>
				 <td class="spacer"></td>
				 <td class="list">
				 <div class="list_item clearfix">
				   <center>
						<table class="speeddial" border="0" cellpadding='0' width='500px'>
						<tr>
							<td><fb:profile-pic uid="<?php if($top5friends[0]!=null){echo $top5friends[0];} ?>" linked="true" /></td>
							<td><fb:profile-pic uid="<?php if($top5friends[1]!=null){echo $top5friends[1];} ?>" linked="true" /></td>
							<td><fb:profile-pic uid="<?php if($top5friends[2]!=null){echo $top5friends[2];} ?>" linked="true" /></td>
							<td><fb:profile-pic uid="<?php if($top5friends[3]!=null){echo $top5friends[3];} ?>" linked="true" /></td>
							<td><fb:profile-pic uid="<?php if($top5friends[4]!=null){echo $top5friends[4];} ?>" linked="true" /></td>
						</tr>
						<tr>
							<h2><td><fb:name uid="<?php if($top5friends[0]!=null){echo $top5friends[0];} ?>" useyou="false" captialize="true" /></td></h2>
							<h2><td><fb:name uid="<?php if($top5friends[1]!=null){echo $top5friends[1];} ?>" useyou="false" captialize="true" /></td></h2>
							<h2><td><fb:name uid="<?php if($top5friends[2]!=null){echo $top5friends[2];} ?>" useyou="false" captialize="true" /></td></h2>
							<h2><td><fb:name uid="<?php if($top5friends[3]!=null){echo $top5friends[3];} ?>" useyou="false" captialize="true" /></td></h2>
							<h2><td><fb:name uid="<?php if($top5friends[4]!=null){echo $top5friends[4];} ?>" useyou="false" captialize="true" /></td></h2>
						</tr>
							</table>			
						</center>
				 </div>
			 </td>
			</tr>
			</table>
		</div>
<div>
	<table class="lists" cellspacing="0" border="0">
	<tr>
		<th>
			<h4>Your Info</h4>
		</th>
		<th class="spacer"></th>
		<th>
			<h4>Know more about your friends!</h4>
		</th>
	</tr>
	<tr>
			<td class="list">
					 <div class="list_item clearfix">
							<h4>Friends</h4>
							<p>You have <big><big><big><big><?php echo"$friendcount";?></big></big></big></big> Friends who uses this Application</p>
							<br/>
							<br/>

 							<h4>Rankings according to PeopleRank</h4>
 							<p>Your Ranking is <big><big><big><big><?php echo mysql_get_ranking($user);?></big></big></big></big> out of <big><big><big><big><?php echo mysql_get_totalmembers();?></big></big></big></big></p>
							<br/>
							<br/>
							
							<h4>Ranking according to number of friends you have</h4>
							<p>Your Ranking would be <big><big><big><big><?php echo $friendranking;?></big></big></big></big> out of <big><big><big><big><?php echo mysql_get_totalmembers();?></big></big></big></big>
														if we did not use PeopleRank.</p>
						 </div>
				 </td>
				 <td class="spacer"></td>
				 <td class="list">
				 <div class="list_item clearfix">
				   <center>
						<table class="speeddial" border='0' cellpadding='1' width='198px' >
							<h4>Search for your friends</h4>
							<tr>
								<form action="search.php" method="post">
								Name: <input type="text" name="name" />
								<input type="submit" />
								</form> 
							</tr>
							<br />
							<tr>
												<h4>Top 5 friends in your social network</h4>
											<tr>
												<td><fb:profile-pic uid="<?php echo $top5network[0]; ?>" linked="true" /></td>
													<big><td style="vertical-align:middle"><fb:name uid="<?php echo $top5network[0]; ?>" useyou="false" captialize="true"/></td></big>
											</tr>
											<tr>
												<td><fb:profile-pic uid="<?php echo $top5network[1]; ?>" linked="true" /></td>
												<big><td style="vertical-align:middle"><fb:name uid="<?php echo $top5network[1]; ?>" useyou="false" captialize="true"/></td></big>	
											</tr>
											<tr>
												<td><fb:profile-pic uid="<?php echo $top5network[2]; ?>" linked="true" /></td>
												<big><td style="vertical-align:middle"><fb:name uid="<?php echo $top5network[2]; ?>" useyou="false" captialize="true"/></td></big>
											</tr>
											<tr>
												<td><fb:profile-pic uid="<?php echo $top5network[3]; ?>" linked="true" /></td>
												<big><td style="vertical-align:middle"><fb:name uid="<?php echo $top5network[3]; ?>" useyou="false" captialize="true"/></td></big>
											</tr>
											<tr>
												<td><fb:profile-pic uid="<?php echo $top5network[4]; ?>" linked="true" /></td>
												<big><td style="vertical-align:middle"><fb:name uid="<?php echo $top5network[4]; ?>" useyou="false" captialize="true"/></td></big>
											</tr>
												</table>			
											</center>
								</tr>
							</table>			
						</center>
			 </td>
			</tr>
			</table>
		</div>
<?php 
  render_canvas_footer(); 
  
	//
	// Update profile 
	//
  render_profile_box($user); 
  // Profile action is currently static and thus added via the Configuration screen
  // Uncomment if enhanced the profile action 
  //render_profile_action(); 

mysql_disconnect();

?>