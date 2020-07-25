<div class="row">
    <div class="col-lg-12">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <?php if (is_atasan()) : ?>
                        <a href="<?= base_url('barangkeluar/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span class="text">
                                Input Barang Keluar
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
                                <th>Tanggal Keluar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Keluar</th>
                                <th>User</th>
                                <?php if (is_atasan()) : ?>
                                <th>Hapus</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if ($barangkeluar) :
                                foreach ($barangkeluar as $bk) :
                            ?>
                                    <tr align="center">
                                        <td><?= $no++; ?></td>
                                        <td><?= $bk['id_barang_keluar']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($bk['tanggal_keluar'])); ?></td>
                                        <td><?= $bk['nama_barang']; ?></td>
                                        <td><?= $bk['jumlah_keluar'] . ' ' . $bk['nama_satuan']; ?></td>
                                        <td><?= $bk['nama']; ?></td>
                                        <?php if (is_atasan()) : ?>
                                        <td>
                                            <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('barangkeluar/delete/') . $bk['id_barang_keluar'] ?>" class="btn btn-danger btn-circle btn-sm" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                        </td>
                                        </tr>
                                        <?php endif; ?>
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