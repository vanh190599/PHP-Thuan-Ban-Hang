<?php
  $this->layout = "views/frontend/layout_trangtrong.php"
?>
<div class="special-collection">
  <div class="tabs-container">
    <div class="clearfix">
      <h2>SEARCH</h2>
    </div>
  </div>
  <div class="tabs-content row">
    <div id="content-tabb1" class="content-tab content-tab-proindex" style="display:none">
      <div class="clearfix">
        
        <?php foreach($data as $rows): ?>
        <!-- box product -->
        <div class="col-xs-6 col-md-3 col-sm-6 ">
          <div class="product-grid" id="product-1168979">
            <div class="image"> <a href="index.php?controller=product&action=detail&id=<?php echo $rows->id; ?>"><img src="assets/upload/product/<?php echo $rows->img; ?>" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>" class="img-responsive"></a> </div>
            <div class="info">
              <h3 class="name"><a href="index.php?controller=product&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
              <p class="price-box"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($rows->price); ?> </span> </span> </p>
              <div class="action-btn">
                <form action="cart/add" method="post" enctype="multipart/form-data" id="product-actions-1168979">
                  <a href="index.php?controller=cart&action=add&id=<?php echo $rows->id; ?>" class="button">Mua sản phẩm</a>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- end box product -->
        <?php endforeach; ?>
        <!-- paging -->
        <div style="clear: both;"></div>
        <ul class="pagination pull-right" style="margin-top: 0px !important; padding-right: 15px;">
          <li><a href="#">Trang</a></li>
          <?php for($i = 1; $i <= $numPage; $i++): ?>
          <li><a href="index.php?controller=product&action=category&key=<?php echo $key; ?>&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php endfor; ?>
          <!-- end paging -->
        </div>
      </div>
    </div>
  </div>