<?php $this->load->view('default/header');?>
<div class="gksel_details_header" >
   <span></span>
   <div>01</div>
   <span></span>
   <div>02</div>
   <span></span>
   <div>03</div>
   <span></span>
   <div>04</div>
   <span></span>
   <div>05</div>
   <span></span>
   <div>06</div>
   <span></span>
   <div>07</div>
   <span></span>
   <div>08</div>
   <span></span>
   <div>09</div>
   <span></span>
   <div>10</div>
   <span></span>
   <div>11<p>Shopping Cart</p></div>
   
 </div>
<div style="font-size:25px;text-align:center;margin:0px auto;width:100%;float:left;margin-top:20px">Shopping Cart</div>
<div class="gksel_order_left">
      <div class="gksel_order_left_shop" style="margin-top:0;">
          <div class="shop"><p>Product</p><img src="<?php echo base_url().'themes/default/images/shop_suit1.jpg'?>"/></div>
          <div class="price"><p>Price</p><div>¥ 299</div></div>
          <div class="quantity"><p>Quantity</p><input type="text" value="1" /></div>
          <div class="total_price"><p>Total Price</p><div>¥ 299</div></div>
          <div class="delete"><p>Action</p><div>delete</div></div>
      </div>
      <div class="gksel_order_left_shop">
          <div class="shop"><p>Product</p><img src="<?php echo base_url().'themes/default/images/shop_suit2.jpg'?>"/></div>
          <div class="price"><p>Price</p><div>¥ 399</div></div>
          <div class="quantity"><p>Quantity</p><input type="text" value="1" /></div>
          <div class="total_price"><p>Total Price</p><div>¥ 399</div></div>
          <div class="delete"><p>Action</p><div>delete</div></div>
      </div>
      
      <div class="gksel_order_left_othershop">
      <div style="font-size:20px;text-align:center;margin:20px auto;">Suggested  Products</div>
          <div class="image">
              <img src="<?php echo base_url().'themes/default/images/shop_suit2.jpg'?>"/>
              <p> Athletic Grey(Regular fit)</p>
              <span>¥ 299.00</span>
              <div class="btn">加入购物车</div>
              
          </div>
          <div class="image">
              <img src="<?php echo base_url().'themes/default/images/shop_suit2.jpg'?>"/>
              <p> Athletic Grey(Regular fit)</p>
              <span>¥ 299.00</span>
              <div class="btn">加入购物车</div>
              
          </div>
          <div class="image">
              <img src="<?php echo base_url().'themes/default/images/shop_suit2.jpg'?>"/>
              <p> Athletic Grey(Regular fit)</p>
              <span>¥ 299.00</span>
              <div class="btn">加入购物车</div>
              
          </div>
          <div class="image">
              <img src="<?php echo base_url().'themes/default/images/shop_suit2.jpg'?>"/>
              <p> Athletic Grey(Regular fit)</p>
              <span>¥ 299.00</span>
              <div class="btn">加入购物车</div>
              
          </div>
      </div>
</div>
<div class="gksel_order_right">
    <div class="gksel_order_right_title">ORDER SUMMARY</div>
    
    <div class="gksel_order_right_fill_in">
        <div class="text"><p>Subtotal</p><input type="text"></div>
        <div class="text"><p>Delivery</p><div>FREE</div></div>
        <div class="text"><p>VAT</p><input type="text"></div>
        <div class="text"><p>Total</p><input type="text"></div>
    </div>
    <a class="gksel_order_right_btn" href="<?php echo base_url()?>index.php/order/details_list">Customize Your Suit</a>
    <a class="gksel_order_right_btn" style="margin-bottom:50px;" href="<?php echo base_url()?>index.php/order/shop_info">Proceed To Checkout</a>
</div>
<?php $this->load->view('default/footer');?>
