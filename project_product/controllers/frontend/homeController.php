<?php 
	class homeController extends Controller{
		public function index(){
			$this->renderHTML("views/frontend/homeView.php");
		}
	}
 ?>