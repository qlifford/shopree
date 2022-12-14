$(document).ready(function () {

  $('.delete_product_btn').click(function (e) { 
    e.preventDefault();
    // console.log("heloo");

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
          success: function (response) {
            if(response == 200)
            {
              //  console.log("id");
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
});