<?php 
/*
 * This class describes a caching system for functions
 * This will help get rid of the reparse data in the function
 * (but I think it will increase the size of RAM consumed)
 * Perhaps this class will later have to modify
 */

$GLOBALS['ObjectModel']=NULL;//This is a super global array where 
			     //you will store the micro cache for all functions

class MicroCache{
	/*
	 * @param [1...]a variable number of arguments of a function call
	 * @return string 
	 */
	static private function compare(){
			$comp=NULL;
			$args=func_get_args();
			foreach ($args as $value){
				$comp.=serialize($value);
			}
			return $comp;	
	}
	/*
	 * @param [1...]a variable number of arguments of a function call
	 * @return boolean - TRUE if you have in the cache or FALSE if not
	 */
	static public function check(){
		$compareData = self::compare(func_get_args());
		if(isset($GLOBALS['ObjectModel'][md5($compareData)])){
			return true;
		}else{
			return false;
		}
	}
	/*
	 * @param [1...]a variable number of arguments of a function call
	 * @return mixed - Will return the value from the cache
	 */
	static public function readCache(){
		$compareData = self::compare(func_get_args());
		return  unserialize($GLOBALS['ObjectModel'][md5($compareData)]);
	}
	/*
	 * @param save_data[1],[2...]a variable number of arguments of a function call
	 * @return void 
	 */
	static public function saveCache(){
		$args = func_get_args();
		$data = $args[0];
    	unset($args[0]);
    	sort($args);
		$compareData = self::compare($args);
		$GLOBALS['ObjectModel'][md5($compareData)]=serialize($data);
	}
	
}
?>