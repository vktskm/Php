<?php require "defs.php"; ?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<form action="insert.php" method="post">
			<select name="giorni[]" multiple="multiple">
				<?php
				  foreach($giorni as $giorno)
				  	echo "<option>$giorno</option>\n";
				?>
			</select>
			<select name="fasce[]" multiple="multiple">
				<?php
				  foreach($fasce as $fascia)
				  	echo "<option>$fascia</option>\n";
				?>
			</select><br />
			Nome <input type="text" name="nome" /><br />
			<input type="submit" value="Invia" />
		</form>
	</body>
</html>