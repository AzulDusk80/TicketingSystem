<?php
    $ticket = $resultSet[0];
?>

<div style="flex: 1; margin: 10px;">
    <form action='index.php?mode=updateTicket&ticket=<?php echo $ticketID; ?>' method='post'>
        <table class="table table-bordered">
            <tr>
                <th colspan="2">Update Ticket</th>
            </tr>
            <tr>
                <td>Issue</td>
                <td><?php echo $ticket["category"]; ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <textarea name="description" required rows="3" cols="50"><?php echo $ticket['description']?></textarea>
                </td>
            </tr>
            <tr>
                <td>Brand</td><td><input type='text' name="deviceBrand" required
                    value='<?php echo $ticket['deviceBrand']?>'></td>
            </tr>
            <tr>
                <td>Model</td><td><input type='text' name="deviceModel" required
                    value='<?php echo $ticket['deviceModel']?>'></td>
            </tr>
            <tr>
                <td>Availability</td><td><input type='text' name="availability" required
                    value='<?php echo $ticket['availability']?>'></td>
            </tr>
        </table>
        <p><button type='submit' class="btn btn-primary">Update</button></p>
    </form>
</div>