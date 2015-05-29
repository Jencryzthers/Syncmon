<?php

/*
 * @Name: Syncmon (Prototype by Jencryzthers - 2015)
 * @Description: Monitor file transfers done by LFTP with few sweet options. This project is completely open-source
 * you can do whatever you want with this project. I made this to simplify my download monitoring and Im adding feature overtime.
 * it is really poor quality code (sorry) but im not looking for any optimzing yet, it was just a proof of concept/prototype,
 * im looking to optimize it in the near future while adding most of my idea to it! :)
 * 
 * @todo: add multilanguage support
 * @todo: add more complex security
 * @todo: optimize the whole thing
 * @todo: much more...
 *
 */


// To invoke debug mode please add status.php?debug=true 
// This should activate php errors.
$debugMode = ISSET($_GET['debug']) ? $_GET['debug'] : false;
if($debugMode){	ini_set('display_errors', 1); error_reporting(E_ALL); }

// We set the required files which are located in the include folder.
// Configs.php contains defined property of all configurations 
// and fonctions.php contains usefull global fonctions
require 'includes/configs.php';
require 'includes/fonctions.php';

// This part is not mandatory. I use this to simply protect the page so people cannot "easy" 
// access the syncmon interface. 
// @todo
session_start();
ISSET($_SESSION['loggedin']) ? $_GET['loggedin'] : 0;
if ($_SESSION['loggedin'] != 1) { header("Location: index.php"); exit; }

// When the Status.php is called with the get parameter "refreshGrid" we call the fonction
// print grid to make update the data being sent from the remote host with an ajax request.
$refreshGrid = ISSET($_GET['refreshGrid']) ? $_GET['refreshGrid'] : false;
if($refreshGrid){ echo printGrid(); }

?>

<html>
   <head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8">
		<title>Sync Monitor</title>
		<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>
		<script language="JavaScript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script type="text/javascript">
		
		/**
		 * This fonction allows the users when they click to send the encoded name
		 * to the custom page we added on the remote host allowing us to add file back to the 
		 * sync folder.
		 * @param {String} name 
		 * 
		 * @todo: Fix name with special characters in filename which truncate the javascript links making the javascript useless. 
		 * (or find something else)
		*/
		function sync(name){
			if(name){
				name = encodeURI(name);
				$.ajax({
					type:'POST',
					url: <? echo '"'.api_provider_link.'"'; ?>, 
					contentType:"application/json",
					dataType:'jsonp',
					crossDomain:true,
					data:{api:<? echo '"'.api_provider_key.'"'; ?>, file:name} 
				});	
			}
		}
		</script>
   </head>
   <body>	
	<? 
		// We add the menu of the application here.
		include 'menu.php';  
	?>   
    <center>
		<form id='frm' name='frm' method='post' action='status.php'>
			<table  border='0' style='width:90%; margin-top: 80px;'>					
			</table>
		</form>
    </center>
		<center>
			<div id="tableHolder">
				<div class="container">
				  <center><h4>Connexion au serveur en cours...</h4></center>
				  <div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:10%">
					  <span class="sr-only">Loading...</span>
					</div>
				  </div>
				</div>
				<script type="text/javascript">
				$(".progress-bar").animate({
					width: "100%"
				}, 5000);
				</script>
			</div>
			<script type="text/javascript">				
				/**
				 * This fonction refresh the grid every 500ms so the grid keep itself updated
				 * @todo: optimize
				 * (or find something else)
				*/
				$(document).ready(function(){
				  refreshTable();
				});
				function refreshTable(){
					$('#tableHolder').load('status.php?refreshGrid=true', function(){
					   setTimeout(refreshTable, 500);
					});
				}
			</script>					
			<? 
				// We add the footer of the application here.	
				include 'footer.php'; 
			?>
		</center>		
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->    
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>	 
   </body>
</html>