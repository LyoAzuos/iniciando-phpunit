<?php 

require_once 'Cliente.php';

use PHPUnit\Framework\TestCase;

class ClienteTest extends TestCase
{
	public function testCriacaoCliente(){
		$cliente = new Cliente('Lucas');
		$this->assertSame('Lucas', $cliente->getNome());
	}
}