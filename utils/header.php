<header>
    <nav class="navbar" style="background:black !important;">
        <div class="container">
            <div class="nav navbar-nav navbar-left"><!--website name/title-->
                <?php
                require_once 'utils/functions.php';
                echo '<li><a>Event Management Systems</a></li>';
                ?>
            </div>
            <ul class="nav navbar-nav navbar-right"><!--navigation-->
                <?php
                //links to database contents. *if logged in
                if(user_logged_in()){
                    require_once 'utils/functions.php';
                    echo '<li><a href = "index.php"></a></li>';
                    echo '<li><a href = "viewEvents.php">View Events</a></li>';
                    echo '<li><a href = "viewLocations.php">Our Locations</a></li>';
                    echo '<li>
                            <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Ticket Request  <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="viewticketrequest.php" style="color:#000000">Pending</a></li>
                                            <li><a href="viewAcceptedTickets.php" style="color:#000000">Confirmed</a></li>
                                        </ul>
                            </div>
                          </li>';
                    echo '<li><a href = "viewvenuebookings.php">Event Bookings Request</a></li>';
                    echo '<li><a href = "viewmessage.php">View Reviews</a></li>';
                    echo '<li ><a class = "btn btn-primary" href = "logout.php">Logout</a></li>';
                }
                //links non database contents. *if logged out
                else {
                    echo '<li><a href = "index.php">Home</a></li>';
                    echo '<li><a href = "eventsuser.php"View>Upcoming Events</a></li>';
                    echo '<li><a href = "locations2.php">Our Locations</a></li>';
                    echo '<li><a href = "eventbooking.php">Event Bookings Request</a></li>';
                    echo '<li><a href="viewAcceptedTicketsUser.php" >Confirmed Tickets</a></li>';
                    echo '<li><a href = "contact.php">Contact Us</a></li>';
                    echo '<button type = "button" class = "btn btn-primary" data-toggle = "modal" data-target = "#login">Login/Register</button>';
                }
                ?>

                <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><!--modal for login-->
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header"><!--modal header-->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Login</h4><!--modal title-->
                            </div>
                            <div class="row">
                                <div class="modal-body"><!--modal content-->
                                    <div class ="col-md-6 col-md-offset-3">
                                        <form action="login.php" method="POST">
                                            <div class = "form-group"><!--username-->
                                                <label for="username">Username:</label>
                                                <input type="text"
                                                       name="username"
                                                       class="form-control"
                                                       value="<?php if (isset($formdata['username'])) echo $formdata['username']; ?>"
                                                       />
                                                <span class="error"><!--error message on failed input-->
                                                    <?php if (isset($errors['username'])) echo $errors['username']; ?>
                                                </span>
                                            </div>
                                            <div class="form-group"><!--password-->
                                                <label for="password">Password:</label>
                                                <input type="password"
                                                       name="password"
                                                       class="form-control"
                                                       value=""
                                                       />
                                                <span class="error"><!--error message on failed input-->
                                                    <?php if (isset($errors['password'])) echo $errors['password']; ?>
                                                </span>
                                            </div>
                                            <button type="submit" class = "btn btn-default loginbtn">Login</button><!--login button-->
                                        </form>
                                        Don't have an account?  
                                        <button type="button"  class = "btn btn-default" ><a href="register_form.php" ><span style="color:black">Register</span></a></button>
                                    </div>
                                </div><!--modal body div-->
                            </div><!--row div-->
                            <div class="modal-footer"><!--modal footer-->
                                <button type="button" class="btn btn-default closebtn" data-dismiss="modal">Close</button><!--close button-->
                            </div><!--modal footer div-->
                        </div><!--modal content div-->
                    </div><!--modal dialog div-->
                </div><!--modal div-->
            </ul>
        </div><!--container div-->
    </nav>
</header>
