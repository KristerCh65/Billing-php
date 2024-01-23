<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled</title>
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
<body bgColor="#000000">

<?php

session_start();
require("config.php");

echo '<form name="form2" action="ventas.php" method="POST" target="_top">
<table border=1 style="position:absolute; overflow:hidden; left:520px; top:240px; width:500px; height:50px; z-index:36">
<tr><td colspan=7 align=center bgcolor=black><font color=white>Listado General de Ventas</font></td></tr>
<tr bgcolor=coffe><td>Factura</td><td>Cliente</td><td>Producto</td><td>Fecha</td><td>Cantidad</td></tr>';





  $num = 10; // número de filas por página
      $comienzo = $_REQUEST['comienzo'];
      if (!isset($comienzo)) $comienzo = 0;
      // Calcular el número total de filas de la tabla
 
     $consulta=mysql_query("select * from factura",$link);

      $nfilas = mysql_num_rows ($consulta);

echo '<div style="position:absolute; overflow:hidden; left:522px; top:203px; z-index:42">';
 

 if ($nfilas > 0)
      {
      // Mostrar números inicial y final de las filas a mostrar
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




if(isset($_REQUEST['des'])){
$des=$_REQUEST['des'];
$has=$_REQUEST['has'];

$resul=mysql_query("select * from factura where fecha between '$des' and '$has'  limit $comienzo, $num",$link);

}else{
$resul=mysql_query("select * from factura limit $comienzo, $num",$link);
}
while($fila=mysql_fetch_array($resul)){
echo '<tr bgcolor=coffe><td>'.$fila['num_factura'].'</td><td>'.$fila['cod_cliente'].'</td><td>'.$fila['cod_producto'].'</td><td>'.$fila['fecha'].'</td><td>'.$fila['cantidad'].'</td>';

}

echo '</table></form>';

?>

<div id="container">
<div id="shape1" style="position:absolute; overflow:hidden; left:144px; top:44px; width:1106px; height:645px; z-index:0"><img border=0 width="100%" height="100%" alt="" src="images/shape4762632.gif"></div>

<div id="image4" style="position:absolute; overflow:hidden; left:144px; top:38px; width:1106px; height:93px; z-index:1"><img src="images/img18090765.jpg" alt="" title="" border=0 width=1106 height=93></div>

<div id="hr1" style="position:absolute; overflow:hidden; left:0px; top:23px; width:1364px; height:23px; z-index:2">
<hr size=10 width=1364 color="#99CC00">
</div>

<form name="form1" target="_top" method="POST" action="ventas.php" style="margin:0px">
<div id="formimage7" style="position:absolute; left:1047px; top:9px; z-index:4"><input type="image" name="formimage7" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage6" style="position:absolute; left:905px; top:9px; z-index:4"><input type="image" name="formimage6" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage1" style="position:absolute; left:764px; top:9px; z-index:5"><input type="image" name="formimage1" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage2" style="position:absolute; left:623px; top:9px; z-index:6"><input type="image" name="formimage2" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage3" style="position:absolute; left:482px; top:9px; z-index:7"><input type="image" name="formimage3" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage4" style="position:absolute; left:341px; top:8px; z-index:8"><input type="image" name="formimage4" width="137" height="54" src="images/boton.jpg"></div>
<div id="formimage5" style="position:absolute; left:200px; top:8px; z-index:9"><input type="image" name="formimage5" width="137" height="54" src="images/boton.jpg"></div>
<input name="des" type="date" value="<?php echo $des ?>" placeholder="Digite desde donde" style="position:absolute;width:242px;left:494px;top:180px;z-index:26">
<input name="has" type="date" value="<?php echo $has ?>" placeholder="Digite hasta donde" style="position:absolute;width:242px;left:796px;top:179px;z-index:27">
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

<div id="shape4" style="position:absolute; overflow:hidden; left:432px; top:141px; width:708px; height:498px; z-index:21"><img border=0 width="100%" height="100%" alt="" src="images/shape19895197.gif"></div>

<div id="text7" style="position:absolute; overflow:hidden; left:155px; top:132px; width:172px; height:36px; z-index:22">
<div class="wpmd">
<div><font face="Vani" class="ws16">Reporte de Ventas</font></div>
</div></div>

<div id="text8" style="position:absolute; overflow:hidden; left:523px; top:88px; width:503px; height:46px; z-index:23">
<div class="wpmd">
<div align=center><font face="Vani" class="ws20">Buscar por Fechas</font></div>
</div></div>

<div id="text9" style="position:absolute; overflow:hidden; left:494px; top:156px; width:141px; height:27px; z-index:24">
<div class="wpmd">
<div><font face="Vani" class="ws14">Desde:</font></div>
</div></div>

<div id="text10" style="position:absolute; overflow:hidden; left:795px; top:155px; width:71px; height:27px; z-index:25">
<div class="wpmd">
<div><font face="Vani" class="ws14">Hasta:</font></div>
</div></div>

</div>

</body>
</html>
