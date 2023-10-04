<?php
if (isset($_GET['ticket'])) {
	$ticketID = $_GET['ticket'];
}

$sql = "SELECT `status`, `category`, `description`, `deviceBrand`, `deviceModel`, `availability`, `customerID`, `adminID` FROM `ticket` WHERE `ticketNum` = :ticketNum;";
$parameterValues = array(":ticketNum" => $ticketID);
$resultSet = getAll($sql, $db, $parameterValues);

$ticket = $resultSet[0];
$secsql = "SELECT `firstName`, `lastName`, `phone`, `email`, `location` FROM `customer` WHERE `customerID` = :customerID;";
$secParameterValues = array(":customerID" => $ticket['customerID']);
$secResultSet = getAll($secsql, $db, $secParameterValues);
$customer = $secResultSet[0];
?>

<div style="display: flex;">
<div style="flex: 1; margin: 10px;">
<table class="table table-bordered">
	<tr>
		<th colspan="2">Customer Information</th>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo $customer['firstName']." ".$customer['lastName']; ?></td>
	</tr>
	<tr>
		<td>Phone</td>
		<td><?php echo $customer['phone']; ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo $customer['email']; ?></td>
	</tr>
	<tr>
		<td>Location</td>
		<td><?php echo $customer['location']; ?></td>
	</tr>
</table>
</div>