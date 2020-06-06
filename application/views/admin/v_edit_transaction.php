<div class="container" >
    <div class="row mt-2">
        <div class="col-md-10 offset-md-1">
            <div class="display-4 mt-4">Edit Transaction</div>
        </div>
    </div>
    <div class="row mt-4" style="margin-bottom : 130px;">
        <div class="col-md-6 offset-md-3">
            <form action="<?= base_url(); ?>admin/transaction_update" method="post">
            <?php foreach($transaction as $b) : ?>
                <input type="text" name="transaction_id" placeholder="Transaction ID" class="mb-2 form-control" value="<?= $b->transaction_id; ?>">
                    
                    <input type="date" name="date" class="mb-2 form-control" value="<?= $b->date; ?>">

                    <select name="book_id" class="form-control" >
                    
                        <?php $i=1; foreach($book as $p): ?>
                        <option value="<?= $p->book_id ?>" <?php if($p->book_id){echo "selected"; } ?>><?= $p->book_id.'-'.$p->book_title; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <input type="numeric" min="1" name="quantity" placeholder="Quantity" class="mb-2 form-control" value="<?= $b->quantity; ?>">

                    
                    <input type="numeric" min="1" name="price" placeholder="Price per book" class="mb-2 form-control" value="<?= $b->price; ?>">

                 <br>
                <button type="submit" class="btn btn-success w-100">update</button>
            <?php endforeach; ?>
            </form>
        </div>
    </div>
</div>