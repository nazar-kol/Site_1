<?php
require("connect.php");
require_once("header.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Облік порушень</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){

			$(window).scroll(function(){
				if ($(this).scrollTop() > 100) {
					$('.scrollup').fadeIn();
				} else {
					$('.scrollup').fadeOut();
				}
			});

			$('.scrollup').click(function(){
				$("html, body").animate({ scrollTop: 0 }, 600);
				return false;
			});
		});
	</script>

</head>
<body>
	<ul class="nav nav-pills flex-column">
		<?php 
		$sql="SELECT * FROM offender";
		$res=mysqli_query($connect,$sql);
		while($result=mysqli_fetch_assoc($res)){
			?>
			<li class="nav-item">
				<a class="nav-link p_margin_stat1" href="off_info.php?id=<?php echo $result['off_code'];?>"><?php echo $result['off_pip'];?></a> </li>
			<?php }?>
		</ul>

		<a href="#" class="scrollup">Наверх</a>
	</body>
	</html>