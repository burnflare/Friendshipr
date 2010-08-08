<?php

include_once 'appinclude.php';
include_once 'db2.php';
include_once 'canvas.php';
include_once 'display.php';
include_once 'calculatenexus2.php';
//include_once 'profile.php';
	
$facebook = new Facebook($appapikey,$appsecret);
$user = $facebook->require_login();
$loggedinuser = $facebook->api_client->users_getLoggedInUser();
render_canvas_header(image); 


mysql_get_db_conn();

$random1 = $_POST['random1'];
$random2 = $_POST['random2'];

////////////////////////////////
//calculations start from here, mysql insertion and udates also start from here	
////////////////////////////////
	if($_POST['button1'] && novoteexceed($loggedinuser)){
		mysql_insert_relation($loggedinuser,$random1,$random2);
	}
	else if($$_POST['button2'] && novoteexceed($loggedinuser)){
		mysql_insert_relation($loggedinuser,$random2,$random1);
	}
	else{
		null;
	}
$finalresult = finalscore(winnermatrixgenerator(),losermatrixgenerator(),vector1generator(winnermatrixgenerator()),vector2generator(winnermatrixgenerator()),vector1generator(losermatrixgenerator()));
mysql_scoreupdate($finalresult);
$scoresinasc = mysql_resultsinasc();
//////////////////////////////
//end of mysql submission and calculation
///////////////////////////////

?>
<br />
<style>
.speeddial { margin:0 0 0; left:0px;}

.speeddial td { 
	width: 200px; 
	text-align:center; 
	vertical-align: top; 
	border: 0px ; 
	padding:1px;
}

.icons { margin-top: 3px; }

/* Pseudo-Facebook element */ 

.inputbutton {
  border-style: solid;
  border-top-width: 1px;
  border-left-width: 1px;
  border-bottom-width: 1px;
  border-right-width: 1px;
  border-top-color: #D9DFEA;
  border-left-color: #D9DFEA;
  border-bottom-color: #0e1f5b;
  border-right-color: #0e1f5b;
  background-color: #3b5998;
  color: #ffffff;
  font-size: 11px;
  font-family: "Lucida Grande", Tahoma, Verdana, Arial, sans-serif;
  padding: 2px 15px 3px 15px;
  text-align: center; 
}
 
/* Clearfix */

.clearfix:after {
    content: ".";
    display: block;
    clear: both;
    visibility: hidden;
    line-height: 0;
    height: 0; }

.clearfix {
    display: inline-block; }

html[xmlns] .clearfix {
    display: block; }

* html .clearfix {
    height: 1%; } 
 
/* Based on 2-Column Lists style on http://wiki.developers.facebook.com/index.php/Facebook_Styles */

.lists th {
  background: #6d84b4;
  text-align: left;
  padding: 5px 10px;
}

.lists .spacer {
  background: none;
  border: none;
  padding: 0px;
  margin: 0px;
  width: 10px; 
}

.lists th h4 { float: left; color: white; }
.lists th a { float: right; font-weight: normal; color: #d9dfea; }
.lists th a:hover { color: white; }

.lists td {
  margin:0px 10px;
  padding:0px;
  vertical-align:top;
}

.lists td h4 {
  text-align:left;
  background-color: #e7e7e7; 
  border: 1px solid #d8dfea; 
  padding:2px;
	color: #333333;
	padding-top: 3px;
	padding-right: 10px;
	padding-bottom: 3px;
	padding-left: 10px;
	font-weight: bold;
	font-size: 11px;
	margin-top: 10px;
	margin-right: 0pt;
	margin-bottom: 0pt;
	margin-left: 0pt;  
 
}

.lists .list {
  background:white none repeat scroll 0%;
  border-color:-moz-use-text-color #BBBBBB;
  border-color: #d8dfea; 
  border-style:none solid solid;
  border-width:medium 1px 1px;
}

.lists .list .list_item { border-top:1px solid #E5E5E5; padding: 10px; }
.lists .list .list_item.first { border-top: none; }

/* Based on quote display in Facebook Events */ 

.q_owner {
	background-color: transparent;
	background-image: url(http://www.facebook.com/images/start_quote_small.gif);
	background-repeat: no-repeat;
	padding-top: 0px;
	padding-right: 0px;
	padding-bottom: 5px;
	padding-left: 18px;
	width: 400px;
}

.q_owner span.q {
	color: #555555;
	background-color: transparent;
	background-image: url(http://www.facebook.com/images/end_quote_small.gif);
	background-repeat: no-repeat;
	background-position: center right; 
	padding-top: 2px;
	padding-right: 16px;
	padding-bottom: 2px;
	padding-left: 0px;
}

a.groovybutton
{
   font-size:11px;
   font-family:Tahoma,sans-serif;
   text-align:left;
   color:#FFFFFF;
   height:30px;
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

 .poll_results { width:650px;}
 .poll_results h2 {
  background-color:#6D84B4;
  color:white;
  font-size:12px;
  padding:5px;
  margin:0;
 }
 .poll_results h4 {
  background-color:#6D84B4;
  color:white;
  font-size:10px;
  padding:5px;
  margin:0;
 }
 .poll_results div.poll_answers {
  background:white none repeat scroll 0 0;
  border-color:#CCCCCC;
  border-style:solid;
  border-width:0 1px 1px;
  padding:5px;
 }
 .poll_results .poll_answers p {
  margin:0;
  font-weight:bold;
 }
 .poll_results .poll_answers table { margin:10px 0 10px 0; }
 .poll_results .poll_answers table .label {
  padding-right:10px;
  text-align:left;
  font-size:11px;
  float:left;
 }
 .poll_results .poll_answers table div.bar
 {
  background-attachment:scroll;
  background-color:#D8DFEA;
  background-image:none;
  background-position:0 0;
  background-repeat:repeat;
  float:left;
  height:26px;
  margin-right:5px;
  color:grey;
  text-align:left;
  font-weight:bold;
  font-size:13px;
  padding:1px 1px 1px 3px;
  font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
 }
 .poll_results .poll_answers table div.active { background-color:#3B5998; }

</style>
<a href="http://apps.facebook.com/singaporespirit" id="button1" name="button1" class="groovybutton" 
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
		Vote Again? 	
</a>
<br />
<br />
<br />

<div class="poll_results" align="center">
  <h2>The rankings of the pictures are</h2>
  <div class="poll_answers">

<?php

if($_POST['button1'] || $_POST['button1']){
 
?>

<table>
	<tr>
		<th>Between these 2 pictures</th>
	</tr>
	<tr>
		<td><IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $random1; ?>.jpg" height=100 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></td>
		<td><IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $random2; ?>.jpg" height=100 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></td>
	</tr>
</table>
<?php
 }
else{
	null;
}
?>
<table>
	<tr>
		<td><center><?php
//show the user his picture choice vs. public picture choice
	if($_POST['button1']){
		echo "<tr><td><center><h4>You voted for this picture</h4>";
		?><IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $random1; ?>.jpg" height=150 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></center></td></tr><?php
		echo "<tr><td><center><h4>The public voted for this picture between the pair</h4>";?>
		<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo absolutewinnerinpair($random1,$random2); ?>.jpg" height=115 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></center></td></tr><?php
		$scoresinasc = mysql_resultsinasc();
		echo "<tr><td><center><h4>Among all pictures, the public liked this picture best: </h4>";?>
		<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $scoresinasc[0]; ?>.jpg" height=115 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></center></td></tr><?php
	}
	else if($_POST['button2']){
		echo "<tr><td><center><h4>You voted for this picture</h4>";
		?><IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $random2; ?>.jpg" height=150 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></center></td></tr><?php
		echo "<tr><td><center><h4>The public voted for this picture between the pair</h4>";?>
		<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo absolutewinnerinpair($random1,$random2); ?>.jpg" height=115 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></center></td></tr><?php
		$scoresinasc = mysql_resultsinasc();
		echo "<tr><td><center><h4>Among all pictures, the public liked this picture best: </h4>";?>
		<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $scoresinasc[0]; ?>.jpg" height=115 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></center></td></tr><?php
	}
	else{//if user straight away clicks on Overview without doing the vote
		$scoresinasc = mysql_resultsinasc();
		echo "<tr><td><center><h4>Among all pictures, the public liked this picture best: </h4>";?>
		<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $scoresinasc[0]; ?>.jpg" height=150 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></center></td></tr><?php
	}

//start of display of table////////////
?></center></td>
	</tr>
		</table>
	</div>
</div>

<div class="poll_results" align="center">
  <h4>Comparison of Rankings:</h4>
  <div class="poll_answers">
<table>
			<tr><td>Rankings from our algorithm</td><td>Rankings based on percentage of votes received</td></tr>
			<tr><td>1&nbsp;&nbsp;<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $scoresinasc[0]; ?>.jpg" height=100 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></td>
				<td class="bar"><div class="bar" style="width: <?php echo (numberofwingamesby($scoresinasc[0])/totalgames())*1000 ?>px;"><?php  printf("%01.2f",(numberofwingamesby($scoresinasc[0])/totalgames())*100); ?>%</div></td>
			</tr>
			<tr><td>2&nbsp;&nbsp;<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $scoresinasc[1]; ?>.jpg" height=100 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></td>
				<td class="bar"><div class="bar" style="width: <?php echo (numberofwingamesby($scoresinasc[1])/totalgames())*1000 ?>px;"><?php printf("%01.2f",(numberofwingamesby($scoresinasc[1])/totalgames())*100); ?>%</div></td>	
			</tr>
			<tr><td>3&nbsp;&nbsp;<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $scoresinasc[2]; ?>.jpg" height=100 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></td>
				<td class="bar"><div class="bar" style="width: <?php echo (numberofwingamesby($scoresinasc[2])/totalgames())*1000 ?>px;"><?php printf("%01.2f",(numberofwingamesby($scoresinasc[2])/totalgames())*100); ?>%</div></td>	
			</tr>
			<tr><td>4&nbsp;&nbsp;<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $scoresinasc[3]; ?>.jpg" height=100 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></td>
				<td class="bar"><div class="bar" style="width: <?php echo (numberofwingamesby($scoresinasc[3])/totalgames())*1000 ?>px;"><?php printf("%01.2f",(numberofwingamesby($scoresinasc[3])/totalgames())*100); ?>%</div></td>	
			</tr>
			<tr><td>5&nbsp;&nbsp;<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $scoresinasc[4]; ?>.jpg" height=100 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></td>
				<td class="bar"><div class="bar" style="width: <?php echo (numberofwingamesby($scoresinasc[4])/totalgames())*1000 ?>px;"><?php printf("%01.2f",(numberofwingamesby($scoresinasc[4])/totalgames())*100); ?>%</div></td>	
			</tr>
			<tr><td>6&nbsp;&nbsp;<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $scoresinasc[5]; ?>.jpg" height=100 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></td>
				<td class="bar"><div class="bar" style="width: <?php echo (numberofwingamesby($scoresinasc[5])/totalgames())*1000 ?>px;"><?php printf("%01.2f",(numberofwingamesby($scoresinasc[5])/totalgames())*100); ?>%</div></td>	
			</tr>
			<tr><td>7&nbsp;&nbsp;<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $scoresinasc[6]; ?>.jpg" height=100 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></td>
				<td class="bar"><div class="bar" style="width: <?php echo (numberofwingamesby($scoresinasc[6])/totalgames())*1000 ?>px;"><?php printf("%01.2f",(numberofwingamesby($scoresinasc[6])/totalgames())*100); ?>%</div></td>	
			</tr>
			<tr><td>8&nbsp;&nbsp;<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $scoresinasc[7]; ?>.jpg" height=100 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></td>
				<td class="bar"><div class="bar" style="width: <?php echo (numberofwingamesby($scoresinasc[7])/totalgames())*1000 ?>px;"><?php printf("%01.2f",(numberofwingamesby($scoresinasc[7])/totalgames())*100); ?>%</div></td>	
			</tr>
			<tr><td>9&nbsp;&nbsp;<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $scoresinasc[8]; ?>.jpg" height=100 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></td>
				<td class="bar"><div class="bar" style="width: <?php echo (numberofwingamesby($scoresinasc[8])/totalgames())*1000 ?>px;"><?php printf("%01.2f",(numberofwingamesby($scoresinasc[8])/totalgames())*100); ?>%</div></td>	
			</tr>
			<tr><td>10&nbsp;&nbsp;<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $scoresinasc[9]; ?>.jpg" height=100 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></td>
				<td class="bar"><div class="bar" style="width: <?php echo (numberofwingamesby($scoresinasc[9])/totalgames())*1000 ?>px;"><?php printf("%01.2f",(numberofwingamesby($scoresinasc[9])/totalgames())*100); ?>%</div></td>
			</tr>
			<tr><td>11&nbsp;&nbsp;<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $scoresinasc[10]; ?>.jpg" height=100 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></td>
				<td class="bar"><div class="bar" style="width: <?php echo (numberofwingamesby($scoresinasc[10])/totalgames())*1000 ?>px;"><?php printf("%01.2f",(numberofwingamesby($scoresinasc[10])/totalgames())*100); ?>%</div></td>		
			</tr>
			<tr><td>12&nbsp;&nbsp;<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $scoresinasc[11]; ?>.jpg" height=100 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></td>
				<td class="bar"><div class="bar" style="width: <?php echo (numberofwingamesby($scoresinasc[11])/totalgames())*1000 ?>px;"><?php printf("%01.2f",(numberofwingamesby($scoresinasc[11])/totalgames())*100); ?>%</div></td>	
			</tr>
			<tr><td>13&nbsp;&nbsp;<IMG SRC="http://www.friendshipr.com/nexusfacebook/pic<?php echo $scoresinasc[12]; ?>.jpg" height=100 alt="Compare Picture 1" ALIGN="ABSMIDDLE"></td>
				<td class="bar"><div class="bar" style="width: <?php echo (numberofwingamesby($scoresinasc[12])/totalgames())*1000 ?>px;"><?php printf("%01.2f",(numberofwingamesby($scoresinasc[12])/totalgames())*100); ?>%</div></td>	
			</tr>
</table>
  </div>
 </div>

<?//Bottom buttons?>

<table>	
	<tr>
		<td><center>
	<a href="http://apps.facebook.com/singaporespirit" id="button3" name="button3" class="groovybutton" 
	onMouseOver="	document.getElementById('button3').setStyle('backgroundColor' , '#2888D8');
					document.getElementById('button3').setStyle('borderTopColor' , '#2888D8');
					document.getElementById('button3').setStyle('borderBottomColor' , '#2888D8');
					document.getElementById('button3').setStyle('borderLeftColor' , '#1864D0');
					document.getElementById('button3').setStyle('borderRightColor' , '#58A4E0');" 
	onMouseOut="	document.getElementById('button3').setStyle('backgroundColor' , '#2878C0');
					document.getElementById('button3').setStyle('borderTopColor' , '#2878C0');
					document.getElementById('button3').setStyle('borderBottomColor' , '#2878C0');
					document.getElementById('button3').setStyle('borderLeftColor' , '#1858B8');
					document.getElementById('button3').setStyle('borderRightColor' , '#508CC0');">
		Vote Again? 	
	</a></center>
		</td>	
		
		<td><center>
	<a href="http://apps.facebook.com/singaporespirit/invite.php" id="button2" name="button2" class="groovybutton" 
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
		Invite your friends to spread the joy!
	</a></center>
		</td>
	
</tr>
</table>	

<?





render_canvas_footer(); 
  
	//
	// Update profile 
	//
//$user = $facebook->api_client->users_getLoggedInUser();
//  render_profile_box($user); 
  // Profile action is currently static and thus added via the Configuration screen
  // Uncomment if enhanced the profile action 
  //render_profile_action(); 

mysql_disconnect();
