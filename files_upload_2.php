<?php
$page_title = 'ملفات الموظف'; 
require_once ('header.php');
?>

<body>

	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="">Ajax Upload</a>
	    </div>	
	  </div>
	</nav>

	<div class="container-fluid admin-gcontainer">
		<div class="container">
		<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Add Post</h3>
		</div>
		<div class="panel-body">	
		  	<form class="form-rtl has-validation-callback" method="post" action="" id="form-add-post" enctype="multipart/form-data">
					<div class="row form-group">
						<label for="post_name" class="col-sm-2 control-label">Post Name :</label>
						<div class="col-sm-10">
							  <input type="text" class="form-control" id="post_name" name="post_name" placeholder="post-name" >
						</div>
				    </div>						
					<div class="row form-group">
						<label for="post_title" class="col-sm-2 control-label">Post Title :</label>
						<div class="col-sm-10">
							  <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Post Title" >
						</div>
				    </div>	
					<div class="row form-group">
						<label for="post_content" class="col-sm-2 control-label">Post Content : </label>
						<div class="col-sm-10">
							  <textarea class="form-control" rows="8" id="post_content" name="post_content" placeholder="Post Content"></textarea>
						</div>
				    </div>
					<div class="row form-group">
						<label for="post_image" class="col-sm-2 control-label">Post Image : </label>
						<div class="col-sm-10">
							  <img id="post_image_preview" src="img/thumbs/no_thumb.jpg" alt="post Image" />				
							  <input type="file" onchange="readURL(this);" name="post_image" id="post_image">
						</div>
				    </div>
					<div class="row form-group text-center">
						<div class="col-sm-10 cmd_btn">
							<button id="btn-save-post" type="submit" class="btn btn-primary">Save</button>
						</div>
					</div>
		    </form>
		</div>
		</div>
		</div>
	</div>
	

	<div class="container-fluid footer text-center">
		<div class="container">
			<p>&copy; Copyright Something 2016</p>
		</div>
	</div>

	<div id="loading"></div>
	<div id="overlay"></div>

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/files_upload_2.js"></script>



</body>
</html>