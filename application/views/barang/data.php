<div class="row">
    <div class="col-lg-12">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <a href="<?= base_url('barang/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span class="text">
                                Tambah Barang
                            </span>
                        </a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable" style="color: black;">
                        <thead>
                            <tr align="center">
                                <th>No. </th>
                                <th>ID Barang</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if ($barang) :
                                foreach ($barang as $b) :
                            ?>
                                    <tr align="center">
                                        <td><?= $no++; ?></td>
                                        <td><?= $b['id_barang']; ?></td>
                                        <td><img src="<?= base_url() ?>assets/img/barang/<?= $b['gambar']; ?>" style="width: 100px;"></td>
                                        <td><?= $b['nama_barang']; ?></td>
                                        <td><?= $b['nama_jenis']; ?></td>
                                        <td><?= $b['stok']; ?></td>
                                        <td><?= $b['nama_satuan']; ?></td>
                                        <td>
                                            <a href="<?= base_url('barang/edit/') . $b['id_barang'] ?>" class="btn btn-warning btn-circle btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
                                            <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('barang/delete/') . $b['id_barang'] ?>" class="btn btn-danger btn-circle btn-sm" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Data Kosong
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>