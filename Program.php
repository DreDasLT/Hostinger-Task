<?php
/**
 * Created by PhpStorm.
 * User: dre2k
 * Date: 2018-10-30
 * Time: 14:32
 */

require_once('Category.php');
require_once('functions.php');

session_start();


if (!isset($_SESSION['categories'])) {
    $_SESSION['categories'] = $categories;
} else {
    $categories = $_SESSION['categories'];
}

$categoryFromList = "";
$category = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["category"])) {
        $category = test_input($_POST["category"]);
        if (!preg_match("/^[a-zA-Z0-9 -]*$/",$category)) {
            $error = "Tik raidės, skaičiai, tarpas ir brukšnelis";
        }
    } else {
        $error = "Tuščias laukelis";
    }

    if (!empty($_POST["categoryFromList"])) {
        $categoryFromList = test_input($_POST["categoryFromList"]);
    }
    if($categoryFromList == 0) {
        array_push($categories, new Category(count($categories)+1, $category));
    } else {
        array_push($categories, new Category(count($categories)+1, $category, $categoryFromList));
    }
    $_SESSION['categories'] = $categories;
}



?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Parent category:
    <select name="categoryFromList">
        <option value="0">Root</option>
        <?php printTreeToSelectForm($categories); ?>
    </select>
    <br><br>
    Category Name: <input type="text" name="category" value="<?php echo $category;?>">
    <span> <?php echo $error;?></span>
    <br><br>
    <input type="submit" name="submit" value="Pridėti">
</form>

<?php



