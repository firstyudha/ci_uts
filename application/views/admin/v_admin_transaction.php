<div class="container">
    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
        <h4>Transaction Data</h4>

        <br>


        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Transaction
        </button>
        <br><br>
        <?php $message = $this->session->flashdata('msg'); if(isset($message)): ?>
            <div class="alert text-white bg-success"><center><i class="far fa-check-circle"></i> <?= $message; ?></center></div>
        <?php endif; ?>
        <br>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Transaction Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="transaction_insert" method="post">
                <div class="modal-body">
                    <input type="text" name="transaction_id" placeholder="Transaction ID" class="mb-2 form-control">
                    
                    <input type="date" name="date" class="mb-2 form-control">

                    <select name="book_id" class="form-control">
                    
                        <?php $i=1; foreach($book as $b): ?>
                        <option value="<?= $b->book_id ?>"><?= $b->book_id.'-'.$b->book_title; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <input type="numeric" min="1" name="quantity" placeholder="Quantity" class="mb-2 form-control">

                    
                    <input type="numeric" min="1" name="price" placeholder="Price per book" class="mb-2 form-control">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
        </div>
        <!-- search -->
        <form action="<?= base_url('admin/transaction') ?>" class="form-inline" style="float:right;" method="post">    
        <input type="text" name="keyword" class="form-control" style="width: 300px;" placeholder="search by transaction id/book id...">
        <button class="btn btn-primary ml-2"><i class="fas fa-search"></i></button>
        </form>
        <br><br>
        <p style="float:right" class="mt-1">keyword : <b> <?= $keyword; ?></b> </p>
        <br>
        <br>
        <!-- endsearch -->
       
       <table class="table wy-table-striped">
            <tr class="bg-primary text-white">
                <th>Transaction ID</th>
                <th>Date</th>
                <th>Book ID</th>
                <th>Qty</th>
                <th>Price @book</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
            <?php $i=1; foreach($transaction as $u): ?>
            <tr>
                <td><?= $u->transaction_id ?></td>
                <td><?= $u->date ?></td>
                
                <td><?= $u->book_id ?></td>
                
                <td><?= $u->quantity ?></td>
                
                <td><?= $u->price ?></td>
                
                <td><?= $u->total_price ?></td>
                
                <td>
                    <a class="btn btn-success" href="<?= base_url('admin/transaction_edit/').$u->transaction_id; ?>">edit</a>
                    
                    <a class="btn btn-danger" href="<?= base_url('admin/transaction_delete/').$u->transaction_id; ?>" onClick="return doconfirm();">delete</a>
                </td>
            </tr>
            <?php endforeach;?>
       </table>
       
       
       
       
        </div>
    </div>
</div>