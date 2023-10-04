<?php
  $customerID = $_GET['customerID'];
  echo $customerID;
?>

<script>
	const text = <?php
	echo"\"";			
	$sql = "SELECT `firstName`, `lastName`, `phone`, `email`, `location` FROM `customer` WHERE `customerID` = :customerID;";
	$secParameterValues = array(":customerID" => $customerID);
	$secResultSet = getAll($sql, $db, $secParameterValues);
	$customer = $secResultSet[0];
	
	$sqlIssue = "SELECT `ticketNum`, `status`, `category`, `description`, `deviceBrand`, `deviceModel`, `availability`, `customerID`, `adminID` FROM `ticket` WHERE `customerID` = :customerID;";
	$parameterValuesIssue = array(":customerID" => $customerID);
	$resultSetIssue = getAll($sqlIssue, $db, $parameterValuesIssue);

	echo "Name:\\t\\t".$customer['firstName']." ".$customer['lastName']."\\n";
	echo "Phone:\\t".$customer['phone']."\\n";
	echo "Email:\\t".$customer['email']."\\n";
	echo "Location:\\t".$customer['location']."\\n";
				
	foreach($resultSetIssue as $ticket){
		echo "\\nIssue Number:\\t".$ticket['ticketNum']."\\n";
		echo "Issue:\\t\\t".$ticket['category']."\\n";
		echo "Description:\\t".$ticket['description']."\\n";
		echo "Device Brand:\\t".$ticket['deviceBrand']."\\n";
		echo "Device Model:\\t".$ticket['deviceModel']."\\n";
		echo "Availability:\\t".$ticket['availability']."\\n";
		echo "Status:\\t\\t".$ticket['status']."\\n";
	}
	
	echo"\"";				
	?>;
	const fileName = <?php echo "\"Customer".$customerID."Info\""?>;
	const fileType = "text/plain";
	const dataUri = "data:" + fileType + ";charset=utf-8," + encodeURIComponent(text);
	const link = document.createElement("a");
	link.href = dataUri;
	link.download = fileName;
	link.click();
</script>