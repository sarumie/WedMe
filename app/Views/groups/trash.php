<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
<title>Data Grup</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <a href="<?= site_url('groups'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Grup - Trash</h1>
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
        <h4>Data grup kontak terhapus sementara</h4>
        <div class="card-header-action">
          <a href="<?= site_url('groups/restore'); ?>" onclick="return confirm('Yakin ingin memulihkan semua grup?')" class="btn btn-warning">
            <i class="fa fa-trash-restore"></i> Restore All
          </a>
          <form action="<?= site_url('groups/delete2') ?>" method="post" onsubmit="return confirm('Yakin hapus semua grup ?')" class="d-inline">
            <?= csrf_field(); ?>
            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete All</button>
          </form>
        </div>
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
                <a href="<?= site_url('groups/restore/' . $value->id_group); ?>" class="btn btn-warning btn-sm">Restore</a>
                <form action="<?= site_url('groups/delete2/' . $value->id_group); ?>" method="post" onsubmit="return confirm('Yakin hapus grup ?')" class="d-inline">
                  <?= csrf_field(); ?>
                  <button class="btn btn-danger btn-sm">Del Perma..</button>
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