<div class="container">
    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
        <h4>User Data</h4>

        <br>


        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add User
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
                <h5 class="modal-title" id="exampleModalLabel">User Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="user_insert" method="post">
                <div class="modal-body">
                    <input type="text" name="user_id" placeholder="User ID" class="mb-2 form-control">
                    
                    <input type="text" name="username" placeholder="Username" class="mb-2 form-control">

                    <input type="password" name="password" placeholder="Password" class="mb-2 form-control">
                    
                    <input type="text" name="user_type" value="user" hidden class="mb-2 form-control">
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
        <form action="<?= base_url('admin/user') ?>" class="form-inline" style="float:right;" method="post">    
        <input type="text" name="keyword" class="form-control" style="width: 300px;" placeholder="search by username/user id...">
        <button class="btn btn-primary ml-2"><i class="fas fa-search"></i></button>
        </form>
        <br><br>
        <p style="float:right" class="mt-1">keyword : <b> <?= $keyword; ?></b> </p>
        <br>
        <br>
        <!-- endsearch -->
       
       <table class="table wy-table-striped">
            <tr class="bg-primary text-white">
                <th>User ID</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
            <?php $i=1; foreach($user as $u): ?>
            <tr>
                <td><?= $u->user_id ?></td>
                <td><?= $u->username ?></td>
                <td>
                    <a class="btn btn-success" href="<?= base_url('admin/user_edit/').$u->user_id; ?>">edit</a>
                    
                    <a class="btn btn-danger" href="<?= base_url('admin/user_delete/').$u->user_id; ?>" onClick="return doconfirm();">delete</a>
                </td>
            </tr>
            <?php endforeach;?>
       </table>
       
       
       
       
        </div>
    </div>
</div>