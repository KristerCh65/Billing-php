<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled</title>

<link href="css/lightbox.css" rel="stylesheet"/>
<link href="estilo.css" rel="stylesheet"></link>

<script type="text/javascript">
function deshabilitaRetroceso(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="no-back-button";}
}

window.onbeforeunload = function() {
      return "¿Estás seguro que deseas salir de la actual página?"
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

</head>
<body bgColor="black" onload="deshabilitaRetroceso()">

<?php
session_start();
unset($_SESSION['administrador']);
require("config.php");
if(isset($_REQUEST['enviar'])){
$usu=$_REQUEST['usu'];
$con=$_REQUEST['con'];
$consulta="select * from usuarios where usuario='$usu' and clave='$con'";
$result=mysql_query($consulta) or die (mysql_error());
$filasn=mysql_num_rows($result);
if($filasn<=0 || isset($_GET['enviar'])){
$valido=false;
unset($_SESSION['administrador']);
} else {
$rowsresult=mysql_fetch_array($result);
if($rowsresult['perfil']!="Administrador"){
unset($_SESSION['administrador']);
echo '<div class="henry" align="center" style="position:absolute; overflow:hidden; left:500px; top:370px; width:360px;height:81px; z-index:23">
<p>Su perfil no esta autorizado para ingresar, este modulo es para usuarios Administradores<br/><a href="index.php"> Intente de Nuevo </a></div>';
} else {
$_SESSION['administrador']=$rowsresult['usuario'];
$_SESSION['perfil']=$rowsresult['perfil'];
$_SESSION['foto']=$rowsresult['nombre'];
$_SESSION['foto']=$rowsresult['foto'];
$_SESSION['nombre']=$rowsresult['nombre'];
$valido=true;
header("location:inicio.php");
}
}
}
?>


<div id="image1" style="position:absolute; overflow:hidden; left:28px; top:161px; width:0px; height:0px; z-index:0"><img src="images/inicio.jpg" alt="" title="" border=0 width=0 height=0></div>

<div id="image2" style="position:absolute; overflow:hidden; left:251px; top:0px; width:894px; height:683px; z-index:1"><img src="images/inicio.jpg" alt="" title="" border=0 width=894 height=683></div>

<div id="shape1" style="position:absolute; overflow:hidden; left:481px; top:272px; width:436px; height:142px; z-index:2"><img border=0 width="100%" height="100%" alt="" src="images/shape2221657.gif"></div>

<div id="image3" style="position:absolute; overflow:hidden; left:490px; top:276px; width:135px; height:135px; z-index:3"><img src="images/usuario.png" alt="" title="" border=0 width=135 height=135></div>

<div id="text1" style="position:absolute; overflow:hidden; left:633px; top:273px; width:131px; height:34px; z-index:4">
<div class="wpmd">
<div><font color="#000000" face="Shonar Bangla" class="ws20"><B>Usuario:</B></font></div>
</div></div>

<form name="form1" target="_top" method="POST" action="index.php" style="margin:0px">
<input name="usu" type="text" style="position:absolute;width:269px;left:633px;top:302px;z-index:6">
<input name="con" type="password" style="position:absolute;width:269px;left:633px;top:354px;z-index:8">
<input name="enviar" type="submit" class="button black" value="Iniciar Session" style="position:absolute;left:770px;top:380px;z-index:9">
</form>

<div id="text2" style="position:absolute; overflow:hidden; left:633px; top:324px; width:140px; height:34px; z-index:7">
<div class="wpmd">
<div><font color="#000000" face="Shonar Bangla" class="ws20"><B>Contraseña:</B></font></div>
</div></div>


</body>
</html>
