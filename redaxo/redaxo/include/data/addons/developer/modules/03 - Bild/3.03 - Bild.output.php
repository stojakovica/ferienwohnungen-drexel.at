<?php
$image1 = OOMedia::getMediaByFileName("REX_FILE[1]");
?>
<div class="row">
    <div class="col-sm-12 bild">
        <a rel="lightbox-<?php echo $image1->getId(); ?>" href="<?php echo seo42::getImageManagerFile($image1->getFileName(), "lightbox"); ?>" title="<?php echo $image1->getTitle(); ?>">
            <img class="img-responsive" src="<?php echo seo42::getImageManagerFile($image1->getFileName(), "contentImg"); ?>" title="<?php echo $image1->getTitle(); ?>" />
        </a>
    </div>
</div>
