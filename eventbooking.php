<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>EVENT MANAGEMENT SYSTEM</title>
        <?php require_once 'classes/Connection.php';
        require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        <?php require 'utils/scripts.php';
        $conn = new mysqli("localhost", "root", "", "trail5");
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        //check for submit
        if(filter_has_var(INPUT_POST,'submit')){
          $name = $_POST['name'];
          $mailid = $_POST['mailid'];
          $eventname = $_POST['eventname'];
          $venue = $_POST['venue'];
          $eventdescription = $_POST['eventdescription'];
          $artistinfo = $_POST['artistinfo'];
          $start = $_POST['start'];
          $end = $_POST['end'];
          
          $filename = $_FILES['Filename']['name'];
          $destination = 'uploads/' . $filename;
          $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $file = $_FILES['Filename']['tmp_name'];
            $size = $_FILES['Filename']['size'];
            if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
                echo "You file extension must be .zip, .pdf or .docx";
            } else {
                if (move_uploaded_file($file, $destination)) {
            
          if(!empty($name)&& !empty($eventname) &&!empty($eventdescription)&& !empty($mailid)&&!empty($artistinfo)&&!empty($start)&&!empty($end)&&!empty($filename)){
           
            $qry = "INSERT INTO venuebookings(name, mailid, eventname, venue, eventdescription, artistinfo, start, end, Filename) VALUES('$name','$mailid','$eventname','$venue','$eventdescription','$artistinfo','$start','$end','$filename')";
            if ($conn->query($qry) === TRUE) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $qry . "<br>" . $conn->error;
              }
            echo "<script>window.alert('Booking Request has been sent.!');</script>";
        }else{
            echo "<script>window.alert('Please fill all the fields!');</script>";
          }
          $conn->close();
        }
    }
}
        
        ?><!--js links. file found in utils folder-->
    </head>
    <body>
        <?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->
        <div class = "content"><!--body content holder-->
            <div class = "container">
                <div class = "col-md-12"><!--body content eventname holder with 12 grid columns-->
                    <h1>Event Booking Request</h1><!--body content eventname-->
                </div>
            </div>

            <div class="container">
            <div class="col-md-12">
            <hr>
            </div>
            </div>

            <div class="container">
                <div class="col-md-7">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name :</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="mailid">Email ID:</label>
                            <input type="text" name="mailid" id="mailid" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="eventname">Event Name :</label>
                            <input type="text" name="eventname" id="eventname" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="venue">Venue (select one):</label>
                        <select class="form-control" id="venue" name="venue">
                            <option value="THE WALL - Auditorium">THE WALL - Auditorium</option>
                            <option value="Movie Under The Stars - Open Air Theatre">Movie Under The Stars - Open Air Theatre</option>
                            <option value="The Rock Vibe - Concert Arena">The Rock Vibe - Concert Arena</option>
                            <option value="A DREAM - Seminar Hall">A DREAM - Seminar Hall</option>
                        </select>
                        </div> 
                        <div class="form-group">
                            <label for="eventdescription">Event Description:</label>
                            <input type="text" name="eventdescription" id="eventdescription" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="artistinfo">Artist Name:</label>
                            <input type="text" name="artistinfo" id="artistinfo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="start">Start Date & Time:</label>
                            <input type="datetime-local" name="start" id="start" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="end">End Date & Time:</label>
                            <input type="datetime-local" name="end" id="end" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Filename">Image upload:</label>
                            <input type="file" name="Filename" id="Filename" class="form-control" >
                        </div>

                        <button type="submit"  name="submit" class="btn btn-default pull-right">Send</button>
                    </form>
                </div>
                <div class="col-md-5 contacts">
                    <h1><span class="glyphicon glyphicon-user"></span> CONTACT US</h1>
                    <p>
                        <span class="glyphicon glyphicon-envelope"></span> Email: samratprakhar752@gmail.com<br>
                        <span class="glyphicon glyphicon-link"></span> Facebook: www.facebook.com/eventmanagement<br>
                        <span class="glyphicon glyphicon-phone"></span> Mobile: 8839686644
                    </p>
                </div>
            </div>


        </div><!--body content div-->
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>
