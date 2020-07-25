<div class="row">
    <div class="col-lg-12">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card shadow-sm mb-4 border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <a href="<?= base_url('user/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-user-plus"></i>
                            </span>
                            <span class="text">
                                Tambah User
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" style="color: black;">
                        <thead>
                            <tr align="center">
                                <th width="30">No.</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>No. telp</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if ($users) :
                                foreach ($users as $user) :
                            ?>
                                    <tr align="center">
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <img width="30" src="<?= base_url() ?>assets/img/avatar/<?= $user['foto'] ?>" alt="<?= $user['nama']; ?>" class="img-thumbnail rounded-circle">
                                        </td>
                                        <td><?= $user['nama']; ?></td>
                                        <td><?= $user['username']; ?></td>
                                        <td><?= $user['email']; ?></td>
                                        <td><?= $user['no_telp']; ?></td>
                                        <td><?= $user['role']; ?></td>
                                        <td>
                                            <a href="<?= base_url('user/toggle/') . $user['id_user'] ?>" class="btn btn-circle btn-sm <?= $user['is_active'] ? 'btn-success' : 'btn-secondary' ?>" title="<?= $user['is_active'] ? 'Nonaktifkan User' : 'Aktifkan User' ?>"><i class="fa fa-fw fa-power-off"></i></a>
                                            <a href="<?= base_url('user/edit/') . $user['id_user'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                            <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('user/delete/') . $user['id_user'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach;
                            else : ?>
                                <tr>
                                    <td colspan="8" class="text-center">Silahkan tambahkan user baru</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>