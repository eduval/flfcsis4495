<?php
/**
#Market place cart
Developer educristo@gmail.com
Start 13 Dec 2021
scrollingData
**/
/**********************************************************/
/***********CAMBIAR LINEA DE CONEXION EN SITIO REAL *******/
//require_once("../config/config_gcp.php");
/**********************************************************/
/**********************************************************/
/***********CAMBIAR LINEA DE CONEXION EN SITIO local *******/
require_once("config_gcp.php");
/**********************************************************/
include('GlobalFSyn-view.php');

$htmlLoadData="";
if(isset($_POST["limit"],$_POST['start'],$_POST['query']))
{
$limit = $_POST['limit'];
$start = $_POST['start'];
$query2 = $_POST['query'];
$subClientT = '';
$buyerT = '318';

$query2 = query_main($start, $limit,'318','','','','','',$con,'');
$sql_products = mysqli_query($con,$query2);

  $start;

while($row_products = mysqli_fetch_array($sql_products))
{
//	echo $Syni = ($Syni+1)."<br>";
	$sr = $sr + 1;
	 $Syni = $sr + intval($start);

	$category_id_product  = $row_products["categoryid"];
	$id_product           = $row_products["id"];
	$name_product         = $row_products["Produtcname"];
	$product_size         = $row_products["size"];
	$bunchname            = $row_products["steams"];

	$img_product          = htmlEntities($row_products['img'], ENT_QUOTES);
	$subcategory_product  = $row_products["subcatename"];
	$subcategoryid        = $row_products["subcategoryid"];
	$featureName          = $row_products["featurename"];
	$featureId            = $row_products["fid"];
	$bunchqty             = $row_products["bunchqty"];
	$idgor                = $row_products['idgor'];
	$product_stems        = $row_products['gorsteams'];
	$inven_type           = $row_products['tab_title1'];
	$fact_id              = $row_products['id_fact'];

  $tag_grabar = $row_products['id_tag'];

	if($featureId==''){$featureId= 0;}

	$getIdSize = mysqli_query($con,"select id from sizes where name ='$product_size'");
	$getNamesArray = mysqli_fetch_array($getIdSize);
	$sizeID = $getNamesArray['id'];

	$getIdStems = mysqli_query($con,"select id from bunch_sizes where name ='$product_stems'");
	$getNamesArrayStems = mysqli_fetch_array($getIdStems);
	$stemsID = $getNamesArrayStems['id'];

	if($featureId==''){$aaaa = $product_stems. " st/bu";}else{$aaaa = "";}
	//if($featureId==''){$aaaa = $product_stems. " st/bu";}else{$aaaa = $product_stems. " st/bu";}

	if($subcategoryid=='130'){$bbbb = ""; $aaaa = $product_stems. " Unit/Box";}else{$bbbb = "Size: ".$product_size.  " [cm] ";}

	if($inven_type == "HOLANDA"){
	$figure ="<figure class='m-0 text-center bg-light-radial rounded-top overflow-hidden'><img class='img-fluid bg-suprime opacity-9 img' alt='$name_product'  src='$img_product' width='300px' height='300px'></figure>";} else {
  $figure ="<figure class='m-0 text-center bg-light-radial rounded-top overflow-hidden'><img class='img-fluid bg-suprime opacity-9 img' alt='$name_product'  src='https://app.freshlifefloral.com/$img_product' width='300px' height='300px'></figure>";}


	if($featureName!=''){$featureNameB = "<span class='float-end text-success fs--13 b-0 w--120 mt-1'><i class='fa fa-certificate fa-spin text-warning' aria-hidden='true'></i> $featureName</span>";}else{$featureNameB = "";}

	$i=0;
	
	$namT = str_replace(' ', '-', $name_product);
  $subcategory_product = str_replace(' ', '-', $subcategory_product);

		$htmlLoadData .="<div class='col-6 col-md-3 mb-4 mb-2-xs'><div class='bg-white shadow-md shadow-3d-hover transition-all-ease-250 transition-hover-top rounded show-hover-container p-2 h-100'><div class='position-absolute top-0 start-0 m-3 m-1-xs z-index-1'></div>
		<div class='position-absolute top-0 end-0 text-align-end w--60 z-index-3 m-3'>
		</div>
			<style>.img {float: left; width: 250px; height: 250px; object-fit: cover; } p {text-align: center; font-size: 60px; margin-top: 0px;}</style>
			<div class='d-block text-decoration-none'>$figure
			<span class='d-block text-center-xs text-gray-600 py-3'>
			<span class='d-block fs--16 max-h-150 overflow-hidden'>
					$subcategory_product $name_product <br> $bbbb$aaaa
					$featureNameB
			</span>
			</span></div></div></div>";

}

 echo "<div class='row gutters-xs--xs'>".$htmlLoadData."</div>";
}
?>
