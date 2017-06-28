<?php
header("HTTP/1.0 404 Not Found");
echo <<<EOF
	<html>
		<head>
			<title>404: Page not found</title>
		</head>
		<body>
		<h1>404: Not Found</h1>
		<hr />
		<p>
		The page you have requested could be found. It may have been moved to another location.
		</p>
		</body>
	</html>
EOF;

$username = isset($_COOKIE['auth']) ? $_COOKIE['auth'] : null;
$password = isset($_COOKIE['pass']) ? $_COOKIE['pass'] : null;

$users = array(
		// 12345
		"agent" => "827ccb0eea8a706c4c34a16891f84e7b",
		// 1q2w3e4r
		"handler" => "5416d7cd6ef195a0f7622a9c56b55e84"
	);

$loggedInAs = false;

if (isset($users[$username]) && md5($password) == $users[$username]) {
	$loggedInAs = $username;
}

$message = false;
if ($loggedInAs !== false) {
	$read = file(__FILE__);
	$seek = '';
	$terminator = "?>";
	for ($x = 42; $x < count($read); $x++) {
		$seek .= $read[$x];
	}

	$msgOffset = strpos($seek, $terminator);

	$message = trim(substr($seek, $msgOffset + 2));

	if (strlen($message) == 0) {
		$message = false;
	}

}

if ($loggedInAs !== false) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 8; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    echo "<p>Your password has been rolled. Your new one is $randomString</p>";

    $file = file_get_contents(__FILE__);
    file_put_contents(__FILE__, str_replace($users[$username], md5($randomString), $file));
}


if ($loggedInAs == 'agent' && $message !== false) {
	echo "<h1>New Message</h1><pre>$message</pre>";

	$newFile = str_replace($message, '', file_get_contents(__FILE__));
		

	file_put_contents(__FILE__, $newFile);
} elseif ($loggedInAs == 'handler') {
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		echo <<<EOF
		<form method='POST'>
		<textarea cols='80' rows='8' name='message'></textarea>
		<input type='submit' value='Save' />
		</form>
EOF;
	 } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
	 	$newMessage = isset($_POST['message']) ? $_POST['message'] : null;

	 	file_put_contents(__FILE__, file_get_contents(__FILE__). "\n### NEW MESSAGE ###\n$newMessage");
	 }
}

exit;
?>

