$(document).ready(function(){

	$('#form-add-post').submit(function(){
		SavePost();
		return false;
	});
	
});

	function SavePost() {

		var fd = new FormData(document.querySelector('#form-add-post')); // using the FormData API to submit form
		/*var fd = new FormData(); 
		fd.append("post_name", $('#post_name').val());
		fd.append("post_title", $('#post_title').val());
		fd.append("post_content", $('#post_content').val());
		fd.append("post_image", $('#post_image')[0].files[0]);
		*/
		loader_show();
	   
       $.ajax({
				url :'Model/files_upload/post_2.php',
				type: 'post',
				data : fd,
				processData: false,
				contentType: false,
				success : function(data)
				{
					loader_hide();
					//alert(data);
						//$('body').html(data);
						
					
					if (data == 1)
					{
						alert("Donne !");
						window.location.reload();
					}
					else
					{	
						//$('body').html(data);
						$("#form-add-post").prepend('<div class="form-error alert alert-danger"><strong>Oops. There are a problem.. retry !</strong></div>');
					}
					
					
				},
				dataType : 'html'
		});
	}
	
	function loader_show()
	{
		$('#loading').show();
	}

	function loader_hide()
	{
		$('#loading').hide();
	}

    function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onloadend = function (e) {
				$('#post_image_preview').attr('src', e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}
    }