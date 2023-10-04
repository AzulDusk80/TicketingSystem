<?php
	$sql = "SELECT * FROM `customer`;";
	$data = getAll($sql, $db);
    $pageTitle = "List of Customers";
    $columns = array("ID Number", "First Name", "Last Name", "Phone", "Email", "Location", "Download");
    displayResultSet($pageTitle, $data, $columns, "customer");
?>