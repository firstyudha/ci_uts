<div class="container" >
    <div class="row mt-2">
        <div class="col-md-10 offset-md-1">
            <div class="display-4 mt-4">Edit Book</div>
        </div>
    </div>
    <div class="row mt-4" style="margin-bottom : 130px;">
        <div class="col-md-6 offset-md-3">
            <form action="<?= base_url(); ?>admin/book_update" method="post">
            <?php foreach($book as $b) : ?>
                <input type="text" name="book_id"  class="mb-2 form-control" value="<?= $b->book_id ?>" >
                    
                <input type="text" name="book_title"  class="mb-2 form-control" value="<?= $b->book_title ?>" >
                
                <input type="text" name="author" class="mb-2 form-control" value="<?= $b->author?>" >
                
                <input type="text" name="publisher"  class="mb-2 form-control" value="<?= $b->publisher ?>" >
                
                <input type="text" name="book_category"  class="mb-2 form-control" value="<?= $b->book_category ?>" >
                
                <input type="number" min="1" name="price"  class="form-control" value="<?= $b->price ?>">

                 <br>
                <button type="submit" class="btn btn-success w-100">update</button>
            <?php endforeach; ?>
            </form>
        </div>
    </div>
</div>