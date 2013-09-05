<?php 
require "../includes/doctype.html.php";
?>
<head>
<?php
require "../includes/meta.html.php";
require "../includes/css.html.php";
?>

<title>Livros | Ruth Rocha</title>

</head>

<body>

<!-- topo -->
<?php include ("../includes/topo.php") ?>
<!-- /topo -->

<!-- container -->
<div id="container" class="clearfix livros">

<!-- breadcrumb -->
<div id="breadcrumb_livros">
<a href="/home" title="Home">Home</a> &rsaquo; Livros
</div>
<!-- /breadcrumb -->

<!-- conteudo -->
<div id="conteudo" style="width:580px;">

<h1>Livros</h1>

<table id="livros" width="580px">

<tr>
	<td width="100px"><a href="" alt="Titulo do Livro"><img src="img/marcacao_livro.jpg" alt="Titulo do Livro" style="width:40px" /></a></td>
    <td width="20px">&nbsp;</td>
    <td width="100px"><a href="" alt="Titulo do Livro"><img src="img/marcacao_livro.jpg" alt="Titulo do Livro" style="height:40px" /></a></td>
    <td width="20px">&nbsp;</td>
    <td width="100px"><a href="" alt="Titulo do Livro"><img src="img/marcacao_livro.jpg" alt="Titulo do Livro" /></a></td>
    <td width="20px">&nbsp;</td>
    <td width="100px"><a href="" alt="Titulo do Livro"><img src="img/marcacao_livro.jpg" alt="Titulo do Livro" /></a></td>
    <td width="20px">&nbsp;</td>
    <td width="100px"><a href="" alt="Titulo do Livro"><img src="img/marcacao_livro.jpg" alt="Titulo do Livro" /></a></td>
</tr> 
<tr height="20px">&nbsp;</tr>
<tr>
	<td width="100px"><a href="" alt="Titulo do Livro"><img src="img/marcacao_livro.jpg" alt="Titulo do Livro" /></a></td>
    <td width="20px">&nbsp;</td>
    <td width="100px"><a href="" alt="Titulo do Livro"><img src="img/marcacao_livro.jpg" alt="Titulo do Livro" /></a></td>
    <td width="20px">&nbsp;</td>
    <td width="100px"><a href="" alt="Titulo do Livro"><img src="img/marcacao_livro.jpg" alt="Titulo do Livro" /></a></td>
    <td width="20px">&nbsp;</td>
    <td width="100px"><a href="" alt="Titulo do Livro"><img src="img/marcacao_livro.jpg" alt="Titulo do Livro" /></a></td>
    <td width="20px">&nbsp;</td>
    <td width="100px"><a href="" alt="Titulo do Livro"><img src="img/marcacao_livro.jpg" alt="Titulo do Livro" /></a></td>
</tr>
<tr height="20px">&nbsp;</tr>      
<tr>
	<td width="100px"><a href="" alt="Titulo do Livro"><img src="img/marcacao_livro.jpg" alt="Titulo do Livro" style="width:40px" /></a></td>
    <td width="20px">&nbsp;</td>
    <td width="100px"><a href="" alt="Titulo do Livro"><img src="img/marcacao_livro.jpg" alt="Titulo do Livro" style="height:40px" /></a></td>
    <td width="20px">&nbsp;</td>
    <td width="100px"><a href="" alt="Titulo do Livro"><img src="img/marcacao_livro.jpg" alt="Titulo do Livro" /></a></td>
    <td width="20px">&nbsp;</td>
    <td width="100px"><a href="" alt="Titulo do Livro"><img src="img/marcacao_livro.jpg" alt="Titulo do Livro" /></a></td>
    <td width="20px">&nbsp;</td>
    <td width="100px"><a href="" alt="Titulo do Livro"><img src="img/marcacao_livro.jpg" alt="Titulo do Livro" /></a></td>
</tr> 

</table>

</div>
<!-- /conteudo -->

<!-- lateral -->
<div id="lateral">
<div class="box clearfix"><?php include ("../includes/box_livros_categorias.php") ?></div>
<div class="box clearfix"><?php include ("../includes/box_filtro.php") ?></div>
<div class="box clearfix"><?php include ("../includes/box_busca.php") ?></div>
</div>
<!-- /lateral -->

</div>
<!-- /container -->

<!-- rodape -->
<br /><br /><br />
<div title="" id="rodape_container" class="clearfix" style="background:url(../img/personagens/livros.png) bottom center no-repeat">
<?php include ("../includes/rodape.php") ?>
</div>
<!-- /rodape -->

</body>
</html>