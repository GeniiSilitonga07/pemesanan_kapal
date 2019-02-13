<?php
	if(isset($_SESSION["isLoggedIn"]))
		{ $_SESSION["isLoggedIn"] = [
			"username" => $_SESSION['username'],
			];
		}
?>