<?php
/**
 * Created by PhpStorm.
 * User: dre2k
 * Date: 2018-10-30
 * Time: 21:07
 */

require_once('Category.php');

/**
 * @param array $categories
 * @param int $parent
 * @return bool
 */
function printTree(array $categories, int $parent = 0) {
    foreach ($categories as $category) {
        if ($category->getParentCategoryId() == $parent) {
            printBranch($category);
            printTree($categories, $category->getId());
        }
    }
    return true;
}

/**
 * @param Category $category
 */
function printBranch(Category $category) {
    $parent = $category->getParentCategoryId();
    $tabNumber = $parent != 0 ? $parent + 1 : 0;
    echo str_repeat('&nbsp', $tabNumber) . $category->getName() . "<br>";
}