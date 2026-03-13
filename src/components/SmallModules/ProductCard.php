<div class="product">
    <div class="productImg">
        <img src="" alt="">
    </div>
    <div>
        <div class="productName"><?= $producto['nombre'] ?></div>
        <div class="productPrice">$<?= $producto['Precio'] ?></div>
    </div>
    <button 
        type="button"
        name="productId" 
        data-id="<?= $producto['id_producto'] ?>" 
        data-name="<?= $producto['nombre'] ?>"
        data-price="<?= $producto['Precio'] ?>"
        class="productAgregar">Agregar</button>
</div>