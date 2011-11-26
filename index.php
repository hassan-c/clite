<!DOCTYPE html>
<html>
<head>
	<title>clite - lightweight comment app</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		function dorel()
		{
			$('#comments').load('comments.php');
		}
		setInterval(dorel, 1000);
		$('#postform').submit(function(event){
			event.preventDefault();
			if ($('#name').val() == '' || $('#message').val() == '')
			{
				if (!($('#error').is(':visible')))
					$('#error').fadeIn('fast').delay(1000).fadeOut('fast');
				return false;
			}
			 $.post( "post_comment.php", { name: $('#name').val(), message: $('#message').val() },
		      function( data ) {
		          $('#message').val('');
		      }
		    );
		});
	});
	</script>
</head>
<body>

<form action="post_comment.php" method="post" id="postform">
<input type="text" name="name" id="name" placeholder="name" /><br />
<input type="text" id="message" placeholder="message" /></br />
<input type="submit" name="post" value="Post Comment" /><span id="error" style="display:none;">Please fill in both fields.</span>
</form>

<br />
<div id="comments"><?php readfile('comments.php'); ?></div>

</body>
</html>