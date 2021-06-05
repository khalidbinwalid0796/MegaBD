<script type="text/javascript">
    function productview(id){
          $.ajax({
                 url: "{{  url('/cart/product/view/') }}/"+id,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {

                $.each(data, function(index,modalData) {
                    $('#pname').text(modalData['product_name']);
                    $('#pimage').attr('src',modalData['image_one']);
                    $('#pcat').text(modalData['category_name']);
                    $('#psubcat').text(modalData['subcategory_name']);
                    $('#pbrand').text(modalData['brand_name']);
                    $('#pcode').text(modalData['product_code']);
                    $('#pqty').text(modalData['product_quantity']);
                   //catch the id
                   $('#product_id').val(modalData['id']);
                });


                var d =$('#size').empty();
                 $.each(data.size, function(key, value){
                     $('#size').append('<option value="'+ value +'">' + value + '</option>');
                      if (data.size == "") {
                             $('#sizediv').hide();   
                      }else{
                            $('#sizediv').show();
                      } 
                 });

                var d =$('#color').empty();
                 $.each(data.color, function(key, value){
                     $('#color').append('<option value="'+ value +'">' + value + '</option>');
                       if (data.color == "") {
                             $('#colordiv').hide();
                      } else{
                           $('#colordiv').show();
                      }
                 });
             }
      })
    }
</script>