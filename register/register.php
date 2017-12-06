
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
    
    $name           = trim($_POST['name']); // 
    $tel            = trim($_POST['tel']); // 
    $ip_adres       = trim($_POST['ip_adres']); // 
    
    
	if (empty($employee_number) || empty($ip) ) {
		$error = "User Name or Password can't be empty!";
	} else {
            //echo "test 2";
		//إضافة الأصفار في حال عدم كتابتها
    
                
        $q_user = "SELECT employee_number FROM users WHERE employee_number='$employee_number'  LIMIT 1 ";
            $r_user = @mysqli_query($dbc, $q_user);
            if (mysqli_num_rows($r_user) == 0) {
                
                $q = "INSERT INTO users (employee_number, name, tel, ip_adres) "
                . "VALUES ('$employee_number', '$name', '$tel', '$ip_adres')";
                    $r = @mysqli_query($dbc, $q);
                    if (mysqli_affected_rows($dbc) == 1) {
                        $success = "<p class='bg-success'>تم تسجيلك بنجاح <a href='login.php'> تسجيل الدخول</a></p>";
                    } else {
                        $danger = '<p class="bg-danger">حدث خطاء غير متوقع</p>';
                    }


            }  else {
                $info = '<p class="bg-info">أنت مسجل مسبقاً</p>';
            }

		
	}
	
}
                
?>

<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-signin">
     
        <p><?php if(isset($error)){echo '<div class="alert alert-danger" role="alert"><strong>خطأ  </strong>'.$error.'</div>';} ?></p>
        <div><?php if(isset($success)){echo $success;} ?></div>
        <div><?php if(isset($danger)){echo $danger;} ?></div>
        <div><?php if(isset($info)){echo $info;} ?></div>
        
<div class="form-group">
    <label for="employee_number">رقم الحاسب</label>
    <input type="text" name="employee_number" class="form-control" id="employee_number" placeholder="رقم الحاسب">
  </div>
        
<div class="form-group">
    <label for="name">الإســـم</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="الإسم الأول وإسم العائلة">
  </div>
        
<div class="form-group">
    <label for="tel">تحويلة المكتب</label>
    <input type="tel" name="tel" class="form-control" id="tel" placeholder="تحويلة المكتب">
  </div>

<!--  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>-->
        <input type="hidden" name="ip_adres" value="<?php  echo "$ip"; ?>" />
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">تسجيل</button>
        
    </form>
    
  </div>
<?php
require_once ('./includes/footer.html');
?>
