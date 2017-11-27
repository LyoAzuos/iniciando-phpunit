<?php 

require_once 'Estoque.php';

use PHPUnit\Framework\TestCase;

class EstoqueTest extends TestCase
{
	private $estoque;

	public function setUp(){
		$this->estoque = new Estoque();
	}
	public function testAddItem(){
		$item = "blusa azul";
		$quantidade = 10;

		$this->estoque = new Estoque();
		// $this->estoque->add($item,$quantidade);

		$this->assertSame($this->estoque, $this->estoque->add($item,$quantidade));

		$this->assertSame($quantidade, $this->estoque->get($item));
	}

	public function testSomaQuantidades(){
		$item = "blusa X";
		$this->estoque = new Estoque();
		$this->estoque->add($item, 1);
		$this->estoque->add($item, 2);
		$this->estoque->add($item, 3);

		$this->assertSame(6 , $this->estoque->get($item));
	}

	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Item não existe no estoque
	 */
	public function testItemInvalido(){

		$this->estoque = new Estoque();
		$this->estoque->get('blusa Y');
	}

	public function testRemoveQuantidade(){
		$this->estoque->add("blusa X", 10);
		$this->estoque->remove("blusa X", 5);

		$this->assertSame(5, $this->estoque->get("blusa X"));
	}
}