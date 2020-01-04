<?php
require_once('./Fruits/Fruit.php');
require_once('./Fruits/Orange.php');
require_once('./Fruits/Apple.php');
require_once('./Fruits/Grape.php');
require_once('./Fruits/NoneFruit.php');
use Fruits\Fruit;
use Fruits\Orange;
use Fruits\Apple;
use Fruits\Grape;
use Fruits\NoneFruit;

$fruitName = getFruitNameByUrlPath();
$fruitData = setFruitData($fruitName);

function getFruitNameByUrlPath(){
    if(!isset($_GET['fruit'])){
        return 'none';
    }
    return $_GET['fruit'];
}

function setFruitData($fruitName){
    $fruit = getFruitInstance($fruitName);
    $fruitContext = new Fruit($fruit);
    return $fruitContext->execute();
}

function getFruitInstance($fruitName) {
    switch ($fruitName) {
        case 'orange':
            return new Orange;
        case 'apple':
            return new Apple;
        case 'grape':
            return new Grape;
        default:
            return new NoneFruit;
    }
}

?>

<?php
echo "<table border = '1'>";
echo "   <tr>";
echo "        <th>名前</th>";
echo "        <th>色</th>";
echo "        <th>好き or 嫌い</th>";
echo "        <th>人気順位</th>";
echo "    </tr>";
echo "    <tr>";
echo "        <th>$fruitData[name]</th>";
echo "        <th>$fruitData[color]</th>";
echo "        <th>$fruitData[has_like]</th>";
echo "        <th>$fruitData[order_of_popularity]</th>";
echo "    </tr>";
echo "</table>";
?>