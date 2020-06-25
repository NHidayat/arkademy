<div class="container mt-5">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h3 class="mb-3"><?= $title; ?></h3>
			<form  method="get">
				<div class="form-group">
					<label for="nama_produk">Nama Produk</label>
					<input type="text" class="form-control" name="nama_produk" id="nama_produk">
				</div>
				<div class="form-row">
				<div class="form-group col-md-6">
					<label for="harga">Harga</label>
					<input type="number" class="form-control" name="harga" id="harga">
				</div>
				<div class="form-group col-md-6">
					<label for="jumlah">Jumlah</label>
					<input type="number" class="form-control" name="jumlah" id="jumlah">
				</div>
				</div>
				<div class="form-group">
					<label for="keterangan">Keterangan</label>
					<textarea class="form-control" name="keterangan" name="keterangan" id="keterangan"></textarea>
				</div>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
	
</div>