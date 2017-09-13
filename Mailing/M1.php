<?php
$hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}[Gmail]/Sent Mail';
$username = 'projectt149@gmail.com';
$password = 'tp1hello';
$inbox = imap_open($hostname, $username, $password) or die('Cannot connect to Gmail: ' . imap_last_error());
$emails = imap_search($inbox, 'ALL');
$cnt = 0;

if ($emails) {
    $output = '';
    rsort($emails);
    foreach ($emails as $email_number) {
        $overview = imap_fetch_overview($inbox, $email_number, 0);
        $message[$cnt++] = imap_fetchbody($inbox, $email_number, 2);
    }
}
imap_close($inbox);

$imap = imap_open($hostname, $username, $password) or die('Cannot connect to Gmail: ' . imap_last_error());
$CNT = $cnt;
$info = imap_fetch_overview($imap, "2," . 1 . ":" . $cnt);
//echo $cnt;
?>


<?php
$MailHistory = array();
$cnt1 = $CNT-$cnt;
$Xv=0;
foreach ($info as $msg) {
        $d = strtotime($msg->date);
        $MailHistory['From'.$Xv]=$msg->from;
        $MailHistory['Date'.$Xv]=date('d-M-Y', $d);
        $MailHistory['Subject'.$Xv]=$msg->subject;
        $MailHistory['Msg'.$Xv]=$message[$Xv++];
        
 //       printf("<td>%s %s</td>",$msg->from, date('d-M-Y', $d));
  //      printf("<td>%s</td>",$msg->subject);
   //     printf("<td>%s</td>", $message[$cnt1++]);
   
}
?>

<table border=1>
    <tr><th>Date</th><th>From</th><th>Prescription</th><th>History</th></tr>
<?php
$XV=0;
//var_dump($MailHistory);
//die();
for($i=0;$i<$Xv;$i++){
   if($MailHistory['Subject'.$i] ==  md5('01715291398')){
    printf("<td>%s</td>", $MailHistory['Date'.$i]);
    printf("<td>%s</td>", $MailHistory['From'.$i]);
    printf("<td>%s</td>", $MailHistory['Subject'.$i]);
    printf("<td>%s</td></tr>", $MailHistory['Msg'.$i]);
   }
    
}

imap_close($imap);
?>


    <button onClick="window.print()">Print this page</button>