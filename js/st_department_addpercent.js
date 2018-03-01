$( document ).ready( function(){
    
    

	$('#addpercent_id').change(function(){
		var category_id = $('#addpercent_id').val();
		var btn_action = 'load_brand';
		$.ajax({
		url:"Model/st_statistical_data/st_department_addpercent_insert.php",
		method:"POST",
		data:{category_id:category_id, btn_action:btn_action},
		success:function(data)
		{
		$('#addpercent_data').html(data);
		}
		});
	});
	
	$('#addpercent_data').change(function(){
		var addpercent_data = $('#addpercent_data').val();
		var btn_action = 'load_brand';
		
		if (addpercent_data != ''){
               //var post_1 = 'no_computer';
                var nocm = addpercent_data;
              take_followup_start(addpercent_data) 
			//take_form(nocm, post_1); // تنفيذ دالة الإرسال
           }
		
	});
	
 
	
//أوامر النموذج الإضافة والتعديل
    $('#add_button').click(function(){
		var addpercent_data = $('#addpercent_data').val();
        
		if (addpercent_data != 0){
			$('#productModal').modal('show');
			$('#product_form')[0].reset();
		}
        
        $('.modal-title').html("<i class='fa fa-plus'></i> إضــافة نسبــــة");
        $('#action').val("Add");
        $('#btn_action').val("Add");
		$('#id_statistical').val(0);
		
		$('#id_Department').val(addpercent_data);
    });

    $(document).on('submit', '#product_form', function(event){
		var id_Department = $('#id_Department').val();
		//var btn_action = $('#btn_action').val();
        event.preventDefault();
        $('#action').attr('disabled', 'disabled');
        var form_data = $(this).serialize();
        $.ajax({
            url:"Model/st_statistical_data/st_department_addpercent_insert.php",
            method:"POST",
            data:form_data,
            success:function(data)
            {
				//alert(btn_action)
                $('#product_form')[0].reset();
                $('#productModal').modal('hide');
                $('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
                $('#action').attr('disabled', false);
                //productdataTable.ajax.reload();
				take_followup_start(id_Department)
            }
        })
    });


 
});













// ################ جلب بيانات الموظف ################
function take_form(nocm, post_1){
    
    
    var comment_2 = '<img src="./images/icon_allow.png" width="20" height="20" />';
    var rpt_2 = '<img src="./images/icon_deny.png" width="20" height="20" />';
    var with_success = '<span class="glyphicon glyphicon-ok form-control-feedback tchcktoright" aria-hidden="true"></span>';
    var with_error = '<span class="glyphicon glyphicon-remove form-control-feedback tchcktoright" aria-hidden="true"></span>';
    var with_warning = '<span class="glyphicon glyphicon-warning-sign form-control-feedback tchcktoright" aria-hidden="true"></span>';
    
    $.ajax({
        url: "Model/st_statistical_data/st_department_addpercent.php",
        type: 'POST',
        data:""+post_1+"="+nocm,
        beforeSend: function (xhr) {
            //alert('dd');
            $("#NoCoMsg").show();
            $('#NoCoMsg').html('<img src="./images/loading.gif" width="20" height="20" />');
            $( "#messge_icons" ).removeClass( "has-error" ).addClass( "has-warning" );
        },
        statusCode: { // كود خاص بتحليل أخطاء الصفحه
            404: function (){
                alert("Not found page");
            }, 
            403: function (){
                alert("Bad request");
            }
        },
        success: function (data, textStatus, jqXHR) {

            if(data == 2){
                //$("#insert_data").html(rpt_2);
            }
            else {
                var person = jQuery.parseJSON( data );
                var id = person.id_statistical ;
                if(id > 0){
                    $( '#NoComputer' ).val(person.id_statistical); //رقم الحاسب
                    $( '#card_number' ).val(person.year); //رقم البطاقة
                    $( '#incumbent' ).text(person.month); //اسم الموظف
                    $( '#grade' ).text(person.day); //المرتبة
                    $( '#idJob' ).text(person.id_Department); //رقم الوظيفة
                    $( '#JobTitle' ).text(person.theRatio); //مسمى الوظيفة
                    //$( '#description_hand_employee' ).text(person.description_hand_employee); //جهة الوظيفة
                    $( '#edit_employees' ).val(person.id_statistical); //زر التحرير
                    
                    
                    take_followup_start(person.id_statistical);
                    
                        $( "#messge_icons" ).removeClass( "has-error has-warning" ).addClass( "has-success" );
                        $("#no_tchck").html(with_success);
                        $("#edit_employees").prop('disabled', false); //تفعيل زر التحرير
                    
                } else{
                    take_form_delete() // حذف البيانات

                }
                
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("errorrrrrrrrrrr");
        },
        complete: function (jqXHR, textStatus) {
            //$("#insert_data").html(comment).fadeOut(5000);
        }


    });
          
}








// ################ جلب بينانات إجراءات المعاملة ################

function take_followup_start(id){

    
    $.ajax({
        url: "Model/st_statistical_data/show_addpercent.php",
        type: 'POST',
        data:"id="+id,
        beforeSend: function (xhr) {
            //$("#NoCoMsg").show();
            $('#procedure').html('<img src="./images/ajax-loader.gif" width="45" height="45" />');
        },
        statusCode: { // كود خاص بتحليل أخطاء الصفحه
            404: function (){
                $("#procedure").text("لم يتم العثور على الصفحة");
            }, 
            403: function (){
                $("#procedure").text("Bad request");
            }
        },
        success: function (data, textStatus, jqXHR) {
                
           $('#procedure').html(data);

        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#insert_data").text("errorrrrrrrrrrr");
        },
        complete: function (jqXHR, textStatus) {
            //$("#insert_data").html(comment).fadeOut(5000);
        }


    });
    
    
          
}



// حذف البيانات
function take_form_delete() {
    var with_error = '<span class="glyphicon glyphicon-remove form-control-feedback tchcktoright" aria-hidden="true"></span>';
    
        alert('لا يــــوجد للمستعلم عنه بيانــــات');
    $("#no_tchck").html(with_error);
    $( "#messge_icons" ).removeClass( "has-success" ).addClass( "has-error" );
    $( '#edit_employees' ).val('0').prop('disabled', 'disabled'); //زر التحرير
    take_followup_start('0');
    
    $("#NoComputer ,#card_number").val('');
    $("#incumbent ,#grade ,#idJob ,#JobTitle ,#description_hand_employee ").text('Null');
    
    $('#NoComputer').focus(); // تنشيط المؤشر لحقل رقم الحاسب
    
}