
<br />
	<form action="include/login.php" method="post">
	<input type="text" name="login" placeholder="login" onfocus="this.placeholder=' '" onblur="this.placeholder='login'" /><br />
	<input type="password" name="haslo" placeholder="hasło" onfocus="this.placeholder=' '" onblur="this.placeholder='hasło'" /><br />
	<br />
	<input type="submit" id="zaloguj" value="Zaloguj">
	</form>
<?php
	if (isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>