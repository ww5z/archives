<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="rtl" xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />


<title></title>
<link href="../includes/style.css" rel="stylesheet" type="text/css"  />
                   
<script type="text/javascript" src="../js/jquery.js"></script>

</head>
<?php # Script 16.11 - change_password.php
// This page allows a logged-in user to change their password.

require_once ('includes/config.inc.php'); 



// If no first_name session variable exists, redirect the user:
//if (!isset($_SESSION['loggedin']) && !isset($_SESSION['id'])) {
if (!isset($_COOKIE['user']['loggedin']) && !isset($_COOKIE['user']['id'])) {
	
	$url = BASE_URL . 'index.html'; // Define the URL.
	ob_end_clean(); // Delete the buffer.
	header("Location: $url");
	exit(); // Quit the script.
	
}

if (isset($_POST['submitted'])) {
	require_once (MYSQL);
    $errors = array();
			
	// Check for a new password and match against the confirmed password:
	$p = FALSE;
	if ( $_POST['password1'] and strlen($_POST['password1']) > 2 ) { // strlen لتحديد عدد الحروف
		if ($_POST['password1'] == $_POST['password2']) {
			$p = mysqli_real_escape_string ($dbc, $_POST['password1']);
		} else {
			$errors[] = 'كلمة المرور غير متطابقتين';
		}
	} else {
		$errors[] = 'الرجاء إدخال كلمة مرور صحيحة!';
	}
	
	if ($p) { // If everything's OK.

		// Make the query.
		$q = "UPDATE users SET pass=SHA1('$p') WHERE user_id={$_COOKIE['user']['id']} LIMIT 1";	
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
		
			// Send an email, if desired.
			echo '<div class="ok"><h3>تم تغيير كلمة المرور بنجاح</h3></div>';
			mysqli_close($dbc); // Close the database connection.
			//include ('includes/footer.html'); // Include the HTML footer.
			exit();
			
		} else { // If it did not run OK.
		
			$errors[] = 'لم يتم تغيير كلمة المرور الخاصة بك. تأكد من كلمة المرور الجديدة مختلفة عن كلمة المرور الحالية.'; 

		}

	} else { // Failed the validation test.
		$errors[] = 'قم بالمحاولة مرة أخرى';		
	}
	
	mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.

?>


<div class="post">
<h1 class="che">تعديل كلمة المرور</h1>
<?php
if ( !empty($errors) && is_array($errors) ) {
	echo '<div class="no">';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
	}
	echo '</div>';
}
?>
<form dir="rtl" action="change_password.php" method="post">
	
    <table>
        <tr>
            <td>كلمة المرور الجديدة:</td>
            <td><input type="password" name="password1" size="20" maxlength="20" /></td>
        </tr>
        <tr>
            <td>تأكيد كلمة المرور الجديدة:</td>
            <td><input type="password" name="password2" size="20" maxlength="20" /></td>
        </tr>
    </table>
	
	<div align="center"><input type="submit" name="submit" value="تـعــديـــل" /></div>
	<input type="hidden" name="submitted" value="TRUE" />
</form>
</div>

