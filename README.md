# TicketingSystem
A ticketing system designed in PHP, for IT related issues. Uses SQL as well
For the ticketing system, the whole website hinges on our database, as it is constantly storing, retrieving and updating data. 
For the database we have designed it so they were connected to each other, we have two independent data sets which are our admin and customer. 
Admin is used to login in the website and record who is adding the changes, while customers are used to determine the person the Tickets are for. 
We first have our Tickets database connected to the customer dataset by taking their Id and recording the data and it uses Admin to record who made it. 
The idea is that the customer has a ticket, this means that the Ticket database is dependent on the customer database. From there we have an event 
database, this grabs the ID of Ticket, Admin and customer. For an event to be created in the first we first need to know which Ticket it is, as a Ticket 
will possess events. This is the base of the website, as we always work with at least one database. 
