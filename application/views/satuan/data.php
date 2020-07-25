<div class="row">
	<div class="col-lg-12">
		<?= $this->session->flashdata('pesan'); ?>
		<div class="card shadow-sm border-bottom-primary">
			<div class="card-header bg-white py-3">
				<div class="row">
					<div class="col">
						<a href="<?= base_url('satuan/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
							<span class="icon">
								<i class="fa fa-plus"></i>
							</span>
							<span class="text">
								Tambah Satuan Barang
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
								<th>No. </th>
								<th>Nama Satuan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							if ($satuan) :
								foreach ($satuan as $j) :
							?>
									<tr align="center">
										<td><?= $no++; ?></td>
										<td><?= $j['nama_satuan']; ?></td>
										<td>
											<a href="<?= base_url('satuan/edit/') . $j['id_satuan'] ?>" class="btn btn-circle btn-warning btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
											<a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('satuan/delete/') . $j['id_satuan'] ?>" class="btn btn-circle btn-danger btn-sm" title="Hapus Data"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
								<?php endforeach; ?>
							<?php else : ?>
								<tr>
									<td colspan="3" class="text-center">
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