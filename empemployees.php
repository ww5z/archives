<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/bootstrap-rtl.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/dashboard.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right flip">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right flip">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">ملفات الموظفين</h1>

          
          
          
          
          
          
          
            

<br /> 

<form class="form-inline">
    
    <div class="form-group" id="messge_icons">
      <input type="text" class="form-control" id="NoComputer" placeholder="رقم الحاسب">
      <span class="glyphicon glyphicon-ok form-control-feedback tchcktoright" aria-hidden="true"></span>
      <span id="inputSuccess2Status" class="sr-only">(success)</span>
      <span id="no_tchck"></span>

  </div>
  <div class="form-group" >
      <input type="text" class="form-control" id="card_number" placeholder="رقم البطاقة">
  </div>  

    <button type="button" id="edit_employees" value="0" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" disabled="disabled">تحرير البيانات</button>

</form>

<br /> 

<table class="table table-bordered rtl_table">
    
  <thead>
      <tr> 
          <th>اسم الموظف</th> <th>جهة الموظف</th> <th>المرتبة</th> <th>رقم الوظيفة</th>  <th>مسمى الوظيفة</th>  <th>ملاحظـــات</th> 
      </tr> 
  </thead>
  
  <tbody> 
      <tr> 
          <th scope="row" id="incumbent">Null</th> <td id="description_hand_employee">Null</td> <td id="grade">Null</td> <td id="idJob">Null</td>  <td id="JobTitle">Null</td> <td>Null</td> 
      </tr> 
  </tbody>
  
</table>
    <br />   


    
    
    <div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">تعديل البيانات</h4>
      </div>

<div class="modal-body">
        <div id="insert_messg"></div>
    <form class="form-inline" id="form_edit_employees">
	
            <div class="list-group listt_grouPP">
                    <div class="form-group">
                            <label for="recipient-name" class="control-label">رقم الحاسب:</label>
                            <input type="text" class="form-control" name="form_NoComputer" id="form_NoComputer" size="20">
                    </div>
                    <div class="form-group">
                            <label for="recipient-name" class="control-label">رقم البطاقة:</label>
                            <input type="text" class="form-control" name="form_card_number" id="form_card_number" size="20">
                    </div>
            </div>

            <div class="list-group">
                    <div class="form-group">
                            <label for="recipient-name" class="control-label">اسم الموظف:</label>
                            <input type="text" class="form-control" name="form_incumbent" id="form_incumbent">
                    </div>
                    <div class="form-group">
                            <label for="recipient-name" class="control-label">جهة الموظف:</label>
                            <input type="text" class="form-control" name="form_description_hand_employee" id="form_description_hand_employee">
                    </div>
            </div>

            <div class="list-group">
                    <div class="form-group">
                            <label for="recipient-name" class="control-label">المرتبة:</label>
                            <input type="text" class="form-control" name="form_grade" id="form_grade">
                    </div>
                    <div class="form-group">
                            <label for="recipient-name" class="control-label">رقم الوظيفة:</label>
                            <input type="text" class="form-control"  name="form_idJob" id="form_idJob">
                    </div>
            </div>

            <div class="list-group">
                    <div class="form-group">
                            <label for="recipient-name" class="control-label">مسمى الوظيفة:</label>
                            <input type="text" class="form-control" name="form_JobTitle" id="form_JobTitle">
                    </div>
                    <div class="form-group">
                            <label for="message-text" class="control-label">ملاحظـــات:</label>
                            <textarea class="form-control" name="form_notes" id="form_notes"></textarea>
                    </div>
            </div>
        
        <input type="hidden" name="form_id_employees_hid" id="form_id_employees_hid" value="" />

    </form>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="form_id_employees">حفــظ التعديـلات</button>
      </div>
    </div>
  </div>
</div>
          
          
          
          
          
          
          

          <h2 class="sub-header">عرض الملفات</h2>
          
          <div id="procedure"></div>
          
          
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="./js/vendor/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
    <script src="./js/empemployees.js"></script>
  </body>
</html>

<script>
    $( document ).ready( function(){
        //alert('dd');
    } );
</script>