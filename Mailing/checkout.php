<?php
$hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}[Gmail]/Sent Mail';
$username = 'testproject149@gmail.com';
$password = 'tp1hello';
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
$emails = imap_search($inbox,'ALL');
if($emails) {
	$output = '';
	rsort($emails);
	foreach($emails as $email_number) {
		$overview = imap_fetch_overview($inbox,$email_number,0);
		$message = imap_fetchbody($inbox,$email_number,2);
		$output.= '<div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
		$output.= '<span class="subject">'.$overview[0]->subject.'</span> ';
		$output.= '<span class="from">'.$overview[0]->from.'</span>';
                $output.= '<span class="from">'.$overview[0]->to.'</span>';
		$output.= '<span class="date">on '.$overview[0]->date.'</span>';
		$output.= '</div>';
		$output.= '<div class="body">'.$message.'</div>';
	}
	echo $output;
} 
imap_close($inbox);
?>