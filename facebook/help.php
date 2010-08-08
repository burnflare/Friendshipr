<?php
include_once 'appinclude.php';
include_once 'db.php';
include_once 'canvas.php';
include_once 'display.php';

render_canvas_header(about); 
?>

<style>
  <?php include("style.css"); ?>
</style>

<h3>Welcome to Friendshipr, the friendly friendship meter.
Friendshipr calculates and displays your friendship ranking. You know
how you rank, you know who are your highest ranking friends, you know
who has the highest ranking, and you can search for the rankings of
people you know.</h3>
<h3><br>
Your friendshp ranking is the sum of the friendship ranking of your
friends on Facebook. Their friendship ranking is in turn the sum of the
friendship ranking of their friends, and so on. Thus, the friendship
ranking is defined recursively on the graph of friendships on Facebook.
This solved, and gives an ranking of all the people who have added this
application.</h3>
<h3><br>
Think of it like Google pagerank, except that it is for the friendships
on Facebook. People-rank.</h3>
<h3><br>
There are thus two ways to increase your friendship ranking - either by
befriending people with high ranks; or making sure this application is
added to your friends.</h3>
<h3>So send this application to your friends, and friends of your
friends. Spread then word. Let's see how far this application travels.</h3>
<h3><br>
Friendshipr is an application created at NUS High School of Maths and
Science, Singapore by physics teacher Chong Shang Shan, who taught his
students Sanchit Bareja and Vishnu Prem the algorithm for calculating
the rank. The application was created for educational purposes, so the
networking information gathered will only be used for educational and
research purposes only.</h3>

<?php
	render_canvas_footer(); 
?>