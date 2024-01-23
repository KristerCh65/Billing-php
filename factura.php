<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

<link href="css/estilo.css" rel="stylesheet"/>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/lightbox-2.6.min.js"></script>
<link href="css/lightbox.css" rel="stylesheet"/>

<script>
function verificar(){
  var agree=confirm("¿Realmente desea eliminarlo? ");
  if (agree) return true;
  return false;
}
</script>


<style>
#ventana-flotante {
width: 400px;  /* Ancho de la ventana */
height: 300px;  /* Alto de la ventana */
background: #ceffad;  /* Color de fondo */
position: fixed;
top: 100px;
left: 50%;
margin-left: -180px;
border: 1px solid #adffad;  /* Borde de la ventana */
box-shadow: 0 5px 25px rgba(0,0,0,.1);  /* Sombra */
z-index:999;
}
#ventana-flotante #contenedor {
padding: 25px 10px 10px 10px;
}
#ventana-flotante .cerrar {
float: right;
border-bottom: 1px solid #bbb;
border-left: 1px solid #bbb;
color: #999;
background: white;
line-height: 17px;
text-decoration: none;
padding: 0px 14px;
font-family: Arial;
border-radius: 0 0 0 5px;
box-shadow: -1px 1px white;
font-size: 18px;
-webkit-transition: .3s;
-moz-transition: .3s;
-o-transition: .3s;
-ms-transition: .3s;
}
#ventana-flotante .cerrar:hover {
background: #ff6868;
color: white;
text-decoration: none;
text-shadow: -1px -1px red;
border-bottom: 1px solid red;
border-left: 1px solid red;
}
#ventana-flotante #contenedor .contenido {
padding: 15px;
box-shadow: inset 1px 1px white;
background: #deffc4;  /* Fondo del mensaje */
border: 1px solid #9eff9e;  /* Borde del mensaje */
font-size: 20px;  /* Tamaño del texto del mensaje */
color: #555;  /* Color del texto del mensaje */
text-shadow: 1px 1px white;
margin: 0 auto;
border-radius: 4px;
}
.oculto {-webkit-transition:1s;-moz-transition:1s;-o-transition:1s;-ms-transition:1s;opacity:0;-ms-opacity:0;-moz-opacity:0;visibility:hidden;}
</style>

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

$idd=$_REQUEST['idd'];
$id=$_REQUEST['id'];
$cod=$_REQUEST['cod'];
$nom=$_REQUEST['nom'];
$cp=$_REQUEST['cp'];
$des=$_REQUEST['des'];
$pre=$_REQUEST['pre'];
$imp=$_REQUEST['imp'];
$can=$_REQUEST['can'];
$cv=$_REQUEST['cv'];
$sub=$_REQUEST['sub'];
$td=$_REQUEST['td'];
$tot=$_REQUEST['tot'];
$tf=$_REQUEST['tf'];  // Etiqueta para mostrar en la parte superior de la factura







if (isset($_REQUEST['busca1']) || isset($_REQUEST['busca']) ){
if (isset($_REQUEST['busca1'])){
$_SESSION['id']=$id;
$_SESSION['idd']=$idd;
$_SESSION['cod']=$cod;
$_SESSION['nom']=$nom;
$_SESSION['cp']=$cp;
$_SESSION['des']=$des;
$_SESSION['pre']=$pre;
$_SESSION['imp']=$imp;
$_SESSION['can']=$can;
$_SESSION['cv']=$cv;
$_SESSION['sub']=$sub;
$_SESSION['td']=$td;
$_SESSION['tot']=$tot;
$_SESSION['tf']=$tf;

	
}else{
$id=$_SESSION['id'];
$idd=$_SESSION['idd'];
$cod=$_SESSION['cod'];
$nom=$_SESSION['nom'];
$cp=$_SESSION['cp'];
$des=$_SESSION['des'];
$pre=$_SESSION['pre'];
$imp=$_SESSION['imp'];
$can=$_SESSION['can'];
$cv=$_SESSION['cv'];
$sub=$_SESSION['sub'];
$td=$_SESSION['td'];
$tot=$_SESSION['tot'];
$tf=$_SESSION['tf'];



}

$cad=$_REQUEST['cad'];
echo '<div id="ventana-flotante">
   <a class="cerrar" href="javascript:void(0);" onclick="document.getElementById(&apos;ventana-flotante&apos;).className = &apos;oculto&apos;">x</a>
   <div id="contenedor">
      <div class="contenido">
Cadena de Busqueda: <br/> 
<form name="form2" target="_top" method="POST" action="factura.php"> 
<input type="text" name="cad" value="'.$cad.'" size=38><br/><br/>
<input type="submit" name="busca" class="button green" value="Buscar">
<table border=1 width=350><tr><td colspan=3 align=center>Resultado de la Busqueda</td></tr><tr><td>Codigo</td><td>Nombre</td><td>Edad</td></tr>';
$result=mysql_query("select * from cliente where nombre like '%$cad%' and '$cad'<>''",$link);
if(mysql_num_rows($result)>0){
while($fila=mysql_fetch_array($result)){
echo '<tr><td><input type="checkbox" onclick="document.form2.submit()" name="borrar[]" value="'.$fila['codigo'].'">'.$fila['codigo'].'</td>
<td>'.$fila['nombre'].'</td><td>'.$fila['edad'].'</td></tr>';
}
}
echo '</form></table></div></div></div>';
}


if(isset($_REQUEST['borrar'])){
$borrar=$_REQUEST['borrar'];
$cod=$borrar[0];
$result=mysql_query("select * from cliente where codigo='$cod'",$link);
$f=mysql_fetch_array($result);
$nom=$f['nombre'];

$id=$_SESSION['id'];
$idd=$_SESSION['idd'];
$cp=$_SESSION['cp'];
$des=$_SESSION['des'];
$pre=$_SESSION['pre'];
$imp=$_SESSION['imp'];
$can=$_SESSION['can'];
$cv=$_SESSION['cv'];
$sub=$_SESSION['sub'];
$td=$_SESSION['td'];
$tot=$_SESSION['tot'];
$tf=$_SESSION['tf'];


}














if (isset($_REQUEST['busca2']) || isset($_REQUEST['busc']) ){
if (isset($_REQUEST['busca2'])){
$_SESSION['idd']=$idd;
$_SESSION['id']=$id;
$_SESSION['cod']=$cod;
$_SESSION['nom']=$nom;
$_SESSION['cp']=$cp;
$_SESSION['des']=$des;
$_SESSION['pre']=$pre;
$_SESSION['imp']=$imp;
$_SESSION['can']=$can;
$_SESSION['cv']=$cv;
$_SESSION['sub']=$sub;
$_SESSION['td']=$td;
$_SESSION['tot']=$tot;
$_SESSION['tf']=$tf;

	
}else{
$idd=$_SESSION['idd'];
$id=$_SESSION['id'];
$cod=$_SESSION['cod'];
$nom=$_SESSION['nom'];
$cp=$_SESSION['cp'];
$des=$_SESSION['des'];
$pre=$_SESSION['pre'];
$imp=$_SESSION['imp'];
$can=$_SESSION['can'];
$cv=$_SESSION['cv'];
$sub=$_SESSION['sub'];
$td=$_SESSION['td'];
$tot=$_SESSION['tot'];
$tf=$_SESSION['tf'];



}

$cad2=$_REQUEST['cad2'];
echo '<div id="ventana-flotante">
   <a class="cerrar" href="javascript:void(0);" onclick="document.getElementById(&apos;ventana-flotante&apos;).className = &apos;oculto&apos;">x</a>
   <div id="contenedor">
      <div class="contenido">
Cadena de Busqueda: <br/> 
<form name="form3" target="_top" method="POST" action="factura.php"> 
<input type="text" name="cad2" value="'.$cad2.'" size=38><br/><br/>
<input type="submit" name="busc" class="button green" value="Buscar">
<table border=1 width=350><tr><td colspan=3 align=center>Resultado de la Busqueda</td></tr><tr><td>Codigo</td><td>Descripcion</td><td>Precio</td></tr>';
$result=mysql_query("select * from producto where descripcion like '%$cad2%' and '$cad2'<>''",$link);
if(mysql_num_rows($result)>0){
while($fila=mysql_fetch_array($result)){
echo '<tr><td><input type="checkbox" onclick="document.form3.submit()" name="borrar2[]" value="'.$fila['codigo'].'">'.$fila['codigo'].'</td>
<td>'.$fila['descripcion'].'</td><td>'.$fila['precio'].'</td></tr>';
}
}
echo '</form></table></div></div></div>';
}


if(isset($_REQUEST['borrar2'])){
$borrar2=$_REQUEST['borrar2'];
$cp=$borrar2[0];
$result=mysql_query("select * from producto where codigo='$cp'",$link);
$f=mysql_fetch_array($result);
$des=$f['descripcion'];
$pre=$f['precio'];
$imp=$f['impuesto'];


$idd=$_SESSION['idd'];
$id=$_SESSION['id'];
$cod=$_SESSION['cod'];
$nom=$_SESSION['nom'];
$can=$_SESSION['can'];
$cv=$_SESSION['cv'];
$sub=$_SESSION['sub'];
$td=$_SESSION['td'];
$tot=$_SESSION['tot'];
$tf=$_SESSION['tf'];

}









if (isset($_REQUEST['busca3']) || isset($_REQUEST['buscr']) ){
if (isset($_REQUEST['busca3'])){
$_SESSION['id']=$id;
$_SESSION['idd']=$idd;
$_SESSION['cod']=$cod;
$_SESSION['nom']=$nom;
$_SESSION['cp']=$cp;
$_SESSION['des']=$des;
$_SESSION['pre']=$pre;
$_SESSION['imp']=$imp;
$_SESSION['can']=$can;
$_SESSION['cv']=$cv;
$_SESSION['sub']=$sub;
$_SESSION['td']=$td;
$_SESSION['tot']=$tot;
$_SESSION['tf']=$tf;

	
}else{
$idd=$_SESSION['idd'];
$id=$_SESSION['id'];
$cod=$_SESSION['cod'];
$nom=$_SESSION['nom'];
$cp=$_SESSION['cp'];
$des=$_SESSION['des'];
$pre=$_SESSION['pre'];
$imp=$_SESSION['imp'];
$can=$_SESSION['can'];
$cv=$_SESSION['cv'];
$sub=$_SESSION['sub'];
$td=$_SESSION['td'];
$tot=$_SESSION['tot'];
$tf=$_SESSION['tf'];



}

$cad3=$_REQUEST['cad3'];
echo '<div id="ventana-flotante">
   <a class="cerrar" href="javascript:void(0);" onclick="document.getElementById(&apos;ventana-flotante&apos;).className = &apos;oculto&apos;">x</a>
   <div id="contenedor">
      <div class="contenido">
Cadena de Busqueda: <br/> 
<form name="form4" target="_top" method="POST" action="factura.php"> 
<input type="text" name="cad3" value="'.$cad3.'" size=38><br/><br/>
<input type="submit" name="buscr" class="button green" value="Buscar">
<table border=1 width=350><tr><td colspan=3 align=center>Resultado de la Busqueda</td></tr><tr><td>Codigo</td><td>Nombre</td><td>Edad</td></tr>';
$result=mysql_query("select * from vendedores where nombre like '%$cad3%' and '$cad3'<>''",$link);
if(mysql_num_rows($result)>0){
while($fila=mysql_fetch_array($result)){
echo '<tr><td><input type="checkbox" onclick="document.form4.submit()" name="borrar3[]" value="'.$fila['codigo'].'">'.$fila['codigo'].'</td>
<td>'.$fila['nombre'].'</td><td>'.$fila['edad'].'</td></tr>';
}
}
echo '</form></table></div></div></div>';
}


if(isset($_REQUEST['borrar3'])){
$borrar3=$_REQUEST['borrar3'];
$cv=$borrar3[0];
$result=mysql_query("select * from vendedores where codigo='$cv'",$link);
$f=mysql_fetch_array($result);


$idd=$_SESSION['idd'];
$id=$_SESSION['id'];
$cod=$_SESSION['cod'];
$nom=$_SESSION['nom'];
$cp=$_SESSION['cp'];
$des=$_SESSION['des'];
$pre=$_SESSION['pre'];
$imp=$_SESSION['imp'];
$can=$_SESSION['can'];
$sub=$_SESSION['sub'];
$td=$_SESSION['td'];
$tot=$_SESSION['tot'];
$tf=$_SESSION['tf'];

}















if(isset($_REQUEST['cod']) && $_REQUEST['cod']!=""){
$result=mysql_query("select * from cliente where codigo='$cod'", $link);
if(mysql_num_rows($result)==0){
echo '<script>alert("El Cliente NO existe");</script>';
}else{
$file=mysql_fetch_array($result);
$nom=$file['nombre'];
}
}


if(isset($_REQUEST['cp']) && $_REQUEST['cp']!=""){
$result=mysql_query("select * from producto where codigo='$cp'", $link);
if(mysql_num_rows($result)==0){
echo '<script>alert("El Producto NO existe");</script>';
}else{
$file=mysql_fetch_array($result);
$des=$file['descripcion'];
$pre=$file['precio'];
$imp=$file['impuesto'];



}
}


echo '<div><table bgcolor="#FFFFFF" border=1 style="position:absolute; overflow:hidden; left:710px; top:237px; width:504px; z-index:32">
<tr><td align=center>Cantidad</td><td align=center>Codigo</td><td align=center>Descripcion</td><td align=center>Precio</td><td align=center>Impuesto</td><td align=center>Total</td></tr>';
echo '<tr>';

if(isset($_REQUEST['agg'])){
//if(isset($_REQUEST['agg'])){
//$detalle=$_SESSION['detalle'];
//}else{
//$_SESSION['detalle']=$detalle;
///}
$sub=$pre * $can;
$td=$imp;
$tf=$sub+$td;
$tot=$sub + $imp;
$detalle=array("cantidad"=>$can, "codigo"=>$cp, "descripcion"=>$des, "precio"=>$pre, "impuesto"=>$imp, "total"=>$tot);


echo '<td align=center>'.$detalle["cantidad"].'</td><td align=center>'.$detalle["codigo"].'</td><td align=center>'.$detalle["descripcion"].'</td><td align=center>'.$detalle["precio"].'</td><td align=center>'.$detalle["impuesto"].'</td><td align=center>'.$detalle["total"].'</td></tr>';
echo '</table>';
}


if(isset($_REQUEST['enviar'])){

$result=mysql_query("select * from factura,detalle where factura.id_factura=detalle.factura and id_factura='$id'", $link);
if(mysql_num_rows($result)<=0){
$result=mysql_query("insert into factura(id_factura, fecha, id_cliente, id_vendedor) values ('$id', '$fe', '$cod', '$cv')", $link);
$result=mysql_query("insert into detalle(id_detalle, factura, producto, cantidad) values ('$idd', '$id', '$cp', '$can')", $link);
echo '<script>alert("Datos Almacenados");</script>';
}else{
echo '<script>alert("Este codigo ya fue asignado");</script>';
}

if(isset($_REQUEST['limpiar'])){
header("location:factura.php");
}
}

?>



<div id="container">
<div id="shape1" style="position:absolute; overflow:hidden; left:129px; top:45px; width:1108px; height:667px; z-index:0"><img border=0 width="100%" height="100%" alt="" src="images/shape4762632.gif"></div>

<div id="image4" style="position:absolute; overflow:hidden; left:44px; top:42px; width:1193px; height:115px; z-index:1"><img src="images/img96946171.jpg" alt="" border=0 width=1193 height=115></div>

<div id="hr1" style="position:absolute; overflow:hidden; left:0px; top:26px; width:1364px; height:23px; z-index:2">
<hr size=10 width=1364 color="#99CC00">
</div>

<form name="form1" target="_top" method="POST" action="factura.php" style="margin:0px">
<div id="formimage7" style="position:absolute; left:1047px; top:9px; z-index:4"><input type="image" name="formimage7" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage6" style="position:absolute; left:905px; top:9px; z-index:4"><input type="image" name="formimage6" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage1" style="position:absolute; left:764px; top:9px; z-index:5"><input type="image" name="formimage1" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage2" style="position:absolute; left:623px; top:9px; z-index:6"><input type="image" name="formimage2" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage3" style="position:absolute; left:482px; top:9px; z-index:7"><input type="image" name="formimage3" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage4" style="position:absolute; left:341px; top:8px; z-index:8"><input type="image" name="formimage4" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage5" style="position:absolute; left:200px; top:8px; z-index:9"><input type="image" name="formimage5" width="137" height="54" src="images/boton.jpg"></div>
<input name="tf" value="<?php echo $tf ?>" type="text" style="position:absolute;width:116px;left:1013px;top:188px;z-index:29">
<input name="nom" value="<?php echo $nom ?>" type="text" style="position:absolute;width:200px;left:437px;top:255px;z-index:31">
<input name="id" value="<?php echo $id ?>" type="text" style="position:absolute; overflow:hidden; left:698px; top:190px; width:87px; height:24px; z-index:27">
<input name="idd" value="<?php echo $idd ?>" type="text" style="position:absolute; overflow:hidden; left:453px;top:603px; width:87px; height:24px; z-index:27">
<input name="fe" value="<?php echo $fe ?>" type="date" style="position:absolute; overflow:hidden; left:349px; top:189px; width:135px; height:24px; z-index:25">
<input name="cod" onblur="document.form1.submit()" value="<?php echo $cod ?>" type="text" style="position:absolute;width:121px;left:278px;top:254px;z-index:34">
<input name="busca1" type="submit" value="Buscar" style="position:absolute;left:306px;top:280px;z-index:35">
<input name="cp" onblur="document.form1.submit()" value="<?php echo $cp ?>" type="text" style="position:absolute;width:151px;left:278px;top:340px;z-index:37">
<input name="busca2" type="submit" value="Buscar" style="position:absolute;left:438px;top:338px;z-index:38">
<input name="des" value="<?php echo $des ?>" type="text" style="position:absolute;width:413px;left:278px;top:407px;z-index:40">
<input name="pre" value="<?php echo $pre ?>" type="text" style="position:absolute;width:121px;left:278px;top:465px;z-index:42">
<input name="imp" value="<?php echo $imp ?>" type="text" style="position:absolute;width:121px;left:412px;top:465px;z-index:44">
<input name="can" value="<?php echo $can ?>" type="text" style="position:absolute;width:121px;left:547px;top:465px;z-index:46">
<input name="cv" value="<?php echo $cv ?>" type="text" style="position:absolute;width:161px;left:278px;top:526px;z-index:48">
<input name="busca3" type="submit" value="Buscar" style="position:absolute;left:458px;top:525px;z-index:49">
<input type="radio" name="tipo" style="position:absolute;left:283px;top:573px;z-index:50">
<input type="radio" name="tipo" style="position:absolute;left:283px;top:597px;z-index:51">
<input name="sub" value="<?php echo $sub ?>" type="text" style="position:absolute;width:132px;left:1076px;top:578px;z-index:57">
<input name="td" value="<?php echo $td ?>" type="text" style="position:absolute;width:132px;left:1076px;top:607px;z-index:58">
<input name="tot" value="<?php echo $tot ?>" type="text" style="position:absolute;width:132px;left:1076px;top:636px;z-index:59">
<input name="enviar" type="submit" value="Facturar" style="position:absolute;left:751px;top:620px;z-index:60">
<input name="limpiar" type="submit" value="Limpiar" style="position:absolute;left:867px;top:620px;z-index:61">
<input name="agg" class="button green" type="submit" value="Agregar" style="position:absolute;left:637px;top:546px;z-index:62">
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

<div id="hr2" style="position:absolute; overflow:hidden; left:0px; top:704px; width:1364px; height:23px; z-index:16">
<hr size=3 width=1364 color="#99CC00">
</div>

<div id="shape2" style="position:absolute; overflow:hidden; left:44px; top:179px; width:193px; height:214px; z-index:17"><img border=0 width="100%" height="100%" alt="" src="images/shape173206703.gif"></div>

<div id="image1" style="position:absolute; overflow:hidden; left:44px; top:156px; width:193px; height:38px; z-index:18"><img src="images/img96946203.gif" alt="" border=0 width=193 height=38></div>

<div id="shape3" style="position:absolute; overflow:hidden; left:44px; top:421px; width:193px; height:291px; z-index:19"><img border=0 width="100%" height="100%" alt="" src="images/shape173254609.gif"></div>

<div id="image2" style="position:absolute; overflow:hidden; left:44px; top:387px; width:193px; height:38px; z-index:20"><img src="images/img96946218.gif" alt="" border=0 width=193 height=38></div>

<div id="text7" style="position:absolute; overflow:hidden; left:428px; top:113px; width:561px; height:37px; z-index:21"><div class="wpmd">
<div align=center><font class="ws22"><B>F</B></font><font class="ws18">acturación</font></div>
</div></div>

<div id="shape4" style="position:absolute; overflow:hidden; left:250px; top:169px; width:969px; height:502px; z-index:22"><img border=0 width="100%" height="100%" alt="" src="images/shape18454687.gif"></div>

<div id="hr3" style="position:absolute; overflow:hidden; left:277px; top:207px; width:917px; height:17px; z-index:23">
<hr size=2 width=917>
</div>

<div id="text9" style="position:absolute; overflow:hidden; left:284px; top:189px; width:67px; height:25px; z-index:24"><div class="wpmd">
<div><font class="ws16" face="Times New Roman">Fecha:</font></div>
</div></div>



<div id="text11" style="position:absolute; overflow:hidden; left:586px; top:190px; width:118px; height:24px; z-index:26"><div class="wpmd">
<div><font class="ws16" face="Times New Roman">Factura No°:</font></div>
</div></div>


<div id="text13" style="position:absolute; overflow:hidden; left:893px; top:188px; width:124px; height:23px; z-index:28"><div class="wpmd">
<div><font class="ws16" face="Times New Roman">Total Factura:</font></div>
</div></div>

<div id="text14" style="position:absolute; overflow:hidden; left:437px; top:234px; width:157px; height:24px; z-index:30"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Nombre del Cliente:</font></div>
</div></div>



<div id="text15" style="position:absolute; overflow:hidden; left:278px; top:233px; width:157px; height:24px; z-index:33"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Codigo:</font></div>
</div></div>

<div id="text16" style="position:absolute; overflow:hidden; left:278px; top:319px; width:157px; height:24px; z-index:36"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Codigo Producto:</font></div>
</div></div>

<div id="text17" style="position:absolute; overflow:hidden; left:278px; top:386px; width:157px; height:24px; z-index:39"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Descripcion:</font></div>
</div></div>

<div id="text18" style="position:absolute; overflow:hidden; left:278px; top:444px; width:74px; height:24px; z-index:41"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Precio:</font></div>
</div></div>

<div id="text19" style="position:absolute; overflow:hidden; left:412px; top:444px; width:93px; height:24px; z-index:43"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Impuesto:</font></div>
</div></div>

<div id="text20" style="position:absolute; overflow:hidden; left:547px; top:444px; width:81px; height:24px; z-index:45"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Cantidad:</font></div>
</div></div>

<div id="text21" style="position:absolute; overflow:hidden; left:278px; top:505px; width:190px; height:24px; z-index:47"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Codigo de Vendedor:</font></div>
</div></div>

<div id="text22" style="position:absolute; overflow:hidden; left:309px; top:574px; width:61px; height:24px; z-index:52"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Detalle</font></div>
</div></div>

<div id="text23" style="position:absolute; overflow:hidden; left:309px; top:599px; width:78px; height:24px; z-index:53"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Mayoreo</font></div>
</div></div>

<div id="text24" style="position:absolute; overflow:hidden; left:972px; top:579px; width:75px; height:23px; z-index:54"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Subtotal:</font></div>
</div></div>

<div id="text25" style="position:absolute; overflow:hidden; left:946px; top:609px; width:101px; height:23px; z-index:55"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Total Imp. :</font></div>
</div></div>

<div id="text26" style="position:absolute; overflow:hidden; left:996px; top:640px; width:51px; height:23px; z-index:56"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Total:</font></div>
</div></div>

<div id="text27" style="position:absolute; overflow:hidden; left:452px; top:580px; width:93px; height:24px; z-index:43"><div class="wpmd">
<div><font class="ws14" face="Times New Roman">Id detalle:</font></div>
</div></div>


</div></body>
</html>
