

<?php
include('functions/userfunctions.php');
include('includes/header.php');

if(isset($_GET['category']))
{

$category_slug = $_GET['category'];
$category_data = getSlugActive("menu", $category_slug);
$category = mysqli_fetch_array($category_data);

if($category)
{

$cid = $category['id'];
?>

<div class="heading">
    <h3>food items</h3>
    <p><a href="index.php">home</a><span> / <a href="menu.php">categories</a> / <?= $category['name']; ?></span></p>
</div>


<div id="menu">
<div class="py-4">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <h1 class="text-center"><?= $category['name']; ?></h1>
                <hr>
                <div class="row justify-content-between">

                <?php
                $items = getProdByCategory("$cid");
                
                if(mysqli_num_rows($items) > 0)
                {
                    foreach($items as $item)
                    {
                        ?>
                        <div class="col-md-3 mb-4">
                        
                            <div class="card shadow h-100">
                                <div class="card-body">

            <form action="" method="post" class="box">
                    <input type="hidden" name="item_id" value="<?= $item['id']; ?>">
                    <input type="hidden" name="name" value="<?= $item['name']; ?>">
                    <input type="hidden" name="price" value="<?= $item['price']; ?>">
                    <input type="hidden" name="image" value="<?= $item['image']; ?>">

               <div class="name text-center"><?= $item['name']; ?></div>
               <img src="uploads/posts/<?= $item['image']; ?>" alt="Item Image" width="100" height="180" class="w-100 card-img">

             <div class="flex">
               <div class="price text-center"><span>Rs.</span><?= $item['price']; ?></div>
               <input type="number" name="qty" class="qty" value="1" min="1" max="99" maxlength="2">
             </div>

             <div class="description"><?= $item['description']; ?></div>
            
                                </div>
                                <div class="more-btn">
              <button type="submit" name="add_to_cart" class="btn">Add to Cart</button>
             </div>
             </form>
                            </div>
                        </div>
                        
                        <?php
                    }
                }
                else
                {
                    echo "No data available";
                }

                ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
  }
  else
    {
        echo "Something went wrong.";
    }
  }
  else
    {
        echo "Something went wrong.";
    }

?>


