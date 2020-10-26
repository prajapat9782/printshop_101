<?php include('header.php'); ?>
<!-- style -->
<style>
    #profile-page .profile-top{
        padding-top:10rem;
    }
    #profile-page .profile-main{
        margin:100px auto;
        text-align:center;
    }
    .profile-block{
        margin: 30px auto;
    }
    /* profile-left style */
    .profile-left{
        margin:0px 10px;
        /* border:2px solid red; */
        /* box-shadow: 2px 3px 3px #ccc; */
        padding:30px 0px;
        color:#c2c2c2;
        font-size:20px;
    }
    /* profile-right style */
    .profile-right{        
        margin:0px 10px;
        color:#c2c2c2;
        /* border:2px solid red; */
        box-shadow: 0px 4px 10px #ccc;
        padding: 25px 0px 60px 0px;
        border-radius:4px;
    }
    .contant-heading{
        text-transform:uppercase;
        font-weight:500;
        font-size:35px;
        color:#000;
        text-align:left;
        margin:20px 35px;
    }
    .contact-para{
        padding:0 10px 10px 10px;
        margin:20px 35px;
        text-align:left;
    }
    .contact-contact{
        text-align:left;
        padding:0 10px 10px 10px;
        margin:20px 35px;
    }
    .contact-contact li{
        margin:20px auto;
    }
    .contact-contact i{
        /* color: #000; */
        margin-right:35px;
    }
    .contact-form{
        /* background:red; */
        margin:0 20px;        
        padding: 30px 0px;
    }
    .contact-form input,textarea{
        width:90%;
        margin:10px 0px;
        color: #888383;
        outline:none;
        padding:10px 10px;
        /* font-size:18px; */
        border: 1px solid #ccc;
        border-radius: 6px;
    }
    /* input::placeholder{
        color: #000;
    } */
    .send-query{
        width: 90%;
        outline:none;
        border:none;
        background:#000;
        padding: 12px 0;
        text-transform:uppercase;
        color: #fff;
        border-radius:4px;
        font-weight:500;
        transition-duration: 0.3s;
    }
    .send-query:hover{
        background:#fff;
        color:#000;
        font-weight:500;
        border:1px solid #000;
    }

</style>

<!-- profile order form start -->
<section id="profile-page">
    <div class="profile-top"></div>
    
    <div class="container profile-main">
            <h1 class="profile-title"><u ></u></h1>
            <div class="row profile-block">
                <div class="col-md-6 col-sm-7 col-xs-12">                     
                    <div class="profile-left">
                        <h4 class="contant-heading">get in touch</h4>
                        <p class="contact-para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus tenetur nesciunt eos quia? Eos dolore reiciendis in, officia velit iusto laudantium inventore molestias exercitationem. </p>
                         <ul class="contact-contact">
                             <li><i class="fa fa-envelope"></i>printhub19@gmail.com </li> 
                             <li><i class="fa fa-mobile"></i>   +91-99999-55555</li>
                             <li><i class="fa fa-map-pin"></i>  sirohi, rajasthan</li>
                         </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-5 col-xs-12">
                    <div class="profile-right">
                    <h4 class="contant-heading">say something</h4>
                        <form  class="contact-form" method="POST">
                                <input type="text" name="name" placeholder="Your Name" required> 
                                <input type="email" name="email" placeholder="Your Email" required>
                                <input type="text" name="phone" placeholder="Your Mobile" required>
                                <textarea name="mgs"  cols="30" rows="5" placeholder="Message" required></textarea>
                                <button name="send-query" class="send-query" type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</section>
<hr>
<!-- profile order form end -->
<?php include('footer.php');  ?>
<?php
    if(isset($_POST['send-query'])){
        extract($_POST);        
        $res =mysqli_query($conn, "INSERT INTO `getintouch`( `name`, `email`, `mobile`, `message`, `status`) VALUES ('$name','$email','$phone','$mgs','0')");
        ?><script>alert('Thanks for feedback');</script><?php
    }
?>