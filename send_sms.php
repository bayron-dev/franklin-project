<!DOCTYPE HTML>
<!-- ENGLISH SEND SMS -->
<html>
<head>
    <title>Thank you!</title>
    <link href="headerIcon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
    
    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <!-- Font Awesome Icons -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
    <style>
        /* Base styles */
        body, html {
            height: 100%;
        }

        /* Hero section with background image */
        .bg {
            background-image: url("Franklin-Profile2.jpg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <!-- Thank you page with hero background -->
    <div class="bg">
        <!-- Success alert message -->
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Thank you for giving us your support, <?php echo $_POST["name"] ?>!</strong>
        </div>
        
        <!-- Main content container -->
        <div class="row h-100 container-fluid">
            <div class="col-sm-4 text-center my-auto">
                <br>
                
                <!-- Return to home button -->
                <a class="btn btn-primary btn-lg btn-block" href="https://franklinforcommissioner.com" role="button">Go Back To Home Page</a>
            </div>
        </div>
    </div>
	    <!-- Issues overview section -->
    <div class="jumbotron text-center bg-white">
        <div class="row">
            <!-- Safety & Health column -->
            <div class="col-sm-4">
                <h3>Safety & Health</h3>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <p>Support Responsible Growth and Development</p>
                    </li>
                    <li class="nav-item">
                        <p>Mental Health is a public health issue</p>
                    </li>
                    <li class="nav-item">
                        <p>Support Active Lifestyle</p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/issues.html">View More &raquo;</a>
                    </li>
                </ul>
            </div>
            
            <!-- Initiatives column -->
            <div class="col-sm-4">
                <h3>Initiatives</h3>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <p>Protection of Natural Resources</p>
                    </li>
                    <li class="nav-item">
                        <p>Support Local Agriculture</p>
                    </li>
                    <li class="nav-item">
                        <p>Increase the Quality of Education for All</p>
                    </li>
                    <li class="nav-item">
                        <p>Increasing Affordable Housing</p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/issues.html">View More &raquo;</a>
                    </li>
                </ul>
            </div>
            
            <!-- Other Topics column -->
            <div class="col-sm-4">
                <h3>Other Topics</h3>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <p>Stimulate the Economy</p>
                    </li>
                    <li class="nav-item">
                        <p>Support Families</p>
                    </li>
                    <li class="nav-item">
                        <p>Drug Addiction is a Public Health Issue</p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="issues.html">View More &raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <hr>
    
    <!-- Footer with social media links -->
    <div class="container text-center">
        <i class='fab fa-facebook-square' style='font-size:36px'></i>
        <i class='fab fa-instagram' style='font-size:36px'></i>
        <i class='fab fa-twitter' style='font-size:36px'></i>
        <i class='fab fa-snapchat' style='font-size:36px'></i>
    </div>

<?php
// Load Twilio PHP library
require __DIR__ . '/twilio-php-master/src/Twilio/autoload.php';
use Twilio\Rest\Client;

// Load configuration file
$config = parse_ini_file('config.ini', true);

// Twilio Account credentials from config file
$account_sid = $config['twilio']['account_sid'];
$auth_token = $config['twilio']['auth_token'];

// Twilio phone number with SMS capabilities
$twilio_number = $config['twilio']['twilio_number'];

// Get form data from POST request
$name = $_POST["name"];
$contactform = $_POST["contact"];
$contact = $_POST["contactid"];

// List of phone numbers to receive notifications
$numbers_tosend = array("+19195454337", "+19196192373");

// Initialize Twilio client
$client = new Client($account_sid, $auth_token);

// Send SMS to each recipient
for ($x = 0; $x < count($numbers_tosend); $x++) {
    $client->messages->create(
        $numbers_tosend[$x],
        array(
            'from' => $twilio_number,
            'body' => "You received the following contact." . "\n" .
                      "Name: " . $name . "\n" .
                      "Contact by: " . $contactform . "\n" .
                      "Contact info: " . $contact . "\n"
        )
    );
}
?>
</body>
</html>