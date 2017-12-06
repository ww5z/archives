<?php
$page_title = 'تحميل الملفات'; 
require_once ('header.php');
?>

<!--<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Drag and drop Multiple file upload By Ajax JQuery PHP</title>  
           <script src="jquery.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  -->
           <style>  
           .file_drag_area  
           {  
                width:800px;  
                height:400px;  
                border:2px dashed #ccc;  
                line-height:400px;  
                text-align:center;  
                font-size:24px;  
           }  
           .file_drag_over{  
                color:#000;  
                border-color:#000;  
           }  
           </style>  
<!--      </head>  
      <body>  -->
           <br />            
           <div class="container" style="width:700px;" align="center">  
                <h3 class="text-center">سحب وإسقاط الملفات لتحميلها على نظام توثيق</h3><br />  
                <div class="file_drag_area">  
                     اسقط الملفات هنـــا  
                </div>  
                <div id="uploaded_file"></div>  
           </div>  
           <br />  
<!--      </body>  
 </html>  -->

<?php
require_once ('footer.php');
?>

 <script>  
 $(document).ready(function(){
      $('.file_drag_area').on('dragover', function(){  
           $(this).addClass('file_drag_over');  
           return false;  
      });  
      $('.file_drag_area').on('dragleave', function(){  
           $(this).removeClass('file_drag_over');  
           return false;  
      });  
      $('.file_drag_area').on('drop', function(e){  
           e.preventDefault();  
           $(this).removeClass('file_drag_over');  
           var formData = new FormData();  
           var files_list = e.originalEvent.dataTransfer.files;  
           //console.log(files_list);  
           for(var i=0; i<files_list.length; i++)  
           {  
                formData.append('file[]', files_list[i]);  
           }  
           //console.log(formData);  
           $.ajax({  
                url:"Model/files_upload/upload.php",  
                method:"POST",  
                data:formData,  
                contentType:false,  
                cache: false,  
                processData: false,  
                success:function(data){  
                     $('#uploaded_file').html(data);  
                }  
           })  
      });  
 });  
 </script>  
 
 