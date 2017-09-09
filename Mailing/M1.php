<?php
$hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}[Gmail]/Sent Mail';
$username = 'testproject149@gmail.com';
$password = 'tp1hello';
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
$emails = imap_search($inbox,'ALL');
$cnt=0;

if($emails) {
	$output = '';
	rsort($emails);
        foreach($emails as $email_number) {
            $overview = imap_fetch_overview($inbox,$email_number,0);
            $message[$cnt++] = imap_fetchbody($inbox,$email_number,2);
            
            
        }
} 
imap_close($inbox);

$imap  = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
$info = imap_fetch_overview($imap, "2,1:".$cnt);

?>

<table border=1>
<tr><th>TO</th><th>From</th><th>Date</th><th>Subject</th><th>Prescription</th></tr>

<?php
$cnt1=0;
foreach ($info as $msg ) {
   echo "<tr>";
   $d=strtotime($msg->date);
   printf("<td>%s</td>", $msg->to);
   printf("<td>%s</td>", $msg->from);
   printf("<td>%s</td>", date('d-M-Y',$d));
   printf("<td>%s</td>", $msg->subject);
   printf("<td>%s</td>", $message[$cnt1++]);
}

imap_close($imap);
?>


<button onClick="window.print()">Print this page</button>