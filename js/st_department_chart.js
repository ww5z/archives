$( document ).ready( function(){
    
    

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
	
	$('#addpercent_data').change(function(){
		var addpercent_data = $('#addpercent_data').val();
		var btn_action = 'load_brand';
		
		if (addpercent_data != ''){
               //var post_1 = 'no_computer';
                var nocm = addpercent_data;
              take_followup_start(addpercent_data) 
			st_statistical_chart(addpercent_data)
			//take_form(nocm, post_1); // تنفيذ دالة الإرسال
           }
		
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



// جلب الشارت
function st_statistical_chart(id){

    
    $.ajax({
        url: "Model/st_statistical_data/st_statistical_chart.php",
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
        success:function(data){
                
           $('#chart').html(data);
			//var data_chart = data;
			//chart(data_chart);

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


////////////////////////////
///////////////////////////////
////////////////////////////

function chart(data_chart) {
	alert(data_chart);
Morris.Bar({
 element : 'chart',
 data:data_chart,
 xkey:'year',
 ykeys:['theRatio'],
 labels:['النسبة'],
 hideHover:'auto',
 
});
}
