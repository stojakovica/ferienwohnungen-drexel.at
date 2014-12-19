<?php
$description = "REX_VALUE[1]";
$description = htmlspecialchars_decode($description);
$description = str_replace("<br />","",$description);
$description = OOAddon::isAvailable('textile')?rex_a79_textile($description):$description;
$description = str_replace("###","&#x20;",$description);
?>
<div class="textContainer">
<?php
echo $description;
?>
</div>