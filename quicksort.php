<?php
$arra=array();
for($i=0;$i<1000;$i++){
   $arra[$i]=rand(1,100000);
}
//$a = randquicksort ($arr);
//print_r($a);
function randquicksort($arr){
	if(count($arr)<=1){
		return $arr;
	}
	$key=$arr[0];
	$left_arr=array();
	$right_arr=array();
	for($i=1;$i<count($arr);$i++){
		if($arr[$i]<=$key){
			$left_arr[]=$arr[$i];
		}else{
			$right_arr[]=$arr[$i];
		}
	}
	$left_arr=randquicksort($left_arr);
	$right_arr=randquicksort($right_arr);
	return array_merge($left_arr,array($key),$right_arr);
}
//print_r($arra);
$r=count($arra)-1;
$b=OneArrQuickSort($arra,0,$r);
print_r($b);
function OneArrQuickSort($arr,$l,$r){
	
	if($l<$r){
	$i=$l;
	$j=$r;
	$x=$arr[$l];//基准值
	while($i<$j){
	    while($i<$j && $arr[$j]>=$x){//从右往左取第一个小于的值
			$j--;	
	    }
	    	if($i<$j){
				$arr[$i++] = $arr[$j];
		    }
	    
	    while($i<$j && $arr[$i]<$x){//从左往右取第一个大于的值
			$i++;	
	    }
	    	if($i<$j){
			$arr[$j--]=$arr[$i];	
		    }
	    
	}
	$arr[$i]=$x;
	$arr = OneArrQuickSort($arr,$i+1,$r);
	$arr = OneArrQuickSort($arr,$l,$i-1);
	}
    return $arr;
}
/*
#include<iostream>
using namespace std;
void quickSort(int a[],int,int);
int main()
{
	int array[]={34,65,12,43,67,5,78,10,3,70},k;
	int len=sizeof(array)/sizeof(int);
	cout<<"The orginal arrayare:"<<endl;
	for(k=0;k<len;k++)
		cout<<array[k]<<",";
	cout<<endl;
	quickSort(array,0,len-1);
	cout<<"The sorted arrayare:"<<endl;
	for(k=0;k<len;k++)
		cout<<array[k]<<",";
	cout<<endl;
	system("pause");
	return 0;
}

void quickSort(int s[], int l, int r)
{
	if (l< r)
	{      
		int i = l, j = r, x = s[l];
		while (i < j)
		{
			while(i < j && s[j]>= x) // 从右向左找第一个小于x的数
				j--; 
			if(i < j)
				s[i++] = s[j];
			while(i < j && s[i]< x) // 从左向右找第一个大于等于x的数
				i++; 
			if(i < j)
				s[j--] = s[i];
		}
		s[i] = x;
		quickSort(s, l, i - 1); // 递归调用
		quickSort(s, i + 1, r);
	}
}
*/



/*
die;
for($i=0;$i<count($b);$i++){
    if($b[$i]<$b[(int)count($b)/2]){
        $arr1[$first][]=$b[$i];
    }else{
	$arr1[$first+1][]=$b[$i];
    }
}
*/
	//$left[$first] = (int)$mid/2;
        //$left[$first+1] = $mid+(int)$mid/2;
//for($i=0;$i<count($arr1);$i++){
      //if(count($arr1[$i])==1 || count($arr1[$i]==0)){
    //      $list[]=$arr1[$i];	 	
  //    }else{
//	$this->digui($arr1[$i],$left[$i],$i); 
  //    }	
//}

//function digui($arrzi,$leftzi){
     
    //if(count($arr1[$i])==1 || count($arr1[$i]==0)){
   			
  //  }else{
//	$this->digui($arr1[$i],$left[$i]); 
   // }	
//}
//print_r($arr1);

?>
