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
						<label>Group <b style="color: red;">*</b></label>
						<select name="id_group" class="form-control" required>
							<option value="" hidden></option>
							<?php foreach ($groups as $key => $value) : ?>
								<option value="<?= $value->id_group; ?>"><?= $value->name_group; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nama Kontak <b style="color: red;">*</b></label>
						<input type="text" name="name_contact" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Nama Alias</label>
						<input type="text" name="name_alias" class="form-control">
					</div>
					<div class="form-group">
						<label>Nomor Telepon</label>
						<input type="number" name="phone" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea name="address" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label>Info Kontak</label>
						<textarea name="info_contact" class="form-control"></textarea>
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