$(document).ready(function () 
{
  $(document).on('click', '.delete_product_btn', function (e) {    
    e.preventDefault();

        var id = $(this).val();
        // console.log(id);
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
                'delete_product_btn': true
              },
              success: function (response) 
              {
                  //  console.log(response);
                if(response == 200)
                {
                  swal("Success!","Product Deleted!","success");
                  $("#products_table").load(location.href + " #products_table");

                }
                else if(response == 500)
                {
                  swal("Error!","Something went wrong!", "error");
 
                }               
              }
        });
       
      } 
    
    });

  });

  $(document).on('click', '.delete_category_btn', function (e) {
    
     e.preventDefault();
    
    var id = $(this).val();
  
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
            'category_id':id,
            'delete_category_btn': true
          },
          success: function (response) 
          {
            if(response == 200)            
            {
              swal("Success!","Category Deleted!","success");
              $("#category_table").load(location.href + " #category_table");
              console.log(swal);

            }
            else if(response == 500)
            {
              swal("Error!","Something went wrong!", "error");

            }
           
          }
    });
   
  } 

});

});
});