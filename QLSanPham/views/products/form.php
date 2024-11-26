<!-- views/products/form.php -->
<form method="post"  enctype="multipart/form-data">
    <?php if (isset($sanPham['image']) && $sanPham['image']): ?>
        <input type="image" src="<?php echo $sanPham['image'] ?>" alt="image" width="100px">
    <?php endif; ?>


    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image" required>
    </div>
    <div class="mb-3">
        <input type="hidden" name="id" value="<?php echo isset($sanPham['id']) ? $sanPham['id'] : ''; ?>"> <!-- them input hidden de truyen id -->
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($sanPham['name']) ? $sanPham['name'] : ''; ?>" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="<?php echo isset($sanPham['price']) ? $sanPham['price'] : ''; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
