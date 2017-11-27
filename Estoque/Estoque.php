<?php 

class Estoque
{
	private $itens = [];
	public function add($item,$quantidade){
		if (isset($this->itens[$item])) {
			$quantidade += $this->itens[$item];
		}
		$this->itens[$item] = $quantidade;
		return $this;
	}

	public function get($item){
		if (isset($this->itens[$item])) {
			return $this->itens[$item];
		}

		throw new InvalidArgumentException("Item não existe no estoque");
		
	}

	public function remove($item,$quantidade){
		if (isset($this->itens[$item])) {
			$this->itens[$item] -= $quantidade;
		}
		return $this;
	}
}