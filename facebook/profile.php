<?php
include_once 'appinclude.php';
include_once 'db.php';
include_once 'display.php';
//
// All functions are related to the profile and news feed publishing 
//

// Returns FBML content for the profile box 
function get_profile_fbml($user) {

	$fbml .= "<fb:narrow>"; 
  	$fbml .= "<p style=\"text-align: center;\">Move profile box to narrow column to view speed dial. </p>";
  	$fbml .=  "</fb:narrow>"; 
	$fbml .= "<fb:wide>";  
	$fbml .= "<style>";
	$fbml .= " table {margin:-10px 0px 0px -5px;}";
	$fbml .= " td { border: 1px solid #d8dfea; padding: 0px; width: 80px; text-align: center; vertical-align: top; }";
	$fbml .= "</style>";
	$fbml .= "You have <big><big><big><big>".$friendcount = mysql_friendcount($user)."</big></big></big></big> friends!<br />";
	$fbml .= "<p>Your Ranking is : <big><big><big><big>".mysql_get_ranking($user)."</big></big></big></big> out of <big><big><big><big>".mysql_get_totalmembers()."</big></big></big></big></p>";
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
 
  $fbml ='<fb:profile-action url="http://apps.facebook.com/friendshipr//">Calculate Your Friendliness!</fb:profile-action>';
	$facebook->api_client->profile_setFBML(null,null,null,$fbml);
}





