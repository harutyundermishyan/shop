$( document ).ready(function() {
 $("#product-name").on("keyup",function(){
     var name = $("#product-name").val();
     var firm = $("#firm-name").val();
     var category = $("#category-name").val();
     var data = {
         name: name,
         firm: firm,
         category: category
     };
     $.ajax({
         url: "/product/search",
         type: "post",
         data: data,
         success: function(response){
             $("#products-list").removeClass('d-none').html('');
             var products = response.products.reverse();
             products.forEach(function(product) {
                 $("#products-list").append('<div><ul><li>'+product.name+'</li><li>'+product.date+'</li><li>'+product.first_price+'դր</li><li>'+ product.description +'</li></ul></div><hr>');
             });

         },
         error: function(response){
             $("#products-list").addClass('d-none');
         }
     })
 })
});
