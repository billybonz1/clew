(function($){
	$(document).ready(function(){
		var qInput  = $('.quantity input');
		qInput.after("<div class='q-plus quant'>+</div>");
		qInput.before("<div class='q-minus quant'>-</div>");
		$(document).on("click",".quant", function(){
		    qInput = $(this).siblings("input");
			var q = parseInt(qInput.val());
			if($(this).hasClass("q-plus")){
				q++;
			} else if($(this).hasClass("q-minus") && q >= 2){
				q--;
			}
			qInput.val(q);
			var parents = $(this).parents(".cart__item-contain");
			var price = parseInt(parents.find(".cart__price").data("price"));
			var newPrice = price*q;
			parents.find(".woocommerce-Price-amount").html('<span class="woocommerce-Price-amount amount">'+newPrice+'<span class="woocommerce-Price-currencySymbol"> грн</span></span>');
			
			$.ajax({
			   url: "/",
			   method: "GET",
			   data: {
			       action: "change_quantity",
			       q: q,
			       cart_item_id: parents.data("key")
			   },
			   success: function(data){
			       console.log(data);
			   }
			});
			
		});
	});
})(window.jQuery)