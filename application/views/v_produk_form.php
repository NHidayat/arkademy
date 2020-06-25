<div class="container mt-5">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="float-right">
				<button class="btn btn-secondary" onclick="window.history.go(-1);"><i class="fa fa-angle-left"></i> Kembali</button>
			</div>
			<h3 class="mb-3"><?= $title; ?></h3>
			<form  method="post" action="">
				<div class="form-group">
					<label for="nama_produk">Nama Produk</label>
					<input type="text" class="form-control" name="nama_produk" id="nama_produk" value="<?= $row['nama_produk']; ?>" required>
					<?= form_error('nama_produk'); ?>
				</div>
				<div class="form-row">
				<div class="form-group col-md-6">
					<label for="harga">Harga</label>
					<input type="number" class="form-control" name="harga" id="harga" value="<?= $row['harga']; ?>" required>
					<?= form_error('harga'); ?>
				</div>
				<div class="form-group col-md-6">
					<label for="jumlah">Jumlah</label>
					<input type="number" class="form-control" name="jumlah" id="jumlah" value="<?= $row['jumlah']; ?>" required>
					<?= form_error('jumlah'); ?>
				</div>
				</div>
				<div class="form-group">
					<label for="keterangan">Keterangan</label>
					<textarea class="form-control" name="keterangan" name="keterangan" id="keterangan" requiredw><?= $row['keterangan']; ?></textarea>
					<?= form_error('keterangan'); ?>
				</div>
				<button type="reset" class="btn btn-dark">Reset</button>
				<button type="submit" name="submit" value="Submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
	</div>
	
</div>