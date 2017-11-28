<?php 

use PHPUnit\Framework\TestCase;

class TestesTest extends TestCase
{	
	// Testa se é idêntico
	public function testSame(){

		$soma = 2+2;

		$this->assertSame(4,$soma);

	}

	// Testa se é verdadeiro
	public function testTrue(){

		$verdadeiro = true;

		$this->assertTrue($verdadeiro);
	}

	// Testa se é falso
	public function testFalse(){

		$verdadeiro = false;

		$this->assertFalse($verdadeiro);
	}

	// Testa se Count é igual
	public function testCount(){

		$array = [0,1,2];

		$this->assertCount(3, $array);
	}

	// Testa se é vazio
	public function testEmpty(){

		$vazio = "";

		$this->assertEmpty($vazio);
	}

	// Testa se é igual mas não idêntico
	public function testEquals(){

		$a = "1";
		$b = 1;

		$this->assertEquals($a,$b);
	}

	// Testa se é null
	public function testNull(){

		$vazio = null;

		$this->assertNull($vazio);
	}
}