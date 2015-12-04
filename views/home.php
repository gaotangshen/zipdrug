<?php
$b = new Blog();
$u = new User();
$all = true;
$self = false;
if(isset($_GET['follow']) && $_GET['follow']==true ){
    $blogs = $b->blogFromFollower($_COOKIE['username']);
    $all = false;
}else{
    $blogs = $b->all();
}
$follows = $u->follower($_COOKIE['username']);

?>
<div class="row">
    <div class="col-md-8">
        <h1 class="page-header">
            Twitts 
            <!-- <a href="http://localhost/Zipdrug/blog/follower"><small>Only Followers</small></a> -->
        </h1>
        <?php
        if($all == false){?>
            <a href="http://localhost/Zipdrug/user/home"><span> Back to all</span></a>
        <?php }else {?>
        <a href="http://localhost/Zipdrug/user/home?follow=true"><span> Click to Show only from follower</span></a>
        <?php }
        foreach ($blogs as $blog) {
            $formAction = "/Zipdrug/user/follow";
            $buttonValue = "Follow";
            if(isset($follows[$blog['username']]) && $follows[$blog['username']] ==true){
                $formAction = "/Zipdrug/user/unfollow";
                $buttonValue = "Unfollow";
            }elseif($blog['username'] == $_COOKIE['username']){
                $self = true;
            }
            ?>
	        <h2>
	            <a href="#"><?php echo $blog['title']?></a>
	        </h2>
                <?php if($self==false){?>
                <form class="form-inline" method="post" action="<?php echo $formAction?>">
                    <span>by <?php echo $blog['username']?> </span>
                    <input type="hidden" name="username" value="<?php echo $blog['username']?>">
                    <input class="btn btn-primary" type="submit" value="<?php echo $buttonValue?>">
                </form>
                <?php }?>
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