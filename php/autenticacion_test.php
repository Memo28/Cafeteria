<?php
	require 'verificacion.php'

	class AutenticacionTest extends PHPUnit_Framework_TestCase{

		private $verificador

		protected function setUp(){
			this->verificador = new Verificacion();
		}

		protected function tearDown(){
			this->verificador = NULL;
		}

		public function testVerificacion(){
			$result = $this ->verificador->verificacion($"memovdg@gmail.com","123sion");
			$this->assertEquals(false, $result);
		}

		public function testVacio(){
			$result = $this ->verificador->verificador("","");
			$this->assertEquals(false, $result);
		}

		public function testNoEmail(){
			$result =$this->verificador->verificador("","sion");
			$this->assertEquals(false, $result);
		}

		public function testNoPassword(){
			$result =$this->verificador->verificador("memovdg@gmail.com","");
			$this->assertEquals(false, $result);
		}

		public function testEmailLong(){
			$result = $this ->verificador->verificador("detrfyguhiugfydtghfdtryfgjgyhfyug@gmail.com","sada1234");
			$this->assertEquals(false, $result);
		}

		public function testEmailShort(){
			$result = $this ->verificador->verificador("mg@gmail.com","sada123");
			$this->assertEquals(false, $result);
		}

		public function testPassLong(){
			$result = $this ->verificador->verificador("memo.211@gmail.com","detrfyguhiugfydtghfdtryfgjgyhfyug");
			$this->assertEquals(false, $result);
		}

		public function testPassShort(){
			$result = $this ->verificador->verificador("memo.211@gmail.com","m1");
			$this->assertEquals(false, $result);
		}
	}