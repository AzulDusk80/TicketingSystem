<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div class='container-fluid'>
            <style>
                .menu-link > a { color: #fff; font-weight: 500; padding-left: 20px; }
                .menu-bar { background-color: maroon; }
            </style>

            <div class="row">
                <div class="col-sm-12">
                    <img src="tickets.jpeg" alt="Computer" height="100px">
                </div>
                <nav class="navbar navbar-expand-lg navbar-dark"  style="background-color: #6c757d; margin-bottom: 10px;">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" id="home-nav" href="index.php?mode=home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="open-nav" href="index.php?mode=displayTickets&status=open">Open Tickets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="closed-nav" href="index.php?mode=displayTickets&status=closed">Closed Tickets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="new-nav" href="index.php?mode=displayNewTicketForm">New Ticket</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" id="customer-nav" href="index.php?mode=displayCustomer">Customer Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="logout-nav" href="index.php?mode=logout">Sign Out</a>
                        </li>
                    </ul>
                </nav>
            </div>