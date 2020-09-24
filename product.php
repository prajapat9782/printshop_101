<?php include('header.php');
  include ('config.php');
  $limit = 4;
  $low_to_high='';
  $high_to_low='';
  $new_collectin='';
  $old_collection='';
  // for pagination 
  if (isset($_GET["page"])) {
    $page = $_GET["page"]; 
  } 
  else{ 
        $page=1;
    };  
    
    $start_from = ($page-1) * $limit;
// get cid for products linsting
  if(isset($_GET)){
    if($_GET['catID']==''){
     ?>
      <script>window.location.hred = 'index.php';</script><?php
    }    
    $cid  = $_GET['catID'];  
      $q = "SELECT * FROM `products` WHERE cid = '$cid' ORDER BY id desc LIMIT $start_from, $limit";
  }
  // for sorting list
  if(isset($_GET['type'])){
    $cid  = $_GET['catID'];
    $type = $_GET['type'];
    if($type=='low_to_high'){
      $q = "SELECT * FROM `products` WHERE cid = '$cid' ORDER BY sell_price ASC LIMIT $start_from, $limit";
      $low_to_high='selected';
    }if($type=='high_to_low'){
      $q = "SELECT * FROM `products` WHERE cid = '$cid' ORDER BY sell_price DESC LIMIT $start_from, $limit";
      $high_to_low='selected';  
    }if($type=='new_collectin'){
      $q = "SELECT * FROM `products` WHERE cid = '$cid' ORDER BY created DESC LIMIT $start_from, $limit";      
      $new_collectin='selected';
    }if($type=='old_collection'){
      $q = "SELECT * FROM `products` WHERE cid = '$cid' ORDER BY created ASC LIMIT $start_from, $limit";
      $old_collection='selected';
    }
    if($type=='Default'){
      $q = "SELECT * FROM `products` WHERE cid = '$cid' ORDER BY id desc LIMIT $start_from, $limit";
    }
    
  }
  else{
    ?>
<script>window.location.hred = 'index.php';</script><?php
  }
  
?>
<!-- product category -->
<section id="aa-product-category">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
        <div class="aa-product-catg-content">
          <div class="aa-product-catg-head">
            <div class="aa-product-catg-head-left">
              <form action="" class="aa-sort-form">
                <label for="">Sort by</label>
                <select id="sort_by_create" onchange=(sort_by(<?php echo isset($_GET['catID'])?$_GET['catID']:''?>))>
                  <option>Default</option>
                  <option value="low_to_high" <?php echo $low_to_high?>>Price Low to High</option>
                  <option value="high_to_low" <?php echo $high_to_low?>>Price High to Low</option>
                  <option value="new_collectin" <?php echo $new_collectin?>>New Collection</option>
                  <option value="old_collection" <?php echo $old_collection?>>Old Collection</option>
                </select>
              </form>
              <!-- <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form> -->
            </div>
            <div class="aa-product-catg-head-right">
              <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
              <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
            </div>
          </div>
          <div class="aa-product-catg-body">
            <ul class="aa-product-catg">
              <?php

                $dataQuery = mysqli_query($conn, $q);                
                if(mysqli_num_rows($dataQuery)==0){ ?>
                  <h3 style="margin-right">No Products Yet </h3>
              <?php }
                while($row = mysqli_fetch_assoc($dataQuery)){
              ?>
              <!-- start single product item -->
              <li>
                <figure>
                  <a class="aa-product-img" href="product-detail.php?pid=<?php echo $row['id']?>"><img
                      src="media/product/<?php echo $row['image']?>" height="300" width="250" style="height:100%"
                      alt="polo shirt img"></a>
                  <a class="aa-add-card-btn addtocart" href="javascript:void(0)" p_id="<?php echo $row['id']?>"><span class="fa fa-shopping-cart"></span>Add To
                    Cart</a><br><br>
                  <figcaption>
                    <h4 class="aa-product-title"><a href="#"><?php echo $row['name']?></a></h4>
                    <span class="aa-product-price">$<?php echo $row['sell_price']?></span><span
                      class="aa-product-price"><del>$<?php echo $row['price']?></del></span>
                    <!-- <p class="aa-product-descrip"><?php echo $row['desc']?></p> -->
                  </figcaption>
                </figure>
                <!-- <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                  </div> -->
                <!-- product badge -->
                <span class="aa-badge aa-sale" href="#">SALE!</span>
              </li>
              <?php }?>
            </ul>
            <!-- quick view modal -->
            <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="row">
                      <!-- Modal view slider -->
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="aa-product-view-slider">
                          <div class="simpleLens-gallery-container" id="demo-1">
                            <div class="simpleLens-container">
                              <div class="simpleLens-big-image-container">
                                <a class="simpleLens-lens-image"
                                  data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                  <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                </a>
                              </div>
                            </div>
                            <div class="simpleLens-thumbnails-container">
                              <a href="#" class="simpleLens-thumbnail-wrapper"
                                data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                              </a>
                              <a href="#" class="simpleLens-thumbnail-wrapper"
                                data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                              </a>

                              <a href="#" class="simpleLens-thumbnail-wrapper"
                                data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Modal view content -->
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="aa-product-view-content">
                          <h3>T-Shirt</h3>
                          <div class="aa-price-block">
                            <span class="aa-product-view-price">$34.99</span>
                            <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae
                            repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                          <h4>Size</h4>
                          <div class="aa-prod-view-size">
                            <a href="#">S</a>
                            <a href="#">M</a>
                            <a href="#">L</a>
                            <a href="#">XL</a>
                          </div>
                          <div class="aa-prod-quantity">
                            <form action="">
                              <select name="" id="">
                                <option value="0" selected="1">1</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                                <option value="4">5</option>
                                <option value="5">6</option>
                              </select>
                            </form>
                            <p class="aa-prod-category">
                              Category: <a href="#">Polo T-Shirt</a>
                            </p>
                          </div>
                          <div class="aa-prod-view-bottom">
                            <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To
                              Cart</a>
                            <a href="#" class="aa-add-to-cart-btn">View Details</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
            <!-- / quick view modal -->
          </div>
          <div class="aa-product-catg-pagination">
            <nav>
              <ul class="pagination">
              <li style="display:<?php if($page=='1'){echo 'none';}?>;">
                  <a href="product.php?catID=<?php echo $cid; if(isset($type)){echo '&type='.$type.'&page=1';}else{ echo '&page=1'; }?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              <?php
               $res = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(id) as tP FROM products WHERE cid='$cid' AND status = '1'"));
               $totle_records = $res['tP'];
               $totle_pages = ceil($totle_records/$limit);
               

               for($i=1;$i<=$totle_pages;$i++){
               ?>
                <li><a href="product.php?catID=<?php echo $cid; if(isset($type)){echo '&type='.$type.'&page='.$i;}else{ echo '&page='.$i; }?>" style="background:<?php if($page==$i){echo '#000;color:#fff';}?>;"><?php echo $i?></a></li>
               <?php }?>

                <li style="display:<?php if($page==$totle_pages){echo 'none';}?>">
                  <a href="product.php?catID=<?php echo $cid; if(isset($type)){echo '&type='.$type.'&page='.$totle_pages;}else{ echo '&page='.$totle_pages; }?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
        <aside class="aa-sidebar">
          <!-- single sidebar -->
          <div class="aa-sidebar-widget">
            <h3>Category</h3>
            <ul class="aa-catg-nav">
              <?php $res = mysqli_query($conn, "SELECT name,id FROM category WHERE status ='1' ORDER BY RAND ( ) LIMIT 4");
                while($catrow = mysqli_fetch_assoc($res)){
              ?>
              <li><a href="product.php?catID=<?php echo $catrow['id']?>"><?php echo $catrow['name']?></a></li>
              <!-- <li><a href="">Women</a></li>
                <li><a href="">Kids</a></li>
                <li><a href="">Electornics</a></li>
                <li><a href="">Sports</a></li> -->
              <?php }?>
            </ul>
          </div>
          <!-- single sidebar -->
          <div class="aa-sidebar-widget">
            <h3>Tags</h3>
            <div class="tag-cloud">
              <a href="#">Fashion</a>
              <a href="#">Ecommerce</a>
              <a href="#">Shop</a>
              <a href="#">Hand Bag</a>
              <a href="#">Laptop</a>
              <a href="#">Head Phone</a>
              <a href="#">Pen Drive</a>
            </div>
          </div>
          <!-- single sidebar -->
          <!-- <div class="aa-sidebar-widget">
            <h3>Shop By Price</h3>
            price range
            <div class="aa-sidebar-price-range">
              <form action="">
                <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                </div>
                <span id="skip-value-lower" class="example-val">30.00</span>
                <span id="skip-value-upper" class="example-val">100.00</span>
                <button class="aa-filter-btn" type="submit">Filter</button>
              </form>
            </div>

          </div> -->

          <!-- single sidebar -->
          <!-- <div class="aa-sidebar-widget">
              <h3>Recently Views</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div> -->
          <!-- single sidebar -->
          <div class="aa-sidebar-widget">
            <h3>Top Rated Products</h3>
            <div class="aa-recently-views">
              <ul>
                <li>
                  <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                  <div class="aa-cartbox-info">
                    <h4><a href="#">Product Name</a></h4>
                    <p>1 x $250</p>
                  </div>
                </li>
                <li>
                  <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                  <div class="aa-cartbox-info">
                    <h4><a href="#">Product Name</a></h4>
                    <p>1 x $250</p>
                  </div>
                </li>
                <li>
                  <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                  <div class="aa-cartbox-info">
                    <h4><a href="#">Product Name</a></h4>
                    <p>1 x $250</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </aside>
      </div>

    </div>
  </div>
</section>
<!-- / product category -->


<?php include('footer.php'); ?>