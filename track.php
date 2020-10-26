<?php include('header.php'); ?>
<!-- style -->
<style>
    #track-page .track-top{
        padding-top:16rem;
    }
    #track-page .track-main{
        margin:100px auto;
        text-align:center;
    }
    #track-page .track-title{
        text-transform:capitalize;
    }
    #track-page .track-from{
        max-width:600px;
    }
    #track-page .track-from .fa-search{
        margin-left:5px
    }
    #track-page .track-from .btn{
        outline:none;
    }
    #error-span{
        float:left;
        margin:5px auto;
        font-size:13px;
        color:#e40000;
    }
    #order-display table{
        max-width: 700px;
        margin:20px auto;
    }
</style>

<!-- track order form start -->
<section id="track-page">
    <div class="track-top"></div>
    <div class="container track-main">
            <h1 class="track-title">track your order</h1>
            <div class="container track-from">
                
                    <div class="form-group">                        
                        <input type="text" name="order-id" id="order-id" class="form-control" placeholder="Enter Order Id">                        
                    </div>
                    <button class="btn btn-primary btn-block" id="search-item">Search <i class="fa fa-search"></i></button>
                    <span id="error-span"></span>
            </div>
    </div>
    <div id="order-display" style="display:none" >
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order Amount</th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id="id"></td>
                        <td id="amount"></td>
                        <td id="pstatus"></td>
                        <td id="ostatus"></td>
                    </tr>
                </tbody>

            </table>
    </div>
</section>
<hr>
<!-- track order form end -->
<?php include('footer.php');  ?>
<script>
    $(document).ready(function(){
       $('#search-item').click(function(){
        // alert(window.location.hostname);
        $('#error-span').html('');
           var inputOrder = $('#order-id');           
            var orderId = inputOrder.val();
            var orderId = orderId.trim();
            
            if(orderId.length==0 ){
                // alert('null or undefined');
                inputOrder.css('border','2px solid red');
                $('#error-span').html('Enter valid value');
                inputOrder.attr("placeholder","please enter valid value");
            }else{
                inputOrder.css('border','1px solid green');                
                inputOrder.attr("wait....record finding");
                $.ajax({
                    url:'order-search.php',
                    method:'POST',
                    data:{orderid:orderId},
                    success:function(res){                        
                        var data = JSON.parse(res);
                        console.log(data);
                        if(data.status=='failed'){
                            inputOrder.css('border','2px solid red');
                            $('#error-span').html('no record found'); 
                            inputOrder.val('');  
                            $('#order-display').css('display','none');                                                     
                        }else{           
                            $('#order-display').css('display','block');
                            $('#id').html(data.detail.id)
                            $('#amount').html(data.detail.order_amount)
                            $('#pstatus').html(data.detail.payment_statue)
                            $('#ostatus').html(data.detail.orderStatus)
                        }
                    }
                });
            }
       });
    });
</script>