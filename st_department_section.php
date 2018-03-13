<?php
//index.php
include('header.php');

include('Model/st_statistical_data/function.php');
//$connect = new PDO("mysql:host=localhost;dbname=testing4", "root", "1bn5n52");


?>






<span id='alert_action'></span>

<form class="form-inline">
    
    <div class="form-group">
		<label>القسم</label>
		<select name="addpercent_id" id="addpercent_id" class="form-control" required>
		<option value="">اختــر القسـم</option>
		<?php echo fill_category_list($connect);?>
		</select>
		</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


	
</form>




    <br /> 
    <br /> 


    
    
    <div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">تعديل البيانات</h4>
      </div>


		
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="form_id_employees">حفــظ التعديـلات</button>
      </div>
    </div>
  </div>
</div>
          
          
          
          

  
          
          <div id="procedure"></div>
 
          
          
        </div>
      </div>
    </div>



	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
<script>
$(document).ready(function(){




	$('#addpercent_id').change(function(){
		var category_id = $('#addpercent_id').val();
		    
    $.ajax({
        url: "Model/st_statistical_data/st_department_section_action.php",
        type: 'POST',
        data:"id="+category_id,
        beforeSend: function (xhr) {
            //$("#NoCoMsg").show();
            $('#procedure').html('<img src="./images/ajax-loader.gif" width="45" height="45" />');
        },
        statusCode: { // كود خاص بتحليل أخطاء الصفحه
            404: function (){
                alert("لم يتم العثور على الصفحة");
            }, 
            403: function (){
                alert("Bad request");
            }
        },
        success:function(data){
                
           $('#procedure').html(data);

        },
        error: function (jqXHR, textStatus, errorThrown) {
           alert("errorrrrrrrrrrr");
        },
        complete: function (jqXHR, textStatus) {
            //$("#insert_data").html(comment).fadeOut(5000);
        }


    });
		
	});





	$('#addpercent_id').change(function(){
		var category_id = $('#addpercent_id').val();
		var btn_action = 'load_brand';
		$.ajax({
		url:"Model/st_statistical_data/st_department_addpercent_action.php",
		method:"POST",
		data:{category_id:category_id, btn_action:btn_action},
		success:function(data)
		{
		$('#addpercent_data').html(data);
		}
		});
	});



});
</script>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
