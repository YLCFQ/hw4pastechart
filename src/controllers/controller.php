<?php

namespace stormwind\hw4\controllers;
	class Controller{
		public function filterPost($field){
			return filter_input(INPUT_POST, $field, FILTER_SANITIZE_SPECIAL_CHARS);
		}
		public function filterGet($field){
			return filter_input(INPUT_GET, $field, FILTER_SANITIZE_SPECIAL_CHARS);
		}

		public function handleRequest($data){
		}
	}

?>