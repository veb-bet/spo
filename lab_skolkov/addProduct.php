<?php
    include_once "./header.php";
    $materials = ProductsActions::getMaterials();
?>
<div class="d-flex flex-column align-items-center w-100">
    <form action="addProductAnswer.php" method="POST" enctype="multipart/form-data" class="form_control">
        <div class="form-group mt-2">
            <label>Название</label>
            <input class="form-control" type="text" name="name" max=255 required>
        </div>
        <div class="form-group mt-2">
            <label>Описание</label>
            <textarea class="form-control" type="text" name="description" max=255 required></textarea>
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
            <input class="form-control" type="number" max="100000" name="price" placeholder="Максимум: 100000" required>
        </div>
        <div class="form-group mt-2">
            <label>Изображение</label>
            <input type="file" class="form-control" name="image" required>
        </div>
        <div class="form-group mt-2 d-flex flex-column align-items-center">
            <input class="btn btn-primary w-100" type="submit" value="Добавить">
        </div>
    </form>
</div>
<?php
    include_once "./footer.php";
?>