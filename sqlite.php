<?php 
// error_reporting(E_ALL);

$db = new SQLite3("database1.db");	
$db-> exec("CREATE TABLE IF NOT EXISTS DigitalTalk(
	   id INTEGER PRIMARY KEY AUTOINCREMENT, 
	   name TEXT NOT NULL DEFAULT '0',
	   info TEXT NOT NULL DEFAULT '0',
	   since INTEGER NOT NULL DEFAULT '0')");
if (isset($_POST['name'])) {  
$sql="
	INSERT INTO DigitalTalk 
		(name,info,since) 
		VALUES 
		('".$_POST['name']."',
		'".$_POST['info']."',
		'".strtotime($_POST['since']).
		"');";
		echo $sql;
	$stm=$db->query($sql);
}
	
?>
<form method=post>
<input type=text placeholder="Name" name="name"><br>
<input type=info placeholder="Info" name="info"><br>
<input type=date name="since">
<input type=submit>
</form>

<?php

$results=$db->query("SELECT * FROM Digitaltalk");

$br="</td><td style='border-left:3px dotted pink;padding:5px 15px;'>";

echo "<table>
<tr><th>Name</th><th>Info</th><th>Erscheinungsdatum</th></tr>";
	while ($row = $results->fetchArray()) {
	   echo "<tr><td style='padding:5px 15px;'>".$row['name'].$br.
	   $row['info'].$br.
	   date('d.m.Y', $row['since'])."</td></tr>";
	}
echo "<table>";
?>