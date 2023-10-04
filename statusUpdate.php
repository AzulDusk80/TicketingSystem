<?php
if (isset($_GET['ticket'])) {
	$ticketID = $_GET['ticket'];
}

$sql = "SELECT `status`, `category`, `description`, `deviceBrand`, `deviceModel`, `availability`, `customerID`, `adminID` FROM `ticket` WHERE `ticketNum` = :ticketNum;";
$parameterValues = array(":ticketNum" => $ticketID);
$resultSet = getAll($sql, $db, $parameterValues);

$ticket = $resultSet[0];
?>