<?php
function getHierarchicalVar($key, $article, $ssa) {
    $var = false;

    $a = $article;
    while ($a!=false) {
        if ($var) {
            break;
        }
        $var = $a->getValue($key);
        $a = $a->getParent();
    }
    if (!$var) {
        $var = $ssa->getValue($key);
    }

    return $var;
}