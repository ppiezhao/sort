<?php 
/**
*mergesort 归并排序
*
*/

function mergeSort(&$arr){
        $len = count($arr);
	
	mSort($arr, 0, $len-1);
}

/**
*实际实现归并排序的程序
*@param &$arr array 需要排序的数组
*@param $left int 子序列的左下标值
*@param $right int 子序列的右下标值
*/
function mSort(&$arr, $left, $right){
	if($left < $right){
	 	$center = floor(($left + $right)/2);
		
		mSort($arr, $left, $center);
		
		mSort($arr, $center+1, $right);

		mergeArray($arr, $left, $center, $right);
	}
}

/**
*将两个有序数组合并成一个有序数组
*@param &$arr 待排序的所有元素
*@param $left 排序子数组A开始下标
*@param $center 排序子数组A与排序子数组B的中间下标
*@param $right  排序子数组B的结束下标（开始为$center+1）
*/

function mergeArray(&$arr, $left, $center, $right){
	//设置两个起始位置标记
	$a_i = $left;
	$b_i = $center + 1;
	$temp = array();
	while($a_i<=$center && $b_i<=$right){
		//当数组A和数组B都没有越界时
		if($arr[$a_i] < $arr[$b_i]){
			$temp[] = $arr[$a_i++];
		}else{
			$temp[] = $arr[$b_i++];
		}
	}
	//判断数组A内的元素是否都用完了，
	while($a_i <= $center){
		$temp[] = $arr[$a_i++];
	}
	//判断数组B内元素是否都用完
	while($b_i <= $right){
		$temp[] = $arr[$b_i++];
	}

	//将排好序的部分，写入到$arr内
	for($i=0, $len=count($temp); $i<$len; $i++){
		$arr[$left+$i] = $temp[$i];
	}
}

$arr = array(4,7,6,3,9,5,8);
mergeSort($arr);
print_r($arr);

?>
