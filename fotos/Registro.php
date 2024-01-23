<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
<link href="estilo.css" rel="stylesheet"></link>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/lightbox-2.6.min.js"></script>
<link href="css/lightbox.css" rel="stylesheet"/>

<script>
function edad(fechan){
var values=fecha_nac.split("-");
var ano = values[0];
var fecha_hoy = new Date();
var ahora_ano = fecha_hoy.getYear();
document.form1.eda.value= (ahora_ano+1900)-ano;
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
	width: 1128px;
	margin-top: 0px;
	margin-left: auto;
	margin-right: auto;
	text-align:left; 
}
body {text-align:center;margin:0}

</style>

</head>

<body background="images/bg101.gif">
<?php
session_start();

$cod=$_REQUEST['cod'];
$nom=$_REQUEST['nom'];
$pre=$_REQUEST['pre'];
$link=mysql_connect("localhost","root","");
mysql_select_db("planilla",$link);

$nom=$_REQUEST['nom'];
$fc=$_REQUEST['fc'];
$eda=$_REQUEST['eda'];
$gen=$_REQUEST['gen'];
$tel=$_REQUEST['tel'];
$dir=$_REQUEST['dir'];
$esp=$_REQUEST['esp'];
$ing=$_REQUEST['ing'];
$fra=$_REQUEST['fra'];
$otr=$_REQUEST['otr'];
$cor=$_REQUEST['cor'];
$usu=$_REQUEST['usu'];
$cla=$_REQUEST['cla'];
$per=$_REQUEST['per'];

if (isset($_FILES['foto']['name']) && !$_FILES['foto']['name']==""){
$nombref=$_FILES['foto']['name'];
$nombref=time()."-".$nombref;
$carpeta="brisas/";
$fotos=$carpeta.$nombref;
move_uploaded_file($_FILES['foto']['tmp_name'],$carpeta.$nombref);
$_SESSION['foto']=$fotos;
}


if(isset($_REQUEST['usu'])){
$resul=mysql_query("select * from usuarios where usuario='$usu'",$link);
if (mysql_num_rows($resul)>0){
echo '<script>
alert("Este usuario ya esta asignado");
</script>';
}
}

if(isset($_REQUEST['enviar'])){
$resul=mysql_query("select * from usuarios where usuario='$usu'",$link);
if (mysql_num_rows($resul)==0){
$resul=mysql_query("insert into usuarios(nombre,fecha_nac,edad,genero,telefono,direccion,español,ingles,frances,otros,correo,usuario,clave,perfil,foto)VALUES('$nom','$fc','$eda','$gen','$tel','$dir','$esp','$ing','$fra','$otr','$cor','$usu','$cla','$per','$fotos')",$link);
echo '<script>alert("Datos Almacenados Satisfactoriamente");</script>';
}else{
echo '<script>alert("El usuario ya fue asignado");</script>';
}
}
?>

<div id="container">
<div id="image5" style="position:absolute; overflow:hidden; left:226px; top:123px; width:676px; height:566px; z-index:0"><img src="images/img93544750.jpg" alt="" border=0 width=676 height=566></div>

<div id="image6" style="position:absolute; overflow:hidden; left:225px; top:687px; width:677px; height:60px; z-index:1"><img src="images/bottom102.jpg" alt="" border=0 width=677 height=60></div>

<div id="text3" style="position:absolute; overflow:hidden; left:598px; top:718px; width:301px; height:26px; z-index:2"><div class="wpmd">
<div><font class="ws8" face="Tahoma">Copyright 2002-2005 Your Website&nbsp; Inc. All Rights Reserved.</font></div>
</div></div>

<div id="image3" style="position:absolute; overflow:hidden; left:739px; top:167px; width:144px; height:165px; z-index:3"><img src="<?php echo $fotos ?>" alt="" border=0 width=144 height=165></div>

<div id="text1" style="position:absolute; overflow:hidden; left:288px; top:125px; width:249px; height:36px; z-index:4"><div class="wpmd">
<div><font class="ws20" color="#FFFFFF" face="Times New Roman"><B><U>Registro de Usuarios</U></B></font></div>
</div></div>

<div id="text2" style="position:absolute; overflow:hidden; left:243px; top:176px; width:159px; height:30px; z-index:5"><div class="wpmd">
<div><font class="ws14" color="#FFFFFF" face="Times New Roman"><B>Nombre Completo:</B></font></div>
</div></div>

<div id="text4" style="position:absolute; overflow:hidden; left:243px; top:232px; width:191px; height:30px; z-index:6"><div class="wpmd">
<div><font class="ws14" color="#FFFFFF" face="Times New Roman"><B>Fecha de Naciemiento:</B></font></div>
</div></div>

<div id="text5" style="position:absolute; overflow:hidden; left:548px; top:232px; width:67px; height:28px; z-index:7"><div class="wpmd">
<div><font class="ws14" color="#FFFFFF" face="Times New Roman"><B>Edad:</B></font></div>
</div></div>

<div id="text6" style="position:absolute; overflow:hidden; left:243px; top:291px; width:70px; height:30px; z-index:8"><div class="wpmd">
<div><font class="ws14" color="#FFFFFF" face="Times New Roman"><B>Genero:</B></font></div>
<div><font class="ws14" color="#FFFFFF" face="Times New Roman"><B><BR></B></font></div>
</div></div>

<div id="text7" style="position:absolute; overflow:hidden; left:550px; top:291px; width:90px; height:24px; z-index:9"><div class="wpmd">
<div><font class="ws14" color="#FFFFFF" face="Times New Roman"><B>Teléfono:</B></font></div>
</div></div>

<div id="text8" style="position:absolute; overflow:hidden; left:246px; top:403px; width:90px; height:30px; z-index:10"><div class="wpmd">
<div><font class="ws14" color="#FFFFFF" face="Times New Roman"><B>Idioma:</B></font></div>
</div></div>

<div id="text9" style="position:absolute; overflow:hidden; left:244px; top:344px; width:90px; height:30px; z-index:11"><div class="wpmd">
<div><font class="ws14" color="#FFFFFF" face="Times New Roman"><B>Dirección:</B></font></div>
</div></div>

<div id="text10" style="position:absolute; overflow:hidden; left:243px; top:479px; width:90px; height:30px; z-index:12"><div class="wpmd">
<div><font class="ws14" color="#FFFFFF" face="Times New Roman"><B>Correo:</B></font></div>
</div></div>

<div id="text11" style="position:absolute; overflow:hidden; left:243px; top:540px; width:90px; height:30px; z-index:13"><div class="wpmd">
<div><font class="ws14" color="#FFFFFF" face="Times New Roman"><B>Usuario:</B></font></div>
</div></div>

<div id="text12" style="position:absolute; overflow:hidden; left:550px; top:540px; width:90px; height:30px; z-index:14"><div class="wpmd">
<div><font class="ws14" color="#FFFFFF" face="Times New Roman"><B>Clave:</B></font></div>
</div></div>

<div id="text13" style="position:absolute; overflow:hidden; left:243px; top:596px; width:90px; height:30px; z-index:15"><div class="wpmd">
<div><font class="ws14" color="#FFFFFF" face="Times New Roman"><B>Perfil:</B></font></div>
</div></div>

<div id="text14" style="position:absolute; overflow:hidden; left:551px; top:597px; width:95px; height:30px; z-index:16"><div class="wpmd">
<div><font class="ws14" color="#FFFFFF" face="Times New Roman"><B>Fotografia:</B></font></div>
</div></div>

<div id="text15" style="position:absolute; overflow:hidden; left:263px; top:424px; width:90px; height:30px; z-index:27"><div class="wpmd">
<div><font class="ws14" color="#FFFFFF" face="Times New Roman"><B>Español</B></font></div>
</div></div>

<div id="text16" style="position:absolute; overflow:hidden; left:264px; top:450px; width:90px; height:30px; z-index:28"><div class="wpmd">
<div><font class="ws14" color="#FFFFFF" face="Times New Roman"><B>Ingles</B></font></div>
</div></div>

<div id="text17" style="position:absolute; overflow:hidden; left:401px; top:421px; width:90px; height:30px; z-index:29"><div class="wpmd">
<div><font class="ws14" color="#FFFFFF" face="Times New Roman"><B>Frances</B></font></div>
</div></div>

<div id="text18" style="position:absolute; overflow:hidden; left:401px; top:452px; width:90px; height:30px; z-index:30"><div class="wpmd">
<div><font class="ws14" color="#FFFFFF" face="Times New Roman"><B>Otros</B></font></div>
</div></div>

<form name="form1" target="_top" method="POST" action="registro.php" enctype="multipart/form-data" style="margin:0px">
<input name="nc" type="text" style="position:absolute;width:480px;left:241px;top:195px;z-index:17">
<input name="fn" type="date" style="position:absolute;width:186px;left:244px;top:254px;z-index:18">
<input name="eda" type="text" value="<?php echo $eda ?>" style="position:absolute;width:174px;left:549px;top:253px;z-index:19">
<select name="gen" style="position:absolute;left:244px;top:311px;width:187px;z-index:20">
<option value="Masculino">Masculino</option>
<option value="Femenino">Femenino</option>
</select>

<input name="tel" type="text" style="position:absolute;width:172px;left:552px;top:312px;z-index:21">
<input name="dir" type="text" style="position:absolute;width:479px;left:245px;top:368px;z-index:22">
<input type="checkbox" name="esp" style="position:absolute;left:244px;top:424px;z-index:23">
<input type="checkbox" name="otr" style="position:absolute;left:382px;top:452px;z-index:24">
<input type="checkbox" name="fra" style="position:absolute;left:381px;top:423px;z-index:25">
<input type="checkbox" name="ing" style="position:absolute;left:245px;top:452px;z-index:26">
<input name="cor" type="text" style="position:absolute;width:479px;left:243px;top:505px;z-index:31">
<input name="cla" type="password" style="position:absolute;width:172px;left:551px;top:561px;z-index:32">
<input name="usu" type="text" onblur="document.form1.submit()"  style="position:absolute;width:185px;left:243px;top:561px;z-index:33">
<input name="foto" type="file" style="position:absolute;width:270px;left:550px;top:617px;z-index:34">
<select name="per" style="position:absolute;left:243px;top:619px;width:185px;z-index:36">
<option value="Administrador">Administrador</option>
<option value="Invitado">Invitado</option>
</select>

<input name="enviar" type="submit" class="button black" value="Registrarse" style="position:absolute;left:439px;top:645px;z-index:38">
</form>

<div id="image4" style="position:absolute; overflow:hidden; left:226px; top:0px; width:677px; height:122px; z-index:37"><img src="images/img93544890.jpg" alt="" border=0 width=677 height=122></div>


</div></body>
</html>
