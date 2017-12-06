
<?php
require_once ('./includes/header.html');
require_once ('../includes/session.php');


$ip = $_SERVER['REMOTE_ADDR'];// رقم الآي بي
//
//////////////////////////////////////////
require_once('../includes/mysqli_connect.php');

if (isset($_COOKIE['user']['loggedin']) && isset($_COOKIE['user']['id'])) {
    redirect ('../index.php');
    //echo $_COOKIE['user']['first_name'];
    exit();
}
if(isset($_POST['employee_number']) && (is_numeric($_POST['employee_number'])) ) {
    
    $number = $_POST['employee_number'];
    $employee_number = str_pad($number, 7, '0', STR_PAD_LEFT);
    
	if (empty($employee_number) || empty($ip) ) {
		$error = "User Name or Password can't be empty!";
	} else {
            //echo "test 2";
		//إضافة الأصفار في حال عدم كتابتها
    
                
		$q = "SELECT user_id, name, avatar, member, employee_number FROM users WHERE 
                (ip_adres='$ip' AND employee_number='$employee_number') LIMIT 1"; 
		$r = @mysqli_query ($dbc, $q);
		if (mysqli_affected_rows($dbc) == 1)  {
                    while ($admin = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
				//$admin = mysql_fetch_array($result);
                setcookie('user[id]',$admin['user_id'], time()+(60*60*24*30),"/");
                setcookie('user[name]',$admin['name'], time()+(60*60*24*30),"/");
                setcookie('user[avatar]',$admin['avatar'], time()+(60*60*24*30),"/");
                setcookie('user[member]',$admin['member'], time()+(60*60*24*30),"/");
                setcookie('user[loggedin]',true, time()+(60*60*24*30),"/");
                //$_COOKIE['user']['id'];
                
                redirect ('../index.php');
                
                    }
                } else {
				$error = 'لا يوجد لديك حساب!';
			}

		
	}
	
} else {
	if (isset($_GET['logout']) && $_GET['logout']== true) {
		$error = 'تم تسجيل خروجك من النظام، أدخل اسم المستخدم وكلمة المرور للدخول من جديد !';
	}
}
                
?>

<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-signin">
     
        <p><?php if(isset($error)){echo '<div class="alert alert-danger" role="alert"><strong>خطأ  </strong>'.$error.'</div>';} ?></p>
        
        <h2 class="form-signin-heading"> تسجيل الدخول</h2>
        <label for="inputEmail" class="sr-only">رقم الحاسب</label>
        <input type="text" name="employee_number" id="inputEmail" class="form-control" placeholder="رقم الحاسب" required="" autofocus="">
 <br /><br />
        <div class="checkbox">
          <label>
<!--            <input type="checkbox" value="remember-me"> -->
            <a href="register.php">إنشاء حساب</a>
          </label>
        </div>
 <br />
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
        
    </form>
    
  </div>
<?php
require_once ('./includes/footer.html');
?>
