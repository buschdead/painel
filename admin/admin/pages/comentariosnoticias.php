
<?php 

	#CONFIGURAÇÕES

	#Titulo da página
	define("TITLE", "COMENTÁRIOS");

	#Nome da tabela no banco
	define("TABLE", "comentariosnoticias");


	#Dados para a listagem
	$listagem = array(
		labels=>array("Noticia","Usuário", "Comentário", "Data", "Status"),
		campos=>array("noticiaID","usuarioID", "msg", "data", "status"),
		tipoCampo=>array("relacionamento", "titulo", "titulo", "date", "titulo"),
		tamanho=>array("20%","20%","25%","15%","15%"),
		relacionamento=>array("titulo|noticias")
	);

	if(@$_GET["acao"] == 'inserir'){

		#Dados para insert
		$insert = array(
			labels=>array("Notícia", "Comentário", "Status", ""),
			campos=>array("noticiaID", "msg", "status", "data"),
			tipoCampo=>array("selecao", "editor", "selecao", "dataCadastro"),
			required=>array("", "", "", "", "", "", ""),
			maxlength=>array("", "", "", "", "", ""),
			relacionamento=>array("table:titulo|noticias","","option:AGUARDANDO/AGUARDANDO,LIBERADO/LIBERADO","", "", "")
		);

	} else if(@$_GET["acao"] == 'editar'){

		#Dados para update
		$insert = array(
			labels=>array("Notícia", "Comentário", "Status"),
			campos=>array("noticiaID", "msg", "status"),
			tipoCampo=>array("selecao", "editor", "selecao"),
			required=>array("", "", "", "", "", "", ""),
			maxlength=>array("", "", "", "", "", ""),
			relacionamento=>array("table:titulo|noticias","","option:AGUARDANDO/AGUARDANDO,LIBERADO/LIBERADO","", "", "")
		);

	}

	include_once('modulos/construtor.php');



	//TIPOS DE CAMPOS PARA LISTAGEM
	// imagem -> thumb de campo imagem
	// date -> data formatada


	//TIPOS DE CAMPOS PARA INSERIR e EDITAR


	// date -> input date do html5
	// dateMasc -> dia/mes/ano - 20/10/2010
	// titulo -> input text
	// editor -> textarea ckeditor
	// texto -> textarea normal sem editor
	// url -> input url
	// email -> input e-mail nao valida e-mail
	// telefone -> telefone com mascara
	// telefoneSP -> telefone com mascara e 1 numero a mais para celulares de sp
	// cep -> campo cep com mascara
	// cpf -> campo cpf com mascara
	// cnpj -> campo cnpj com mascara
	// arquivo -> subir arquivo
	// selecao -> campo combo box 
		// como colocar dados combobox
		// no campo relacionamento relacionamento=>array("","","","")
		// colocar para trazer de uma outra tabela = relacionamento=>array("","","","table:campo|tabela")
		// sendo o campo o nome que vai imprimir, e a tabela a tabela que voce quer buscar os dados
		// *********** NAO ESQUECER QUE O id da tabela tem que ser padrao 'ID' se for diferente nao vai funciona o valor no option

?>
