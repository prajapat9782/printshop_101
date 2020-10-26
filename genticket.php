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
    .form-container{
        /* background:red; */
        width:85%;
        margin: 30px 100px;
        padding: 0px 100px;
    }
    .form-container label{
        width: 100%;
        font-size:18px;
        text-align:left;
        margin-top: 10px;
        margin-bottom:5px;
        margin-left:3px;
    }
    .form-container input,select,textarea{
        width:100%;
        padding:12px 10px;
        margin-bottom:8px;
        color:#8e8e8e; 
        outline:none;
        border-radius: 4px;
        border: 1px solid #ccc;   
        line-height:15px;
        font-size:18px     
    }
    .submit-btn{
        background:#000;
        color: #fff;
        border: 1px solid #fff;
        width:100%;
        font-weight: 500;
        text-transform:uppercase;
        padding: 12px 0px;
        border-radius:4px;
    }
   .submit-btn:hover{
        color: #000;
        font-weight: 500;
        background:#fff;
        border: 2px solid #000;
    }
    

</style>

<!-- profile order form start -->
<section id="profile-page">
    <div class="profile-top"></div>
    
    <div class="container profile-main">
            <h1 class="profile-title"><u ></u></h1>
            <div class="row profile-block">
                <form action="ticker.php" method="POST" enctype="multipart/form-data" class="form-container">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" id="" placeholder="Your Subject" required>

                        <label for="complaints">Complaints</label>
                        <select name="complaint" placeholder="select type" >
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                            <option value="4">Option 4</option>
                        </select>

                        <label for="image">Image</label>
                        <input type="file" name="image" id="file" required>

                        <label for="description">Description</label>
                        <textarea name="desc" id="" cols="30" rows="5" placeholder="Description" required></textarea>
                        <button type="submit" name="ticket" class="submit-btn" >Submit</button>
                </form>
                
            </div>
    </div>
</section>
<hr>
<!-- profile order form end -->
<?php include('footer.php');  ?>
