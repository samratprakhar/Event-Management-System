<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Event Management System</title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        <?php require 'utils/scripts.php'; ?><!--js links. file found in utils folder-->
    </head>
    <body>
        <?php require 'utils/header.php'; ?><!--header content. file found in utils folder--> 
        <div class = "container">
            <div class = "jumbotron" style="color:black;"><!--jumbotron-->
                <h1>We host the best events for you with proper management</h1><!--jumbotron heading-->
                <p><!--jumbotron content-->
                  Controlling chaos is what event management is all about. There’s  a lot to manage with conferences, marketing events, and similar productions. Fortunately, today’s best event management processes help you with every aspect of your event journey.
                </p>
            </div>
        </div>
        <div class = "content"><!--body content holder-->
            <div class = "container">
                <div class = "col-md-12"><!--body content title holder with 12 grid columns-->
                    <h1>What we organize</h1><!--body content title-->
                </div>
            </div>
            
            <div class="container">
            <div class="col-md-12">
            <hr>
            </div>
            </div>

            <div class="container">
                <div class="row"><!--wedding content-->
                        <div class="col-md-6"><!--image holder with 6 grid columns-->
                            <img src="images/12.jfif" class="img-responsive">
                        </div>
                        <div class="col-md-6"><!--image holder with 6 grid columns-->
                            <img src="images/9.jfif" class="img-responsive">
                        </div>
                        <div class="subcontent col-md-6"><!--Text holder with 6 column grid-->
                          <br>
                            <h1>SEMINARS</h1><!--title-->
                            <p><!--content-->
                        Meet the most inspiring minds of the century in our public SEMINARS!
                        Good news! You can also organise one!
                            </p>
                        </div><!--subcontent div-->
                        <div class="subcontent col-md-6"><!--Text holder with 6 column grid-->
                          <br>
                            <h1>CONCERTS</h1><!--title-->
                            <p><!--content-->
                          Now enjoy your heart out and dance with the live performer!<br>
                          P.S. also helps to burn extra calories;)
                            </p>
                        </div><!--subcontent div-->
                    </div><!--container div-->
            </div><!--row div-->

            <div class="container">
            <div class="col-md-12">
            <hr>
            </div>
            </div>

            <div class="container">
                    <div class="row">
                        <div class="col-md-6"><!--image holder with 6 grid columns-->
                            <img src="images/10.jfif" class="img-responsive">
                        </div>
                        <div class="col-md-6"><!--image holder with 6 grid columns-->
                            <img src="images/11.jfif" class="img-responsive">
                        </div>
                    </div>
                    <div class="row">
                        <div class="content col-md-6"><!--Text holder with 6 column grid-->
                          <br>
                            <h1>Launch Events</h1><!--title-->
                            <p><!--content-->
                            Launch your newest products with us! Give a head start to your business!
                            </p>
                        </div><!--subcontent div-->
                        <div class="content col-md-6"><!--Text holder with 6 column grid-->
                          <br>
                            <h1>Live Shows</h1><!--title-->
                            <p><!--content-->
                            Relax ! And enjoy the live performance by the top performers !
                            </p>
                        </div><!--subcontent div-->
                    </div><!--container div-->
            </div><!--row div-->

            <div class="container">
            <div class="col-md-12">
                <hr>
            </div>
            </div>

            <div class="container">
            <div class="col-md-auto">
            <div class="text-center">
            <a href = "eventbooking.php" class="btn btn-info btn-lg" role="button" > BOOK NOW ! <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><!--arrow right glyphicon--> </a> 
            </div>
            </div>
            </div>
            
        </div><!--body content div-->
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>
