<?php
/**
#Market place cart
Developer educristo@gmail.com
Start 13 Dec 2021
11 Jan 2022
scrollingData
**/
function getOrdersTotal($id_order,$id_client,$id_buyer)
{
return $queryOrders = "SELECT * FROM reser_requests where id_order='$id_order' and id_client='$id_client' and buyer='$id_buyer'";
}
function countTotalOrders($con,$clientSessionID){
   $queryOrders = "select count(*) as my_orders
from subclient_cab
where status_ord = 'Pending / Active'
and client_id ='$clientSessionID'";

$rs_nameB = mysqli_query($con,$queryOrders);
$totalR = mysqli_fetch_array($rs_nameB);

return $totalR[0];

}

function precioProductSelected($con,$subcategory,$sizeId,$product,$featureId,$stemsID,$idorigin){

  ////////////////////////////////////////////////////////
  // Precios por producto
  if($featureId!=""){
    $feat =  " and feature = '$featureId'";
  }else{
    $feat = '';
  }



  if($idorigin==1){
    $priceorigin =  " price_card";
    $precioarrayCad = $priceSubca["price_card"];
  }else{
    $priceorigin =  " price_card_2";
    $precioarrayCad = $priceSubca["price_card_2"];
  }

  //1 CAD
  //2 USD

           $sql_priceProd = "select id      ,  idsc      ,  size    ,  stem_bunch,  description,  type,  feature,  id_ficha,
                            relacion,  $priceorigin,  id_param,  product_id
                       from card_param_product_price
                      where idsc       = '" . $subcategory . "'
                        and product_id = '" . $product . "'
                        and stem_bunch = '" . $stemsID . "'
                        $feat
              and size       = '" . $sizeId . "'"     ;

      $rs_priceProd   = mysqli_query($con, $sql_priceProd);
       $priceProd = mysqli_num_rows($rs_priceProd);
      $priceProdDet = mysqli_fetch_array($rs_priceProd);

   if ($priceProd < 1) {
         $sql_priceSub = "select id,  idsc,  subcategory,  size,  stem_bunch,  description,  type,
                feature,  factor,  id_ficha,  relacion,  $priceorigin,  price_special,
                price_adm
             from grower_parameter
              where idsc       = '" . $subcategory   . "'
                and stem_bunch = '" . $stemsID . "'
              $feat
              and size = '" . $sizeId . "'  ";

     $rs_priceSub  = mysqli_query($con, $sql_priceSub);
     $priceSubca  = mysqli_fetch_array($rs_priceSub);

      // $precioSubcliente = $precioarrayCad;
        if($idorigin==1){
         $precioSubcliente = $priceSubca["price_card"];
       }else{
         $precioSubcliente = $priceSubca["price_card_2"];
       }
     }else{
       if($idorigin==1){
       $precioSubcliente = $priceProdDet["price_card"];
     }
       else{

       $precioSubcliente = $priceProdDet["price_card_2"];
     }
  }

  return $precioSubcliente;
}

function query_ordersDetail($con,$codOrder){
	// Datos del Buyer orders
    $infoOrdersCliente = "select * from subclient_cab where order_cli='$codOrder' order by id desc";
		return $infoOrdersCliente;
}

function query_clientDetail($con,$userSessionID){
	// Datos del Buyer orders
    $infoOrdersCliente = "select * from sub_client where id='$userSessionID'";
		return $infoOrdersCliente;
}


function query_orders($con,$userSessionID){
	// Datos del Buyer orders
    $infoOrdersCliente = "select * from subclient_cab where client_id='$userSessionID' order by order_cli desc";
		return $infoOrdersCliente;
}

function CountOrdersCliente($con,$userSessionID){
	// Datos del Buyer orders
    $infoOrdersCliente = "select * from subclient_cab where client_id='$userSessionID'";
    $rowOrdersCliente = mysqli_query($con, $infoOrdersCliente);
    $total_pagina = mysqli_num_rows($rowOrdersCliente);

    return $num_recordMB   = $total_pagina;
}

function OrderIdBuyer($con,$userSessionID){
	// Datos del Buyer orders
     $buyerOrder = "select id
                      from buyer_orders
                     where availability = '1'
                     and buyer_id= '$userSessionID'
                        limit 0,1";

    $buyerO = mysqli_query($con, $buyerOrder);
    $buyOrder = mysqli_fetch_array($buyerO);
		return $buyOrder['id'];
}
function getDataClient($con,$clientSessionID){

	 $sql_name = "SELECT name as fname FROM sub_client
									where id = '$clientSessionID' ";

										$rs_nameB = mysqli_query($con,$sql_name);
										$row_nameB = mysqli_fetch_array($rs_nameB);
										 $fnameB = $row_nameB['fname'];

										return $fnameB;
}

function getemailCliente($con,$clientSessionID){
	$sql_name = "SELECT email FROM buyers
									where id = '$userSessionID' ";

										$rs_emailB = mysqli_query($con,$sql_name);
										$row_emailB = mysqli_fetch_array($rs_emailB);
										$emailB = $row_emailB['email'];

										return $emailB;
}

function getNameGrower($con, $growerID_Prod){

	 $sql_name = "SELECT growers_name FROM growers
									where id = '$growerID_Prod' ";

										$rs_name = mysqli_query($con,$sql_name);
										$row_nameB = mysqli_fetch_array($rs_name);
										$nameG = $row_nameB['growers_name'];

										return $nameG;
}

function calculateKilo($userSessionID,$con){
   $getBuyerShippingMethod = "select shipping_method_id
                              from buyer_shipping_methods
                             where buyer_id ='" . $userSessionID . "'";

  $buyerShippingMethodRes = mysqli_query($con, $getBuyerShippingMethod);
  $buyerShippingMethod = mysqli_fetch_assoc($buyerShippingMethodRes);
   $shipping_method_id = $buyerShippingMethod['shipping_method_id'];

     $getShippingMethod = "select connect_group
                             from shipping_method
                            where id='" . $shipping_method_id . "'";

      $getShippingMethodRes = mysqli_query($con, $getShippingMethod);
      $shippingMethodDetail = mysqli_fetch_assoc($getShippingMethodRes);

       $temp_conn = explode(',', $shippingMethodDetail['connect_group']);

      $id_conn = $temp_conn[1];  // Default

      $getConnect = "select charges_per_kilo
                       from connections
                      where id='" . $id_conn . "'";

      $rs_connect = mysqli_query($con, $getConnect);
      $charges = mysqli_fetch_assoc($rs_connect);
       /////////////////////////////////////////////////////////////
      $cost = $charges['charges_per_kilo'];
      $cost_un = unserialize($cost);

      $cost_sum = 0;

      foreach ($cost_un as $key => $value) {
          $cost_sum = $cost_sum + $value;
      }

      return $charges_per_kilo_trans =  $cost_sum;
}

function calculatePriceGrower($growerid,$productid,$sizeid,$idsc,$con,$userSessionID){

	//$tasaKilo = calculateKilo($userSessionID,$con);

    $getGrowerPriceMeth1 = "select gp.price as price
															from growcard_prod_price gp
															INNER JOIN growers g ON gp.growerid = g.id
															INNER JOIN product p ON gp.productid = p.id
															INNER JOIN subcategory s ON p.subcategoryid = s.id
															INNER JOIN colors c on p.color_id = c.id
															where g.active = 'active'
															and gp.growerid = '$growerid'
															and gp.productid = '$productid'
															and gp.sizeid = '$sizeid'";
  $getGrowerPriceMeth1_array = mysqli_query($con, $getGrowerPriceMeth1);
  $GrowerPriceMeth1 = mysqli_fetch_assoc($getGrowerPriceMeth1_array);
  $priceGrower = $GrowerPriceMeth1['price'];
															if($priceGrower<=0){
																$getGrowerPriceMeth2 = "select gp.id,gp.price_adm as price,
																s.name as sizename , gp.feature as feature, gp.factor,
																gp.stem_bunch , b.name as stems
																from grower_parameter gp
																inner JOIN sizes s ON gp.size = s.id
																inner JOIN bunch_sizes b ON gp.stem_bunch = b.id
																left JOIN features f ON gp.feature = f.id
																where gp.idsc = '$idsc'
																and gp.size = '$sizeid'";
																$getGrowerPriceMeth2_array = mysqli_query($con, $getGrowerPriceMeth2);
																$GrowerPriceMeth2 = mysqli_fetch_assoc($getGrowerPriceMeth2_array);
																//$a = $GrowerPriceMeth2['price'];
																$priceGrower = sprintf('%.2f',round($GrowerPriceMeth2['price'],2));
															}

  	return $priceGrower;
}


function calculateCost_Transp($growerid,$productid,$sizeid,$idsc,$con,$userSessionID){

	$tasaKilo = calculateKilo($userSessionID,$con);

   $getGrowerPriceMeth1 = "select gp.price as price
															from growcard_prod_price gp
															INNER JOIN growers g ON gp.growerid = g.id
															INNER JOIN product p ON gp.productid = p.id
															INNER JOIN subcategory s ON p.subcategoryid = s.id
															INNER JOIN colors c on p.color_id = c.id
															where g.active = 'active'
															and gp.growerid = '$growerid'
															and gp.productid = '$productid'
															and gp.sizeid = '$sizeid'";
  $getGrowerPriceMeth1_array = mysqli_query($con, $getGrowerPriceMeth1);
  $GrowerPriceMeth1 = mysqli_fetch_assoc($getGrowerPriceMeth1_array);
  $priceGrower = $GrowerPriceMeth1['price'];
		if($priceGrower<=0){
			$getGrowerPriceMeth2 = "select gp.id,gp.price_adm as price,
			s.name as sizename , gp.feature as feature, gp.factor,
			gp.stem_bunch , b.name as stems
			from grower_parameter gp
			inner JOIN sizes s ON gp.size = s.id
			inner JOIN bunch_sizes b ON gp.stem_bunch = b.id
			left JOIN features f ON gp.feature = f.id
			where gp.idsc = '$idsc'
			and gp.size = '$sizeid'";
			$getGrowerPriceMeth2_array = mysqli_query($con, $getGrowerPriceMeth2);
			$GrowerPriceMeth2 = mysqli_fetch_assoc($getGrowerPriceMeth2_array);

			$priceBunch = $tasaKilo * $GrowerPriceMeth2['factor'];
		 	$priceSteam = $priceBunch / $GrowerPriceMeth2['stems'];
			//$a = $GrowerPriceMeth2['price'];
			$priceGrower = sprintf('%.2f',round($priceSteam,2));
		}

  	return $priceGrower;
}



function calculatePriceCliente($growerid,$productid,$sizeid,$idsc,$userSessionID,$con){
	$tasaKilo = calculateKilo($userSessionID,$con);

							 $sql_price = "select gp.id,gp.price_adm as price,
							s.name as sizename , gp.feature as feature, gp.factor,
							gp.stem_bunch , b.name as stems
							from grower_parameter gp
							inner JOIN sizes s ON gp.size = s.id
							inner JOIN bunch_sizes b ON gp.stem_bunch = b.id
							left JOIN features f ON gp.feature = f.id
							where gp.idsc = '$idsc'
							and gp.size = '$sizeid'";

										$rs_price = mysqli_query($con,$sql_price);
										$row_price = mysqli_fetch_array($rs_price);
										$priceBunch = $tasaKilo * $row_price['factor'];
										$priceSteam = $priceBunch / $row_price['stems'];
										$priceCalculado = sprintf('%.2f',round($priceSteam + $row_price['price'],2));
										return $priceCalculado;
}

function detailsOrder($orderId,$con){
$selecDetailsOrder = "select order_number, del_date from buyer_orders where id = '$orderId'";
$rs_DetailOrder = mysqli_query($con,$selecDetailsOrder);
$row_DetailOrder = mysqli_fetch_array($rs_DetailOrder);

return 	" Order: <strong>".$row_DetailOrder['order_number']."</strong> 	Arrival date: <strong>".$row_DetailOrder['del_date']."</strong>";
}

function query_main($init,$display,$buyerID,$fcat,$fcolor,$fsize,$ffeat,$fproductID,$con,$tagId){
$posicion_coincidencia = strpos($init, ',');

if($tagId!=''){
  $filterTag = "and p.id_tag = '$tagId'";
}else{
  $filterTag ='';
}

//se puede hacer la comparacion con 'false' o 'true' y los comparadores '===' o '!=='
if ($posicion_coincidencia === false)
{
      if($fcat!=''){
        $filterCat = "and p.subcategoryid = '$fcat'";
      }else{ $filterCat ='';}

      if($fproductID!=''){
				$filterProd2 = ", sz.id as siId, sz.name as NSsize";
				$filterProd1 = " LEFT JOIN growcard_prod_bunch_sizes  gr ON(gr.grower_id=gp.grower_id AND gr.product_id=gp.product_id) LEFT JOIN sizes sz ON gr.sizes = sz.id";
        $filterProd = "and p.id = '$fproductID'";
				$filterProd = ",sz.name ";
      }else{ $filterProd ='';
}

      if($fcolor!=''){
        $fcolor = substr($fcolor, 0, -1);
        $filterColor = " and cl.id in ($fcolor)";
      }else{ $filterColor =''; $filterColor1 ='';}

      if($fsize!=''){
				$nameSize='';
        $fsize = substr($fsize, 0, -1);

				 $getNameSize = mysqli_query($con,"select name from sizes where id in($fsize)");
				while($getNamesArray = mysqli_fetch_array($getNameSize))
				{
					 $nameSize .= $getNamesArray['name'].",";
				}

				$nameSize = substr($nameSize, 0, -1);

        $filterSizes = "and gor.size in ($nameSize)";
        //$filterSizes1 = " INNER JOIN growcard_prod_sizes ps ON (gp.grower_id = ps.grower_id and gp.product_id = ps.product_id) INNER join sizes sz on ps.sizes = sz.id ";
       //  $filterSizes2 = ", sz.id as siId";
      }else{ $filterSizes =''; $filterSizes1 =''; $filterSizes2 =''; }

      if($ffeat!=''){
        $ffeat = substr($ffeat, 0, -1);
        $filterFeatures = "and f.id IN ($ffeat)";
      }else{ $filterFeatures =''; $filterFeatures1 =''; $filterFeatures2 ='';}

      $query = "
	  select distinct p.name as Produtcname, p.subcate_name as subcatename, p.image_path as img, col.name as color, cat.name as categotyname, gcps.size_value as size, gro.steams as gorsteams
from product as p, colors as col, category as cat, growcard_prod_sizes as gcps, grower_offer_reply gro 
where p.status_image = '0' and p.status_image = '0' and col.id = p.color_id and cat.id = p.categoryid and gcps.product_id = p.id and p.subcate_name != '-- Select Subcategory --' and p.subcate_name != ' -- Select Sub Category --' and p.image_path NOT LIKE 'https://api%' and gro.product = p.name and gro.buyer_id = '318' 
and gro.status = 0
order by subcatename, size";
    $query = $query.  " LIMIT $init,$display";

} else{

  if($fcat!=''){
    $filterCat = "and p.subcategoryid = '$fcat'";
  }else{ $filterCat ='';}

	if($fproductID!=''){
		$filterProd2 = ", sz.id, sz.name as namesize";
		$filterProd1 = " LEFT JOIN growcard_prod_bunch_sizes  gr ON(gr.grower_id=gp.grower_id AND gr.product_id=gp.product_id) LEFT JOIN sizes sz ON gr.sizes = sz.id";
		$filterProd = "and p.id = '$fproductID'";
		$filterProd = ",sz.name ";
	}else{ $filterProd ='';

	}

  if($fcolor!=''){
    $fcolor = substr($fcolor, 0, -1);
    $filterColor = " and cl.id in ($fcolor)";
  }else{ $filterColor =''; $filterColor1 ='';}

	if($fsize!=''){
		$nameSize='';
		$fsize = substr($fsize, 0, -1);

		 $getNameSize = mysqli_query($con,"select name from sizes where id in($fsize)");
		while($getNamesArray = mysqli_fetch_array($getNameSize))
		{
			 $nameSize .= $getNamesArray['name'].",";

		}

		$nameSize = substr($nameSize, 0, -1);

		$filterSizes = "and gor.size in ($nameSize)";
		//$filterSizes1 = " INNER JOIN growcard_prod_sizes ps ON (gp.grower_id = ps.grower_id and gp.product_id = ps.product_id) INNER join sizes sz on ps.sizes = sz.id ";
	 //  $filterSizes2 = ", sz.id as siId";
	}else{ $filterSizes =''; $filterSizes1 =''; $filterSizes2 =''; }

  if($ffeat!=''){
    $ffeat = substr($ffeat, 0, -1);
    $filterFeatures = "and f.id IN ($ffeat)";
  }else{ $filterFeatures =''; $filterFeatures1 =''; $filterFeatures2 ='';}

  $limites = explode(",",$init);
  $Linicio = $limites[0];
  $Lfin = $limites[1];

  if($Lfin==0){
    $Lfin=100;
  }else{
      $Lfin = $limites[1]- $limites[0];
  }

	 $query = "
				select br.id_order as id_fact, p.id as id, gor.product as Produtcname,
				p.subcate_name as subcatename, p.subcategoryid as subcategoryid,
				p.categoryid as categoryid, p.image_path as img,p.tab_title1,
			gor.product_subcategory as subcate_real   ,
			gor.size        ,
			gor.steams                  ,
      p.id_tag,
			sum(gor.bunchqty-gor.reserve) as  bunchqty,
			gor.reserve         ,
			cl.name,
			IFNULL(cl.name, 'color') as colorname,
			br.id as idbr       ,
			br.lfd              ,
			br.feature,
			p.id as codvar      ,
			gor.id as idgor     ,
			gor.offer_id        ,
			g.growers_name ,
			f.name as featurename   ,
			f.id as fid   ,
			res.id_client as control ,
			res.qty as qty_control  ,
			IFNULL(res.qty, 0) as qtyres
	from buyer_requests br
	inner join grower_offer_reply gor on gor.offer_id = br.id
	inner join buyer_orders bo  on br.id_order = bo.id
	 left join product p on gor.product = p.name and gor.product_subcategory = p.subcate_name
	 left join colors cl ON p.color_id = cl.id
	 left join growers g on gor.grower_id = g.id
	 left join features f on br.feature = f.id
	 left JOIN buyer_requests res ON gor.request_id = res.id and res.comment = 'SubClient-Reques'
	where br.buyer   = '$buyerID'
		and bo.availability = 2
		and g.active     = 'active'
    and p.status_image = '0'
    and p.status = 0
    $filterTag
		and (gor.bunchqty-gor.reserve) > 0
		$filterCat
		$filterColor
		$filterSizes
		$filterFeatures
	group by p.id_tag, gor.product_subcategory , gor.product , gor.size ,f.name";

  $query = $query.' '.$filterProd.   "  order by gor.product_subcategory , gor.product  $filterProd LIMIT $Linicio,$Lfin";
}
    return $query;
}

function numberRecord($con,$buyerID,$fcat,$fcolor,$fsize,$ffeat,$fproductID,$tagId){

  if($tagId!=''){
    $filterTag = "and p.id_tag = '$tagId'";
  }else{
    $filterTag ='';
  }

  if($fcat!=''){
    $filterCat = "and p.subcategoryid = '$fcat'";
  }else{ $filterCat ='';}

	if($fproductID!=''){
		$filterProd2 = ", sz.id, sz.name as namesize";
		$filterProd1 = " LEFT JOIN growcard_prod_bunch_sizes  gr ON(gr.grower_id=gp.grower_id AND gr.product_id=gp.product_id) LEFT JOIN sizes sz ON gr.sizes = sz.id";
		$filterProd = "and p.id = '$fproductID'";
		$filterProd = ",sz.name ";
	}else{ $filterProd ='';}

  if($fcolor!=''){
    $fcolor = substr($fcolor, 0, -1);
        $filterColor = " and cl.id in ($fcolor)";
  }else{ $filterColor =''; $filterColor1 ='';}

	if($fsize!=''){
		$nameSize='';
		$fsize = substr($fsize, 0, -1);

		 $getNameSize = mysqli_query($con,"select name from sizes where id in($fsize)");
		while($getNamesArray = mysqli_fetch_array($getNameSize))
		{
			 $nameSize .= $getNamesArray['name'].",";

		}
		$nameSize = substr($nameSize, 0, -1);

		$filterSizes = "and gor.size in ($nameSize)";
		//$filterSizes1 = " INNER JOIN growcard_prod_sizes ps ON (gp.grower_id = ps.grower_id and gp.product_id = ps.product_id) INNER join sizes sz on ps.sizes = sz.id ";
	 //  $filterSizes2 = ", sz.id as siId";
	}else{ $filterSizes =''; $filterSizes1 =''; $filterSizes2 =''; }

  if($ffeat!=''){
    $ffeat = substr($ffeat, 0, -1);
    $filterFeatures = "and f.id IN ($ffeat)";
  }else{ $filterFeatures =''; $filterFeatures1 =''; $filterFeatures2 ='';}

         $sel_pagina = "select br.id_order as id_fact, p.id as id, gor.product as Produtcname,
				p.subcate_name as subcatename, p.subcategoryid as subcategoryid,
				p.categoryid as categoryid, p.image_path as img,p.tab_title1,
			gor.product_subcategory as subcate_real   ,
			gor.size        ,
			gor.steams                  ,
      p.id_tag,
			sum(gor.bunchqty-gor.reserve) as  bunchqty,
			gor.reserve         ,
			cl.name,
			IFNULL(cl.name, 'color') as colorname,
			br.id as idbr       ,
			br.lfd              ,
			br.feature,
			p.id as codvar      ,
			gor.id as idgor     ,
			gor.offer_id        ,
			g.growers_name ,
			f.name as featurename   ,
			f.id as fid   ,
			res.id_client as control ,
			res.qty as qty_control  ,
			IFNULL(res.qty, 0) as qtyres
	from buyer_requests br
	inner join grower_offer_reply gor on gor.offer_id = br.id
	inner join buyer_orders bo  on br.id_order = bo.id
	 left join product p on gor.product = p.name and gor.product_subcategory = p.subcate_name
	 left join colors cl ON p.color_id = cl.id
	 left join growers g on gor.grower_id = g.id
	 left join features f on br.feature = f.id
	 left JOIN buyer_requests res ON gor.request_id = res.id and res.comment = 'SubClient-Reques'
	where br.buyer   = '$buyerID'
		and bo.availability = 2
		and g.active     = 'active'
    and p.status = 0
    and p.status_image = '0'
    $filterTag
		and (gor.bunchqty-gor.reserve) > 0
		$filterCat
		$filterColor
		$filterSizes
		$filterFeatures
	group by gor.product_subcategory , gor.product , gor.size ,f.name";

      $sel_pagina1 = $sel_pagina.' '.$filterSizes.'  '.$filterProd;

    $rs_pagina    = mysqli_query($con, $sel_pagina1);
    $total_pagina = mysqli_num_rows($rs_pagina);
    return $num_recordMB   = $total_pagina;
}
?>

