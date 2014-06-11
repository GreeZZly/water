<div class="block_bg" id="products_bg">
	<div class="container" id="products">
		<div class="row-fluid">
		
			
			<ul class="thumbnails">
				
			<?foreach ($productType as $key => $value) {
				print('<li class="span4"><a href="/main/productLabels" id="'.$value['type'].'" class="thumbnail prod_type"><img data-src="holder.js/300x200" alt="" >'.$value['type'].'</a></li>');
			}?>
			  		  
			</ul>
		</div>
	</div>

</div>



<div class="modal hide fade myModal" id="product_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3>Спасибо!</h3>
	  </div>
	  <div class="modal-body">
	  	Ваш продукт добавлен в корзину.
	  <form method='POST'>
		  <fieldset>
		    <!-- <legend>Название формы</legend> -->
		    <!-- <label>Описание поля</label> -->
		   
	    	<button class="btn btn-primary pull-right" id="reg_submit">ОК</button>
		  </fieldset>
		</form>

	  </div>
	  
	</div>