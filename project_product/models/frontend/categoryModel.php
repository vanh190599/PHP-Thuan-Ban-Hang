<?php  
	trait categoryModel{
		public function model_listCategory(){
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from tbl_category order by category_id desc");
			$query->setFetchMode(PDO::FETCH_OBJ);
			$query->execute();
			$result = $query->fetchAll();
			return $result;
		}
	}
?>