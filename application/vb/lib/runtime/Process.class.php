<?php

// Generated by Haxe 3.4.2
class runtime_Process extends runtime_StdFunctions {
	public function __construct($bytecodes, $literals) { if(!php_Boot::$skip_constructor) {
		parent::__construct($bytecodes,$literals);
	}}
	public function run() {
		while($this->hasMore()) {
			$this->dispatch($this->next());
		}
		if($this->output->length === 0) {
			$this->pushOutput($this->pop());
		}
		return $this->output;
	}
	public function dispatch($opCode) {
		switch($opCode) {
		case 0:{
			$this->nop();
		}break;
		case 1:{
			$tmp = $this->bcIndex();
			$tmp1 = $this->bcIndex();
			$this->callMemberFunction($tmp, $tmp1, $this->bcIndex());
		}break;
		case 2:{
			$tmp2 = $this->bcIndex();
			$this->dimension($tmp2, $this->bcIndex());
		}break;
		case 3:{
			$this->divide();
		}break;
		case 4:{
			$this->eq();
		}break;
		case 5:{
			$tmp3 = $this->bcIndex();
			$this->fnCall($tmp3, $this->bcIndex());
		}break;
		case 6:{
			$this->gt();
		}break;
		case 7:{
			$this->gte();
		}break;
		case 8:{
			$this->jmp($this->bcIndex());
		}break;
		case 9:{
			$this->jmpIfFalse($this->bcIndex());
		}break;
		case 10:{
			$this->lt();
		}break;
		case 11:{
			$this->lte();
		}break;
		case 12:{
			$this->minus();
		}break;
		case 13:{
			$this->neq();
		}break;
		case 14:{
			$this->plus();
		}break;
		case 15:{
			$this->pop();
		}break;
		case 16:{
			$this->popIntoGlobal($this->bcIndex());
		}break;
		case 17:{
			$tmp4 = $this->bcIndex();
			$this->popIntoProperty($tmp4, $this->bcIndex());
		}break;
		case 18:{
			$this->pushConst($this->bcIndex());
		}break;
		case 19:{
			$this->pushGlobal($this->bcIndex());
		}break;
		case 20:{
			$tmp5 = $this->bcIndex();
			$this->pushProperty($tmp5, $this->bcIndex());
		}break;
		case 22:{
			$tmp6 = $this->bcIndex();
			$this->subDefine($tmp6, $this->bcIndex());
		}break;
		case 23:{
			$this->subReturn();
		}break;
		case 24:{
			$this->times();
		}break;
		default:{
			$this->unknownOpcode($opCode);
		}break;
		}
	}
	public function hasMore() {
		$this->iterations++;
		return $this->index < $this->bytecodes->length;
	}
	public function bcIndex() {
		return $this->next();
	}
	public function next() {
		return $this->bytecodes[$this->index++];
	}
	public function unknownOpcode($opCode) {
		haxe_Log::trace("unknownOpcode(" . _hx_string_rec($opCode, "") . ")", _hx_anonymous(array("fileName" => "Process.hx", "lineNumber" => 84, "className" => "runtime.Process", "methodName" => "unknownOpcode", "customParams" => (new _hx_array(array($this->bytecodes))))));
	}
	function __toString() { return 'runtime.Process'; }
}