<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
<title>Home</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

  <div class="section-body">
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-calendar"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Acara</h4>
          </div>
          <div class="card-body">
            <?= $gawe; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-user-friends"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Grup</h4>
          </div>
          <div class="card-body">
            <?= $groups; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Kontak</h4>
          </div>
          <div class="card-body">
            <?= $contact; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>