<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
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
	width: 1364px;
	margin-top: 0px;
	margin-left: auto;
	margin-right: auto;
	text-align:left; 
}
body {text-align:center;margin:0}
</style>

</head>

<body bgColor="#000000">

<?php
session_start();
require("conexion.php");
$nom=$_REQUEST['nom'];
$esp=$_REQUEST['esp'];
$ing=$_REQUEST['ing'];
$fra=$_REQUEST['fra'];
$otr=$_REQUEST['otr'];
$fn=$_REQUEST['fn'];
$gen=$_REQUEST['gen'];
$per=$_REQUEST['per'];
$cor=$_REQUEST['cor'];
$usu=$_REQUEST['usu'];
$con=$_REQUEST['con'];

if(isset($_FILES['foto']['name']) && !$_FILES['foto']['name']==""){
$nombref=$_FILES['foto']['name'];
$carpeta="proimg/";
$fotos=$carpeta.$nombref;
move_uploaded_file($_FILES['foto']['tmp_name'],$carpeta.$nombref);
$_SESSION['logo']=$fotos;
}

if(isset($_REQUEST['enviar'])){
$fotos=$_SESSION['logo'];
$result=mysql_query("insert into usuario(nombre, español, ingles, frances, otro, fecha, genero, perfil, correo, usuario, clave, foto) values ('$nom', '$esp', '$ing', '$fra', '$otr', '$fn', '$gen', '$per', '$cor', '$usu', '$con', '$fotos')", $link);
echo '<script>alert("Usuario Registrado");
</script>';
}

if(isset($_REQUEST['usu'])){
$result=mysql_query("select * from usuario where usuario='$usu'", $link);
if(mysql_num_rows($result)>0){
echo '<script>alert("Este nombre de usuario ya fue registrado!");</script>';
}
}

if(isset($_REQUEST['nuevo'])){
header("location:usuarios.php");
}

?>


<div id="container">
<div id="shape1" style="position:absolute; overflow:hidden; left:129px; top:44px; width:1108px; height:785px; z-index:0"><img border=0 width="100%" height="100%" alt="" src="images/shape4762632.gif"></div>

<div id="image4" style="position:absolute; overflow:hidden; left:44px; top:42px; width:1193px; height:115px; z-index:1"><img src="images/img1540328.jpg" alt="" border=0 width=1193 height=115></div>

<div id="hr1" style="position:absolute; overflow:hidden; left:0px; top:26px; width:1364px; height:23px; z-index:2">
<hr size=10 width=1364 color="#99CC00">
</div>

<form name="form1" target="_top" method="POST" action="usuarios.php" enctype="multipart/form-data" style="margin:0px">
<div id="formimage7" style="position:absolute; left:1047px; top:9px; z-index:4"><input type="image" name="formimage7" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage6" style="position:absolute; left:905px; top:9px; z-index:4"><input type="image" name="formimage6" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage1" style="position:absolute; left:764px; top:9px; z-index:5"><input type="image" name="formimage1" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage2" style="position:absolute; left:623px; top:9px; z-index:6"><input type="image" name="formimage2" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage3" style="position:absolute; left:482px; top:9px; z-index:7"><input type="image" name="formimage3" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage4" style="position:absolute; left:341px; top:8px; z-index:8"><input type="image" name="formimage4" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage5" style="position:absolute; left:200px; top:8px; z-index:9"><input type="image" name="formimage5" width="137" height="54" src="images/boton.jpg"></div>
<input name="nom" value="<?php echo $nom ?>" type="text" style="position:absolute;width:468px;left:419px;top:314px;z-index:24">


<?php
if($esp=="Español"){
echo '<input type="checkbox" name="esp" value="Español" checked="checked" style="position:absolute;left:417px;top:387px;z-index:28">';
}else{
echo '<input type="checkbox" name="esp" value="Español" style="position:absolute;left:417px;top:387px;z-index:28">';
}
if($ing=="Ingles"){
echo '<input type="checkbox" name="ing" value="Ingles" checked="checked" style="position:absolute;left:417px;top:411px;z-index:31">';
}else{
echo '<input type="checkbox" name="ing" value="Ingles" style="position:absolute;left:417px;top:411px;z-index:31">';
}
if($fra=="Frances"){
echo '<input type="checkbox" name="fra" value="Frances" checked="checked" style="position:absolute;left:417px;top:435px;z-index:30">';
}else{
echo '<input type="checkbox" name="fra" value="Frances" style="position:absolute;left:417px;top:435px;z-index:30">';
}
if($otr=="Otro"){
echo '<input type="checkbox" name="otr" value="Otro" checked="checked" style="position:absolute;left:417px;top:459px;z-index:29">';
}else{
echo '<input type="checkbox" name="otr" value="Otro" style="position:absolute;left:417px;top:459px;z-index:29">';
}
?>


<input name="fn" value="<?php echo $fn ?>" type="date" style="position:absolute;width:278px;left:747px;top:399px;z-index:37">
<input name="cor" value="<?php echo $cor ?>" type="text" style="position:absolute;width:606px;left:420px;top:578px;z-index:42">
<input name="usu" onblur="document.form1.submit()" value="<?php echo $usu ?>" type="text" style="position:absolute;width:287px;left:421px;top:635px;z-index:44">
<input name="con" value="<?php echo $con ?>" type="password" style="position:absolute;width:287px;left:745px;top:633px;z-index:46">
<input name="foto" onchange="document.form1.submit()" type="file" style="position:absolute;width:287px;left:422px;top:694px;z-index:48">
<select name="gen" style="position:absolute;left:748px;top:460px;width:278px;z-index:49">
<option value="<?php echo $gen ?>"><?php echo $gen ?></option>
<option value="Masculino">Masculino</option>
<option value="Femenino">Femenino</option>
</select>

<select name="per" style="position:absolute;left:750px;top:521px;width:278px;z-index:50">
<option value="<?php echo $per ?>"><?php echo $per ?></option>
<option value="Administrador">Administrador</option>
<option value="Invitado">Invitado</option>
</select>

<input name="enviar" type="submit" value="Crear Usuario" style="position:absolute;left:440px;top:783px;z-index:51">
<input name="nuevo" type="submit" value="Nuevo Usuario" style="position:absolute;left:825px;top:783px;z-index:52">
</form>

<div id="text1" style="position:absolute; overflow:hidden; left:237px; top:17px; width:64px; height:38px; z-index:10">
<div class="wpmd">
<div align=center><font face="Shonar Bangla" class="ws20"><a href="inicio.php" style="color:#FFFFFF"><B>Inicio</B></a></font></div>
</div></div>

<div id="text2" style="position:absolute; overflow:hidden; left:354px; top:16px; width:115px; height:42px; z-index:11">
<div class="wpmd"><div align=center><font color="#FFFFFF" face="Shonar Bangla" class="ws20"><a href="productos.php" style="color:#FFFFFF"><B>Productos</B></a></font></div>
</div></div>

<div id="text3" style="position:absolute; overflow:hidden; left:497px; top:19px; width:115px; height:42px; z-index:12">
<div class="wpmd"><div align=center><font color="#FFFFFF" face="Shonar Bangla" class="ws20"><a href="usuarios.php" style="color:#FFFFFF"><B>Usuarios</B></font></div>
</div></div>

<div id="text4" style="position:absolute; overflow:hidden; left:917px; top:18px; width:115px; height:42px; z-index:13">
<div class="wpmd"><div align=center><font color="#FFFFFF" face="Shonar Bangla" class="ws20"><a href="factura.php" style="color:#FFFFFF"><B>Facturacion</B></a></font></div>
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
<div class="wpmd"><div align=center><font color="#FFFFFF" face="Shonar Bangla" class="ws19"><a href="reporte.php" style="color:#FFFFFF"><B>Reporte Producto</B></a><br/><a href="ventas.php" style="color:#FFFFFF"><B>Reporte Ventas</B></a></font></div>
</div></div>


<div id="hr2" style="position:absolute; overflow:hidden; left:0px; top:820px; width:1364px; height:23px; z-index:16">
<hr size=3 width=1364 color="#99CC00">
</div>

<div id="shape2" style="position:absolute; overflow:hidden; left:44px; top:179px; width:193px; height:214px; z-index:17"><img border=0 width="100%" height="100%" alt="" src="images/shape173206703.gif"></div>

<div id="image1" style="position:absolute; overflow:hidden; left:44px; top:156px; width:193px; height:38px; z-index:18"><img src="images/img1540234.gif" alt="" border=0 width=193 height=38></div>

<div id="shape3" style="position:absolute; overflow:hidden; left:44px; top:421px; width:193px; height:406px; z-index:19"><img border=0 width="100%" height="100%" alt="" src="images/shape173254609.gif"></div>

<div id="image2" style="position:absolute; overflow:hidden; left:44px; top:387px; width:193px; height:38px; z-index:20"><img src="images/img1540281.gif" alt="" border=0 width=193 height=38></div>

<div id="text7" style="position:absolute; overflow:hidden; left:364px; top:206px; width:729px; height:37px; z-index:21"><div class="wpmd">
<div align=center><font class="ws22"><B>N</B></font><font class="ws18">uevo</font><font class="ws22"><B> U</B></font><font class="ws18">suario</font></div>
</div></div>

<div id="shape4" style="position:absolute; overflow:hidden; left:364px; top:244px; width:731px; height:518px; z-index:22"><img border=0 width="100%" height="100%" alt="" src="images/shape4810593.gif"></div>

<div id="text8" style="position:absolute; overflow:hidden; left:419px; top:292px; width:103px; height:24px; z-index:23"><div class="wpmd">
<div><font class="ws16">N</font><font class="ws14">ombre</font><font class="ws16">:</font></div>
</div></div>

<div id="image3" style="position:absolute; overflow:hidden; left:411px; top:168px; width:71px; height:71px; z-index:25"><img src="images/img1540375.jpg" alt="" border=0 width=71 height=71></div>

<div id="image5" style="position:absolute; overflow:hidden; left:974px; top:171px; width:76px; height:73px; z-index:26"><img src="images/img1540421.jpg" alt="" border=0 width=76 height=73></div>

<div id="text10" style="position:absolute; overflow:hidden; left:418px; top:353px; width:103px; height:24px; z-index:27"><div class="wpmd">
<div><font class="ws16">I</font><font class="ws14">diomas</font><font class="ws16">:</font></div>
</div></div>

<div id="text11" style="position:absolute; overflow:hidden; left:443px; top:388px; width:103px; height:24px; z-index:32"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Español</font></div>
</div></div>

<div id="text12" style="position:absolute; overflow:hidden; left:443px; top:413px; width:103px; height:24px; z-index:33"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Inglés</font></div>
</div></div>

<div id="text13" style="position:absolute; overflow:hidden; left:443px; top:437px; width:103px; height:24px; z-index:34"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Francés</font></div>
</div></div>

<div id="text14" style="position:absolute; overflow:hidden; left:443px; top:462px; width:103px; height:24px; z-index:35"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Otros</font></div>
</div></div>

<div id="text15" style="position:absolute; overflow:hidden; left:747px; top:377px; width:194px; height:24px; z-index:36"><div class="wpmd">
<div><font class="ws16">F</font><font class="ws14">echa de </font><font class="ws16">N</font><font class="ws14">acimiento:</font></div>
</div></div>

<div id="text16" style="position:absolute; overflow:hidden; left:747px; top:438px; width:194px; height:24px; z-index:38"><div class="wpmd">
<div><font class="ws16">G</font><font class="ws14">enero:</font></div>
</div></div>

<div id="image6" style="position:absolute; overflow:hidden; left:912px; top:261px; width:110px; height:110px; z-index:39"><img src="<?php echo $fotos ?>" alt="" border=0 width=110 height=110></div>

<div id="text17" style="position:absolute; overflow:hidden; left:749px; top:501px; width:194px; height:24px; z-index:40"><div class="wpmd">
<div><font class="ws16">P</font><font class="ws14">erfil:</font></div>
</div></div>

<div id="text18" style="position:absolute; overflow:hidden; left:420px; top:556px; width:176px; height:24px; z-index:41"><div class="wpmd">
<div><font class="ws16">C</font><font class="ws14">orreo </font><font class="ws16">E</font><font class="ws14">lectronico:</font></div>
</div></div>

<div id="text19" style="position:absolute; overflow:hidden; left:422px; top:612px; width:103px; height:24px; z-index:43"><div class="wpmd">
<div><font class="ws16">U</font><font class="ws14">suario:</font></div>
</div></div>

<div id="text20" style="position:absolute; overflow:hidden; left:746px; top:610px; width:103px; height:24px; z-index:45"><div class="wpmd">
<div><font class="ws16">C</font><font class="ws14">ontraseña:</font></div>
</div></div>

<div id="text21" style="position:absolute; overflow:hidden; left:423px; top:671px; width:103px; height:24px; z-index:47"><div class="wpmd">
<div><font class="ws16">F</font><font class="ws14">oto:</font></div>
</div></div>


</div></body>
</html>
