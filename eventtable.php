<?php
if (isset($_GET['ticket'])) {
	$ticketID = $_GET['ticket'];
}
?>

<div style="flex: 1; margin: 10px;">
<h4>Events</h4>

<?php
if ($ticket['status'] == "open") {
?>
<form method='post' action='index.php?mode=displayNewEventForm&ticket=<?php echo $ticketID; ?>'>
	<input type='submit' class='btn btn-primary' value='New Event'>
</form>
<?php
}

$sql = "SELECT `type`, `adminID`, `description`, `timestamp` FROM `event` WHERE `ticketNum` = :ticketNum ORDER BY `timestamp` DESC";
$parameterValues = array(":ticketNum" => $ticketID);
$resultSet = getAll($sql, $db, $parameterValues);
$pageTitle = "";
$columns = array("Type", "Created By", "Description", "Time");
displayResultSet($pageTitle, $resultSet, $columns, "event");
?>
</div>
</div>