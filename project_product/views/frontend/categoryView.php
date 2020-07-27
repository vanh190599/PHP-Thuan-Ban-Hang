<aside class="aside-category">
	<h3><i class="fa fa-bars"></i>&nbsp;&nbsp; Danh mục sản phẩm</h3>
	<ul class="list-unstyled">
		<?php foreach($category as $rows): ?>
		<li ><a href="index.php?controller=product&action=category&id=<?php echo $rows->category_id; ?>"><?php echo $rows->name; ?></a></li>
		<?php endforeach; ?>
	</ul>
</aside>