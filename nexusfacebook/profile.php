<?php
include_once 'appinclude.php';
include_once 'db.php';
include_once 'display.php';
//
// All functions are related to the profile and news feed publishing 
//

// Returns FBML content for the profile box 
$random1 = rand(1,13);
		$random2 = rand(1,13);
		while ($random1 == $random2):
			$random1 = rand(1,13);
			$random2 = rand(1,13);
		endwhile;
		
function get_profile_fbml() {

	$fbml .= "<fb:narrow>"; 
  	$fbml .= "<p style=\"text-align: center;\">Move profile box to narrow column to view speed dial. </p>";
  	$fbml .=  "</fb:narrow>"; 
	$fbml .= "<fb:wide>";  
	$fbml .= "<style>";
	$fbml .= " table {margin:-10px 0px 0px -5px;}";
	$fbml .= " td { border: 1px solid #d8dfea; padding: 0px; width: 80px; text-align: center; vertical-align: top; }";
	$fbml .= "</style>";
	$fbml .= "Vote for the better picture: <big><big><big><big>";
	$fbml.=	"<form method='post'	action='http://apps.facebook.com/singaporespirit/image.php'>";
	$fbml.= "<input type='hidden' name='random1' value='".$random1."' />";
	$fbml.= "<input type='hidden' name='random2' value='".$random2."' />";
	$fbml.= "<BUTTON name='button1' value=true type='submit'>";
	$fbml.=	"<IMG SRC='http://www.friendshipr.com/nexusfacebook/pic".$random1.".jpg' height=100 alt='Compare Picture 1' ALIGN='ABSMIDDLE'>";
	$fbml.=	"<br><STRONG>".$random1."</STRONG></br>";
	$fbml.=	"</BUTTON>";
	$fbml.= "<input type='hidden' name='random1' value='".$random1."' />";
	$fbml.= "<input type='hidden' name='random2' value='".$random2."' />";
	$fbml.=	"<BUTTON name='button2' value=true type='submit'>";
	$fbml.= "<IMG SRC='http://www.friendshipr.com/nexusfacebook/pic".$random2.".jpg' height=100 alt='Compare Picture 2' ALIGN='ABSMIDDLE'>";
	$fbml.=	"<br><STRONG>".$random2."</STRONG></br>";
	$fbml.=	"</BUTTON>";
	$fbml.= "</form>";
	$fbml .= "<br /><p>Everyone loves this picture</p>";
	$fbml .= "<IMG SRC='http://www.friendshipr.com/nexusfacebook/pic".absolutewinnerinpair($random1,$random2).".jpg' height=50 alt='Compare Picture 1' ALIGN='ABSMIDDLE'>";
  	$fbml .=  "</fb:wide>"; 
		
  return $fbml;  
}

// Renders the profile box 
function render_profile_box($user) {
 global $facebook; 
 
 $fbml = get_profile_fbml($user);
 $facebook->api_client->profile_setFBML(null, null, $fbml);
}

// Renders a profile action 
function render_profile_action() { 
  global $facebook; 
 
  $fbml ='<fb:profile-action url="http://apps.facebook.com/nexusfacebook//">Calculate Your Friendliness!</fb:profile-action>';
	$facebook->api_client->profile_setFBML(null,null,null,$fbml);
}





