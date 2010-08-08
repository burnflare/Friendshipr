<?php
include_once 'appinclude.php';
include_once 'db.php';
include_once 'canvas.php';
include_once 'display.php';
mysql_get_db_conn();
render_canvas_header(search); 
$result = mysql_search_friends($_POST["name"]);
if($_POST["name"]=="" && $page!="blank"){
	$page = "noquery";
}
if($result==null){$page = "noresult";}
switch($page){
	case "noquery":
?>

<?php
	break;
	default:
}

?>

<style>
  <?php include("style.css"); ?>
</style>

<h3>Welcome <fb:name uid="loggedinuser" firstnameonly="true" useyou="false" captialize="true"/> to Friendshipr, the friendly meter</h3>
<br />
<br />


			<?php
			switch($page){
				case "noquery":
			?>
			<div>
				<table class="lists" cellspacing="0" border="0">
				<tr>
					<th class="spacer"></th>
					<th>
						<h4>Search for your Friends' Ranks!</h4>
					</th>
				</tr>
				<tr>
							 <td class="spacer"></td>
							 <td class="list">
							 <div class="list_item clearfix">
							   <center>
									<table class="speeddial" border='0' cellpadding='1' width='500px'>
										<tr>
											<form action="search.php" method="post">
											Name: <input type="text" name="name" />
											<input type="submit" />
											</form> 
										</tr>
										</table>			
									</center>
						 </td>
						</tr>
						</table>
			</div>
			<div>
				<table class="lists" cellspacing="0" border="0">
					<tr>
					<th class="spacer"></th>
					<th>
			<h4>Welcome!</h4>
			<tr>
					 <td class="spacer"></td>
					 <td class="list">
					 <div class="list_item clearfix">
					   <center>
							<table class="speeddial" border="0" cellpadding='1' width='500px'>
							<tr>
								<td>
								You did not type anything in the search box
								Please use the Search box above to search for your friends' rankings
								</td>
							</tr>
						</table>
					</center>
			</tr>
			</th>
			</tr>

		</table>
	</div>
			<?php
			break;
				case "blank":
				?>
				<div>
					<table class="lists" cellspacing="0" border="0">
					<tr>
						<th class="spacer"></th>
						<th>
							<h4>Search for your Friends' Ranks!</h4>
						</th>
					</tr>
					<tr>
								 <td class="spacer"></td>
								 <td class="list">
								 <div class="list_item clearfix">
								   <center>
										<table class="speeddial" border='0' cellpadding='1' width='500px'>
											<tr>
												<form action="search.php" method="post">
												Name: <input type="text" name="name" />
												<input type="submit" />
												</form> 
											</tr>
											<br />
											<br />
											<tr>
												Welcome to friengine, the friendly search engine. <br />
												Please take your time to search for your favourite pals (or foes).
											</tr>
											</table>			
										</center>
							 </td>
							</tr>
							</table>
				</div>
				<div>
					<table class="lists" cellspacing="0" border="0">
						<tr>
						<th class="spacer"></th>
						<th>
				<tr>
						 <td class="spacer"></td>
						 <td class="list">
						 <div class="list_item clearfix">
						   <center>
								<table class="speeddial" border="0" cellpadding='1' width='500px'>
								<tr>
									<h1>Here are the top friends in this ecosystem</h1>
								</tr>
								<tr>
									<td>
									<?php 
									$result = mysql_search_friends($_POST["name"]);
									foreach($result as $search_answers){
										render_searchfriends($search_answers);
									}
									?>
									</td>
								</tr>
							</table>
						</center>
				</tr>
				</th>
				</tr>

			</table>
		</div>
			<?php
			break;
			case "noresult":
			?>
			<div>
				<table class="lists" cellspacing="0" border="0">
				<tr>
					<th class="spacer"></th>
					<th>
						<h4>Search for your Friends' Ranks!</h4>
					</th>
				</tr>
				<tr>
							 <td class="spacer"></td>
							 <td class="list">
							 <div class="list_item clearfix">
							   <center>
									<table class="speeddial" border='0' cellpadding='1' width='500px'>
										<tr>
											<form action="search.php" method="post">
											Name: <input type="text" name="name" />
											<input type="submit" />
											</form> 
										</tr>
										</table>			
									</center>
						 </td>
						</tr>
						</table>
			</div>
			<div>
				<table class="lists" cellspacing="0" border="0">
					<tr>
					<th class="spacer"></th>
					<th>
			<h4>Sorry!</h4>
			<tr>
					 <td class="spacer"></td>
					 <td class="list">
					 <div class="list_item clearfix">
					   <center>
							<table class="speeddial" border="0" cellpadding='1' width='500px'>
							<tr>
								<td>
								No results returned! Please search again with another keyword
								</td>
							</tr>
						</table>
					</center>
			</tr>
			</th>
			</tr>

		</table>
	</div>
			<?php
				break;
				default:
				?>
				<div>
					<table class="lists" cellspacing="0" border="0">
					<tr>
						<th class="spacer"></th>
						<th>
							<h4>Search for your Friends' Ranks!</h4>
						</th>
					</tr>
					<tr>
								 <td class="spacer"></td>
								 <td class="list">
								 <div class="list_item clearfix">
								   <center>
										<table class="speeddial" border='0' cellpadding='1' width='500px'>
											<tr>
												<form action="search.php" method="post">
												Name: <input type="text" name="name" />
												<input type="submit" />
												</form> 
											</tr>
											</table>			
										</center>
							 </td>
							</tr>
							</table>
				</div>
				<div>
					<table class="lists" cellspacing="0" border="0">
						<tr>
						<th class="spacer"></th>
						<th>
				<h4>Your Friends' Rankings...</h4>
				<tr>
						 <td class="spacer"></td>
						 <td class="list">
						 <div class="list_item clearfix">
						   <center>
								<table class="speeddial" border="0" cellpadding='1' width='500px'>
								<tr>
									<td>
									<?php 
									$result = mysql_search_friends($_POST["name"]);
									foreach($result as $search_answers){
										render_searchfriends($search_answers);
									}
									?>
									</td>
								</tr>
							</table>
						</center>
					</tr>
			</th>
		</tr>
	</table>
</div>
<?php } ?>