<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled</title>

<link href="css/lightbox.css" rel="stylesheet"/>
<link href="estilo.css" rel="stylesheet"></link>

<script>

function deshabilitaRetroceso(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="no-back-button";}
}

</script>

<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="generator" content="Web Page Maker">
<style type="text/css">
/*----------Text Styles----------*/
.ws6 {font-size: 8px;}
.ws7 {font-size: 9.3px;}
.ws8 {font-size: 11px;}
.ws9 {font-size: 12px;}
.ws10 {font-size: 13px;}
.ws11 {font-size: 15px;}
.ws12 {font-size: 16px;}
.ws14 {font-size: 19px;}
.ws16 {font-size: 21px;}
.ws18 {font-size: 24px;}
.ws20 {font-size: 27px;}
.ws22 {font-size: 29px;}
.ws24 {font-size: 32px;}
.ws26 {font-size: 35px;}
.ws28 {font-size: 37px;}
.ws36 {font-size: 48px;}
.ws48 {font-size: 64px;}
.ws72 {font-size: 96px;}
.wpmd {font-size: 13px;font-family: Arial,Helvetica,Sans-Serif;font-style: normal;font-weight: normal;}
/*----------Para Styles----------*/
DIV,UL,OL /* Left */
{
 margin-top: 0px;
 margin-bottom: 0px;
}
</style>

<style type="text/css">
div#container
{
	position:relative;
	width: 1365px;
	margin-top: 0px;
	margin-left: auto;
	margin-right: auto;
	text-align:left; 
}
body {text-align:center;margin:0}
</style>

</head>
<body bgColor="#000000" onload="deshabilitaRetroceso()">

<?php

if(isset($_REQUEST['cerrar'])){
header("location:index.php");
}

if(isset($_REQUEST['produc'])){
header("location:productos.php");
}

if(isset($_REQUEST['clien'])){
header("location:clientes.php");
}

if(isset($_REQUEST['vende'])){
header("location:vendedores.php");
}

if(isset($_REQUEST['usu'])){
header("location:usuarios.php");
}

if(isset($_REQUEST['cerrar'])){
header("location:index.php");
}

if(isset($_REQUEST['repven'])){
header("location:reporte.php");
}

if(isset($_REQUEST['reprodu'])){
header("location:ventas.php");
}

if(isset($_REQUEST['factu'])){
header("location:factura.php");
}

?>

<div id="container">
<div id="shape1" style="position:absolute; overflow:hidden; left:144px; top:44px; width:1106px; height:645px; z-index:0"><img border=0 width="100%" height="100%" alt="" src="images/shape4762632.gif"></div>

<div id="image4" style="position:absolute; overflow:hidden; left:144px; top:38px; width:1106px; height:93px; z-index:1"><img src="images/img18090765.jpg" alt="" title="" border=0 width=1106 height=93></div>

<div id="hr1" style="position:absolute; overflow:hidden; left:0px; top:23px; width:1364px; height:23px; z-index:2">
<hr size=10 width=1364 color="#99CC00">
</div>

<form name="form1" target="_top" method="POST" action="inicio.php" style="margin:0px">
<div id="formimage7" style="position:absolute; left:1047px; top:9px; z-index:4"><input type="image" name="formimage7" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage6" style="position:absolute; left:905px; top:9px; z-index:4"><input type="image" name="formimage6" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage1" style="position:absolute; left:764px; top:9px; z-index:5"><input type="image" name="formimage1" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage2" style="position:absolute; left:623px; top:9px; z-index:6"><input type="image" name="formimage2" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage3" style="position:absolute; left:482px; top:9px; z-index:7"><input type="image" name="formimage3" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage4" style="position:absolute; left:341px; top:8px; z-index:8"><input type="image" name="formimage4" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage5" style="position:absolute; left:200px; top:8px; z-index:9"><input type="image" name="formimage5" width="137" height="54" src="images/boton.jpg"></div>
<input name="cerrar" type="submit" class="button green" value="Cerrar Session" style="position:absolute;left:285px;top:350px;z-index:25">
<input name="produc" type="submit" class="button orange" value="Productos" style="position:absolute;left:542px;top:350px;z-index:26">
<input name="clien" type="submit" class="button black" value="Clientes" style="position:absolute;left:297px;top:604px;z-index:27">
<input name="vende" type="submit" class="button darkblue" value="Vendedores" style="position:absolute;left:776px;top:350px;z-index:28">
<input name="factu" type="submit" class="button blue" value="Facturacion" style="position:absolute;left:1024px;top:350px;z-index:29">
<input name="usu" type="submit" class="button teal" value="Usuarios" style="position:absolute;left:547px;top:601px;z-index:30">
<input name="repven" type="submit" class="button pink" value="Reporte Ventas" style="position:absolute;left:784px;top:599px;z-index:31">
<input name="reprodu" type="submit" class="button green" value="Reporte Productos" style="position:absolute;left:1010px;top:600px;z-index:32">
</form>

<div id="text1" style="position:absolute; overflow:hidden; left:237px; top:17px; width:64px; height:38px; z-index:10">
<div class="wpmd">
<div align=center><font face="Shonar Bangla" class="ws20"><a href="inicio.php" style="color:#FFFFFF"><B>Inicio</B></a></font></div>
</div></div>

<div id="text2" style="position:absolute; overflow:hidden; left:354px; top:16px; width:115px; height:42px; z-index:11">
<div class="wpmd"><div align=center><font color="#FFFFFF" face="Shonar Bangla" class="ws20"><a href="productos.php" style="color:#FFFFFF"><B>Productos</B></a></font></div>
</div></div>

<div id="text3" style="position:absolute; overflow:hidden; left:497px; top:19px; width:115px; height:42px; z-index:12">
<div class="wpmd"><div align=center><font color="#FFFFFF" face="Shonar Bangla" class="ws20"><a href="usuarios.php" style="color:#FFFFFF"><B>Usuarios</B></a></font></div>
</div></div>

<div id="text4" style="position:absolute; overflow:hidden; left:917px; top:18px; width:115px; height:42px; z-index:13">
<div class="wpmd"><div align=center><font color="#FFFFFF" face="Shonar Bangla" class="ws20"><a href="facturacion.php" style="color:#FFFFFF"><B>Facturacion</B></a></font></div>
</div></div>

<div id="text5" style="position:absolute; overflow:hidden; left:633px; top:19px; width:115px; height:42px; z-index:14">
<div class="wpmd">
<div align=center><font color="#FFFFFF" face="Shonar Bangla" class="ws20"><a href="empleados.php" style="color:#FFFFFF"><B>Vendedores</B></a></font></div>
</div></div>

<div id="text6" style="position:absolute; overflow:hidden; left:773px; top:19px; width:115px; height:42px; z-index:15">
<div class="wpmd">
<div align=center><font color="#FFFFFF" face="Shonar Bangla" class="ws20"><a href="clientes.php" style="color:#FFFFFF"><B>Clientes</B></a></font></div>
</div></div>

<div id="text17" style="position:absolute; overflow:hidden; left:1058px; top:18px; width:115px; height:42px; z-index:13">
<div class="wpmd"><div align=center><font color="#FFFFFF" face="Shonar Bangla" class="ws19"><a href="facturacion.php" style="color:#FFFFFF"><B>Reporte Producto</B></a><br/><a href="facturacion.php" style="color:#FFFFFF"><B>Reporte Ventas</B></a></font></div>
</div></div>

<div id="hr2" style="position:absolute; overflow:hidden; left:1px; top:681px; width:1364px; height:23px; z-index:16">
<hr size=3 width=1364 color="#99CC00">
</div>

<div id="image1" style="position:absolute; overflow:hidden; left:265px; top:183px; width:151px; height:151px; z-index:17"><img src="images/cerrar.png" alt="" title="" border=0 width=151 height=151></div>

<div id="image2" style="position:absolute; overflow:hidden; left:253px; top:442px; width:146px; height:146px; z-index:18"><img src="images/clientes.png" alt="" title="" border=0 width=146 height=146></div>

<div id="image3" style="position:absolute; overflow:hidden; left:500px; top:186px; width:153px; height:144px; z-index:19"><img src="images/productos.png" alt="" title="" border=0 width=153 height=144></div>

<div id="image5" style="position:absolute; overflow:hidden; left:754px; top:195px; width:137px; height:137px; z-index:20"><img src="images/vendedor.png" alt="" title="" border=0 width=137 height=137></div>

<div id="image6" style="position:absolute; overflow:hidden; left:996px; top:186px; width:149px; height:149px; z-index:21"><img src="images/factura.png" alt="" title="" border=0 width=149 height=149></div>

<div id="image7" style="position:absolute; overflow:hidden; left:514px; top:436px; width:142px; height:151px; z-index:22"><img src="images/usu.png" alt="" title="" border=0 width=142 height=151></div>

<div id="image8" style="position:absolute; overflow:hidden; left:1002px; top:444px; width:143px; height:140px; z-index:23"><img src="images/barato.png" alt="" title="" border=0 width=143 height=140></div>

<div id="image9" style="position:absolute; overflow:hidden; left:757px; top:412px; width:181px; height:181px; z-index:24"><img src="images/mejor.png" alt="" title="" border=0 width=181 height=181></div>

</div>

</body>
</html>
