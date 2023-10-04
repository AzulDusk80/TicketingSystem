
<button id="downloadButton">Download List</button>
<script>
	const downloadButton = document.getElementById("downloadButton");
	downloadButton.addEventListener("click", function() {
	const text = <?php 
		echo "\"";
		if (!isset($status)) {
			$status = "default";
		}
		switch($status) {
			case 'open':
				$sql = "SELECT `ticketNum`, `adminID`, `category`, `customerID` FROM `ticket` WHERE `status` = :status;";
				$parameterValues = array(":status" => "open");
				$resultSet = getAll($sql, $db, $parameterValues);
				$columns = array("Ticket Number", "Created By", "Issue", "Customer");
				
				echo "List of Open Tickets";
				$numCols = count($columns);
				if ($numCols > 0) {
					echo "\\n";
					foreach($columns as $c) {
						if($c == 'Issue')
							echo "{$c}\\t\\t";
						else
							echo "{$c}\\t";
					}
					echo "\\n";
				}
				foreach($resultSet as $item){

					foreach ($item as $key => $value) {
						if($key == 'ticketNum' || $key == 'category')
							if($value == 'computer' || $value == 'keyboard')
								echo "{$value}\\t\\t";
							else
								echo "{$value}\\t\\t\\t";
						else
							echo "{$value}\\t";
					}
					echo "\\n";
				}

				break;
				
			case 'closed':
				$sql = "SELECT `ticketNum`, `adminID`, `category`, `customerID` FROM `ticket` WHERE `status` = :status;";
				$parameterValues = array(":status" => "closed");
				$resultSet = getAll($sql, $db, $parameterValues);
				$columns = array("Ticket Number", "Created By", "Issue", "Customer");
				
				echo "List of Closed Tickets";
				$numCols = count($columns);
				if ($numCols > 0) {
					echo "\\n";
					foreach($columns as $c) {
						if($c == 'Issue')
							echo "{$c}\\t\\t";
						else
							echo "{$c}\\t";
					}
					echo "\\n";
				}
				foreach($resultSet as $item){

					foreach ($item as $key => $value) {
						if($key == 'ticketNum' || $key == 'category')
							if($value == 'computer' || $value == 'keyboard')
								echo "{$value}\\t\\t";
							else
								echo "{$value}\\t\\t\\t";
						else
							echo "{$value}\\t";
					}
					echo "\\n";
				}
				
				break;
				
			default:
				if (isset($_GET['ticket'])) {
					$ticketID = $_GET['ticket'];
				}
				$sql = "SELECT `type`, `adminID`, `timestamp`, `description` FROM `event` WHERE `ticketNum` = :ticketNum ORDER BY `timestamp` DESC";
				$parameterValues = array(":ticketNum" => $ticketID);
				$resultSet = getAll($sql, $db, $parameterValues);
				
				$sqlIssue = "SELECT `status`, `category`, `description`, `deviceBrand`, `deviceModel`, `availability`, `customerID`, `adminID` FROM `ticket` WHERE `ticketNum` = :ticketNum;";
				$parameterValuesIssue = array(":ticketNum" => $ticketID);
				$resultSetIssue = getAll($sqlIssue, $db, $parameterValuesIssue);
				$issueInfo = $resultSetIssue[0];

				$ticket = $resultSetIssue[0];
				$secsql = "SELECT `firstName`, `lastName`, `phone`, `email`, `location` FROM `customer` WHERE `customerID` = :customerID;";
				$secParameterValues = array(":customerID" => $ticket['customerID']);
				$secResultSet = getAll($secsql, $db, $secParameterValues);
				$customer = $secResultSet[0];
				
				echo "Ticket $ticketID\\n";

				echo "Name:\\t\\t".$customer['firstName']." ".$customer['lastName']."\\n";
				echo "Phone:\\t".$customer['phone']."\\n";
				echo "Email:\\t".$customer['email']."\\n";
				echo "Location:\\t".$customer['location']."\\n";
				
				echo "\\nIssue:\\t\\t";
				echo $ticket['category']."\\n";
				echo "Description:\\t".$ticket['description']."\\n";
				echo "Device Brand:\\t".$ticket['deviceBrand']."\\n";
				echo "Device Model:\\t".$ticket['deviceModel']."\\n";
				echo "Availability:\\t".$ticket['availability']."\\n";
				echo "Status:\\t\\t".$ticket['status']."\\n";
				
				echo "\\n\\nEvents:\\n";
				foreach($resultSet as $item){

					foreach ($item as $key => $value) {
						if($value == 'Appointment' || $value == 'Resolution' || $value == 'Walkin')
							echo "{$value}\\t\\t";
						else if($value == 'Email' || $value == 'Call'|| $value == 'Visit' )
							echo "{$value}\\t\\t\\t";
						else
							echo "{$value}\\t";
					}
					echo "\\n";
				}

				break;
		}
		echo "\"";
		?>;
		const fileName = "Ticket List.txt";
		const fileType = "text/plain";
		const blob = new Blob([text], {type: fileType});
		const link = document.createElement("a");
		link.href = window.URL.createObjectURL(blob);
		link.download = fileName;
		link.click();
		window.URL.revokeObjectURL(link.href);
	});
</script>