<?php $this->load->view('default/header');?>
<div class="gksel_shop_info">
	  <div class="gksel_shop_info_input">
	      <div class="title">1. Shipping info</div>
	      <div class="line"></div>
	      <div class="input_box">
	         <div class="text">First Name</div>
	         <input type="text">
	      </div>
	      <div class="input_box">
	         <div class="text">Surname</div>
	         <input type="text">
	      </div>
	      <div class="input_box">
	         <div class="text">Title</div>
	         <input type="text">
	      </div>
	      <div class="input_box">
	         <div class="text">Address 1</div>
	         <input type="text">
	      </div>
	      <div class="input_box">
	         <div class="text">Address2</div>
	         <input type="text">
	      </div>
	      <div class="input_box">
	         <div class="text">City</div>
	         <select>
	            <option>New York</option>
	         </select>
	      </div>
	      <div class="input_box">
	         <div class="text">ZIP Code</div>
	         <select>
	            <option>7788-4546</option>
	         </select>
	      </div>
	      <div class="input_box">
	         <div class="text">Phone</div>
	         <input type="text" placeholder="13846541245">
	        
	      </div>
	      <div class="input_box">
	         <div class="text">Email</div>
	         <input type="text" placeholder="abxbadada@163.com">
	      </div>
	      <div class="input_box_checkbox" >
	         <input type="checkbox" name="checkbox">
	         <div class="text">Use this address as billing</div>
	      </div>
	      <div class="input_box_checkbox">
	         <input type="checkbox" name="checkbox">
	         <div class="text">Subscribe to ROJO Clothing Newsletter</div>
	      </div>
	  </div>
	  <div class="gksel_shop_info_shopp">
	      <div class="title">2. ORDER REVIEW</div>
	      <div class="shopping">
	          <div class="shopping_title">
	              <div class="product">PRODUCT</div>
	              <div class="description">DESCRIPTION</div>
	              <div class="quantity">QUANTITY</div>
	              <div class="price">price</div>
	          </div>

	          <div class="shopping_section">
	              <div class="image"><img src="<?php echo base_url().'themes/default/images/shop_suit1.jpg'?>"/></div>
	              <div class="coal">
	                  <div class="coal_color">COAL BLACK ROJO</div>
	                  <div class="coal_size_title">size</div>
	                  <div class="coal_size">xl</div>
	              </div>
	              <div class="quantity"><input type="text" value="1" style="width:50px"/></div>
	              <div class="price">$600 USD</div>
	          </div>
	          <div class="shopping_bottom">TOTAL: $600 USD</div>
	      </div>
	  </div>
	  
	  <div class="gksel_shop_info_payment">
	     <div class="title">3. Payment Method</div>
	     <div class="payment_method">
	         <div class="left">
	            <div class="Micro_letter">
	                <input type="checkbox" name="checkbox">
	                <div class="image"><img src="<?php echo base_url().'themes/default/images/Micro_letter.png'?>"/></div>
	                <div class="text">Name of Card</div>
	            </div>
	            <div class="Micro_letter">
	                <input type="checkbox" name="checkbox">
	                <div class="image"><img src="<?php echo base_url().'themes/default/images/Micro_letter2.jpg'?>"/></div>
	                <div class="text">Card Number</div>
	            </div>
	            <div class="Micro_letter">
	                <input type="checkbox" name="checkbox">
	                <div class="image"><img src="<?php echo base_url().'themes/default/images/Micro_letter3.jpg'?>"/></div>
	                <div class="text">Expiry Date</div>
	            </div>
	            <div class="Micro_letter">
	                <input type="checkbox" name="checkbox">
	                <div class="image"><img src="<?php echo base_url().'themes/default/images/Micro_letter4.png'?>"/></div>
	                <div class="text">Security code</div>
	            </div>
	         </div>
	         <div class="right">
	            <div class="input">
	               <input type="text">
	               <input type="text">
	               
	            </div>
	            <div class="select">
	            
	            <select>
	                   <option>2017</option>

	            </select>
	            <select>
	               <option>0 2</option>
	               <option>0 3</option>
	               <option>0 4</option>
	               <option>0 5</option>
	               <option>0 6</option>
	               <option>0 7</option>
	               <option>0 8</option>
	            </select>   
	            </div>
	            <div class="inputs">
	               <input type="text">
	            </div>
	         </div>
	     </div>
	  
	  </div>
	  <div class="gksel_shop_info_over">
	      <div class="btn">Proceed to payment</div>
	      <div class="text">By clicking "Proceed to payment" you agree to our Terms & Conditions.</div>
	      
	  </div>
</div>

<?php $this->load->view('default/footer');?>
