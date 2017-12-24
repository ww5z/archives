<?php

//edit_profile.php

include('../../includes/database_connection.php');

if(isset($_POST['place_birth']))
{
	
		$query = "
		UPDATE PersonalData SET 
			place_birth = '".$_POST["place_birth"]."', 
			Date_Birth = '".$_POST["Date_Birth"]."',  
			Nationality = '".$_POST["Nationality"]."',  
			card_number = '".$_POST["card_number"]."',  
			date_card = '".$_POST["date_card"]."',  
			Issuing_card = '".$_POST["Issuing_card"]."',  
			Passport_number = '".$_POST["Passport_number"]."',  
			date_passport = '".$_POST["date_passport"]."',  
			expiry_passport = '".$_POST["expiry_passport"]."',  
			Issuing_passport = '".$_POST["Issuing_passport"]."', 
			status_update = 'Active'
			WHERE id_PersonalData = '".$_SESSION["id_employe"]."'
		";
	
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$count = $statement->rowCount();
	if($count == 1)
	{
		echo '<div class="alert alert-success">تم تحديث البيانات</div>';
	}else {
		echo '<div class="alert alert-danger">لم يتم أي تحديث</div>';
	}
}

?>