<html>
    <head>  
	<meta name="viewport" content="width=device-width, initial-scale=1">    
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
	<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">	
	</head>
    <body>	
	<center>
		<script>
		 var isNS = (navigator.appName == "Netscape") ? 1 : 0;
		  if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
		  function mischandler(){
		   return false;
		 }
		  function mousehandler(e){
			var myevent = (isNS) ? e : event;
			var eventbutton = (isNS) ? myevent.which : myevent.button;
			if((eventbutton==2)||(eventbutton==3)) return false;
		 }
		 document.oncontextmenu = mischandler;
		 document.onmousedown = mousehandler;
		 document.onmouseup = mousehandler;
	  </script>			
	<?php 
		session_start(); 
		if (($_POST['username'] == 'aaa' && $_POST['password'] == 'aaa')
			OR ($_POST['username'] == 'bbb' && $_POST['password'] == 'bbb')
			OR ($_POST['username'] == 'ccc' && $_POST['password'] == 'ccc')){
			 $_SESSION['loggedin'] = 1;
			 header("Location: status.php");
			 exit;
		} 
	?>
	<center>		
		<form method="post">
		   <br><br>
		   <h2>Sync Monitor</h2>
		   <br>
		   Login:<br><input id="pmsIp" type="text" name="username" autocomplete="off" style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDigO/bwqsQAAAfNJREFUOMvNkz1ok2EQx3/39umHmpZWMUVaUEEUpWlQ0QyiCDooFhwcFN2lgqhTEMKTDwsZCw4SQQNOLh20KBgQRZ0kIK2LlBaqtNKhfkRqbHnfvOEc0kCbD0Enb/vD8bu7/93BfxfRaLTfWnuoqq21EWttqFm+s1ZYa692dHRMiUgWEEBEJCMiE/F4PN0IYGq0JyKbgJC19ryq+iKyH0BVZxoBpFbH4/HXInIUmFbVsojsBV6mUqkTTQGxWGy74zhdpVJpxRizw3GcnIi0rFYuA+dUdVFEAr7vf0mn05PrRjDG3ASG29vb6ytUQI9FKs0aY+4Bl2tNdP51a7Lq/kFV3aqqP0QkaIwZ/yvA2kgkEs9F5CQEiAydYbC/i6VPeR7l3uM1ALTU3MEFEYmKCJFLNzg1sA186NsVZl/nAvnp738+JGA34EOQPTs3UP6YY/T2KC8WymwJHaYHgABDw9c5G+6pB4yMjNzyPC8My/zyoKVvkEj4OAO9lUZbAdjI5t5ugp2tzY1JJpOavv9M55ZcVd9VV1XVndE3s8u6Plxtsr42jp0+QvfPCTJ3xvkKeHNT5J88IJsdY74M3yafksncrfuF6kvw9tUHDlyMcOVaBFbmeTj2jqIHxUIJF3A/z7K4WKhfY3WEaieBnjaKhWLTcX8DATq/EhizV6kAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;"><br>
		   Password:<br> <input type="password" name="password" autocomplete="off" style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDigO/bwqsQAAAfNJREFUOMvNkz1ok2EQx3/39umHmpZWMUVaUEEUpWlQ0QyiCDooFhwcFN2lgqhTEMKTDwsZCw4SQQNOLh20KBgQRZ0kIK2LlBaqtNKhfkRqbHnfvOEc0kCbD0Enb/vD8bu7/93BfxfRaLTfWnuoqq21EWttqFm+s1ZYa692dHRMiUgWEEBEJCMiE/F4PN0IYGq0JyKbgJC19ryq+iKyH0BVZxoBpFbH4/HXInIUmFbVsojsBV6mUqkTTQGxWGy74zhdpVJpxRizw3GcnIi0rFYuA+dUdVFEAr7vf0mn05PrRjDG3ASG29vb6ytUQI9FKs0aY+4Bl2tNdP51a7Lq/kFV3aqqP0QkaIwZ/yvA2kgkEs9F5CQEiAydYbC/i6VPeR7l3uM1ALTU3MEFEYmKCJFLNzg1sA186NsVZl/nAvnp738+JGA34EOQPTs3UP6YY/T2KC8WymwJHaYHgABDw9c5G+6pB4yMjNzyPC8My/zyoKVvkEj4OAO9lUZbAdjI5t5ugp2tzY1JJpOavv9M55ZcVd9VV1XVndE3s8u6Plxtsr42jp0+QvfPCTJ3xvkKeHNT5J88IJsdY74M3yafksncrfuF6kvw9tUHDlyMcOVaBFbmeTj2jqIHxUIJF3A/z7K4WKhfY3WEaieBnjaKhWLTcX8DATq/EhizV6kAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;">
		   <font color="red"><br><br></font>										
		   <input style="margin-left: 20px" class="btn btn-medium btn-primary" type="submit">
		   <br><br>You are trying to reach a secured page.<br>
		   Your <a href="http://www.whatsmyip.us" style="color:black;"><b>IP</b></a> is: <script type="text/javascript" src="http://www.whatsmyip.us/showipsimple.php"> </script>2
		</form>
	</center>
</form>
   </body>
</html>