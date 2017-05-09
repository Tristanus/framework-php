</div>

<div style="border:1px solid grey; padding: 5px;">
<b>session debug:</b><br>
<?php 
	echo 'session id: ' . session_id() . '<br>'; 
	echo 'session userid: ' . (isset($_SESSION['userid'])?$_SESSION['userid']:'(undefined)') . '<br>'; 
	echo 'session username: ' . (isset($_SESSION['username'])?$_SESSION['username']:'(undefined)') . '<br>'; 

	foreach($_SESSION['roles'] as $role) {
		echo 'session role: ' . $role . '<br>';
	}

?>
</div>

</body>
</html>