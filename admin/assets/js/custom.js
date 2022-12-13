$(document).ready(function () 
{
  $('.delete_product_btn').click(function (e) 
  {
    e.preventDefault();
    var id = $(this).val();

    // alert(id);

        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => 
    {
      if (willDelete) 
      {
            $.ajax({
              method: "post",
              url: "code.php",
              data: {
                'product_id':id,
                'delete_product_button': true
              },
              success: function (response) {
                if(response == 200)
                {
                  swal("Success!", "Product Deleted!", "success");
                  $("#products_table").load(location.href + " #products_table");

                }
                else if(response == 500)
                {
                  swal("Error!","Something went wrong!", "error");
 
                }
               
          }
        });
       
      } 
      else 
      {
        swal("Cancelled!");
      }
    });

  });
});

    
           