
 
 <?php
$active='Contact us';
include("includes/header.php");
?>

<div id="content">
    <div class="container">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3 mt-3 rounded-2 shadow">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>

        <div class="col-lg-12 cl-md-12 mx-5 px-5" data-aos="zoom-in">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9">
                    <div class="box shadow p-4"><!-- Added box and shadow styling -->
                        <div class="box-header">
                            <center>
                                <h2> Feel free to Contact Us </h2>
                                <p class="text-muted">
                                    If you have any questions, feel free to contact us. Our Customer Service works
                                    <strong><span class="auto-type"></span></strong>
                                </p>
                            </center>

                            <form action="https://formspree.io/f/mnqkrdbe" method="POST" class="f">
                               <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Name</label>
                               
                               <input type="text" class="form-control" name="name">
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label class="required">Email</label>
                               
                               <input type="text" class="form-control" name="email" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label class="required">Subject</label>
                               
                               <input type="text" class="form-control" name="subject" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label class="required">Message</label>
                               
                               <textarea name="message" class="form-control" required></textarea>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="text-center"><!-- text-center Begin -->
                               
                               <button type="submit" name="submit" class="btn btn-primary py-3 mt-3">
                               
                               <i class="fa fa-paper-plane"></i>  Send Message
                                     
                               </button>
                                   
                           </div><!-- text-center Finish -->
                      
                            </form>

                            <?php 
                            if(isset($_POST['submit'])){
                           
                           /// Admin receives message with this ///
                           
                           $sender_name = $_POST['name'];
                           
                           $sender_email = $_POST['email'];
                           
                           $sender_subject = $_POST['subject'];
                           
                           $sender_message = $_POST['message'];
                           
                           $receiver_email = "hasanoni12612@gmail.com";
                           
                           mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);
                           
                           /// Auto reply to sender with this ///
                           
                           $email = $_POST['email'];
                           
                           $subject = "Welcome to my website";
                           
                           $msg = "Thanks for sending us message. ASAP we will reply your message";
                           
                           $from = "hasanoni12612@gmail.com";
                           
                           mail($email,$subject,$msg,$from);
                           
                           echo "<h2 align='center'> Your message has sent sucessfully </h2>";
                           
                       }
                       
                       ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?> 

<script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
<script>
    var typed = new Typed(".auto-type", {
        strings: ["24/7", "24/7", "24/7"],
        typeSpeed: 50,
        backSpeed: 450,
        loop: true
    })
</script>

   