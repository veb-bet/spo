<?php
    include_once "./header.php";
    $products = ProductsActions::getByFilter();
    $materials = ProductsActions::getMaterials();
    if(empty($_SESSION["USER_ID"])){
        header("Location: signIn.php");
    }
?>


<div class="d-flex flex-column w-100">
    <div class="row m-0 w-100">
        <form action="products.php" method="GET" class="d-flex align-items-start">
            <div class="form-group mt-2 mx-2">
                <label>Мин цена: </label>
                <input class="form-control" type="number" name="min_price" id="minRangePicker" min=0 max=100000 value="<?php echo $_GET['min_price']??0 ?>">
            </div>
            <div class="form-group mt-2 mx-2">
                <label>Макс цена: </label>
                <input class="form-control" type="number" name="max_price" id="maxRangePicker" min=0 max=100000 value="<?php echo $_GET['max_price']??100000 ?>">
            </div>
            <div class="form-group mt-2 mx-2">
                <label for="hidden">Материал: </label>
                <input type="text" class="form-control" id="hidden" hidden>
                <select class="form-control" style="margin-top: 25px; padding: 15px 15px 10px; border: thin solid #b3b3b3;" name="material_id" id="material_filter">
                    <option value="">Все материалы</option>
                    <?php foreach($materials as $material): ?>
                        <option value="<?php echo $material["id"] ?>" 
                            <?php
                            if(empty($_GET['material_id'])){
                                $_GET['material_id']=-1;
                            }
                            if(($material["id"] == $_GET['material_id'])){
                                echo 'selected';
                            }
                            ?>
                        >
                            <?php echo $material["name"] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mt-2 mx-2">
                <label>Название</label>
                <input class="form-control" type="text" name="name" max=255 value="<?php echo $_GET['name']??"" ?>">
            </div>
            <div class="form-group mt-2 mx-2">
                <label>Описание</label>
                <input class="form-control" type="text" name="description" max=255  value="<?php echo $_GET['description']??"" ?>">
            </div>
            <div class="form-group d-flex flex-column align-items-center" style="margin-top: 31px;">
                <input class="form-control bg-light" type="submit" value="Применить фильтр">
            </div>
            <div class="form-group mt-2 d-flex flex-column align-items-center">
                <a href="./products.php" style="margin-top: 35px;">Сбросить</a>
            </div>
        </form>
    </div>
    <div class="row m-0">
        <form action="./addProduct.php" class="card col-md-2 p-0 m-2" style="vertical-align: middle; cursor: pointer;<?php if(empty($products)) echo "width:100%; height:200px";?>">
            <input type="image" src="./public/images/plus.png" style="max-height: 100%; object-fit: contain;" alt="submit">
        </form> 
        <?php  
            foreach($products as $product):
        ?>
        <div class="card flex-column justify-content-between col-md-2 p-0 m-2">
            <div class="p-2">
                <p><b><?php echo $product["name"] ?></b></p>
                <p><b>Материал: </b><?php echo $product["material"] ?></p>
                <p><b>Описание: </b><?php echo $product["description"] ?></p>
                <p><b>Цена: </b><?php echo $product["price"] ?></p>
            </div>
            <div>
                <div>
                    <form action="editProduct.php" method="POST">
                        <input type="number" name="id" value="<?php echo $product["id"];?>" hidden>
                        <input class="submit-link" type="submit" value="Редактировать">
                    </form>
                    <form action="deleteProduct.php" method="POST">
                        <input type="number" name="id" value="<?php echo $product["id"];?>" hidden>
                        <input class="submit-link" type="submit" value="Удалить">
                    </form>
                </div>
                <img class="card-img-top" src="./uploads/<?php echo $product["image"] ?>" alt="">
            </div>
        </div> 
        <?php
            endforeach;
        ?>
    </div>
</div>
<script>
    document.getElementById("material_filter").value = <?php echo $_GET['material_id'] ?>
    document.getElementById("minRangePicker").addEventListener("input", ()=>{
        document.getElementById("minRange").innerHTML = document.getElementById("minRangePicker").value
    })
    document.getElementById("maxRangePicker").addEventListener("input", ()=>{
        document.getElementById("maxRange").innerHTML = document.getElementById("maxRangePicker").value
    })
</script>


<?php
    include_once "./footer.php";
?>
<style type="text/css">
.submit-link{

    background: none;
    border: none;
    color: blue;
    text-decoration: underline;
    cursor: pointer;
}
</style>

