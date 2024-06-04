  
  $(document).ready(function(){

    // MASK THE CARD
    function maskCardNumber(cardNumber) {
        if (cardNumber.length !== 16) {
          console.error("Card number must be 16 digits long");
          return cardNumber;
        }
        const maskedCardNumber = "XXXX" + cardNumber.slice(4, -4) + "XXXX";
        return maskedCardNumber;
      }

    $('.merchant-order-data').click(function(){
       var id = $(this).data('id');
        console.log("ID:", id);
        $.ajax({
            url: "/orders/"+ id,
            type: "GET",
            success: function (data) {
                if(data){
                  $('#order_id').text(data.order_id);
                  $('#session_id').text(data.session_id);
                  $('#gateway_id').text(data.gateway_id);
                  $('#first_name').text(data.first_name);
                  $('#last_name').text(data.last_name);
                  $('#address').text(data.address);
                  $('#customer_order_id').text(data.customer_order_id);
                  $('#country').text(data.country);
                  $('#state').text(data.state);
                  $('#city').text(data.city);
                  $('#zip').text(data.zip);
                  $('#ip_address').text(data.ip_address);
                  $('#email').text(data.email);
                  $('#phone_no').text(data.phone_no);
                  $('#amount').text(data.amount);
                  $('#currency').text(data.currency);
                  $('#card_no').text(maskCardNumber(data.card_no));
                  $('#status').text(data.status == '0' ? 'Failed' : 'Success' );
                  $('#response_url').text(data.response_url);
                  $('#webhook_url').text(data.webhook_url);
                  $('#transaction_date').text(data.transaction_date);
                }
            },
            // Error handling 
            error: function (error) {
                console.log(`Error ${error}`);
            }
        });
    });

    $('.admin-order-data').click(function(){
        var id = $(this).data('id');
         console.log("ID:", id);
         $.ajax({
             url: "/admin/orders/"+ id,
             type: "GET",
             success: function (data) {
                
                 if(data){
                   $('#order_id').text(data.order_id);
                   $('#session_id').text(data.session_id);
                   $('#gateway_id').text(data.gateway_id);
                   $('#first_name').text(data.first_name);
                   $('#last_name').text(data.last_name);
                   $('#address').text(data.address);
                   $('#customer_order_id').text(data.customer_order_id);
                   $('#country').text(data.country);
                   $('#state').text(data.state);
                   $('#city').text(data.city);
                   $('#zip').text(data.zip);
                   $('#ip_address').text(data.ip_address);
                   $('#email').text(data.email);
                   $('#phone_no').text(data.phone_no);
                   $('#amount').text(data.amount);
                   $('#currency').text(data.currency);
                   $('#card_no').text(maskCardNumber(data.card_no));
                   $('#status').text(data.status == '0' ? 'Failed' : 'Success' );
                   $('#response_url').text(data.response_url);
                   $('#webhook_url').text(data.webhook_url);
                   $('#transaction_date').text(data.transaction_date);
                 }
             },
             // Error handling 
             error: function (error) {
                 console.log(`Error ${error}`);
             }
         });
     });
});
 