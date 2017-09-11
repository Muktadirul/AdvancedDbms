<?php
$hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}[Gmail]/Sent Mail';
$username = 'testproject149@gmail.com';
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
$CNT = $cnt - 5;
$info = imap_fetch_overview($imap, "2," . $CNT . ":" . $cnt);
?>

<table border=1>
    <tr><th>Date</th><th>Prescription</th></tr>

<?php
$cnt1 = $CNT;
foreach ($info as $msg) {
    if ($cnt1 < $cnt ) {    
        echo "<tr>";
        $d = strtotime($msg->date);
        printf("<td>%s %s</td>",$msg->from, date('d-M-Y', $d));
        printf("<td>%s</td>", $message[$cnt1++]);
    }
   $x= $msg->from;
   $x1="Root User";
    if(strcmp($x,$x1) == 0 ){
                echo 'got it';}else{
        echo $x.'<br>';}
        $x='';
}

imap_close($imap);
?>


    <button onClick="window.print()">Print this page</button>