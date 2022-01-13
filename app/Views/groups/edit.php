<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
<title>Edit group</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <a href="<?= site_url('groups'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Update group</h1>
  </div>

  <div class="section-body">
    <div class="card">
      <div class="card-header">
        <h4>Edit group / Acara</h4>
      </div>
      <div class="card-body col-md-6">
        <form action="<?= site_url('groups/update/' . $group->id_group); ?>" method="post" autocomplete="off">
          <?= csrf_field(); ?>
          <div class="form-group">
            <label for="nama">Nama Acara</label>
            <input type="text" name="name_group" value="<?= $group->name_group; ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="nama">Info</label>
            <textarea name="info_group" class="form-control" required><?= $group->info_group; ?></textarea>
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