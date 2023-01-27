<div class="uk-overflow-auto" style="margin-top: 2rem">
	<table class="uk-table uk-table-justify uk-table-divider" id="table_layanan">
		<thead>
			<tr>
				<th>NO</th>
				<th>KECAMATAN</th>
				<th>LOKASI</th>
				<th>KETERANGAN</th>
				<th>LATITUDE</th>
				<th>LONGITUDE</th>
				<th>KATEGORI</th>
				<th>AKSI</th>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($data_layanan)) {
			?>
				<?php
				$no = 1;
				foreach ($data_layanan as $r) {

				?>

					<tr>
						<td width="40px"><?= $no ?></td>
						<td><?= $r->kecamatan ?></td>
						<td><?= $r->lokasi ?></td>
						<td><?= $r->keterangan ?></td>
						<td><?= $r->latitude ?></td>
						<td><?= $r->longitude ?></td>
						<td><?= $r->nama ?></td>
						<td>
							<a href="#" class="uk-icon-link uk-margin-small-right" id="formedit" uk-icon="file-edit" data-id="<?= $r->id ?>" data-kecamatan="<?= $r->kecamatan ?>" data-lokasi="<?= $r->lokasi ?>" data-latitude="<?= $r->latitude ?>" data-longitude="<?= $r->longitude ?>" data-keterangan="<?= $r->keterangan ?>" data-kategori="<?= $r->kategori ?>"></a>
							<a href="#" class="uk-icon-link" uk-icon="trash" id="hapusdata" data-id="<?= $r->id ?>" data-kecamatan="<?= $r->kecamatan ?>"></a>

						</td>
					</tr>
				<?php $no++;
				}
			} else {
				?>
				<tr>
					<td colspan="9" class="no-records">No records</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

</div>
<ul class="uk-pagination" uk-margin-small-right>
	<?php echo $pagelinks ?>
</ul>

<script>
	$(document).ready(function() {
		$('#table_layanan').DataTable();
	});
</script>
