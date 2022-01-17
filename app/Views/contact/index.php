<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
<title>Data Kontak</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="section">
  <div class="section-header">
    <h1>Kontak</h1>
    <div class="section-header-button">
      <a href="<?= site_url('contacts/new'); ?>" class="btn btn-primary">Add New</a>
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
        <h4>Data Kontak</h4>
        <div class="card-header-action">
          <a href="<?= site_url('contacts/trash'); ?>" class="btn btn-danger">
            <i class="fa fa-trash"></i> Trash
          </a>
        </div>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-bordered table-md">
          <tr>
            <th>#</th>
            <th>Nama Kontak</th>
            <th>Alias</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Info</th>
            <th>Grup</th>
            <th>Action</th>
          </tr>
          <!-- Looping -->
          <?php foreach ($contacts as $key => $value) : ?>
            <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $value->name_contact ?></td>
              <td><?= $value->name_alias ?></td>
              <td><?= $value->phone ?></td>
              <td><?= $value->email ?></td>
              <td><?= $value->address ?></td>
              <td><?= $value->info_contact ?></td>
              <td><?= $value->name_group ?></td>

              <td class="text-center" style="width: 15%;">
                <a href="<?= site_url('contacts/' . $value->id_contact . '/edit'); ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                <form action="<?= site_url('contacts/' . $value->id_contact); ?>" method="post" onsubmit="return confirm('Yakin hapus Kontak ?')" class="d-inline">
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