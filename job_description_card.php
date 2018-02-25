<?php
//index.php
include('header.php');


?>
	<br />

	<span id="alert_action"></span>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                	<div class="row">
                		<div class="col-md-10">
                			<h3 class="panel-title">قائمة بطاقات الوصف الوظيفي</h3>
                		</div>
                		<div class="col-md-2" align="right">
<!--                			<button type="button" name="add" id="add_button" class="btn btn-success btn-xs">Add</button>-->
							
							<a href="job_description.php?add=1" class="btn btn-info btn-xs">إنشاء بطاقة جديدة</a>
                		</div>
                	</div>
                </div>
                <div class="panel-body">
                	<table id="brand_data" class="table table-bordered table-striped">
                		<thead>
							<tr>
								<th>ID</th>
								<th>اسم الموظف</th>
								<th>الوظيفية</th>
								<th>مسمى الوظيفة</th>
								<th>تحريـــر</th>
								<th>حـــذف</th>
							</tr>
						</thead>
                	</table>
                </div>
            </div>
        </div>
    </div>


<?php
include("footer.php");
?>


<script>
$(document).ready(function(){

	$('#add_button').click(function(){
		$('#brandModal').modal('show');
		$('#brand_form')[0].reset();
		//$('.modal-title').html("<i class='fa fa-plus'></i> Add Brand");
		$('#action').val('Add');
		$('#btn_action').val('Add');
	});

	$(document).on('submit','#brand_form', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"Model/job_description_card/job_description_card.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
				$('#brand_form')[0].reset();
				$('#brandModal').modal('hide');
				$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
				$('#action').attr('disabled', false);
				branddataTable.ajax.reload();
			}
		})
	});



	$(document).on('click','.delete', function(){
<?php
if($_SESSION['type'] == 'member')
	{?>
		var deletionValidity = false;
<?php	} else { ?>
		var deletionValidity = true;
<?php	} ?>
		
		if (deletionValidity == true){
		var id_idjob_description_card = $(this).attr("id");
		var form_action = 'delete';
		
		var btn_action = 'delete';
		if(confirm("هل أنت متأكد من رغبتك في حذف هذه البطاقة؟"))
		{
			$.ajax({
				url:"Model/job_description_card/job_description_card.php",
				method:"POST",
				data:{id_idjob_description_card:id_idjob_description_card, btn_action:btn_action, form_action:form_action},
				success:function(data)
				{
					$('#alert_action').fadeIn().html('<div class="alert alert-danger">'+data+'</div>');
					branddataTable.ajax.reload();
				}
			})
		}
		else
		{
			return false;
		}
		}else {
			alert("لا تملك صلاحية الحذف !");
		}
		
	});


	var branddataTable = $('#brand_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"Model/job_description_card/job_description_card_fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[4, 5],
				"orderable":false,
			},
		],
		"pageLength": 10
	});

});
</script>