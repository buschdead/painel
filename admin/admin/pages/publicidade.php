<?php 
	
	if(@$_GET['tipo'] == true){
		$tipoPub = $_GET['tipo'];
		switch ($tipoPub) {
			case 1:
				$name = 'TOPO 970 x 90';
				$tamanhoImg = 'crop:970/90';
				$option1 = 'option:1/TOPO 970 x 90';
				break;
			case 2:
				$name = 'LATERAL 320 x 260';
				$tamanhoImg = 'crop:320/260';
				$option1 = 'option:2/LATERAL 320 x 260';
				break;
			case 3:
				$name = 'LATERAL 320 x 150';
				$tamanhoImg = 'crop:320/150';
				$option1 = 'option:3/LATERAL 320 x 150';
				break;
			case 4:
				$name = 'MEIO 200 x 120';
				$tamanhoImg = 'crop:200/120';
				$option1 = 'option:4/MEIO 200 x 120';
				break;
			case 5:
				$name = 'MEIO 420 x 65';
				$tamanhoImg = 'crop:420/65';
				$option1 = 'option:5/MEIO 420 x 65';
				break;
			case 6:
				$name = 'INTERNAS 650 x 80';
				$tamanhoImg = 'crop:650/80';
				$option1 = 'option:6/INTERNAS 650 x 80';
				break;
		}
	}

	#CONFIGURAÇÕES

	#Titulo da página
	define("TITLE", "CADASTRO PUBLICIDADE ".$name);

	#Nome da tabela no banco
	define("TABLE", "publicidade");



	#Dados para a listagem
	$listagem = array(
		labels=>array("SubSeção","Nome","Link","Data Inicio","Data Final"),
		campos=>array("secaoNoticias","nome","url","data","dataExp"),
		tipoCampo=>array("relacionamento","","","date","date"),
		tamanho=>array("17%","20%","15%","15%","15%"),
		relacionamento=>array("nome|subsecoes")
	);

	if(@$_GET["acao"] == 'inserir'){

		#Dados para insert
		$insert = array(
			labels=>array("SubSeção","Nome","Arquivo","Link","Target","Posição","Data Inicio","Data Final","status"),
			campos=>array("secaoNoticias","nome","arquivo","url","target","posicao","data","dataExp","status"),
			tipoCampo=>array("selecao","titulo","arquivo","url","titulo","selecao","date","date","selecao"),
			required=>array("", "", "", "nao", "nao", "", "", "", ""),
			maxlength=>array("", "", "", "", "", "", "", "", ""),
			relacionamento=>array("table:nome|subsecoes","","","","",$option1,"","","option:ATIVO/ATIVO,INATIVO/INATIVO"),
			imagemTam=>array("","",$tamanhoImg,"")			
		);

	} else if(@$_GET["acao"] == 'editar'){

		#Dados para update
		$insert = array(
			labels=>array("SubSeção","Nome","Arquivo","Link","Target","Posição","Data Inicio","Data Final","status"),
			campos=>array("secaoNoticias","nome","arquivo","url","target","posicao","data","dataExp","status"),
			tipoCampo=>array("selecao","titulo","arquivo","url","titulo","selecao","date","date","selecao"),
			required=>array("", "", "nao", "nao", "nao", "", "", "", ""),
			maxlength=>array("", "", "", "", "", "", "", "", ""),
			relacionamento=>array("table:nome|subsecoes","","","","",$option1,"","","option:ATIVO/ATIVO,INATIVO/INATIVO"),
			imagemTam=>array("","",$tamanhoImg,"")			
		);
		echo $tamanhoImg;
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
