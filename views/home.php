<?php
$b = new Blog();
$blogs = $b->all();
?>
<div class="row">
    <div class="col-md-8">
        <h1 class="page-header">
            Twitts
        </h1>
        <?php
        foreach ($blogs as $blog) {?>
	        <h2>
	            <a href="#"><?php echo $blog['title']?></a>
	        </h2>
	        <p class="lead">
	            by <a href="index.php"><?php echo $blog['username']?></a>
	        </p>
	        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $blog['date']?></p>
	        <hr>
	        <img class="img-responsive" src="../static/files/<?php echo $blog['file']?>" alt="">
	        <hr>
	        <p><?php echo $blog['content']?></p>
	        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

	        <hr>
        <?php }?>
	       
        <ul class="pager">
            <li class="previous">
                <a href="#">&larr; Older</a>
            </li>
            <li class="next">
                <a href="#">Newer &rarr;</a>
            </li>
        </ul>
    </div>
</div>