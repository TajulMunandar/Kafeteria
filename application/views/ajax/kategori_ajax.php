<div class="uk-overflow-auto" style="margin-top: 2rem">
	<table class="uk-table uk-table-justify uk-table-divider" id="table_kategori">
		<thead>
			<tr>
				<th>NO</th>
				<th>NAMA KATEGORI</th>
				<th>AKSI</th>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($data_kategori)) {
			?>
				<?php
				$no = 1;
				foreach ($data_kategori as $r) {

				?>

					<tr>
						<td width="40px"><?= $no ?></td>
						<td><?= $r->nama ?></td>
						<td>
							<a href="#" class="uk-icon-link uk-margin-small-right" id="formedit" uk-icon="file-edit" data-id="<?= $r->id ?>" data-nama="<?= $r->nama ?>"></a>
							<a href=" #" class="uk-icon-link" uk-icon="trash" id="hapusdata" data-id="<?= $r->id ?>" data-nama="<?= $r->nama ?>"></a>
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
<script>
	$(document).ready(function() {
		$('#table_kategori').DataTable();
	});
</script>