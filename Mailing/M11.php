<?php
$gmailhostname = '{imap.gmail.com:993/imap/ssl}';
$gmailusername = "testproject149@gmail.com";
$gmailpassword = "tp1hello";

    /* try to connect */
$conn = imap_open($gmailhostname,$gmailusername,$gmailpassword) or die('Cannot connect to Gmail: ' . imap_last_error());

$query = mysql_query("SELECT * FROM users");    
    while($row = mysql_fetch_array($query))
    {
        $findemail = $row["email"];

        /* grab emails */
        $emails = imap_search($conn,'FROM "'.$findemail.'"');

        /* if emails are returned, cycle through each... */
        if ($emails) { 
            /* begin output var */
            $output = '';             
            /* put the newest emails on top */
            rsort($emails);

            /* for 5 emails... */
            $emails = array_slice($emails,0,1);

            foreach ($emails as $email_number) {    
                /* get information specific to this email */
                $overview = imap_fetch_overview($conn,$email_number,0);
                $message = imap_fetchbody($conn,$email_number,2);

                /* output the email header information */
                /*
            $output.= '<div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
                $output.= '<span class="subject">'.$overview[0]->subject.'</span> ';
                $output.= '<span class="from">'.$overview[0]->from.'</span>';
            */
                $output.= '<span class="from">'.$overview[0]->from.'</span> ';
                $output.= '<span class="date">on '.$overview[0]->date.'</span> <br /><br />';
                mysql_query("UPDATE users SET lastContactDate = '".$overview[0]->date."' WHERE email = '".$findemail."'") or die(mysql_error());

                /* output the email body */
                /* $output.= '<div class="body">'.$message.'</div>'; */
            }
            echo $output;
        }
    } 
/* close the connection */
imap_close($conn);
?>