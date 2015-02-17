<?php
$ssa = OOArticle::getSiteStartArticle();
$curArticle = OOArticle::getArticleById($this->article_id);
$isContact = $curArticle->getId()==6;
$headerImages = array_filter(explode(',', getHierarchicalVar('art_header_images', $curArticle, $ssa)));
?>
<!DOCTYPE html>
<html lang="<?php echo seo42::getLangCode(); ?>" xmlns:fb="http://ogp.me/ns/fb#">
<head>
    <meta charset="utf-8" />
    <base href="<?php echo seo42::getBaseUrl(); ?>" />
    <title><?php echo seo42::getTitle(); ?></title>
    <meta name="description" content="<?php echo seo42::getDescription(); ?>" />
    <meta name="keywords" content="<?php echo seo42::getKeywords(); ?>" />
    <meta name="robots" content="<?php echo seo42::getRobotRules();?>" />
    <link rel="shortcut icon" href="<?php echo seo42::getImageFile("favicon.ico"); ?>" type="image/x-icon" />
    <link rel="canonical" href="<?php echo seo42::getCanonicalUrl(); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/jquery-focuspoint/css/focuspoint.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo seo42::getCSSFile("slimbox2.css"); ?>" type="text/css" media="screen,print" />
    <link rel="stylesheet" href="<?php echo seo42::getCombinedCSSFile("main.css", array("main.less")); ?>" type="text/css" media="screen,print" />
    <link href="lib/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Ferienwohnungen Drexel</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php
            $nav = new nav42();
            $nav->setLevelDepth(1);
            $nav->setUlClass("nav navbar-nav navbar-right", 0);
            echo $nav->getNavigationByLevel(0);
            ?>
        </div>
    </div>
</nav>

<?php if($isContact) { ?>
    <div id="gmaps">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d346207.6403782717!2d10.38349534550617!3d47.319277181791094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479cbe11353d95cb%3A0x9c0affa0c997d948!2sObergiblen+4a%2C+6653+Obergiblen!5e0!3m2!1sde!2sat!4v1419012682533" width="100%" height="100%" frameborder="0" style="border:0"></iframe>
    </div>
<?php }
else {
    ?>
    <div id="headerCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php
            $ci = 0;
            foreach($headerImages as $h) { ?>
                <li data-target="#headerCarousel" data-slide-to="<?php echo $ci; ?>"></li>
                <?php
                $ci++;
            } ?>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php foreach($headerImages as $h) { ?>
                <div class="item focuspoint" data-focus-x="0"
                     data-focus-y="0"
                     data-image-w="400"
                     data-image-h="300">
                    <img src="<?php echo seo42::getMediaFile($h); ?>" alt="">
                    <div class="container">
                        <div class="carousel-caption">
                            <h2>Bildheadline</h2>
                            <p>Beispieltext zum zeigen. Beispieltext zum zeigen. Beispieltext zum zeigen. Beispieltext zum zeigen. Beispieltext zum zeigen. Beispieltext zum zeigen.</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <a class="left carousel-control" href="#headerCarousel" role="button" data-slide="prev">
        </a>
        <a class="right carousel-control" href="#headerCarousel" role="button" data-slide="next">
        </a>
    </div>
    <?php
} ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <?php echo $this->getArticle(); ?>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                $nav = new nav42();
                $nav->setLevelDepth(1);
                $nav->setUlClass("list-inline", 0);
                echo $nav->getNavigationByCategory(7);
                ?>
            </div>
        </div>
    </div>
</footer>

<script src="<?php echo seo42::getJSFile('jquery-1.11.1.min.js'); ?>"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="lib/jquery-focuspoint/js/jquery.focuspoint.min.js"></script>
<script src="<?php echo seo42::getJSFile('slimbox2.js'); ?>"></script>
<script src="<?php echo seo42::getJSFile('main.js'); ?>"></script>
</body>
</html>