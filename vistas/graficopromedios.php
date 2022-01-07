<?php
            require_once '../clases/conexion.php';
			// content="text/plain; charset=utf-8"
			require_once ('../librerias/jpgraph/src/jpgraph.php');
			require_once ('../librerias/jpgraph/src/jpgraph_line.php');
			require_once ('../librerias/jpgraph/src/jpgraph_bar.php');
            $c = new conectar();
            $conexion = $c->conexion();
			$sql1 = "select causas.id, causas.fecha_creacion, causas.fecha_termino, materias.materia, causas.id_materia from causas INNER JOIN materias ON materias.id=causas.id_materia ORDER BY causas.id_materia DESC";
            $rs1 = mysqli_query($conexion, $sql1);	
$datay=array();			
$datax=array();	
$suma=array();
while($tabla=  mysqli_fetch_row($rs1)){
$tabla[1];
$tabla[2];
$date1=$tabla[1];
$date2=$tabla[2];
$materia=$tabla[3];	
$i=1;
$idmateria=$tabla[4];
$sql2 = "select count(id_materia) as materiaa from causas where id_materia='$idmateria'";
$rs2 = mysqli_query($conexion, $sql2);
while($mat=mysqli_fetch_row($rs2)){
$date1_ts=strtotime($date1);
$date2_ts=strtotime($date2);
$diff=$date2_ts - $date1_ts;
$datediff=round($diff/86400);
$datay[]=$datediff;
$datax[]=$materia;

}
}

// Create the graph. These two calls are always required
$graph = new Graph(1400,600);
$graph->SetScale('textlin');
 
// Add a drop shadow
$graph->SetShadow();
 
// Adjust the margin a bit to make more room for titles
$graph->SetMargin(40,30,20,40);
 
// Create a bar pot
$bplot = new BarPlot($datay);
 
// Adjust fill color
$bplot->SetFillColor('orange');
$graph->Add($bplot);
$bplot->value->Show();
$bplot->value->SetFont(FF_ARIAL,FS_BOLD);
$bplot->value->SetFormat('%01.0f dias'); 
// Setup the titles
$graph->title->Set('Tiempo de causas');
$graph->xaxis->title->Set('Materias de causas');
$graph->yaxis->title->Set('Dias');
$graph->xaxis->SetTickLabels($datax);
$graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,8);
 
$graph->title->SetFont(FF_ARIAL,FS_BOLD);
$graph->yaxis->title->SetFont(FF_ARIAL,FS_BOLD);
$graph->xaxis->title->SetFont(FF_ARIAL,FS_BOLD);
 
// Display the graph
$graph->Stroke();
?>