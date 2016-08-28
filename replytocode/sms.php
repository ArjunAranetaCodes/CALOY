<?php

/*  PHP example of an HTTP handler that handles requests from SMS Enabler.
 *  You can modify and use it for processing of incoming SMS messages and sending automatic SMS replies.
 *  To use it, put this file on your website and specify its URL in SMS Enabler's SMS-to-Webserver settings, 
 *  such as http://yourserv.com/sms.php
 */

$senderPhone   = $_POST['sender'];    /* sender's phone number */
$messageText   = $_POST['text'];      /* text of the message   */

$sent_dt       = $_POST['sc_datetime'];      /* date and time when the message was sent, in the local time zone of the computer on which SMS Enabler is running */
$sent_dt_utc   = $_POST['sc_datetime_utc'];  /* date and time when the message was sent, in UTC */
                                             /* note: date and time values are expressed using "YYYY-MM-DD HH:MM:SS" format */

$smsc          = $_POST['smsc'];      /* SMS center number (not supported when SMS Enabler is connected to a Nokia phone). */
$tag           = $_POST['tag'];       /* Tag value. You can define this in SMS Enabler's settings, and use it to pass additional information. */

$is_incomplete = $_POST['has_missing_parts']; /* This variable can be set to "yes" or "no". */
                                              /* "yes" - if the message is a multipart (concatenated) message and not all of its parts have arrived */
                                              /* "no"  - if the message is complete */


/* TODO: IMPLEMENT ANY PROCESSING HERE THAT YOU NEED TO PERFORM UPON RECEIPT OF A MESSAGE */
	$connection = new mysqli('localhost','principal','principal','dbbankifation');
	
	if($connection->connect_error){
		die("Connection Failed : " .$connection->connect_error);
	}
	$query = 'INSERT INTO `sms_in`(`sms_text`, `sender_number`, `send_dt`) VALUES ("'.$messageText.'","'.$senderPhone.'","'.$send_dt.'")'; 
	$connection->query($query);
		



/* ---- Sending a reply SMS ---- */

// Setting the recipients of the reply. If not set, the reply is sent
// back to the sender of the origial SMS message
// header('X-SMS-To: +97771234567 +15550987654');


// Setting the content type and character set
header('Content-Type: text/plain; charset=utf-8');
// Comment the next line out if you do not want to send a reply
echo "reply";
?>