<?php
if (isset($_GET['ticket'])) {
	$ticketID = $_GET['ticket'];
}

$sql = "SELECT `status`, `category`, `description`, `deviceBrand`, `deviceModel`, `availability`, `customerID`, `adminID` FROM `ticket` WHERE `ticketNum` = :ticketNum;";
$parameterValues = array(":ticketNum" => $ticketID);
$resultSet = getAll($sql, $db, $parameterValues);

$ticket = $resultSet[0];
?>

<div style="flex: 1; margin: 10px;">
<h4>Ticket Information</h4>

<?php
if ($ticket["status"] == "open") {
?>
<div style="margin-bottom: 8px;">
	<div style="display: inline-block;">
		<form method='post' action='index.php?mode=viewUpdateTicketForm&ticket=<?php echo $ticketID; ?>'>
			<input type='submit' class='btn btn-primary' value='Edit Ticket'>
		</form>
	</div>

	<div style="display: inline-block;">
		<form method='post' action='index.php?mode=closeTicket&ticket=<?php echo $ticketID; ?>'>
			<input type='submit' class='btn btn-primary' style='background-color: red' value='Close Ticket'>
		</form>
	</div>
</div>
<?php
}
else {
?>
<div style="margin-bottom: 8px;">
	<form method='post' action='index.php?mode=openTicket&ticket=<?php echo $ticketID; ?>'>
		<input type='submit' class='btn btn-primary' value='Reopen Ticket'>
	</form>
</div>
<?php
}
?>
<table class="table table-bordered">
	<tr>
		<td>Issue</td>
		<td><?php echo $ticket['category']; ?></td>
	</tr>
	<tr>
		<td>Description</td>
		<td><?php echo $ticket['description']; ?></td>
	</tr>
	<tr>
		<td>Brand</td>
		<td><?php echo $ticket['deviceBrand']; ?></td>
	</tr>
	<tr>
		<td>Model</td>
		<td><?php echo $ticket['deviceModel']; ?></td>
	</tr>
	<tr>
		<td>Availability</td>
		<td><?php echo $ticket['availability']; ?></td>
	</tr>
</table>
</div>