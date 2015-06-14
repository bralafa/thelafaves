<?php

// Credit: http://codular.com/php-jquery-contact-form

// Blank message to start with so we can append to it.
$message = '';

// Declaring the variable for submitted inputs

$name 	= $_POST['name'];
$noguests 	= $_POST['noguests'];
$naguests 		= $_POST['naguests'];
$maincourse = $_POST['main-course']; 
$dessert 	= $_POST['dessert'];
$attendance	= $_POST['radio'];
$number     = $_POST['number'];
$chicken    = $_POST['chicken'];
$beef    = $_POST['beef'];
$vegetarian   = $_POST['vegetarian'];
$note         = $_POST['note'];

// Check that all required inputs are not empty.
if(empty($name) || empty($attendance) ) {
    die('Please ensure all required inputs are provided.');
}

//Validates correct email formatting

// Construct the message
$message .= <<<TEXT
You have received an RSVP submission.

Guest Details
=================================
Name: {$name}
Number of Attendees: {$noguests}
Guest Name(s):{$naguests}
Attendance: {$attendance}    

Meal Selection
=================================
Chicken: {$chicken}
Beef: {$beef}
Vegetarian: {$vegetarian}

Note:

{$note}
TEXT;

// Email to send to
$to = 'bralafa@gmail.com';

// Email Subject
$subject = 'Wedding | A Guest has submitted their RSVP status.';

// Name to show email from
$from = 'The LaFaves';

// Domain to show the email from
$fromEmail = 'brandon@the-lafaves.com';

// Construct a header to send who the email is from
$header = 'From: ' . $from . '<' . $fromEmail . '>';

// Try sending the email
if(!mail($to, $subject, $message, $header)) {
    
    die('Error sending email.');
} 
else {
	//echo $firstname;
    die('Thanks for submitting your RSVP.');
}