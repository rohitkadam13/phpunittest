<?php 
class arithmeticTest extends CTestCase
{
	/*private function add($a, $b, $op)
	{
		$calc = new Calc;
		return $calc->add($a, $b, $op); 
	}
	private function sub($a, $b, $op)
	{
		$calc = new Calc;
		return $calc->sub($a, $b, $op); 
	}	
	
	public function testAdd()
	{
		$this->assertEquals(9, $this->add(4, 5, '+'));
	}
	
	public function testSub()
	{
		$this->assertEquals(3, $this->sub(6, 3, '-'));
	}*/
	
	private function process($a, $b, $op)
	{
		$calc = new Calc;
		return $calc->process($a, $b, $op); 
	}
	
	public function testAdd()
	{
		$this->assertEquals(9, $this->process(4, 5, '+'));
	}
	
	public function testSub()
	{
		$this->assertEquals(3, $this->process(6, 3, '-'));
	}
}
?>