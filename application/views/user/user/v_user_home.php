<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
        <br><br>
        <center>
        <div class="display-4">Selamat Datang <?= $this->session->userdata('username'); ?></div>
        <br>
        <i class="fas fa-user-shield display-3"></i>
        <br><br>
        <a href="<?= base_url(); ?>user/book" class="text-dark display-5">Lihat data buku >></a>
        </center>
        </div>
    </div>
</div>