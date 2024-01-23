<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

<link rel="stylesheet" type="text/css" href="estilo.css"/>
<link rel="stylesheet" type="text/css" href="estilo.css"/>
<script type="text/javascript" src="form3.js"></script>
<script src="js/query-1.10.2.min.js"></script>
<script src="js/lightbox-2.6.min.js"></script>
<link href="css/lightbox.css" rel="stylesheet"/>
<link rel="stylesheet" href="css/table.css" type="text/css"/>

<script>
function valida(){
if(document.form1.usu.value=="){//Si este campo esta vacio
alert("El Dato Usuario Esta Vacio");//Mensaje a mostrar
return false;//devolvemos un valor negativo
}
if(document.form1.cla.value=="){//Si este campo esta vacio
alert("El Dato Contraseña Esta Vacio");//Mensaje a mostrar
return false;//devolvemos un valor negativo
}
return true;
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
.wpmd {font-size: 13px;font-family: 'Arial';font-style: normal;font-weight: normal;}
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
	width: 1064px;
	margin-top: 0px;
	margin-left: auto;
	margin-right: auto;
	text-align:left; 
}
body {text-align:center;margin:0}
</style>

</head>

<body background="images/bg00.jpg">
<?php
session_start();
unset($_SESSION["administrador"]);
$link=mysql_connect("localhost","root","");
mysql_select_db("planilla",$link);


if(isset($_REQUEST['enviar'])){
$usu=$_REQUEST['usu'];
$cla=$_REQUEST['cla'];
$consulta="Select * from usuarios where usuario='$usu' and clave='$cla'";
$resul=mysql_query($consulta) or die(mysql_error());
$filasn=mysql_num_rows($resul);
if($filasn<=0||isset($_GET['nologin'])){
$valido=false;
unset($_SESSION["administrador"]);
}else{
$rowsresul=mysql_fetch_array($resul);
if($rowsresul['perfil']!="administrador"){
unset($_SESSION["administrador"]);
echo '<div  class="henry" align="center" style="position:absolute;overflow:hidden; left:460px; top:271px; width:415px; height:112px; z-index:23":0"><p>Su Perfil No Esta Autorizado Para Ingresar, Este Modulo es Para Usuarios Administradores<br/><tr><td h1><a href="index.php">Intente de Nuevo</a></td></tr></div>';
}else{
$_SESSION["administrador"]=$rowsresul['usuario'];
$_SESSION["perfil"]=$rowsresul['perfil'];
$_SESSION["foto"]=$rowsresul['foto'];
$_SESSION["nombreadministrador"]=$rowsresul['nombre'];
$valido=true;
header("location:menu.php?login=true");
}}
}
if(isset($_REQUEST['registrarse'])){
header("location:registro.php");
}
?>
<div id="container">
<div id="image2" style="position:absolute; overflow:hidden; left:239px; top:153px; width:586px; height:395px; z-index:0"><img src="images/img33559437.jpg" alt="" border=0 width=586 height=395></div>

<div id="image6" style="position:absolute; overflow:hidden; left:239px; top:540px; width:586px; height:68px; z-index:1"><img src="images/bottom102.jpg" alt="" border=0 width=586 height=68></div>

<div id="hr1" style="position:absolute; overflow:hidden; left:249px; top:183px; width:562px; height:29px; z-index:2">
<hr size=2 width=562 color="#E0E0E0">
</div>

<div id="text3" style="position:absolute; overflow:hidden; left:517px; top:587px; width:306px; height:19px; z-index:3"><div class="wpmd">
<div><font class="ws8" face="Tahoma">Copyright 2002-2005 Your Website&nbsp; Inc. All Rights Reserved.</font></div>
</div></div>

<div id="shape1" style="position:absolute; overflow:hidden; left:243px; top:190px; width:16px; height:350px; z-index:4; background-image:url(images/dot1.gif)"></div>

<div id="image3" style="position:absolute; overflow:hidden; left:473px; top:192px; width:112px; height:112px; z-index:5"><img src="images/img33559453.png" alt="" border=0 width=112 height=112></div>

<div id="image4" style="position:absolute; overflow:hidden; left:429px; top:329px; width:39px; height:39px; z-index:6"><img src="images/img33559468.jpeg" alt="" border=0 width=39 height=39></div>

<div id="shape3" style="position:absolute; overflow:hidden; left:803px; top:190px; width:16px; height:351px; z-index:7; background-image:url(images/dot1.gif)"></div>

<div id="image5" style="position:absolute; overflow:hidden; left:427px; top:381px; width:41px; height:41px; z-index:8"><img src="images/img33559484.jpg" alt="" border=0 width=41 height=41></div>

<form name="form1" target="_top" method="POST" action="index.php" style="margin:0px">
<input name="usu" type="text" style="position:absolute;width:169px;left:467px;top:343px;z-index:10">
<input name="cla" type="password" style="position:absolute;width:169px;left:468px;top:397px;z-index:11">
<input name="enviar" type="submit" class="button black" value="Iniciar Sesion" style="position:absolute;left:413px;top:446px;z-index:15">
<input name="registrarse" type="submit" class="button black" value="Registrarse" style="position:absolute;left:548px;top:447px;z-index:16">
</form>

<div id="text2" style="position:absolute; overflow:hidden; left:442px; top:158px; width:195px; height:29px; z-index:12"><div class="wpmd">
<div><font class="ws18" color="#FFFFFF" face="Times New Roman"><B>Acceso de Usuario</B></font></div>
</div></div>

<div id="text4" style="position:absolute; overflow:hidden; left:468px; top:326px; width:62px; height:21px; z-index:13"><div class="wpmd">
<div><font class="ws11" color="#333333" face="Times New Roman"><B>Usuario:</B></font></div>
</div></div>

<div id="text5" style="position:absolute; overflow:hidden; left:469px; top:381px; width:84px; height:21px; z-index:14"><div class="wpmd">
<div><font class="ws11" color="#333333" face="Times New Roman"><B>Contraseña:</B></font></div>
</div></div>


</div></body>
</html>
