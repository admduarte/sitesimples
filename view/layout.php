<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
		<title>Site simples - Code Education - Trilhando Caminho com PHP</title>
		<!-- JQUERY -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script>
		<!-- TWITTER BOOTSTRAP CSS -->
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		<!-- TWITTER BOOTSTRAP JS -->
		<script src="js/bootstrap.min.js"></script>
        <script language="JavaScript">
        function executaBusca()
        {
            location.href = '/busca?texto=' + document.getElementById('busca').value;
        }
        </script>
</head>
<body>
	<!-- HEADER -->
	<header class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div class="navbar">
					<div class="navbar-inner">
                        <div class="container"> <h2>SiteSimples S.A.</h2> </div>
                        <div> <h6>Pesquisa no site por
                            <input id="busca" name="busca" type="text" placeholder="..." class="input-small" required="">
                            <input id="exebusca" name="exebusca" type="button" value="Buscar" onclick="executaBusca()">
                            </h6>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- / HEADER -->
	
	<!-- CLASSE QUE DEFINE O CONTAINER COMO FLUIDO (100%) -->
	<div class="container-fluid">
		<!-- CLASSE PARA DEFINIR UMA LINHA -->
		<div class="row-fluid">
			<!-- COLUNA OCUPANDO 2 ESPAÇOS NO GRID -->
			<div class="span2"> <h2> Menu </h2>
				<ul class="nav nav-tabs nav-stacked">
<?php echo $insMenu; ?>
				</ul> 
			</div>
			
			<!-- COLUNA OCUPANDO 10 ESPAÇOS NO GRID -->
			<div class="span10"> 
				<div class="well">
					<h1> 
<?php echo $titulo; ?>
					</h1>
					<hr />
<?php echo $codigoHtml; ?>
					<hr />
				</div>
			</div>
		</div>
	</div>

	<!-- FOOTER -->
	<footer class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div class="navbar">
						<div class="well"> Todos os direitos reservados - <?php echo date("Y"); ?> </div>
				</div>
			</div>
		</div>
	</footer>
	<!-- / FOOTER -->

</body>
</html>


