<?php
/**
 * Created by PhpStorm.
 * User: dre2k
 * Date: 2018-10-30
 * Time: 14:32
 */

require_once('Category.php');

$categories = array(
    new Category(1, 'cat'),
        new Category(2, 'sub-cat', 1),
            new Category(3, 'sub-sub-cat', 2),
        new Category(4, 'sub-cat', 1),
            new Category(5, 'sub-sub-cat', 4),
                new Category(9, 'sub-sub-sub-cat', 5),
                    new Category(10, 'sub-sub-sub-sub-cat', 9),
                        new Category(11, 'sub-sub-sub-sub-sub-cat', 10),
            new Category(6, 'sub-sub-cat', 4),
            new Category(7, 'sub-sub-cat', 4),
    new Category(8, 'cat')
);


function buildTree(array $categories, $parent = 0) {
    foreach ($categories as $category) {
        if ($category->getParentCategoryId() == $parent) {
            printBranch($category);
            buildTree($categories, $category->getId());
        }
    }
    return true;
}

function printBranch(Category $category) {
    $parent = $category->getParentCategoryId();
    $tabNumber = $parent != 0 ? $parent + 1 : 0;
    echo str_repeat('&nbsp', $tabNumber) . $category->getName() . "<br>";
}

$tree = buildTree($categories);
