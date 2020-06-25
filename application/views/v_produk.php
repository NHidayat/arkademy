
<div class="container mt-5">
  <?php if ($this->session->flashdata('alert')) :?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <?= $this->session->flashdata('alert'); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>
  <div class=" mb-3">
    <a href="<?= base_url('produk/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Produk</a>
    <form class="form-inline float-right" action="" method="get">
      <input class="form-control mr-sm-2" type="search" name="txt_cari" placeholder="Cari produk ..." aria-label="Search"
      <?= isset($_GET['txt_cari']) ? 'value='.$_GET['txt_cari'].'': null; ?> >
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" value="Submit">Cari</button>
    </form>
  </div>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Produk</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Harga</th>
        <th scope="col">Keterangan</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach ($data_produk->result() as $key): ?>
      <tr>
        <th scope="row"><?= $no++; ?></th>
        <td><?= $key->nama_produk; ?></td>
        <td><?= $key->jumlah; ?></td>
        <td>Rp <?= number_format($key->harga); ?></td>
        <td><?= $key->keterangan; ?></td>
        <td>
          <a href="<?= base_url('produk/update/'.$key->nama_produk.''); ?>" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
          <a href="<?= base_url('produk/delete/'.$key->nama_produk.''); ?>" class="btn btn-danger" onclick="return confirm('Yakin menghapus <?= $key->nama_produk; ?> ?')" title="Hapus"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>