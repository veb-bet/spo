<?php
    include_once "./header.php";
    $product = ProductsActions::getById();
    $materials = ProductsActions::getMaterials();
?>
<div class="d-flex flex-column align-items-center w-100">
    <form action="editProductAnswer.php" method="POST" enctype="multipart/form-data" class="form_control">
        <input type="number" name="id" class="form-control" value="<?php echo $product["id"] ?>" hidden>
        <div class="form-group mt-2">
            <label>Название</label>
            <input class="form-control" value="<?php echo $product["name"]; ?>" type="text" name="name" max=255 required>
        </div>
        <div class="form-group mt-2">
            <label>Описание</label>
            <textarea class="form-control" type="text" name="description" max=255 required><?php echo $product["description"]; ?></textarea>
        </div>
        <div class="form-group mt-2">
            <label for="hidden">Материал: </label>
            <input type="text" class="form-control" id="hidden" hidden>
            <select class="form-control" style="margin-top: 25px; padding: 15px 15px 10px; border: thin solid #b3b3b3;" name="material_id" id="material_filter" required>
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
        <div class="form-group mt-2">
            <label>Цена</label>
            <input class="form-control" value="<?php echo $product["price"]; ?>" type="number" max="100000" name="price" placeholder="Максимум: 100000" required>
        </div>
        <div class="form-group mt-2">
            <label>Изображение</label>
            <input type="file" class="form-control" value="<?php echo $product["image"]; ?>" name="image" required>
        </div>
        <div class="form-group mt-2 d-flex flex-column align-items-center">
            <input class="btn btn-primary w-100" type="submit" value="Изменить">
        </div>
    </form>
</div>
<script>
    document.getElementById("material_filter").value = <?php echo $product["material_id"] ?>
</script>
<?php
    include_once "./footer.php";
?>