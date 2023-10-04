<?php
    session_start();
    $title = "Ticket System";
    include("header.php");

    include("pdo_connect.php");

    if (!$db) {
        echo "Could not connect to the database";
        exit();
    }

    $mode = "";
    $parameterValues = null;
    $pageTitle = "";
    $columns = array();

    try {
        if (isset($_GET['mode'])) {
            $mode = $_GET['mode'];
        }

        if (!isset($_SESSION["adminID"]) && !isset($_POST["adminID"])) {
        
            header("Location: loginform.php");
        
            exit();
        }

        switch ($mode) {
            
			case 'displayCustomer':
			    ?>
                <script>document.getElementById("customer-nav").classList.add("active");</script>
                <?php
                
                include('displayCustomer.php');
				if (isset($_GET['customerID'])) {
					$customerID = $_GET['customerID'];
					include('customerPrint.php');
				}

				break;
			
            case 'updateTicket':
                if (isset($_GET['ticket'])) {
                    $ticketID = $_GET['ticket'];
                }
                $deviceBrand = "";
                if (isset($_POST['deviceBrand'])) {
                    $deviceBrand = $_POST['deviceBrand'];
                }
                $deviceModel = "";
                if (isset($_POST['deviceModel'])) {
                    $deviceModel = $_POST['deviceModel'];
                }
                $description = "";
                if (isset($_POST['description'])) {
                    $description = $_POST['description'];
                }
                $availability = "";
                if (isset($_POST['availability'])) {
                    $availability = $_POST['availability'];
                }
                                    
                if (!$description) {
                    echo "Invalid data";
                } else {
                    $sql = "UPDATE `ticket` SET `description` = :description, `deviceBrand` = :deviceBrand, `deviceModel` = :deviceModel, `availability` = :availability WHERE `ticketNum` = :ticketNum;";
                    $parameterValues = array(
                        ":ticketNum" => $ticketID,
                        ":description" => $description,
                        ":deviceBrand" => $deviceBrand,
                        ":deviceModel" => $deviceModel,
                        ":availability" => $availability
                    );
                    $statement = $db->prepare($sql);
                    $statement->execute($parameterValues);

                    include('customerInfo.php');
                    include('ticketInfo.php');
                    include('statusUpdate.php');
                    include('eventtable.php');
					include('textPrint.php');

                }
                
                break;
            
            case 'viewUpdateTicketForm':
                include('customerInfo.php');
                include('updateTicketForm.php');
                include('statusUpdate.php');
                include('eventtable.php');
                include('textPrint.php');

                break;
            
            case 'openTicket':
                if (isset($_GET['ticket'])) {
                    $ticketID = $_GET['ticket'];
                }
                $sql = "UPDATE `ticket` SET `status` = :status WHERE `ticketNum` = :ticketID;";
                $parameterValues = array(
                    ":status" => "open",
                    ":ticketID" => $ticketID
                );
                $statement = $db->prepare($sql);
                $statement->execute($parameterValues);
                
                include('customerInfo.php');
                include('ticketInfo.php');
                include('statusUpdate.php');
                include('eventtable.php');
                include('textPrint.php');

                break;
            
            case 'closeTicket':
                if (isset($_GET['ticket'])) {
                    $ticketID = $_GET['ticket'];
                }
                $sql = "UPDATE `ticket` SET `status` = :status WHERE `ticketNum` = :ticketID;";
                $parameterValues = array(
                    ":status" => "closed",
                    ":ticketID" => $ticketID
                );
                $statement = $db->prepare($sql);
                $statement->execute($parameterValues);

                include('customerInfo.php');
                include('ticketInfo.php');
                include('statusUpdate.php');
                include('eventtable.php');
                include('textPrint.php');

                break;
            
            case 'addNewEvent':
                include('customerInfo.php');
                include('ticketInfo.php');

                $category = "";
                if (isset($_POST['category'])) {
                    $category = $_POST['category'];
                }
                $description = "";
                if (isset($_POST['description'])) {
                    $description = $_POST['description'];
                }
                $currentDateTime = new DateTime();
                $currentDateTime->modify('+5 hours');
                $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
                if (!$category || !$description) {
                    echo "Invalid data";
                } else {
                    $sql = "INSERT INTO `event`(`eventNum`, `type`, `timestamp`, `description`, `ticketNum`, `adminID`)
                        VALUES (:eventNum, :type, :timestamp, :description, :ticketNum, :adminID);";
                    $parameters = [
                        ":eventNum" => 'open',
                        ":type" => $category,
                        ":timestamp" => $formattedDateTime,
                        ":description" => $description,
                        ":ticketNum" => $ticketID,
                        ":adminID" => 'hoppe28'
                    ];
                
                    // Prepare SQL statement
                    $statement = $db->prepare($sql);
                    // execute the statement object
                    $statement->execute($parameters);
                    
                }
                include('statusUpdate.php');
                include('eventtable.php');
                include('textPrint.php');

                break;
            
            
            case 'displayNewEventForm':
                include('customerInfo.php');
                include('ticketInfo.php');
                include('neweventform.php');
                include('textPrint.php');

                break;
            
            case 'displayTicketInfo':
                include('customerInfo.php');
                include('ticketInfo.php');
                include('statusUpdate.php');
                include('eventtable.php');
                include('textPrint.php');

                break;
            
            case 'home':
                ?>
                <script>document.getElementById("home-nav").classList.add("active");</script>
                <?php
                
                echo "<h3>Welcome to the IT Support Portal!<h3>";

                break;
            
            case 'displayTickets':
                $status = "";
                if (isset($_GET["status"])) {
                    $status = $_GET["status"];
                }

                ?>
                <script>document.getElementById("<?php echo $status; ?>-nav").classList.add("active");</script>
                <?php

                $category = "All";
                if (isset($_POST["category"])) {
                    $category = $_POST["category"];
                }

                $pageTitle = "List of ".ucfirst($status)." Tickets";
                $columns = array("Ticket Number", "Created By", "Issue", "Customer");
                include('displayTickets.php');
				include('textPrint.php');

                break;
            
            case 'displayNewTicketForm':
                ?>
                <script>document.getElementById("new-nav").classList.add("active");</script>
                <?php
                
                include('newticketform.html');

                break;
                
            case 'addNewTicket':
                $category = "";
                if (isset($_POST['category'])) {
                    $category = $_POST['category'];
                }
                $description = "";
                if (isset($_POST['description'])) {
                    $description = $_POST['description'];
                }
                $deviceBrand = "";
                if (isset($_POST['deviceBrand'])) {
                    $deviceBrand = $_POST['deviceBrand'];
                }
                $deviceModel = "";
                if (isset($_POST['deviceModel'])) {
                    $deviceModel = $_POST['deviceModel'];
                }
                $availability = "";
                if (isset($_POST['availability'])) {
                    $availability = $_POST['availability'];
                }
                $customerID = "";
                if (isset($_POST['customerID'])) {
                    $customerID = $_POST['customerID'];
                }
                
                if (!$category || !$customerID) {
                    echo "Invalid data";
                } else {
                    $sql = "INSERT INTO `ticket`(`status`, `category`, `description`, `deviceBrand`, `deviceModel`, `availability`, `customerID`, `adminID`)
                        VALUES (:status, :category, :description, :deviceBrand, :deviceModel, :availability, :customerID, :adminID);";
                    $parameters = [
                        ":status" => 'open',
                        ":category" => $category,
                        ":description" => $description,
                        ":deviceBrand" => $deviceBrand,
                        ":deviceModel" => $deviceModel,
                        ":availability" => $availability,
                        ":customerID" => $customerID,
                        ":adminID" => $_SESSION["adminID"]
                    ];
                
                    $statement = $db->prepare($sql);
                    $statement->execute($parameters);
                    echo "<p>Ticket created successfully!</p>";
                }
                
                break;

            case "login":
                // read login information
                $adminID = (isset($_POST["adminID"])) ? $_POST["adminID"] : "-1";
                $password = (isset($_POST["password"])) ? $_POST["password"] : "-1";

                $sql = "SELECT `adminID` from `admin` where `adminID` = :adminID and `password` = :password;";

                $parameterValues = array(
                    ":adminID" => $adminID,
                    ":password" => md5($password)
                );

                $stm = $db->prepare($sql);
                $stm->execute($parameterValues);
                $result = $stm->fetch();

                // validate the user
                if (isset($result["adminID"])) {
                    $_SESSION["adminID"] = $result["adminID"] ;

                    header("Location: index.php?mode=home");
                }
                else {
                    header("Location: loginform.php");

                    exit();
                }

                break;

            case "logout":
                session_unset();
                setcookie(session_name(), '', time()-1000, '/');
                $_SESSION = array();
                header("Location: loginform.php");

                break;

            default:

                echo "<h3>Welcome to the IT Support Portal!<h3>";

                break;

        }

    } catch (PDOException $e) {
        echo "Error!: ". $e->getMessage() . "<br/>";
        die();
    }

    include('footer.html');

function displayResultSet($pageTitle, $resultSet, $columns, $tableType = null) {
    echo "<h4>".$pageTitle."</h4>";
    echo "<table class='table";
    if ($tableType == "event") {
        echo " table-bordered";
    }
    echo "'>";

    $numCols = count($columns);
    if ($numCols > 0) {
        echo "<thead><tr>";
        foreach($columns as $c) {
            echo "<th>{$c}</th>";
        }
        echo "</tr></thead>";
    }

    echo "<tbody>";
    foreach($resultSet as $item){
        echo "<tr>";

        foreach ($item as $key => $value) {
            echo "<td>{$value}</td>";
        }

        if ($tableType == "customer") {
            echo "<td><a href='index.php?mode=displayCustomer&customerID={$item['customerID']}'>List of Issues</a></td>";
        }

        echo "</tr>";
    }
    echo "</tbody></table>";
}

function getAll($sql, $db, $parameterValues = null){

    $statement = $db->prepare($sql);

    $statement->execute($parameterValues );

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
?>