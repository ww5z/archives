$( document ).ready( function(){
    
    
    $('#NoComputer').focus(); // تنشيط المؤشر لحقل رقم الحاسب
 
 
    // ################ جلب بيانات الموظف ################
    $('#NoComputer').change(function(){
           var n_c = $("#NoComputer").val();
        if (n_c != ''){
               var post_1 = 'no_computer';
                var nocm = n_c;
               take_form(nocm, post_1); // تنفيذ دالة الإرسال
           } 
      return false;
   }); 
    $('#card_number').change(function(){
           var c_n_id = $("#card_number").val();
        if (c_n_id != ''){
               var post_1 = 'card_number';
               var nocm = c_n_id;
               take_form(nocm, post_1); // تنفيذ دالة الإرسال
           } 
      return false;
   }); 
   
   
       // ################ حفظ بيانات الموظف ################
    $('#form_id_employees').click(function(){
        var f_id_emloyees = $(this).val(); 
        var d_comm = $('#form_edit_employees').serialize();
        
        if (f_id_emloyees > '0'){
            
            save_employees_form(d_comm);
        } else {
            alert('لا يوجد رقم تعريف صحيح');
        }
        
           
   }); 
   
   


    $( '#edit_employees' ).click( function(){
        var id_emloyees = $(this).val(); // رقم الإي دي 
        form_edit_employees(id_emloyees);
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
        url: "Model/empemployees/empemployees.php",
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
                $("#insert_data").text("Not found page");
            }, 
            403: function (){
                $("#insert_data").text("Bad request");
            }
        },
        success: function (data, textStatus, jqXHR) {

            if(data == 2){
                //$("#insert_data").html(rpt_2);
            }
            else {
                var person = jQuery.parseJSON( data );
                var id = person.computer_number ;
                if(id > 0){
                    $( '#NoComputer' ).val(person.computer_number); //رقم الحاسب
                    $( '#card_number' ).val(person.card_number); //رقم البطاقة
                    $( '#incumbent' ).text(person.EmployeeName); //اسم الموظف
                    $( '#grade' ).text(person.grade); //المرتبة
                    $( '#idJob' ).text(person.job_id); //رقم الوظيفة
                    $( '#JobTitle' ).text(person.job_title); //مسمى الوظيفة
                    //$( '#description_hand_employee' ).text(person.description_hand_employee); //جهة الوظيفة
                    $( '#edit_employees' ).val(person.id_employe); //زر التحرير
                    
                    
                    take_followup_start(person.id_employe);
                    
                        $( "#messge_icons" ).removeClass( "has-error has-warning" ).addClass( "has-success" );
                        $("#no_tchck").html(with_success);
                        $("#edit_employees").prop('disabled', false); //تفعيل زر التحرير
                    
                } else{
                    take_form_delete() // حذف البيانات

                }
                
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#insert_data").text("errorrrrrrrrrrr");
        },
        complete: function (jqXHR, textStatus) {
            //$("#insert_data").html(comment).fadeOut(5000);
        }


    });
          
}


// ################ حفظ بيانات الموظف ################
function save_employees_form(d_comm){
    
    var success_up = "<div class='alert alert-success' role='alert'><strong>رائــع!</strong> تم تحديث بيانات الموظف بنجاح.</div>"; //نجح تحديث البيانات
    var danger_up = "<div class='alert alert-danger' role='alert'><strong>سيء للغاية!</strong> لم يتم تحديث البيانات .</div>";
    var ron_g = "<div class='no'>حدث خطاء غير متوقع</div>";
    var ron_m = "<div class='no_m'>الموظف سبق أن تم تسجيل بياناته</div>";
    var add_data = "تعديــل البيــانــــــات";
	
    
    $.ajax({
        url: "Model/employees_edit/save_data_edit.php",
        type: 'POST',
        data:d_comm,
        beforeSend: function (xhr) {
            $("#NoCoMsg").show();
            $('#NoCoMsg').html('<img src="./images/loading.gif" width="20" height="20" />');
            $( "#messge_icons" ).removeClass( "has-error" ).addClass( "has-warning" );
        },
        statusCode: { // كود خاص بتحليل أخطاء الصفحه
            404: function (){
                $("#insert_data").text("Not found page");
            }, 
            403: function (){
                $("#insert_data").text("Bad request");
            }
        },
        success: function (data, textStatus, jqXHR) {
                
            if( data == 1){
                $("#insert_messg").show();
                $("#insert_messg").html(success_up);
            } else if (data == 2) {
                $("#insert_messg").show();
                $("#insert_messg").html(danger_up);
            }
            else {
                var person = jQuery.parseJSON( data );
                var id = person.id_pursuance ;
                if(id > 0){
                    $( '#jform_id' ).val(id);
                    $("#insert_data").html(comment);
                    $("#add_data").html(add_data);
                } else if(id = 3){
                    $("#insert_data").html(ron_m); // السجل متكرر
                } else{
                    $("#insert_data").html(ron_g); // حدث خطاء
                }
                
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#insert_data").text("errorrrrrrrrrrr");
        },
        complete: function (jqXHR, textStatus) {
            //$("#insert_data").html(comment).fadeOut(5000);
        }


    });
          
}


// ################ جلب بينانات الموظف في النموذج الفرعي ################
function form_edit_employees(id_emloyees){
   // $("#insert_messg").text(id_emloyees);
    
    var with_success = '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Warning!</strong> Better check yourself, youre not looking too good.</div>';
    
    $.ajax({
        url: "Model/employees_edit/employees_edit.php",
        type: 'POST',
        data:"id_employees="+id_emloyees,
        beforeSend: function (xhr) {
            //$("#NoCoMsg").show();
            //$('#NoCoMsg').html('<img src="./images/loading.gif" width="20" height="20" />');
        },
        statusCode: { // كود خاص بتحليل أخطاء الصفحه
            404: function (){
                $("#insert_messg").text("الصفحة غير موجودة");
            }, 
            403: function (){
                $("#insert_messg").text("Bad request");
            }
        },
        success: function (data, textStatus, jqXHR) {
            
            if(data == 2){
                alert('حدث خطاء ما!');
            }
            else {
                var person = jQuery.parseJSON( data );
                var id = person.employee_number ;
                if(id > 0){
                    $("#insert_messg").hide();
                    
                    $( '#form_id_employees' ).val(person.id);
                    $( '#form_NoComputer' ).val(person.employee_number); //رقم الحاسب
                    $( '#form_card_number' ).val(person.card_number); //رقم البطاقة
                    $( '#form_incumbent' ).val(person.employee_name); //اسم الموظف
                    $( '#form_grade' ).val(person.grade); //المرتبة
                    $( '#form_idJob' ).val(person.job_id); //رقم الوظيفة
                    $( '#form_JobTitle' ).val(person.job_title); //مسمى الوظيفة
                    $( '#form_description_hand_employee' ).val(person.description_hand_employee); //جهة الوظيفة
                    $( '#form_notes' ).val(person.notes); // الملاحظات
                    $( '#form_id_employees_hid' ).val(person.id); // المخفي
                    
                } else{ 
                    // تفريغ الحقول
//                    $( '#employee_number' ).val('');
//                    $( '#id_employees' ).val('0');
//                    $( '#employee_name' ).val('');
                }
                
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#insert_data").text("errorrrrrrrrrrr");
        },
        complete: function (jqXHR, textStatus) {
            //$("#insert_data").html(comment).fadeOut(5000);
        }
    });
}



// ################ جلب بينانات إجراءات المعاملة ################

function take_followup_start(id){



    
//    var comment_2 = '<img src="./images/icon_allow.png" width="20" height="20" />';
//    var rpt_2 = '<img src="./images/icon_deny.png" width="20" height="20" />';
//    var ron_g_2 = '<img src="./images/publish_r.png" width="20" height="20" />';
    
    $.ajax({
        url: "Model/empemployees/show_files.php",
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