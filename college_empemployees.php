<?php
//user.php

include('includes/database_connection.php');

if(!isset($_SESSION["type"]))
{
	header('location:register/login.php');
}

if($_SESSION["type"] != 'master')
{
	header("location:index.php");
}
$page_title = 'موظفين الكلية'; 
include('header.php');


?>
		<span id="alert_action"></span>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                        	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="panel-title">User List</h3>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
                            	<button type="button" name="add" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-success btn-xs">Add</button>
                        	</div>
                        </div>
                       
                        <div class="clear:both"></div>
                   	</div>
                   	<div class="panel-body">
                   		<div class="row"><div class="col-sm-12 table-responsive">
                   			<table id="user_data" class="table table-bordered table-striped">
                   				<thead>
									<tr>
										<th>ID</th>
										<th>رقم الحاسب</th>
                                                                                <th>Email</th>
										<th>Name</th>
										<th>Status</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>
                   			</table>
                   		</div>
                   	</div>
               	</div>
           	</div>
        </div>
        <div id="userModal" class="modal fade">
        	<div class="modal-dialog">
        		<form method="post" id="user_form">
        			<div class="modal-content">
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> إضافة موظف</h4>
        			</div>
        			<div class="modal-body">
        				<div class="form-group">
							<label>رقم الحاسب</label>
							<input type="text" name="computer_number" id="computer_number" class="form-control" required />
						</div>
                                                <div class="form-group">
                                                        <label>السجل المدني</label>
                                                        <input type="text" name="card_number" id="card_numberr" class="form-control" required />
                                                </div>
						<div class="form-group">
							<label>اسم الموظف</label>
                                                        <input type="text" name="EmployeeName" id="EmployeeName" class="form-control" required />
						</div>
						<div class="form-group">
							<label>المرتبة</label>
                                                        <input type="text" name="grade" id="grade" class="form-control"  />
						</div>
                                                <div class="form-group">
							<label>رقم الوظيفة</label>
                                                        <input type="text" name="job_id" id="job_id" class="form-control"  />
						</div>
                                                <div class="form-group">
							<label>الدرجة</label>
                                                        <input type="text" name="class" id="class" class="form-control"  />
						</div>
                                                <div class="form-group">
							<label>مسمى الوظيفة</label>
                                                        <input type="text" name="job_title" id="job_title" class="form-control"  />
						</div>
                                                <div class="form-group">
							<label>الجنسية</label>
                                                        <input type="text" name="nationality" id="nationality" class="form-control"  />
						</div>
        			</div>
        			<div class="modal-footer">
        				<input type="hidden" name="id_employe" id="id_employe" />
        				<input type="hidden" name="btn_action" id="btn_action" />
        				<input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			</div>
        		</div>
        		</form>

        	</div>
        </div>
                    
<?php
include('footer.php');
?>

<script>
$(document).ready(function(){
//alert('1');
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add User");
		$('#action').val("Add");
		$('#btn_action').val("Add");
	});

	var userdataTable = $('#user_data').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax":{
			url:"Model/college_staff/empemployees_fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"target":[4,5],
				"orderable":false
			}
		],
		"pageLength": 25
	});

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"Model/college_staff/empemployees_action.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
				$('#user_form')[0].reset();
				$('#userModal').modal('hide');
				$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
				$('#action').attr('disabled', false);
				userdataTable.ajax.reload();
			}
		})
	});

	$(document).on('click', '.update', function(){
		var user_id = $(this).attr("id");
		var btn_action = 'fetch_single';
		$.ajax({
			url:"Model/college_staff/empemployees_action.php",
			method:"POST",
			data:{user_id:user_id, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#user_name').val(data.user_name);
                                $('#username').val(data.username);
				$('#user_email').val(data.user_email);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit User");
				$('#user_id').val(user_id);
				$('#action').val('Edit');
				$('#btn_action').val('Edit');
				$('#user_password').attr('required', false);
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		var status = $(this).data('status');
		var btn_action = "delete";
		if(confirm("Are you sure you want to change status?"))
		{
			$.ajax({
				url:"Model/college_staff/empemployees_action.php",
				method:"POST",
				data:{user_id:user_id, status:status, btn_action:btn_action},
				success:function(data)
				{
					$('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
					userdataTable.ajax.reload();
				}
			})
		}
		else
		{
			return false;
		}
	});

});
</script>
