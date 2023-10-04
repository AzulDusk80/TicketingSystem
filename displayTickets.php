<?php
if ($category !== "All") {
    $pageTitle = "List of ".ucfirst($status)." Tickets";
    $sql = "SELECT `ticketNum`, `adminID`, `category`, `customerID` FROM `ticket` WHERE `status` = :status AND `category` = :category;";
    $parameterValues = array(
        ":status" => $status,
        ":category" => $category
    );
    $response = getAll($sql, $db, $parameterValues);
}
else {
    $pageTitle = "List of ".ucfirst($status)." Tickets";
    $sql = "SELECT `ticketNum`, `adminID`, `category`, `customerID` FROM `ticket` WHERE `status` = :status;";
    $parameterValues = array(":status" => $status);
    $response = getAll($sql, $db, $parameterValues);
}
$categories = array("Computer", "Keyboard", "Phone", "Mouse", "Wifi");
?>

<h4><?php echo $pageTitle; ?></h4>
<p>Filter tickets by category:
    <form method="post" action="index.php?mode=displayTickets&status=<?php echo $status; ?>">
    <select onchange="this.form.submit();" name="category">
        <option value="All">All</option>
        <?php
            foreach($categories as $c) {
                echo "<option value='$c'";
                if ($c == $category) {
                    echo " selected";
                }
                echo ">$c</option>";
            }
        ?>
    </select>
    </form>
</p>
<table class="table">
    <thead>
        <tr>
            <?php
            echo "<th></th>";
            foreach($columns as $c) {
                echo "<th>$c</th>";
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($response as $item) {
            echo "<tr>";
            echo "<td><a href='index.php?mode=displayTicketInfo&ticket={$item['ticketNum']}'>View</a></td>";
            foreach($item as $key => $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>