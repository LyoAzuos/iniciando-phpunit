<?php 

require_once 'Pedido.php';

use PHPUnit\Framework\TestCase;

class PedidoTest extends TestCase
{
	private $estoque;

	public function setUp(){
		// $this->estoque = new Estoque();
		$this->estoque = $this->getMockBuilder("Estoque")->getMock();
		$this->estoque->add("blusa X", 10);
		$this->estoque->add("blusa Y", 5);
	}

	public function testDeveFecharPedido(){
		$item = "blusa X";
		$quantidade = 10;

		$this->estoque->expects($this->once())
			->method("get")
			->with($this->equalTo($item))
			->will($this->returnValue($quantidade));
		$this->estoque->expects($this->once())
			->method("remove")
			->with(
				$this->equalTo($item),
				$this->equalTo($quantidade)
				);

		$pedido = new Pedido($item, $quantidade);
		$pedido->fechar($this->estoque);

		$this->assertTrue($pedido->isFinalizado());
		// $this->assertSame(0,$this->estoque->get('blusa X'));
	}

	public function testNaoDeveFecharPedido(){
		$item = "blusa Y";
		$quantidade = 5;

		$this->estoque->expects($this->once())
			->method("get")
			->with($this->equalTo($item))
			->will($this->returnValue(0));
		$this->estoque->expects($this->never())
			->method("remove");

		$pedido = new Pedido($item, $quantidade);
		$pedido->fechar($this->estoque);

		$this->assertFalse($pedido->isFinalizado());
		// $this->assertSame(0,$this->estoque->get('blusa X'));
	}
}