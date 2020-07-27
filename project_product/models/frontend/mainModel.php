<?php  
	trait mainModel{
		//sản phẩm nổi bật
		public function hotproduct(){
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from tbl_product where hotproduct=1 order by id desc limit 0,4");
			$query->setFetchMode(PDO::FETCH_OBJ);
			$query->execute();
			$result = $query->fetchAll();
			return $result;
		}
		//sản phẩm mới
		public function newproduct(){
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from tbl_product order by id desc limit 0,4");
			$query->setFetchMode(PDO::FETCH_OBJ);
			$query->execute();
			$result = $query->fetchAll();
			return $result;
		}
	}
?>