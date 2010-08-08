<?php
//This file links the pages together - through render_canvas_header- renders footer, and includes style.css - default facebook css
// Renders the canvas header for the main page and invite page 
// This file links all the pages together - here is where you navigate throught tabs and masterminds the page you view.
     function render_canvas_header($invite) {
	
  global $APP_ROOT_URL; 
  echo '<fb:dashboard>';
  echo  '</fb:dashboard>';
  echo  '<fb:tabs>'; 
  if ($invite==index) {
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'index.php" title="Vote Here!" selected="true"/>';
	echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'image.php" title="Overview" />';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'prefuser.php?page=blank" title="Browse Pictures" />';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'invite.php" title="Invite Friends" />';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'help.php" title="About" />'; 
	echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'competition.php" title="Competition"/>';
  }
  else if($invite==image){
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'index.php" title="Vote Here!" />';
	echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'image.php" title="Overview" selected="true"/>';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'prefuser.php?page=blank" title="Browse Pictures" />';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'invite.php" title="Invite Friends"/>';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'help.php" title="About" />';
	echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'competition.php" title="Competition"/>';
  }
  else if($invite==search){
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'index.php" title="Vote Here!" />';
	echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'image.php" title="Overview" />';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'prefuser.php?page=blank" title="Browse Pictures" selected="true"/>';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'invite.php" title="Invite Friends"/>';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'help.php" title="About" />';
	echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'competition.php" title="Competition"/>';
  }
  else if($invite==invite){
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'index.php" title="Vote Here!" />';
	echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'index.php" title="Overview" />';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'prefuser.php?page=blank" title="Browse Pictures" />';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'invite.php" title="Invite Friends" selected="true"/>';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'help.php" title="About" />';
	echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'competition.php" title="Competition"/>';
  }
  else if($invite==competition){
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'index.php" title="Vote Here!" />';
	echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'index.php" title="Overview" />';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'prefuser.php?page=blank" title="Browse Pictures"/>';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'invite.php" title="Invite Friends"/>';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'help.php" title="About"/>';
	echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'competition.php" title="Competition"  selected="true"/>';
  }
  else if($invite==about){
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'index.php" title="Vote Here!" />';
	echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'index.php" title="Overview" />';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'prefuser.php?page=blank" title="Browse Pictures"/>';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'invite.php" title="Invite Friends"/>';
    echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'help.php" title="About"  selected="true"/>';
	echo  '<fb:tab-item href="' . $APP_ROOT_URL . 'competition.php" title="Competition"/>';
   }

  echo  '</fb:tabs>'; 
  echo  '<div style="padding: 10px 20px 20px">';
}
// Renders the footer 
function render_canvas_footer() {
  echo '<br/><p>Singapore Spirit v.1.5.3 Beta, so please <a href="mailto:bugreport@friendshipr.com?subject=Singapore Spirit BUGREPORT!">email your bugs here</a>.</p>';
  echo  '</div>';
}

?>


