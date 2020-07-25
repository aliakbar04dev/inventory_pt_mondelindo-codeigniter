<div class="row">
    <div class="col-lg-12">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <?php if (is_atasan()) : ?>
                            <a href="<?= base_url('barangmasuk/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                                <span class="icon">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">
                                    Input Barang Masuk
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" style="color: black;">
                        <thead>
                            <tr align="center">
                                <th>No. </th>
                                <th>No Transaksi</th>
                                <th>Tanggal Masuk</th>
                                <th>Supplier</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Masuk</th>
                                <th>User</th>
                                <?php if (is_atasan()) : ?>
                                <th>Hapus</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if ($barangmasuk) :
                                foreach ($barangmasuk as $bm) :
                            ?>
                                    <tr align="center">
                                        <td><?= $no++; ?></td>
                                        <td><?= $bm['id_barang_masuk']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($bm['tanggal_masuk'])); ?></td>
                                        <td><?= $bm['nama_supplier']; ?></td>
                                        <td><?= $bm['nama_barang']; ?></td>
                                        <td><?= $bm['jumlah_masuk'] . ' ' . $bm['nama_satuan']; ?></td>
                                        <td><?= $bm['nama']; ?></td>
                                        <?php if (is_atasan()) : ?>
                                            <td>
                                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('barangmasuk/delete/') . $bm['id_barang_masuk'] ?>" class="btn btn-danger btn-circle btn-sm" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8" class="text-center">
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