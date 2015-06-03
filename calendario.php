<html>
	<head>
		<link rel="stylesheet" href="picker/jquery-ui.css" />
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<script src="picker/jquery-1.8.2.js"></script>
		<script src="picker/jquery-ui.js"></script>
		<meta charset="utf-8" />
		<title>Calendário jQuery</title>
	
		<script>
			$(function() {
				
				$("#inicial").datepicker({
					dateFormat: 'dd/mm/yy', 
					dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'], 
					dayNamesMin: ['D','S','T','Q','Q','S','S','D'], 
					dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'], 
					monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'], monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'] 
				});	
			});
				
			$(function() {
				$("#final").datepicker({
					dateFormat: 'dd/mm/yy', 
					dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'], 
					dayNamesMin: ['D','S','T','Q','Q','S','S','D'], 
					dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'], 
					monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'], monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'] 
				});	
			}); 
			
		</script>

	</head>
<body>
	<form action="" method="GET">
		<input type="text" id="inicial" name="inicial"/>
		<input type="text" id="final" name="final"/>
		<input type="submit" value="pesquisar">
	
	</form>
</body> 
</html>