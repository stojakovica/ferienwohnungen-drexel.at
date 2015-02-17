<?php
$rid = "s".rand(1, 999);
$article = OOArticle::getArticleById($this->article_id);
$images = explode(",", "REX_MEDIALIST[1]");
if($images) {
    ?>
    <div class="gallery">
        <div class="row">
            <?php foreach($images as $img) {
                $imageObj = OOMedia::getMediaByFileName($img);
                ?>
                <div class="col-xs-3 img">
                    <a rel="lightbox-<?php echo $rid; ?>" href="<?php echo seo42::getImageManagerFile($imageObj->getFileName(), "lightbox"); ?>" title="<?php echo $imageObj->getTitle(); ?>">
                        <img class="img-responsive" src="<?php echo seo42::getImageManagerFile($imageObj->getFileName(), "gallery"); ?>" title="<?php echo $imageObj->getTitle(); ?>" />
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
<?php
}
?>