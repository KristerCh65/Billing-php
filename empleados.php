<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled</title>

<link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/dropdown/themes/vimeo.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/lightbox-2.6.min.js"></script>
<link href="css/lightbox.css" rel="stylesheet"/>
<link href="estilo.css" rel="stylesheet"></link>

<script>
function verificacion(){
  var agree=confirm("�Realmente desea eliminarlo? ");
  if (agree) return true;
  return false;
}

function deshabilitaRetroceso(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="no-back-button";}
}

function edad(fecha_nac){
var values=fecha_nac.split("-");
var ano = values[0];
var fecha_hoy = new Date();
var ahora_ano = fecha_hoy.getYear();
document.form1.eda.value= (ahora_ano+1900)-ano;
}

function sueldo(){
var base = document.form1.sub.value;
var comi = document.form1.com.value;
document.form1.tot.value= parseInt(base) + parseInt(comi);
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

session_start();
require("config.php");
$cod=$_REQUEST['cod'];
$nom=$_REQUEST['nom'];
$fn=$_REQUEST['fn'];
$eda=$_REQUEST['eda'];
$sub=$_REQUEST['sub'];
$dir=$_REQUEST['dir'];
$com=$_REQUEST['com'];
$tot=$_REQUEST['tot'];

if (isset($_FILES['foto']['name']) && !$_FILES['foto']['name']==""){
$nombref=$_FILES['foto']['name'];
$nombref=time()."-".$nombref;
$carpeta="fotoss/";
$fotos=$carpeta.$nombref;
move_uploaded_file($_FILES['foto']['tmp_name'],$carpeta.$nombref);
$_SESSION['fotos']=$fotos;
}

if(isset($_REQUEST['enviar'])){
$url=$_REQUEST['url'];
if($url==""){
$fotos=$_SESSION['fotos'];
}else{
$fotos=$url;
}

if ($_SESSION['operacion']=="ver"){
$cod=$_SESSION['cod'];
$resul=mysql_query("update vendedores set codigo='$cod',nombre='$nom',nacimiento='$fn',edad='$eda',base='$sub',comision='$com',sueldo='$tot',direccion='$dir',foto='$fotos'  where codigo='$cod'",$link);

echo '<script>alert("Datos Modificados Satisfactoriamente");</script>';
unset($_SESSION['operacion']);
unset($_SESSION['fotos']);

}else{
$resul=mysql_query("select * from vendedores where codigo='$cod'",$link);

if (mysql_num_rows($resul)==0){
$result=mysql_query("insert into vendedores(codigo,nombre,nacimiento,edad,base,comision,sueldo,direccion,foto) values ('$cod','$nom','$fn','$eda','$sub','$com','$tot','$dir','$fotos')",$link);

echo '<script>alert("Datos Almacenados Satisfactoriamente");</script>';

}else{
echo '<script>alert("El codigo de vendedores ya fue asignado");</script>';
}
}
}

if(isset($_REQUEST['nuevo'])){
unset($_SESSION['operacion']);
unset($_SESSION['fotos']);

header("location:empleados.php");
}

if ($_GET['operacion']=="ver"){
$cod=$_GET['nume'];

$_SESSION['cod']=$cod;
$_SESSION['operacion']=$_GET['operacion'];

$resul=mysql_query("select * from vendedores where codigo='$cod'",$link);
$fila=mysql_fetch_array($resul);

$cod=$fila['codigo'];
$nom=$fila['nombre'];
$fn=$fila['nacimiento'];
$eda=$fila['edad'];
$sub=$fila['base'];
$dir=$fila['direccion'];
$com=$fila['comision'];
$tot=$fila['sueldo'];
$fotos=$fila['foto'];
$_SESSION['fotos']=$fotos;

}

if(isset($_REQUEST['eliminar'])){
$borrar=$_REQUEST['borrar'];
$nfila=count($borrar);
for($a=0;$a<=$nfila;$a++){
$resuld=mysql_query("delete from vendedores where codigo='$borrar[$a]' ",$link);
}
if($nfila==0){
echo '<script> alert("No se Elimino Ningun Registro"); </script>';
} else {
echo '<script> alert("Registros Eliminados Exitosamente"); </script>';
}
}

echo '<form name="form3" action="empleados.php" method="POST" target="_top">
<table border=1 style="position:absolute; overflow:hidden; left:420px; top:542px; width:500px; height:50px; z-index:36">
<tr><td colspan=7 align=center bgcolor=black><font color=white>Listado General de Empleados</font></td></tr>
<tr bgcolor=coffe><td>Codigo</td><td>Nombre</td><td>Sueldo</td><td>Foto</td><td>Eliminar</td><td>Editar</td></tr>
<input name="eliminar" type="submit" onclick="return verificacion()" class="button green" value="Eliminar Registros Marcados" style="position:absolute;left:733px;top:436px;z-index:45">';





  $num = 2; // n�mero de filas por p�gina
      $comienzo = $_REQUEST['comienzo'];
      if (!isset($comienzo)) $comienzo = 0;
      // Calcular el n�mero total de filas de la tabla
 
     $consulta=mysql_query("select * from vendedores",$link);

      $nfilas = mysql_num_rows ($consulta);

echo '<div style="position:absolute; overflow:hidden; left:422px; top:507px; z-index:42">';
 

 if ($nfilas > 0)
      {
      // Mostrar n�meros inicial y final de las filas a mostrar
         print ("<P>Mostrando Avisos " . ($comienzo + 1) . " a ");
         if (($comienzo + $num) < $nfilas)
            print ($comienzo + $num);
         else
            print ($nfilas);
         print (" de un total de $nfilas.\n");

      // Mostrar botones anterior y siguiente
         $estapagina = $_SERVER['PHP_SELF'];
         if ($nfilas > $num)
         {
            if ($comienzo > 0)
               print ("[ <A HREF='$estapagina?comienzo=" . ($comienzo - $num) . "&amp;ant=" . $an . "'>Anterior</A> | ");
            else
               print ("[ Anterior | ");
            if ($nfilas > ($comienzo + $num))
               print ("<A HREF='$estapagina?comienzo=" . ($comienzo + $num) . "&amp;ant=" . $an . "'>Siguiente</A> ]\n");
            else
               print ("Siguiente ]\n");
         }
         print ("</P>\n");
      }

echo '</div>';




if(isset($_REQUEST['loc'])){
$loc=$_REQUEST['loc'];

$resul=mysql_query("select * from vendedores where nombre like '%$loc%' limit $comienzo, $num",$link);

}else{
$resul=mysql_query("select * from vendedores limit $comienzo, $num",$link);
}
while($fila=mysql_fetch_array($resul)){
echo '<tr bgcolor=coffe><td>'.$fila['codigo'].'</td><td>'.$fila['nombre'].'</td><td>'.$fila['sueldo'].'</td>';

if($fila['foto'] !=""){
echo '<td align=center><a href="'.$fila['foto'].'" data-lightbox="roadtrip" title="Foto de Empleado" target="_blank"><img src="ico.png" width=20 heigth=20><br/>Ver</a></td>';
}else{
echo '<td>&nbsp;</td>';
}

echo '<td align=center><input type="checkbox" name="borrar[]" value="'.$fila['codigo'].'"></td>';

echo '<td align=center><a href="empleados.php?operacion=ver&amp;nume='.$fila['codigo'].'" target="_top">Editar</a></td></tr>';

}

echo '</table></form>';


echo '<form name="form5" action="empleados.php" method="POST" target="_top">
<div style="position:absolute; overflow:hidden; left:340px; top:478px; width:550px; height:40px; z-index:42">
<strong>Localizador de Empleados</strong><br/><input type="text" name="loc" value="'.$loc.'" size="50" onblur="document.form5.submit()" placeholder="Escriba el empleado que desea buscar"></div></form>';

if(isset($_REQUEST['cod']) && $_SESSION['operacion']!="ver" ){
$resul=mysql_query("select * from vendedores where codigo='$cod'",$link);
if (mysql_num_rows($resul)>0){
echo '<script>alert("El codigo de empleado ya fue asignado");</script>';
}
}

?>

<div id="container">
<div id="shape1" style="position:absolute; overflow:hidden; left:143px; top:45px; width:1106px; height:645px; z-index:0"><img border=0 width="100%" height="100%" alt="" src="images/shape4762632.gif"></div>

<div id="image4" style="position:absolute; overflow:hidden; left:144px; top:38px; width:1106px; height:93px; z-index:1"><img src="images/img18090765.jpg" alt="" title="" border=0 width=1106 height=93></div>

<div id="hr1" style="position:absolute; overflow:hidden; left:0px; top:23px; width:1364px; height:23px; z-index:2">
<hr size=10 width=1364 color="#99CC00">
</div>

<form name="form1" target="_top" method="POST" action="empleados.php" enctype="multipart/form-data" style="margin:0px">
<div id="formimage7" style="position:absolute; left:1047px; top:9px; z-index:4"><input type="image" name="formimage7" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage6" style="position:absolute; left:905px; top:9px; z-index:4"><input type="image" name="formimage6" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage1" style="position:absolute; left:764px; top:9px; z-index:5"><input type="image" name="formimage1" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage2" style="position:absolute; left:623px; top:9px; z-index:6"><input type="image" name="formimage2" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage3" style="position:absolute; left:482px; top:9px; z-index:7"><input type="image" name="formimage3" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage4" style="position:absolute; left:341px; top:8px; z-index:8"><input type="image" name="formimage4" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage5" style="position:absolute; left:200px; top:8px; z-index:9"><input type="image" name="formimage5" width="137" height="54" src="images/boton.jpg"></div>
<input name="cod" type="text" value="<?php echo $cod ?>" placeholder="Digite el codigo"  style="position:absolute;width:295px;left:458px;top:176px;z-index:22">
<input name="nom" type="text" value="<?php echo $nom ?>" placeholder="Digite el nombre" style="position:absolute;width:294px;left:458px;top:231px;z-index:24">
<input name="fn" type="date" value="<?php echo $fn ?>" onchange="edad(document.form1.fn.value)" style="position:absolute;width:293px;left:458px;top:286px;z-index:26">
<input name="eda" type="text" value="<?php echo $eda ?>" placeholder="Digite la edad"  style="position:absolute;width:295px;left:458px;top:343px;z-index:28">
<input name="sub" type="number" value="<?php echo $sub ?>" placeholder="Digite el sueldo base" onchange="sueldo(document.form1.tot.value)" style="position:absolute;width:295px;left:458px;top:398px;z-index:30">
<input name="tot" type="number" value="<?php echo $tot ?>" placeholder="Digite el total"  style="position:absolute;width:305px;left:798px;top:398px;z-index:32">
<input name="com" type="number" value="<?php echo $com ?>" placeholder="Digite la comision" onchange="sueldo(document.form1.tot.value)" style="position:absolute;width:309px;left:796px;top:343px;z-index:34">
<input name="dir" type="text" value="<?php echo $dir ?>" placeholder="Digite la direccion"  style="position:absolute;width:310px;left:796px;top:286px;z-index:36">
<input name="foto" type="file" value="<?php echo $fotos ?>" onchange="document.form1.submit()" style="position:absolute;width:179px;left:925px;top:234px;z-index:41">
<input name="enviar" type="submit" class="button green" value="Guardar Datos" style="position:absolute;left:459px;top:437px;z-index:43">
<input name="nuevo" type="submit" class="button green" value="Nuevo" style="position:absolute;left:625px;top:436px;z-index:44">
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

<div id="hr2" style="position:absolute; overflow:hidden; left:1px; top:681px; width:1364px; height:23px; z-index:16">
<hr size=3 width=1364 color="#99CC00">
</div>

<div id="shape2" style="position:absolute; overflow:hidden; left:144px; top:156px; width:193px; height:252px; z-index:17"><img border=0 width="100%" height="100%" alt="" src="images/shape173206703.gif"></div>

<div id="image1" style="position:absolute; overflow:hidden; left:144px; top:130px; width:193px; height:38px; z-index:18"><img src="images/img18090811.gif" alt="" title="" border=0 width=193 height=38></div>

<div id="shape3" style="position:absolute; overflow:hidden; left:144px; top:441px; width:193px; height:247px; z-index:19"><img border=0 width="100%" height="100%" alt="" src="images/shape173254609.gif"></div>

<div id="image2" style="position:absolute; overflow:hidden; left:144px; top:407px; width:193px; height:38px; z-index:20"><img src="images/img18090858.gif" alt="" title="" border=0 width=193 height=38></div>

<div id="shape4" style="position:absolute; overflow:hidden; left:423px; top:137px; width:708px; height:335px; z-index:21"><img border=0 width="100%" height="100%" alt="" src="images/shape19895197.gif"></div>

<div id="text7" style="position:absolute; overflow:hidden; left:458px; top:149px; width:65px; height:32px; z-index:23">
<div class="wpmd">
<div><font face="Vani" class="ws14" color=black>Codigo:</font></div>
</div></div>

<div id="text8" style="position:absolute; overflow:hidden; left:458px; top:204px; width:89px; height:33px; z-index:25">
<div class="wpmd">
<div><font face="Vani" class="ws14" color=black>Nombre:</font></div>
</div></div>

<div id="text9" style="position:absolute; overflow:hidden; left:458px; top:259px; width:196px; height:32px; z-index:27">
<div class="wpmd">
<div><font face="Vani" class="ws14" color=black>Fecha de Nacimiento:</font></div>
</div></div>

<div id="text10" style="position:absolute; overflow:hidden; left:458px; top:314px; width:65px; height:32px; z-index:29">
<div class="wpmd">
<div><font face="Vani" class="ws14" color=black>Edad:</font></div>
</div></div>

<div id="text11" style="position:absolute; overflow:hidden; left:458px; top:371px; width:122px; height:32px; z-index:31">
<div class="wpmd">
<div><font face="Vani" class="ws14" color=black>Sueldo Base:</font></div>
</div></div>

<div id="text12" style="position:absolute; overflow:hidden; left:798px; top:371px; width:117px; height:32px; z-index:33">
<div class="wpmd">
<div><font face="Vani" class="ws14" color=black>Total Sueldo:</font></div>
</div></div>

<div id="text13" style="position:absolute; overflow:hidden; left:796px; top:314px; width:119px; height:32px; z-index:35">
<div class="wpmd">
<div><font face="Vani" class="ws14" color=black>Comision:</font></div>
</div></div>

<div id="text14" style="position:absolute; overflow:hidden; left:796px; top:258px; width:89px; height:32px; z-index:37">
<div class="wpmd">
<div><font face="Vani" class="ws14" color=black>Direccion:</font></div>
</div></div>

<div id="text15" style="position:absolute; overflow:hidden; left:143px; top:403px; width:197px; height:44px; z-index:38">
<div class="wpmd">
<div align=center><font color="#333333" face="Vani" class="ws24">Tomar Foto</font></div>
</div></div>

<div id="text16" style="position:absolute; overflow:hidden; left:144px; top:125px; width:197px; height:44px; z-index:39">
<div class="wpmd">
<div align=center><font color="#333333" face="Vani" class="ws24">Empleados</font></div>
</div></div>

<div id="image3" style="position:absolute; overflow:hidden; left:796px; top:143px; width:124px; height:111px; z-index:40"><img src="<?php echo $fotos ?>" alt="" title="" border=0 width=118 height=105 style="border:#000000 3px solid"></div>

<div id="html1" style="position:absolute; overflow:hidden; left:141px; top:451px; width:197px; height:210px; z-index:46">
	<table>
	<tr><td valign=top>

	<!-- First, include the JPEGCam JavaScript Library -->
	<script type="text/javascript" src="webcam.js"></script>

	<!-- Configure a few settings -->
	<script language="JavaScript">
		webcam.set_api_url( 'test.php' );
		webcam.set_quality( 90 ); // JPEG quality (1 - 100)
		webcam.set_shutter_sound( true ); // play shutter click

sound
	</script>

	<!-- Next, write the movie to the page at 320x240 -->
	<script language="JavaScript">
		document.write( webcam.get_html(220, 160) );
	</script>

	<!-- Some buttons for controlling things -->
	<br/><form>
		<input type=button value="Configurar"

onClick="webcam.configure()">
		<input type=button value="Tomar Foto"

onClick="take_snapshot()">
	</form>
	</td></tr></table>




	<!-- Code to handle the server response (see test.php) -->
	<script language="JavaScript">
		webcam.set_hook( 'onComplete', 'my_completion_handler' );

		function take_snapshot() {
			// take snapshot and upload to server
			//document.getElementById

('upload_results').innerHTML = '<h1>Uploading...</h1>';
			webcam.snap();
		}

		function my_completion_handler(msg) {
			// extract URL out of PHP output
			if (msg.match(/(http\:\/\/\S+)/)) {
				var image_url = RegExp.$1;
				// show JPEG image in page
				document.getElementById('upload_results').innerHTML ='<img src="' + image_url + '" alt="" border=0 width=161 height=131>';
                                document.form1.url.value= image_url;
				// reset camera for another shot
				webcam.reset();
			}
			else alert("PHP Error: " + msg);
		}
	</script>


</div>

<span id="upload_results" style="position:absolute; overflow:hidden; left:796px; top:143px; width:124px; height:111px; z-index:40"></span>
</div>

</div>

</body>
</html>
