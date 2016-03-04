<?php 
//$arr=array(16,7,3,20,56,17,8,34,45);

//$arr_change = HeapSort($arr,count($arr));
//print_r($arr_change);

//取一亿个数中的最大1万个
//思路是（1）取一亿个数的前1万个数，将这一万个数堆排序，
//		(2)将一万与一万以后的数比较，如果后一万数比前一万的最小数大，则将次数与最小值互换，将前一万数堆排序，
//		继续比较(2)
//php 数组只能存储1百万个值，
$max_size = 100000;
for($i=0;$i<=$max_size;$i++){
	$arr[] = rand(0,1000000);
}
$get_size = 100;
//var_dump($arr);
echo date('Y-m-d H:i:s',time());
echo "<br/>";
 $arra = array_slice($arr,0,$get_size);
 //var_dump($arra);
 
 $arrab = HeapSort($arra,$get_size);
 $temp = 0;
 
 
for($j=$get_size;$j<$max_size;$j++){
	if($arr[$j]>$arrab[0]){
		$temp = $arrab[0];
		$arrab[0] = $arr[$j];
		$arr[$j] = $temp;
		$arrab = HeapSort($arrab,$get_size);
	}
}
 
 var_dump($arrab);
 echo "<br/>";
 echo date('Y-m-d H:i:s',time());
echo "<br/>";

//创建堆
function BuiltHeap($arrb,$size){
	//return 
	for($i=(int)($size/2);$i>=0;$i--){
	
		$arrb = HeapAdjust($arrb,$i,$size);
		
	}
	
	return $arrb;
}

function HeapAdjust($arrh,$i,$size){
	$lchild = 2*$i;
	$rchild = 2*$i+1;
	
	$max = $i;
	if($i<=$size/2){
		if($lchild<=$size && $arrh[$lchild]>$arrh[$max]){
			$max = $lchild;
		}
		
		if($rchild<=$size && $arrh[$rchild]>$arrh[$max]){
			$max = $rchild;
		}
		
		if($max != $i){
			$arrh = swap($arrh,$i,$max);
			$arrh = HeapAdjust($arrh,$max,$size);
		}
	}
	return $arrh;
}

function swap($arrs,$a,$b){
	$temp = 0;
	$temp = $arrs[$a];
	$arrs[$a] = $arrs[$b];
	$arrs[$b] = $temp;
	
	return $arrs;
}

function HeapSort($arrhs,$size){
	$arrhs = BuiltHeap($arrhs,$size);
	for($i=$size;$i>=1;$i--){
		$arrhs = swap($arrhs,0,$i-1);
		$arrhs = HeapAdjust($arrhs,0,$i-2);
		
	}
	return $arrhs;
}



?>