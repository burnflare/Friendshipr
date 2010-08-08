<?php
/*
*  Speed Dial v0.1
*    Copyright (C) 2008 Rich Wagner 
*
*
* THIS MATERIAL IS PROVIDED AS IS, WITH ABSOLUTELY NO WARRANTY EXPRESSED
* OR IMPLIED.  ANY USE IS AT YOUR OWN RISK.
*
* Permission is hereby granted to use or copy this program for any
* purpose, provided the above notices are retained on all copies.
* Permission to modify the code and to distribute modified code is
* granted, provided the above notices are retained, and a notice that
* the code was modified is included with the above copyright notice.
*/



function render_canvas_content() { 

echo "<div style=\"padding: 8px 0\">";

$b = new fBoxes('speeddial', array('ajax_save_url' => 'http://www.richwagnerwords.com/speeddial/fboxes_save.php', 'db_type' => 0));

$b->add(array('id' => 'add', 
	'title' => 'Add Your Friends', 
	'col' => 'wide', 
	'subtitle' => 'See All Stuff', 
	'content' => 'Any HTML or FBML you like', 
	'allow_toggle' => false, 
	'start_collapsed' => false, 
	'movable' => false, 
	'lock_pos' => true, 
	'lock_col' => true));
$b->add(array('id' => 'view', 
	'title' => 'Your Speed Dial', 
	'col' => 'wide', 
	'subtitle' => 'Remove or Set Poison Control', 
	'content' => 'Any HTML or FBML you like', 
	'allow_toggle' => false, 
	'start_collapsed' => false, 
	'movable' => false, 
	'lock_pos' => true, 
	'lock_col' => true));
$b->add(array('id' => 'inf', 
	'title' => 'Welcome back, <fb:name uid="' . $user . '" useyou="false" firstnameonly="true" />!',
	'col' => 'narrow',
	'content' => '<div style="float: right;"><fb:profile-pic uid="' . $user . '" size="thumb" linked="false" /></div>' .
	'<div><b>150</b> points in <a href="">Store</a><br /><b>500</b> points in <a href="" ">XP</a></div>' .
	'<div class="alert" style="clear:both">This box is always the topmost in this column</div>',
	'start_collapsed' => false,
	'movable' => false,
	'lock_pos' => true));

// loadPosition takes one parameter - the id of the saved position to load (usually a userid)
$b->loadPosition($user);

// output the css and fbjs stuff
echo $b->renderInit();
// draw the wide column
echo $b->renderWide();
// draw the narrow column
echo $b->renderNarrow();
// render some final fbml
echo $b->renderFinal();

echo "</div>";

} 

?>
