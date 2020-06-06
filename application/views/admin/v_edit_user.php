<div class="container" >
    <div class="row mt-2">
        <div class="col-md-10 offset-md-1">
            <div class="display-4 mt-4">Edit User</div>
        </div>
    </div>
    <div class="row mt-4" style="margin-bottom : 130px;">
        <div class="col-md-6 offset-md-3">
            <form action="<?= base_url(); ?>admin/user_update" method="post">
            <?php foreach($user as $b) : ?>
                <input type="text" name="user_id"  class="mb-2 form-control" value="<?= $b->user_id ?>" >
                    
                <input type="text" name="username"  class="mb-2 form-control" value="<?= $b->username ?>" >

                 <br>
                <button type="submit" class="btn btn-success w-100">update</button>
            <?php endforeach; ?>
            </form>
        </div>
    </div>
</div>