<div class="container">
    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
        <h4>Book Data</h4>

        <br>

        </div>
        <!-- search -->
        <form action="<?= base_url('user/book') ?>" class="form-inline" style="float:right;" method="post">    
        <input type="text" name="keyword" class="form-control" style="width: 300px;" placeholder="search by id/title...">
        <button class="btn btn-primary ml-2"><i class="fas fa-search"></i></button>
        <br>
        </form>
        <br><br>
        <br>
        <br>
        <br>
    
        <!-- endsearch -->
       
       <table class="table wy-table-striped">
            <tr class="bg-primary text-white">
                <th>Book ID</th>
                <th>Book Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Book Chategory</th>
                <th>Price</th>
            </tr>
            <?php $i=1; foreach($book as $b): ?>
            <tr>
                <td><?= $b->book_id ?></td>
                <td><?= $b->book_title ?></td>
                <td><?= $b->author ?></td>
                <td><?= $b->publisher ?></td>
                <td><?= $b->book_category ?></td>
                <td><?= $b->price?></td>
                
            </tr>
            <?php endforeach;?>
       </table>
       
       
       
       
        </div>
    </div>
</div>