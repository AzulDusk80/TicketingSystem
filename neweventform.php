<?php
	$ticket = $resultSet[0];
?>
<div style="flex: 1; margin: 10px;">
    <h4>Add New Event</h4>
    <form action='index.php?mode=addNewEvent&ticket=<?php echo $ticketID ?>' method='post'>
        <table class="table table-bordered">
                <td>Type</td>
                <td>
                    <select name="category">
                        <option value='Customer Email'>Customer Email</option>
                        <option value='Email'>Email</option>
                        <option value='Call'>Call</option>
                        <option value='Customer Call'>Customer Call</option>
                        <option value='Walkin'>Walk in</option>
						<option value='Visit'>Visit</option>
						<option value='Appointment'>Appointment</option>
						<option value='Resolution'>Resolution</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <textarea name="description" placeholder="Enter description here" required rows="3" cols="65"></textarea>
                </td>
            </tr>
        </table>
        <p><button type='submit' class="btn btn-primary">Add Event</button></p>
    </form>
</div>
</div>