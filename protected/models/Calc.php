<?php 
class Calc
{
	
	/*public function add($a, $b, $op)
	{
		$c = $a+$b;
		return  $c;
	}
	public function sub($a, $b, $op)
	{
		$c = $a-$b;
		return  $c;
	}*/
	
	public function process($a, $b, $op)
	{
		switch ($op) 
		{
			case '+':
				$c = $a + $b;
			break;
			
			case '-':
				$c = $a - $b;
			break;
			
			default:
				$c = 0;
			break;
		}
		return $c;
	}
}
?>