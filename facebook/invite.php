<?php
include_once 'appinclude.php';
include_once 'db.php';
include_once 'display.php';
include_once 'profile.php';

render_canvas_header(invite);
$user = $facebook->require_login();

//  Get list of friends who have this app installed...
$rs = $facebook->api_client->fql_query("SELECT uid FROM user WHERE has_added_app=1 and uid IN (SELECT uid2 FROM friend WHERE uid1 = $user)");
$arFriends = "";

//  Build an delimited list of users...
if ($rs)
{
        $arFriends .= $rs[0]["uid"];

	for ( $i = 1; $i < count($rs); $i++ )
	{
		if ( $arFriends != "" )
			
                     $arFriends .= ",";
		     $arFriends .= $rs[$i]["uid"];
	}
}

//  Construct a next url for referrals
$sNextUrl = urlencode("&refuid=".$user);

//  Build your invite text
$invfbml = <<<FBML
<fb:name uid="$user" firstnameonly="true" shownetwork="false"/> invites you to add Friendshipr, the friendship ranking experiment. Its the most accurate friendship ranker in facebook!
<fb:req-choice url="http://www.facebook.com/add.php?api_key=a2c0936769d67dfafd873745239ce59d&test=1" label="Add Friendshipr!" />
FBML;
?>

<fb:request-form type="Friendhshipr" action="index.php" content="<?=htmlentities($invfbml)?>" invite="true">
	<fb:multi-friend-selector max="20" actiontext="Invite your friends to use Friendshipr to boost your own ranking!" showborder="true" rows="5" exclude_ids="<?=$arFriends?>">
</fb:request-form>