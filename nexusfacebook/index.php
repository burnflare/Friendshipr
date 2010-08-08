<?php

include_once 'calculate.php';
include_once 'eigenizer.php';
include_once 'dbfriendshipr.php';
include_once 'appinclude.php';
include_once 'db.php';
include_once 'canvas.php';
include_once 'display.php';
include_once 'profile.php';

render_canvas_header(index); 

$facebook = new Facebook($appapikey,$appsecret);
$user = $facebook->require_login();

		$random1 = rand(1,13);
		$random2 = rand(1,13);
		while ($random1 == $random2):
			$random1 = rand(1,13);
			$random2 = rand(1,13);
		endwhile;

//Newsfeed. Visit facebook app console to get a new template_bundle_id		
$template_bundle_id = 139392402498;

$link = $fb_app_dir;
$tokens  = array('name'=>$name, 'label'=>'<a href="http://apps.facebook.com/'.$link.'/about.php">XXXX</a>');
$body = '';    //is optional
$images='';  //no image yet
$friends = $facebook->api_client->friends_getAppUsers();
$target_ids = $friends;

try {
        $result = $facebook->api_client->feed_publishUserAction( $template_bundle_id, json_encode($dataTokens), $target_ids, $body);
        } catch (Exception $e) {
            echo $e->getMessage();
            $result = -5;
        };
//End of newsfeed
//start of picture dsiplay		
?>

<style type="text/css">
input.groovybutton
{
   font-size:12px;
   font-family:Tahoma,sans-serif;
   text-align:left;
   color:#FFFFFF;
   height:23px;
   background-color:#2878C0;
   border-top-style:solid;
   border-top-color:#2878C0;
   border-top-width:1px;
   border-bottom-style:solid;
   border-bottom-color:#2878C0;
   border-bottom-width:1px;
   border-left-style:solid;
   border-left-color:#1858B8;
   border-left-width:6px;
   border-right-style:solid;
   border-right-color:#508CC0;
   border-right-width:6px;
}
</style>

<!--Picture display starts from here-->
<Strong><font size="4">Click on the picture you like to vote for it!</font></Strong><br></br>

<h2><b>How to play this game?</b></h2>
<br />
<h3>This game is very easy to play. Just vote for the picture you like by 
clicking on the button above it. After that, you will be brought to 
the next page that will show you some interesting facts about this 
application. This application right now is running a competition. By 
voting for a picture, you are automatically enrolled into this competition. 
To know more abou the competition, <a href="http://apps.facebook.com/singaporespirit/competition.php">click here.</a> So, take a chill pill and 
play ahead!</h3>
<br />
<br />
<a href="http://apps.facebook.com/singaporespirit/help.php"><font size ="3">What is this about??</font></a>
<br />
<br />
<form method="post"	action="http://apps.facebook.com/singaporespirit/image.php">
   <input type="hidden" name="random1" value="<?php echo $random1; ?>" />
   <input type="hidden" name="random2" value="<?php echo $random2; ?>" />

<table>	
	<tr>
		<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<input type="submit" id="button1" name="button1" class="groovybutton" value="Is this a better picture than the one below this? Click here to vote for it!" 
	onMouseOver="	document.getElementById('button1').setStyle('backgroundColor' , '#2888D8');
					document.getElementById('button1').setStyle('borderTopColor' , '#2888D8');
					document.getElementById('button1').setStyle('borderBottomColor' , '#2888D8');
					document.getElementById('button1').setStyle('borderLeftColor' , '#1864D0');
					document.getElementById('button1').setStyle('borderRightColor' , '#58A4E0');" 
	onMouseOut="	document.getElementById('button1').setStyle('backgroundColor' , '#2878C0');
					document.getElementById('button1').setStyle('borderTopColor' , '#2878C0');
					document.getElementById('button1').setStyle('borderBottomColor' , '#2878C0');
					document.getElementById('button1').setStyle('borderLeftColor' , '#1858B8');
					document.getElementById('button1').setStyle('borderRightColor' , '#508CC0');">
		<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $random1; ?>.jpg" width=420 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></br>
	</input>
   <br></br></td>
	</tr>
	<tr>	
		<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<input type="submit" id="button2" name="button2" class="groovybutton" value="Or is this a better picture than the one above this? Click here to vote for it!" 
	onMouseOver="	document.getElementById('button2').setStyle('backgroundColor' , '#2888D8');
					document.getElementById('button2').setStyle('borderTopColor' , '#2888D8');
					document.getElementById('button2').setStyle('borderBottomColor' , '#2888D8');
					document.getElementById('button2').setStyle('borderLeftColor' , '#1864D0');
					document.getElementById('button2').setStyle('borderRightColor' , '#58A4E0');" 
	onMouseOut="	document.getElementById('button2').setStyle('backgroundColor' , '#2878C0');
					document.getElementById('button2').setStyle('borderTopColor' , '#2878C0');
					document.getElementById('button2').setStyle('borderBottomColor' , '#2878C0');
					document.getElementById('button2').setStyle('borderLeftColor' , '#1858B8');
					document.getElementById('button2').setStyle('borderRightColor' , '#508CC0');">
		<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $random2; ?>.jpg" width=420 alt="Compare Picture 2" ALIGN="ABSMIDDLE"></br>
	</input>
		</td>
	</tr>

</table>	
</form>

<?php
/*
//*****Begining of Facebook Retrival*****
mysql_get_db_conn_friendshipr();
	//Retrieving Logged-in Users' Information
	$uid = $facebook->api_client->users_getLoggedInUser();
	$desired_details = array('name');
	$user_details = $facebook->api_client->users_getInfo($uid, $desired_details);
	$name = $user_details[0]['name'];

	//Insert members id and name into members table
	mysql_insert_members($user, $name);

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
				mysql_insert_relation_friendshipr($user, $friendid);
			}
		}
	
//*****END of Facebook Retrival*****	

eigen_repopulate_static_position();
$result = eigen_mastermind();
eigen_update($result);
//Recalculating Friendcount rankings!
mysql_friendcount_ranking();
mysql_updateall_friendcount();
//echo "Rankings have been recalculated!";

$friendcount = mysql_friendcount($user);
$friendranking = mysql_get_friendcount_ranking($user);
$ranking_total = mysql_ranking_total($user);
$totalmembers = mysql_get_totalmembers();

$top5friends = mysql_top_5_friends();
$top5network = mysql_top_5_in_network($uid);
//for testing of top 5 friends
//echo $top5friends[0]."<br />";
//echo $top5friends[1]."<br />";
//echo $top5friends[2]."<br />";
//echo $top5friends[3]."<br />";
//echo $top5friends[4]."<br />";

render_canvas_footer();
//$user = $facebook->api_client->users_getLoggedInUser();
// render_profile_box($user);

mysql_disconnect_friendshipr(); 
*/
?>
