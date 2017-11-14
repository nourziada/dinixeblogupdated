<!-- Include Header Page -->

<?php
$pageTitle = "دنكس - المدونة";
include 'header.php';
include 'functions.php';

  $post = new Post;
  
?>

    <!-- Page Content -->
    <div class="container page-content" dir="rtl">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


         <!-- PHP Get Data from DataBase and Function POSTS -->
         <?php

            // here we check if the Button Search is cliked 
            // if clicked we call all posts that matches
            if(isset($_GET['btnSearch'])) {
              $search = $_GET['search'];
              $posts = $post->search($search);
              
              // if the button is not clicked we call All Posts Normaly
            }else {
              $posts = $post->get_allposts();
            }

            foreach($posts as $postdata) {
            
          ?>
          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="admin/uploads/<?php echo $postdata['image']; ?>" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title"><?php echo $postdata['title'];?></h2>
              <p class="card-text"><?php echo $postdata['content']; ?></p>
              <a href="post.php?id=<?php echo $postdata['id'];?>" class="btn btn-primary">&rarr; إقرأ المزيد</a>
            </div>
            <div class="card-footer text-muted">
              <span>القسم : </span><span><a href=""> <?php echo $postdata['category']; ?></a></span>
              تم النشر في  
              <?php echo date('Y-m-d', $postdata['date']); ?>

              <span class="comments-no">التعليقات: 
                <span> 
                <?php
                  $postID =  $postdata['id']; 
                  $commentsNo = $post->get_commentsNo($postID);
                  echo $commentsNo;
                ?>
                 
                </span>
              </span>


            </div>
          </div>


          <?php
            } ### end of foreach to get posts

          ?>


          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

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
              <form>
                <div class="input-group">
                  <input type="text" name="search" class="form-control" placeholder="إبحث عن ....">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary " name="btnSearch" type="submit">إذهب!</button>
                  </span>
                </div>
              </form>
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


<script>
$(document).ready(function(){



    $(".carousel-item:first").addClass('active'); // This is the change.
});

</script>

<!-- Include Footer Page -->
<?php
include 'footer.php';
?>    