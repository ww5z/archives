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
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
<div id="publishing" class="tab-pane active">
			<div class="row-fluid">

                            

                            
                            
<div class="span6">

    <div class="control-group">
        <div class="control-label">
        <label id="jform_publish_up-lbl" for="NoComputer" class="hasTooltip" title="" data-original-title="بحث بالرقم">بحث بالرقم</label>
        </div>
        <div class="controls">
            <div class="input-append" id="input_no">
            <input title="" class="menu" type="text" id="NoComputer" name="NoComputer" 
         value="<?php if (isset($ResolutionNO)) echo htmlspecialchars($ResolutionNO); ?>" />
            <span id="NoCoMsg" style="color: red;"></span>
            
            <span id="alert_subject" style="color: red;"></span>
            
            </div>
        </div>
    </div>
    

    
    <div class="control-group">
        <div class="control-label">
        <label id="jform_publish_up-lbl" for="ResolutionNO" class="hasTooltip" title="" data-original-title="رقم قرار المعاملة">رقم القرار</label>
        </div>
        <div class="controls">
            <div id="d_RN" class="input-append">
            <input type="text" title="رقم قرار المعاملة" class="menuRe" id="ResolutionNO" name="ResolutionNO" maxlength="60"
               value="" />
            <select name="date_ResolutionNO" class="menuRe" id="date_ResolutionNO" title="تاريخ قرار المعاملة">
                    <?php
                    foreach($date_Re_1 as $model) {
                    echo '<option';
                    if ($date_Re == $model) {
                    echo ' selected';
                    }
                    
                    echo '>'.$model.'</option>';
                    }
                    ?>
            </select>
            </div>
        </div>
    </div>    
    
    
    
    
    
    
    
    
    
    
    
    <div class="control-group">
        <div class="control-label">
        <label id="jform_publish_up-lbl" for="subject" class="hasTooltip" title="" data-original-title="الموضوع">الموضوع</label>
        </div>
        <div class="controls">
            <div class="input-append">
            <input title="" class="subject" type="text" id="subject" name="subject"  tabindex="2" 
         value="" />
            </div>
        </div>
    </div>


    
    <div class="control-group">
        <div class="control-label">
        <label id="jform_publish_up-lbl" for="appendNO" class="hasTooltip">قرار الحاقي</label>
        </div>
        <div class="controls">
            <div id="d_RN" class="input-append">
            <input type="text" title="رقم القرار الإلحاقي" class="menuRe" id="appendNO" name="appendNO" maxlength="60"
               value="" />
            <select name="date_appendNO" class="menuRe" id="date_appendNO" title="تاريخ القرار الإلحاقي">
            
                <option value="0" selected="selected">  </option>
                <option value="1435">1435</option>
                <option value="1436">1436</option>
                <option value="1437">1437</option>
                <option value="1438">1438</option>
                <option value="1439">1439</option>
            </select>
            </div>
        </div>
    </div>
    
    

<div class="control-group">
    <div class="control-label">
    <label id="" for="" class="hasTooltip" title="">تاريخ الإنشاء</label>
    </div>
    <div class="controls">
    <div class="input-append">
        <input type="text" title="" name="" id="jform_created" value="" readonly="">
    
    </div>
    </div>
</div>
    
    
 


			

</div>
                            
				
                




<div class="span6">
			

    
    


<div class="control-group">
<div class="control-label">
    <label id="jform_metadata_xreference-lbl" for="m_fo" class="hasTooltip" title="">ملاحظـــات</label>
</div>
<div class="controls">
    

   
    <textarea cols="30" id="m_fo" name="m_fo" placeholder="هذه الملاحظات تنتقل إلى التسلسل" cols="30" rows="3">
    </textarea>
</div>
</div>    
                    


    <div class="control-group">
        <div class="control-label">
            <label id="jform_metadata_xreference-lbl" for="card_number" class="hasTooltip" title="">الموظــــف</label>
        </div>
        <div class="controls">
            <input type="text" id="employee_number" name="employee_number"  placeholder="الحاسب" size="7" maxlength="60" value="" />
            <input type="text" id="card_number" name="card_number"  placeholder="السجل المدني" size="10" maxlength="60" value="" />
            <input type="text" id="employee_name" name="employee_name"  placeholder="" size="20" maxlength="60" value="" />
            <span id="link_emolyee_img"></span>
        </div>
    </div>
                <input type="hidden" id="id_employees" name="id_employees"  placeholder="" size="10" maxlength="60" value="0" />
    
    
    

    
                
                
                </div>

                        </div>
    


</div>
              
          </div>
          
          
          

          <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>libero</td>
                  <td>Sed</td>
                  <td>cursus</td>
                  <td>ante</td>
                </tr>
                <tr>
                  <td>1,004</td>
                  <td>dapibus</td>
                  <td>diam</td>
                  <td>Sed</td>
                  <td>nisi</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>Nulla</td>
                  <td>quis</td>
                  <td>sem</td>
                  <td>at</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
                  <td>imperdiet</td>
                  <td>Duis</td>
                </tr>
                <tr>
                  <td>1,007</td>
                  <td>sagittis</td>
                  <td>ipsum</td>
                  <td>Praesent</td>
                  <td>mauris</td>
                </tr>
                <tr>
                  <td>1,008</td>
                  <td>Fusce</td>
                  <td>nec</td>
                  <td>tellus</td>
                  <td>sed</td>
                </tr>
                <tr>
                  <td>1,009</td>
                  <td>augue</td>
                  <td>semper</td>
                  <td>porta</td>
                  <td>Mauris</td>
                </tr>
                <tr>
                  <td>1,010</td>
                  <td>massa</td>
                  <td>Vestibulum</td>
                  <td>lacinia</td>
                  <td>arcu</td>
                </tr>
                <tr>
                  <td>1,011</td>
                  <td>eget</td>
                  <td>nulla</td>
                  <td>Class</td>
                  <td>aptent</td>
                </tr>
                <tr>
                  <td>1,012</td>
                  <td>taciti</td>
                  <td>sociosqu</td>
                  <td>ad</td>
                  <td>litora</td>
                </tr>
                <tr>
                  <td>1,013</td>
                  <td>torquent</td>
                  <td>per</td>
                  <td>conubia</td>
                  <td>nostra</td>
                </tr>
                <tr>
                  <td>1,014</td>
                  <td>per</td>
                  <td>inceptos</td>
                  <td>himenaeos</td>
                  <td>Curabitur</td>
                </tr>
                <tr>
                  <td>1,015</td>
                  <td>sodales</td>
                  <td>ligula</td>
                  <td>in</td>
                  <td>libero</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="./js/vendor/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
