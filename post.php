<?php
  
  $pageTitle = "دنكس - التفاصيل";
  require 'header.php';
  require 'functions.php';

  ### Config Class Post and Call Function
  $postdata = new Post;

  ### Get the ID from GET URL
  if(isset($_GET['id'])) {
    #### if there is a valid ID
    $id = intval($_GET['id']);
    $post = $postdata->get_post($id);

    $comments = $postdata->get_comments($id); 



    if ($post == 0) {
      header("Location: 404.php");
      exit();
    }


  }else {
    header("Location: index.php");
    exit();
  }



  ###### METHOD OF ADD COMMENT ###### 
  if(isset($_POST['btnsubmit'])) {
    $comment = $_POST['comment'];
    $name = $_POST['name'];
    $date = time();

    if(empty($comment) || empty($name)) {

        $error = "عذراً ! كافة الحقول مطلوبة";

    }elseif (strlen($name) > 50) {
      $error = "ذعراً ! الاسم لا يجب أن يكون طويل جداً ";
    }else if (strlen($comment) > 250) {
      $error = "عذراً ! التعليق لا يجب أن يكون طويل جداً";
    }else {

      $postdata->add_comment($date,$name,$comment,$id,0);
      $success = "تم إضافة التعليق بنجاح وهو بإنتظار المرآجعة";
      


    }
  }
  
 ?>
    <!-- Page Content -->
    <div class="container main-container" style="margin-top:50px !important;" dir="rtl">

      <div class="row">



        <!-- Post Content Column -->
        <div class="col-lg-8">


          <!-- Title -->
          <h1 class="mt-4"> <?php echo $post['title']; ?></h1>
          <hr>
          <!-- Date/Time -->
          <p><?php echo date('Y-m-d' , $post['date']); ?></p>
          <hr>
          <!-- Preview Image -->
          <img class="img-fluid rounded" src="admin/uploads/<?php echo $post['image']; ?>" alt="">
          <hr>

          <!-- Post Content -->
          <p class="lead"><?php echo $post['content']; ?></p>

          <hr>

          <?php

            if(isset($error)) {

          ?>
          <div class="container" style="margin-top:10px">
            <div class="alert alert-danger" role="alert"> 
              <strong><?php echo $error; ?></strong>
            </div>
          </div>  

          <?php
            }//end if of isset the error to print
          ?> 


          <?php

            if(isset($success)) {

          ?>
          <div class="container" style="margin-top:10px">
            <div class="alert alert-success" role="alert"> 
              <strong><?php echo $success; ?></strong>
            </div>
          </div>  

          <?php
            }//end if of isset the success to print
          ?> 

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">أضف تعليق : </h5>
            <div class="card-body">
              <form action="" method="POST">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="الاسم كاملاً">
                </div>
                <div class="form-group">
                  <textarea name="comment" class="form-control" rows="3" placeholder="أترك تعليقك هنا ..."></textarea>
                </div>
                <button name="btnsubmit" type="submit" class="btn btn-primary">أضف</button>
              </form>
            </div>
          </div>

<?php
  #### when there is no comments on the post
  if ($comments == 0 ){

    ?>

    <div class="media mb-4">
      <div class="media-body">
        <h5 class="mt-0" style="text-align: center;">~ لا يوجد تعليقات على هذا المنشور ~</h5>
      </div>
    </div>
<?php

  } else {
foreach($comments as $comment){

?>
          <!-- Single Comment -->
          <div class="media mb-4" style="margin-bottom: 0px !important;">
            <img class="d-flex mr-3 rounded-circle visitor-img" src="img/favicon.ico" alt="">
            <div class="media-body">
              <span class="mt-0" style="font-size: 1.25rem;font-weight: 500;">~ <?php echo $comment['name']; ?> ~</span>
              <span style="font-size: 12px;color: #ccc;margin-right: 16px;">
              <?php
                echo date("Y-m-d",$comment['date']);
              ?>
              </span>

              <br>

              <?php echo $comment['comment']; ?>
            </div>
          </div>

          <div class="flex" style="width: 100%;border: 1px solid #ccc;margin-bottom: 5px;margin-top: 5px;"></div>

<?php 
}#### end of if else 
} ###### end of foreach loop
 ?>
        </div>

        
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Side Widget -->
          <div class="card my-4 info-card">
            <h5 class="card-header header-f">دنكس</h5>
            <div class="card-body body-f">
               أول شركة الكترونية في الشرق الأوسط متخصصة في صناعة تطبيقات الآندرويد بجودة وإبداع وأمان عالي                         
            </div>

            <a class="card-brand" href="https://play.google.com/store/apps/dev?id=5010563152392790021"><img src="img/googlePlayButton.png" alt="Dinixe"></a>
          </div>

          <!-- Search Widget -->
          <div class="card my-4 search-card">
            <h5 class="card-header header-f">إبحث</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="إبحث عن ....">
                <span class="input-group-btn">
                  <button class="btn btn-secondary " type="button">إذهب!</button>
                </span>
              </div>
            </div>
          </div>


          <!-- Projects Widget -->
          <div class="card my-4">
            <h5 class="card-header header-f">مشاريع تقنية</h5>
            <div class="card-body">
             
              <div id="carouselExampleIndicators" class="carousel slide slider-apps" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">

          <?php 

            $side = new Side;
            $projects = $side->get_projects();

            foreach($projects as $project) {


          ?>


                  <div class="carousel-item">

                    <img class="d-block img-fluid slider-img" src="img/<?php echo $project['image']; ?>" alt="First slide" />
                    <div class="carousel-caption d-none d-md-block">
                      <a class="slider-title" href="<?php echo $project['link']; ?>"><h3><?php echo $project['title']; ?></h3></a>
                      
                    </div>

                    <div class="d-none d-md-block carousel-caption-para">
                      <p><?php echo $project['content'];  ?></p>
                    </div>

                    

                  </div>

          <?php
            }##### end of foreach of the projects
           ?>  

                 

              </div>
               

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>


            </div>
          </div>

       

        </div>

          

      </div>
      <!-- /.row -->

    </div>

    </div>
    <!-- /.container -->


<script>
$(document).ready(function(){



    $(".carousel-item:first").addClass('active'); // This is the change.
});

</script>


<?php

include 'footer.php';

?>
