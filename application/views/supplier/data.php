<div class="row">
	<div class="col-lg-12">
		<?= $this->session->flashdata('pesan'); ?>
		<div class="card shadow-sm border-bottom-primary">
			<div class="card-header bg-white py-3">
				<div class="row">
					<div class="col">
						<a href="<?= base_url('supplier/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
							<span class="icon">
								<i class="fa fa-plus"></i>
							</span>
							<span class="text">
								Tambah Supplier
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
								<th>No.</th>
								<th>Nama</th>
								<th>Nomor Telepon</th>
								<th>Alamat</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
                        if ($supplier) :
                            $no = 1;
                            foreach ($supplier as $s) :
                                ?>
							<tr align="center">
								<td><?= $no++; ?></td>
								<td><?= $s['nama_supplier']; ?></td>
								<td><?= $s['no_telp']; ?></td>
								<td><?= $s['alamat']; ?></td>
								<th>
									<a href="<?= base_url('supplier/edit/') . $s['id_supplier'] ?>"
										class="btn btn-circle btn-warning btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
									<a onclick="return confirm('Yakin ingin hapus?')"
										href="<?= base_url('supplier/delete/') . $s['id_supplier'] ?>"
										class="btn btn-circle btn-danger btn-sm" title="Hapus Data"><i class="fa fa-trash"></i></a>
								</th>
							</tr>
							<?php endforeach; ?>
							<?php else : ?>
							<tr>
								<td colspan="6" class="text-center">
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
