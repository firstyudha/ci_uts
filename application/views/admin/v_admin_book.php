<div class="container">
    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
        <h4>Book Data</h4>

        <br>


        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Book
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
                <h5 class="modal-title" id="exampleModalLabel">Book Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="book_insert" method="post">
                <div class="modal-body">
                    <input type="text" name="book_id" placeholder="Book ID" class="mb-2 form-control">
                    
                    <input type="text" name="book_title" placeholder="Book Title" class="mb-2 form-control">
                    
                    <input type="text" name="author" placeholder="Author" class="mb-2 form-control">
                    
                    <input type="text" name="publisher" placeholder="Publisher" class="mb-2 form-control">
                    
                    <input type="text" name="book_category" placeholder="Book Chategory" class="mb-2 form-control">
                    
                    <input type="number" min="1" name="price" placeholder="Price" class="form-control">
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
        <form action="<?= base_url('admin/book') ?>" class="form-inline" style="float:right;" method="post">    
        <input type="text" name="keyword" class="form-control" style="width: 300px;" placeholder="search by id/title...">
        <button class="btn btn-primary ml-2"><i class="fas fa-search"></i></button>
        </form>
        <br><br>
        <p style="float:right" class="mt-1">keyword : <b> <?= $keyword; ?></b> </p>
        <br>
        <br>
        <!-- endsearch -->
       
       <table class="table wy-table-striped" id="table1">
       <thead>
            <tr class="bg-primary text-white">
                <th>Book ID</th>
                <th>Book Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Book Chategory</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
            <!-- <?php $i=1; foreach($book as $b): ?>
            <tr>
                <td><?= $b->book_id ?></td>
                <td><?= $b->book_title ?></td>
                <td><?= $b->author ?></td>
                <td><?= $b->publisher ?></td>
                <td><?= $b->book_category ?></td>
                <td><?= $b->price?></td>
                <td>
                    <a class="btn btn-success" href="<?= base_url('admin/book_edit/').$b->book_id; ?>">edit</a>
                    
                    <a class="btn btn-danger" href="<?= base_url('admin/book_delete/').$b->book_id; ?>" onClick="return doconfirm();">delete</a>
                </td>
            </tr>
            <?php endforeach;?> -->
            <tbody>
            
            </tbody>
       </table>
       
       
       
       
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#table1').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {

                "url": "<?= base_url() ?>admin/get_ajax",
                "type": "POST"
                
                }
        })
    })
</script>