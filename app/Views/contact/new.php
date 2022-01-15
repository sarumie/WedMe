<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
<title>Create contact</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <a href="<?= site_url('contacts'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Create contact</h1>
  </div>

  <div class="section-body">
    <div class="card">
      <div class="card-header">
        <h4>Buat kontak</h4>
      </div>
      <div class="card-body col-md-6">
        <form action="<?= site_url('contacts'); ?>" method="post" autocomplete="off">
          <?= csrf_field(); ?>
          <div class="form-group">
            <label for="nama">Nama kontak</label>
            <input type="text" name="name_group" class="form-control" required autofocus>
          </div>
          <div class="form-group">
            <label for="nama">Info kontak</label>
            <textarea name="info_group" class="form-control"></textarea>
          </div>
          <div>
            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>