<?php

// Renders the canvas header for the main page and invite page 
function render_canvas_header($invite) {
	
  global $APP_ROOT_URL; 
  echo '<fb:dashboard>';
  echo  '</fb:dashboard>';
  echo  '<fb:tabs>'; 
  if ($invite==index) {
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'index.php" title="Overview" selected="true"/>';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'invite.php" title="Invite Friends" />';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'search.php?page=blank" title="Search Friends" />';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'help.php" title="About" />';
	echo '</div>'; 
	echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'index.php?page=recalculate" title="Recalculate Rankings!" />';
  }
  else if($invite==invite){
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'index.php" title="Overview" />';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'invite.php" title="Invite Friends" selected="true"/>';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'search.php?page=blank" title="Search Friends" />';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'help.php" title="About" />';
	echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'index.php?page=recalculate" title="Recalculate Rankings!" />';
  }
  else if($invite==search){
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'index.php" title="Overview" />';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'invite.php" title="Invite Friends"/>';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'search.php?page=blank" title="Search Friends" selected="true"/>';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'help.php" title="About" />';
	echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'index.php?page=recalculate" title="Recalculate Rankings!" />';
  }
  else if($invite==about){
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'index.php" title="Overview" />';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'invite.php" title="Invite Friends"/>';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'search.php?page=blank" title="Search Friends"/>';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'help.php" title="About"  selected="true"/>';
	echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'index.php?page=recalculate" title="Recalculate Rankings!" />';
  }
  echo  '</fb:tabs>'; 
  echo  '<div style="padding: 10px 20px 20px">';
}
// Renders the footer 
function render_canvas_footer() {
  echo '<br/><p>Friendshipr v.0.8.1 Beta, so please <a href="mailto:bugreport@friendshipr.com?subject=Friendshipr BUGREPORT!">email your bugs here</a>.</p>';
  echo  '</div>';
}
function render_searchfriends($userid){
	?>
	<style>

.speeddial { margin:0 0; left:0px;}

.speeddial td { 
	width: 65px; 
	text-align:center; 
	vertical-align: top; 
	border: 1px solid #d8dfea; 
	padding:2px;
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
  width:306px;
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

</style>

	<div>
	<table class="lists" cellspacing="0" border="0">
		<tr>
				 <td class="spacer"></td>
				 <td class="list">
				 <div class="list_item clearfix">
				   <center>
						<table class="speeddial" border='0' cellpadding='1' width='500px'>
							<tr>
								<col>
										<big><big><big><big><big><fb:name uid="<?php echo $userid;?>" useyou="false" captialize="true"/></big></big></big></big></big><?php 	
										echo "'s ranking is"; ?>
										<big><big><big><big><big>
										<?php echo mysql_get_ranking($userid); ?> 
										</big></big></big></big></big>
										<?php echo ".							";?>
										<br/>
										<big><big><big><big><big><fb:profile-pic uid="<?php echo $userid;?>" linked="true" size="normal" /></big></big></big></big></big>
									</col>
								<col>
							</tr>
							</table>			
						</center>
				 </div>
			 </td>
			</tr>
			</table>
		</div>
	<?php
	echo "<br />";
}
?>