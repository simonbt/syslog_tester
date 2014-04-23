<?php
$count = 0;
$server_ip   = '192.168.200.101';
$server_port = 514;
$messagea     = array (
			'Feb 13 20:14:59 localhost sshd[15712]: Failed password for invalid user nagios from 113.108.204.8 port 51973',
			'[Thu Feb 14 14:09:07 2013] [error] [client 192.168.0.5] PHP Warning: htmlspecialchars() expects parameter 1 to be string, array given in /media/encdrive/www/inc/func_files/func.sanitisation.php on line 2',
			'Feb 14 15:43:33 xstorm sshd[2318]: pam_unix(sshd:session): session closed for user randomstorm'
		     );


if ($socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP)) {
  while (1) {
foreach ($messagea as $message) {
    $random = rand();
    $message .= " ".$random;
    socket_sendto($socket, $message, strlen($message), 0, $server_ip, $server_port);
    print "Sent:".$count." alerts\n";
    $count++;
}
  }
} else {
  print("can't create socket\n");
}
?>
