
<?php 

	#CONFIGURAÇÕES

	#Titulo da página
	define("TITLE", "CADASTRO DE PLANOS");

	#Nome da tabela no banco
	define("TABLE", "plano");



	#Dados para a listagem
	$listagem = array(
		labels=>array("Nome","valor","Tipo"),
		campos=>array("nome","valor","tipo"),
		tipoCampo=>array("titulo","titulo","titulo"),
		tamanho=>array("60%","20%","15%","15%")
	);

	if(@$_GET["acao"] == 'inserir'){

		#Dados para insert
		$insert = array(
			labels=>array("Nome","Valor","Tipo","Nº Fotos Permitida *(99 para não ter limite)","Nº Anuncios Permitidos *(99 para não ter limite)","Nº Anuncios por dia *(99 para não ter limite)","Nº Dias para vencer a promoção",""),
			campos=>array("nome","valor","tipo","numFotos","numAnuncios","numAnuncioDia","numDias","dataCadastro"),
			tipoCampo=>array("titulo", "valor","selecao","titulo","titulo","titulo","titulo","dataCadastro"),
			required=>array("", "nao", "", "", "", "nao", "nao"),
			maxlength=>array("", "10", "", "2", "2", "2", "2", ""),
			relacionamento=>array("","","option:GRATUITO/GRATUITO,PAGO/PAGO,PROMOCIONAL/PROMOCIONAL","")
		);

	} else if(@$_GET["acao"] == 'editar'){

		#Dados para update
		$insert = array(
			labels=>array("Nome","Valor","Tipo","Nº Fotos Permitida *(99 para não ter limite)","Nº Anuncios Permitidos *(99 para não ter limite)","Nº Anuncios por dia *(99 para não ter limite)","Nº Dias para vencer a promoção"),
			campos=>array("nome","valor","tipo","numFotos","numAnuncios","numAnuncioDia","numDias"),
			tipoCampo=>array("titulo", "valor","selecao","titulo","titulo","titulo","titulo"),
			required=>array("", "nao", "", "", "", "nao", "nao"),
			maxlength=>array("", "10", "", "2", "2", "2", "2", ""),
			relacionamento=>array("","","option:GRATUITO/GRATUITO,PAGO/PAGO,PROMOCIONAL/PROMOCIONAL","")
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
