<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
<title>Data Grup</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="section">
  <div class="section-header">
    <h1>Grup</h1>
    <div class="section-header-button">
      <a href="<?= site_url('groups/new'); ?>" class="btn btn-primary">Add New</a>
    </div>
  </div>

  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissable show fade">
      <div class="alert-body">
        <button class="close" data-dissmiss="alert">X</button>
        <b>Success !</b>
        <?= session()->getFlashdata('success') ?>
      </div>
    </div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissable show fade">
      <div class="alert-body">
        <button class="close" data-dissmiss="alert">X</button>
        <b>Error !</b>
        <?= session()->getFlashdata('error') ?>
      </div>
    </div>
  <?php endif; ?>

  <div class="section-body">
    <div class="card">
      <div class="card-header">
        <h4>Data grup / Acara</h4>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-bordered table-md">
          <tr>
            <th>#</th>
            <th>Nama Grup</th>
            <th>Info</th>
            <th>Action</th>
          </tr>
          <?php foreach ($groups as $key => $value) : ?>
            <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $value->name_group ?></td>
              <td><?= $value->info_group ?></td>

              <td class="text-center" style="width: 15%;">
                <a href="<?= site_url('group/edit/' . $value->id_group); ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                <form action="<?= site_url('group/' . $value->id_group); ?>" method="post" onsubmit="return confirm('Yakin hapus data ?')" class="d-inline">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>