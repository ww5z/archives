<link href="./css/style_print.css" rel="stylesheet">
<?php

include('header.php');

	if(isset($_GET["add"]))
	{
		$id = 0;
	}
	elseif(isset($_GET["update"]) && isset($_GET["id"]))
	{
		$id = $_GET["id"];
	}else {
		$id = 0;
	}


function fill_unit_select_box($connect)
{ 
					if($_SESSION['type'] == 'member')
					{
						$sq1 = "WHERE id_employe = ".$_SESSION['id_employe']." ";
					} else {
						$sq1 = "";
					}

 $output = '';
 $query = "SELECT id_employe, EmployeeName FROM employees $sq1 ORDER BY EmployeeName ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["id_employe"].'">'.$row["EmployeeName"].'('.$row["id_employe"].')</option>';
 }
 return $output;
}


?>
	<br />

		<div class="panel panel-default">
			<div class="panel-heading">بطاقة الوصف الوظيفي</div>
			<div class="panel-body">
				<form method="post" id="edit_profile_form">
					<span id="message"></span>
					
					
<div class="form-row">
	<div class="col-md-6">
		<div class="form-group">
		<label>المرتبــــة</label>
			<div id="grade"></div>

		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>رقمهــــا</label>
			<div id="job_id"></div>
		
		</div>
	</div>
		<div class="col-md-6">
		<div class="form-group">
		<label>مسمى الوظيفة</label>
			<div id="job_title"></div>
		</div>
	</div>
	<div class="col-md-6">
		
			<div class="form-group">
			<label>الموظف:</label>
			<div class="input-group">

			<select name="employees_id" id="employees_id" class="form-control" >
			<?php echo fill_unit_select_box($connect); ?>
			</select>
			</div>
			</div>
	</div>

		<div class="col-md-6">
		<div class="form-group">
		<label>التخصـــص</label>
			<div id="Specialization"></div>
		</div>
	</div>				
				<div class="col-md-6">	
			<div class="form-group">
			<label>الإرتباط التنظيمي</label>
			<select disabled class="form-control" name="OrganizationalLinkage" id="OrganizationalLinkage" >
				<option selected="selected" value="-1">الرجاء الأختيار...</option>
				<option value="01">مجلس أبها</option>
				<option value="02">العميد</option>
				<option value="9055-30">الاتصالات الإدارية والأرشيف</option>
					<option value="9055-32">الأمن والحراسات</option>
					<option value="9055-26">التدرب الإلكتروني ومصادر التدرب</option>
					<option value="9055-44">التدريب التعاوني</option>
					<option value="9055-31">التدريب المشترك</option>
					<option value="9055-21">التطوير والجودة</option>
					<option value="9055-9">التوجيه والارشاد</option>
					<option value="9055-42">الحركة</option>
					<option value="9055-25">السلامة والصحة المهنية</option>
					<option value="9055-8">الشئون الادارية</option>
					<option value="9055-5">الشؤون الادارية والمالية</option>
					<option value="9055-7">الشئون المالية</option>
					<option value="9055-34">الصندوق</option>
					<option value="9055-29">الصيانة والخدمات</option>
					<option value="9055-11">العلاقات العامة</option>
					<option value="9055-19">العيادة الطبية</option>
					<option value="9055-3">القبول والتسجيل</option>
					<option value="9055-6">المتابعه</option>
					<option value="9055-35">المحاسبة</option>
					<option value="9055-22">المسئولية الاجتماعية</option>
					<option value="9055-37">المستودع</option>
					<option value="9055-36">المشتريات</option>
					<option value="9055-18">النشاط</option>
					<option value="9055-20">تقنية المعلومات</option>
					<option value="9055-24">خدمة المجتمع والتدريب المستمر</option>
					<option value="9055-33">شئون الموظفين</option>
					<option value="9055-47">صندوق المتدربين</option>
					<option value="9055-14">قسم التقنية الادارية</option>
					<option value="9055-28">قسم الدراسات العامة</option>
					<option value="9055-12">قسم تقنية الحاسب</option>
					<option value="9055-38">مراقبة المخزون</option>
					<option value="9055-17">مكتب التنسيق الوظيفي و التوجيه المهني</option>
					<option value="9055-46">مكتب العميد</option>
					<option value="9055-2">وكيل الكلية لشؤون المتدربين</option>
					<option value="9055-1">وكيل الكلية للتدريب</option>


			</select>

	</div>
	
</div>
					
					<hr />
					<div class="form-group">
						<label>الواجبات والمهام</label>
						<div id="Duties_tasks"></div>
					</div>
					<hr />
					<div class="form-group">
						<label>الصلاحيــــات</label>
						<div id="Powers"></div>
					</div>
					<hr />
					<div class="form-group">
						<label>المؤهل العلمي</label>
						<div id="Qualification"></div>
					</div>
					<hr />
					<div class="form-group">
						<label>الخبرة العملية</label>
						<div id="Practical_experience"></div>
					</div>
					<hr />
					<div class="form-group">
						<label>التدريب</label>
						<div id="Training"></div>
					</div>
					<hr />
					<div class="form-group">
						<label>معارف وقدرات مهارات أخرى</label>
						<div id="Other"></div>
					</div>

					
					
					
					<div class="form-group row">
						<div class="col-sm-10">
							<input type="button" name="btn_action" id="btn_actionn" value="طباعــة" class="btn btn-primary" />
						</div>
					</div>
					<input type="hidden" name="form_action" id="form_action" value="Add" />
					<input type="hidden" name="id_idjob_description_card" id="id_idjob_description_card" value="<?php echo $id; ?>" />
					<input type="hidden" name="employees_add" id="employees_add" value="<?php echo $_SESSION["id_employe"]; ?>" />
				</form>
			</div>
		</div>
<?php
include("footer.php");
?>

<script>
$(document).ready(function(){
	
	function nl2br (str, is_xhtml) {     
        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br/>' : '<br>';      
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');  
    }  
	
	var id_idjob_description_card = <?php echo $id; ?>;
	
	if (id_idjob_description_card > 0){
		
		var form_action = 'fetch_single';
		$.ajax({
			url:'Model/job_description_card/job_description_card.php',
			method:"POST",
			data:{id_idjob_description_card:id_idjob_description_card, form_action:form_action},
			dataType:"json",
			success:function(data)
			{
				//$('#brandModal').modal('show');
				$('#id_idjob_description_card').val(data.id_idjob_description_card);
				$('#grade').text(data.grade);
				$('#job_id').text(data.job_id);
				$('#job_title').text(data.job_title);
				$('#OrganizationalLinkage').val(data.OrganizationalLinkage); ///
				//$('#Duties_tasks').text(data.Duties_tasks); //####
				$('#Powers').text(data.Powers);
				$('#Qualification').text(data.Qualification);
				$('#Practical_experience').text(data.Practical_experience);
				$('#Training').text(data.Training);
				$('#Other').text(data.Other);
				$('#Specialization').text(data.Specialization);
				$('#employees_id').val(data.employees_id).prop('disabled', 'disabled'); //////
				
				$('.panel-heading').html("<span class='text-primary'> بطاقة الوصف الوظيفي");
				$('#form_action').val('Edit');
				$('#btn_action').val('Edit'); 
				$("#Duties_tasks").html(nl2br(data.Duties_tasks)); 
			}
			
			
			   
      
    
      
    
		
			
			
		})
		
		
	} else {
		//alert('Ok')
	}
	
	
	
$('#btn_actionn').click(function(){
     window.print();
})
	
	

});
	

	

      
$(function(){
	
	var id_idjob = <?php echo $id; ?>;

    $( '#c_facts_j' ).click(function (){
        $( '#c_facts_j' ).val('');
    });
    
    $( '#c_facts_j' ).change( function(){
        var c_f_j = $("#c_facts_j").val();
        $( '#employees_id' ).val(c_f_j);

    });
    
    $( '#employees_id' ).change( function(){
        var fa_j = $("#employees_id").val();
        $( '#c_facts_j' ).val(fa_j);
    });
	
	
		// تفعيل واختيار حقل الموظف
	var typeSelect = "<?php echo $_SESSION['type']; ?>";
	var employeesSelect = "<?php echo $_SESSION['id_employe']; ?>";
	
	//alert(typeSelect)
	if(typeSelect == 'master'){
		$("#c_facts_j").prop('disabled', false);
		$("#employees_id").prop('disabled', false);
	} 
	
    
});
	
</script>