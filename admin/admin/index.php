<?php 

	session_start();
	ob_start();
	
	include_once("../config/conexao.php");
	include_once("../config/funcoesGerais.php");
	include_once("../config/urlAmigavel.php");
	include_once("modulos/funcoesAdmin.php");
	
	if($AuthAdmin->MostraResultado() == false){
		unset($_SESSION["email_admin"], $_SESSION["senha_admin"]);
		header("Location: login.php");
	}
	
	@date_default_timezone_set('America/Sao_Paulo');

?>
<!DOCTYPE html>
<html lang="pt">
<head>

<!-- Meta -->
<meta name="author" content="Webinga - www.webinga.com.br" />
<meta charset="UTF-8" />

<!-- Title -->
<title><?php print_r(TITULO.' - '.VERSAO); ?></title>

<!-- Css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<!-- Font -->
<link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css" />

<!-- Js -->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-tab.js"></script>
<script src="js/scripts.js"></script>
<script src="ckeditor/ckeditor.js"></script>


</head>
<body>

<div class="container">

<header>
    <div class="logo"><a href="index.php"></a></div>

    <div class="btn-group" id="button-sair"><a class="btn btn-danger" href="index.php?secao=modulos/sair">Sair</a></div>
    
    <div class="btn-group" id="button-administracao">
        <button class="btn dropdown-toggle" data-toggle="dropdown">Administra&ccedil;&atilde;o <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="index.php?secao=modulos/admin&acao=lista">Usu&aacute;rios</a></li>
            <li><a href="index.php?secao=modulos/system">Configura&ccedil;&otilde;es</a></li>
            <li class="divider"></li>
            <li><a href="../" target="_blank">Ir para o site</a></li>
        </ul>
    </div>
    
</header>

<div class="navbar">
	<div class="navbar-inner">
		<div class="nav-collapse collapse">
			<ul class="nav pull-left">
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">SEÇÃO<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?secao=pages/secoes&acao=lista">Cadastro Seção</a></li>
						<li><a href="index.php?secao=pages/subsecoes&acao=lista">Cadastro de Subseção</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">NOTÍCIAS<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?secao=pages/noticias&acao=lista">Cadastro Notícias</a></li>
						<li><a href="index.php?secao=pages/fotosnoticias&acao=lista">Fotos Notícias</a></li>
						<li><a href="index.php?secao=pages/comentariosnoticias&acao=lista">Comentários Notícias</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">VÍDEOS<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?secao=pages/secoesvideo&acao=lista">Cadastro Seção</a></li>
						<li><a href="index.php?secao=pages/videos&acao=lista">Cadastro de vídeos</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">CLASSÍFICADOS<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?secao=pages/categoria_classificados&acao=lista">Cadastro de categoria</a></li>
						<li><a href="index.php?secao=pages/anuncio&acao=lista">Cadastro de anúncios</a></li>
						<li><a href="index.php?secao=pages/plano&acao=lista">Cadastro de planos</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">PUBLICIDADE<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?secao=pages/publicidade&acao=lista&tipo=1">TOPO 970 x 90</a></li>
						<li><a href="index.php?secao=pages/publicidade&acao=lista&tipo=2">Lateral 300 x 260</a></li>
						<li><a href="index.php?secao=pages/publicidade&acao=lista&tipo=3">Lateral 300 x 150</a></li>
						<li><a href="index.php?secao=pages/publicidade&acao=lista&tipo=4">Meio Home 200 x 120</a></li>
						<li><a href="index.php?secao=pages/publicidade&acao=lista&tipo=5">Meio Home 420 x 65</a></li>
						<li><a href="index.php?secao=pages/publicidade&acao=lista&tipo=6">Interna 650 x 80</a></li>
					</ul>
				</li>
				<li><a href="index.php?secao=pages/usuarios&acao=lista">USUÁRIO</a></li>
			</ul>
		</div>
	</div>
</div>

<div id="content">
<?php 
	$pg = anti_inject(@$_GET["secao"]);
	if(file_exists("$pg.php") == true){
		@include_once("$pg.php");
	}elseif($pg == false){
		header("Location: index.php?secao=pages/home");
	}else{
		header("Location: index.php?secao=pages/home");
	}
?>
</div>

</div>

</body>
</html>