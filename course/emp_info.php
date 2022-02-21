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
	<br><br><br>
	<h3 class="welcome">Список співробітників та докладна інформація про них</h3><br>

	<div class="row"></div>
	<div class="row">
		<div class="col-sm-3 col_1_3"><br>
			<?php 
			require_once('emp_list.php');
			?>

		</div>
		<div class="col-sm-6 col_2"><br>

			<?php
			if(!empty($_GET['id'])){
				$id=$_GET['id'];
				$sql="SELECT * FROM employees WHERE emp_code='$id'";
				$res=mysqli_query($connect,$sql);
				$result=mysqli_fetch_assoc($res);
				$emp_pipp=$result['emp_pip'];
				$emp_agee=$result['emp_age'];
				$emp_sexx=$result['emp_sex'];
				$emp_addresss=$result['emp_address'];
				$emp_phonee=$result['emp_phone'];			
				$emp_passportt=$result['emp_passport'];
				$emp_positt=$result['emp_posit'];
				$emp_rankk=$result['emp_rank'];

				echo "<p class='p_margin_stat2'>"."<strong>ПІП співробітника: &emsp;</strong>".$emp_pipp."<br/><br/>"."<strong>Вік: &emsp;</strong>".$emp_agee."<br/><br/>"."<strong>Стать: &emsp;</strong>".$emp_sexx."<br/><br/>"."<strong>Адреса проживання: &emsp;</strong>".$emp_addresss."<br/><br/>"."<strong>Номер телефону: &emsp;</strong>".$emp_phonee."<br/><br/>"."<strong>Номер паспорта: &emsp;</strong>".$emp_passportt."<br/><br/>"."<strong>Посада: &emsp;</strong>".$emp_positt."<br/><br/>"."<strong>Звання: &emsp;</strong>".$emp_rankk."</p>";
			}
			?>


		</div>
		<div class="col-sm-3 col_1_3"><br>

			<p class="p_margin1"><strong>Календар</strong></p>

			<table id="calendar3">
				<thead>
					<tr><td colspan="4"><select>
						<option value="0">Січень</option>
						<option value="1">Лютий</option>
						<option value="2">Березень</option>
						<option value="3">Квітень</option>
						<option value="4">Травень</option>
						<option value="5">Червень</option>
						<option value="6">Липень</option>
						<option value="7">Серпень</option>
						<option value="8">Вересень</option>
						<option value="9">Жовтень</option>
						<option value="10">Листопад</option>
						<option value="11">Грудень</option>
					</select><td colspan="3"><input type="number" value="" min="0" max="9999" size="4">
						<tr><td>Пн<td>Вт<td>Ср<td>Чт<td>Пт<td>Сб<td>Нд
							<tbody>
							</table>

							<script>
								function Calendar3(id, year, month) {
									var Dlast = new Date(year,month+1,0).getDate(),
									D = new Date(year,month,Dlast),
									DNlast = D.getDay(),
									DNfirst = new Date(D.getFullYear(),D.getMonth(),1).getDay(),
									calendar = '<tr>',
									m = document.querySelector('#'+id+' option[value="' + D.getMonth() + '"]'),
									g = document.querySelector('#'+id+' input');
									if (DNfirst != 0) {
										for(var  i = 1; i < DNfirst; i++) calendar += '<td>';
									}else{
										for(var  i = 0; i < 6; i++) calendar += '<td>';
									}
								for(var  i = 1; i <= Dlast; i++) {
									if (i == new Date().getDate() && D.getFullYear() == new Date().getFullYear() && D.getMonth() == new Date().getMonth()) {
										calendar += '<td class="today">' + i;
									}else{
										if (
											(i == 1 && D.getMonth() == 0 && ((D.getFullYear() > 1897 && D.getFullYear() < 1930) || D.getFullYear() > 1947)) ||
											(i == 2 && D.getMonth() == 0 && D.getFullYear() > 1992) ||
											((i == 3 || i == 4 || i == 5 || i == 6 || i == 8) && D.getMonth() == 0 && D.getFullYear() > 2004) ||
											(i == 7 && D.getMonth() == 0 && D.getFullYear() > 1990) ||
											(i == 23 && D.getMonth() == 1 && D.getFullYear() > 2001) ||
											(i == 8 && D.getMonth() == 2 && D.getFullYear() > 1965) ||
											(i == 1 && D.getMonth() == 4 && D.getFullYear() > 1917) ||
											(i == 9 && D.getMonth() == 4 && D.getFullYear() > 1964) ||
											(i == 7 && D.getMonth() == 10 && (D.getFullYear() > 1926 && D.getFullYear() < 2005)) ||
											(i == 8 && D.getMonth() == 10 && (D.getFullYear() > 1926 && D.getFullYear() < 1992)) ||
											(i == 4 && D.getMonth() == 10 && D.getFullYear() > 2004)
											) {
											calendar += '<td class="holiday">' + i;
									}else{
										calendar += '<td>' + i;
									}
								}
								if (new Date(D.getFullYear(),D.getMonth(),i).getDay() == 0) {
									calendar += '<tr>';
								}
							}
							for(var  i = DNlast; i < 7; i++) calendar += '<td>&nbsp;';
								document.querySelector('#'+id+' tbody').innerHTML = calendar;
							g.value = D.getFullYear();
							m.selected = true;
							if (document.querySelectorAll('#'+id+' tbody tr').length < 6) {
								document.querySelector('#'+id+' tbody').innerHTML += '<tr><td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;';
							}
							document.querySelector('#'+id+' option[value="' + new Date().getMonth() + '"]').style.color = 'rgb(220, 0, 0)';
						}
						Calendar3("calendar3",new Date().getFullYear(),new Date().getMonth());
						document.querySelector('#calendar3').onchange = function Kalendar3() {
							Calendar3("calendar3",document.querySelector('#calendar3 input').value,parseFloat(document.querySelector('#calendar3 select').options[document.querySelector('#calendar3 select').selectedIndex].value));
						}
					</script> <br>
					<div>

						<img src="herb.png" title="Герб України" width="200" height="250" style="display: block;
						margin: 0 auto; ">

						<br>

						<img src="prapor.jpg" title="Прапор України" width="270" height="170" style="display: block;
						margin: 0 auto; "><br>

					</div>
				</div>
			</div>
			<a href="#" class="scrollup">Наверх</a>

		</body>
		</html>