<?php

require_once('HackerNews.php');

//carbon library
use Carbon\Carbon;

//initialize our class
$api = new HackerNews();

//get the list of top 100 stories
$top_items_full= $api->get_top_stories_ids();

//slice that down to 10
$top_items = array_slice($top_items_full, 0, 20);
?>


<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">

<!--[if lte IE 8]> <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/grids-responsive-old-ie-min.css"> <![endif]-->
<!--[if gt IE 8]><!--> <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/grids-responsive-min.css"> <!--<![endif]-->
<!--[if lte IE 8]> <link rel="stylesheet" href="http://purecss.io/combo/1.17.16?/css/layouts/blog-old-ie.css"> <![endif]-->
 <!--[if gt IE 8]><!--> <link rel="stylesheet" href="http://purecss.io/combo/1.17.16?/css/layouts/blog.css"> <!--<![endif]-->
<!--[if lt IE 9]> <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script> <![endif]-->

<style type="text/css">
.post-title { font-size:18px; }
.post-title a { color:grey; }
.arrow-down {
  width: 0; 
  height: 0; 
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-top: 5px solid gray;
  position: relative;
  left: 15%;
  top: -60px;
}
.pure-menu-open>ul {
    left: -40%;
}
</style>

</head>
<body>


<div id="layout" class="pure-g">
    <div class="sidebar pure-u-1 pure-u-md-1-4">
        <div class="header">
            <h2 class="brand-title">Hacker News App</h2>
            <h3 class="brand-tagline">by Sedat Can Uygur</h3>
            <!--<nav class="nav">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a class="pure-button" href="https://github.com/PCengineer48">Github</a>
                    </li>
                </ul>
            </nav>-->

        </div>
    </div>

    <div class="content pure-u-1 pure-u-md-3-4">
        <div>
            <!-- A wrapper for all the blog posts -->
            <div class="posts">
				<a href="http://www.ycombinator.com"><img src="y18.gif" width="18" height="18" style="border:1px white solid;"></a><h1 class="content-subhead" style="position: relative; left: 30px; top: -35px; color: rgb(255, 102, 0); border-bottom:0px;">HACKER NEWS</h1><div class="arrow-down"></div>	
				<div style="overflow:scroll; height:380px; width:750px;">
            <?php foreach ($top_items as $item_id) { 
            	$item 	= $api->get_item_data_by_id($item_id); 
            	$user 	= $api->get_user_data_by_id($item['by']);
            ?>
                <section class="post">
                    <header class="post-header">

                        <h2 class="post-title"><a target="_blank" href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?> </a></h2>

                        <p class="post-meta">
                             <a class="post-category post-category-design" href="#"> <?php echo $item['score']; ?> points</a> | <a class="post-category post-author" href="https://news.ycombinator.com/item?id=<?php echo $item['id']; ?>"> <?php echo $item['descendants']; ?> comments</a> | <a class="post-category post-category-pure" href="https://news.ycombinator.com/user?id=<?php echo $item['by']; ?>"> <?php echo Carbon::createFromTimeStamp($item['time'])->diffInHours();?> hours ago By <?php echo $item['by']; ?></a> 
                        </p>
                    </header>
                </section>  				
            <?php } ?>
				</div>
           	</div>

            <div class="footer">
                <div class="pure-menu pure-menu-horizontal pure-menu-open">
                    <ul>
                        <li><a href="http://www.kariyer.net/ozgecmis/sedatcanuygur">About</a></li>
                        <li><a href="https://tr.linkedin.com/in/sedat-can-uygur-1b225473">LinkedIn</a></li>
                        <li><a href="https://github.com/PCengineer48">GitHub</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>




