<?php
include('MicroCache.php');
/*
 * This is a demonstration class, with a test in which ider the calculation of 
 * the factorial of the number class method is called twice to illustrate 
 * the use of micro-caching
 */
class test{

	function __construct(){
	//The first test
	$start = microtime(true);
	for($i=1;$i<=30;$i++)
    	$ar[$i]=$this->fact($i);
    	print_r($ar);
    	$time = microtime(true) - $start;
	printf('Script performed: %.4F sec.', $time);
	//end
		
    	//The second test
    	$start2 = microtime(true);
    	for($i=1;$i<=30;$i++)
    	$ar[$i]=$this->fact($i);
    	print_r($ar);
    	$time2 = microtime(true) - $start2;
	printf('Script performed: %.4F sec.', $time2);
	//end
	}
	
	private function fact($n)
	{
		if(MicroCache::check($n)) return MicroCache::readCache($n); //Check if the cache is already returned it
    	$r=1;
    	for($i=2;$i<=$n;$i++){
        	$r *= $i;
        	sleep(0.5);//A small delay that would make the result more obvious
    	}
    	MicroCache::saveCache($r,$n);//If the cache is not that stored the return value in the cache and 
    								 //write the arguments with which the function was called
    	return $r;
	}


}

// Start test
new test();
echo "\n\n";
//Output cache
var_dump($GLOBALS['ObjectModel']);
?>