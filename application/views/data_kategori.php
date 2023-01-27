<div class="content-padder content-background">
	<div class="uk-section-small uk-section-default header">
		<div class="uk-container uk-container-large">
			<h2><span uk-icon="icon: pencil; ratio: 2"></span> <?= $judul ?></h2>
		</div>
	</div>
	<div class="uk-section-small">
		<div class="uk-container uk-container-large">
			<!-- Form -->

			<div class="uk-container uk-container-large" id="tampillayanansemua">
				<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">


					<div class="uk-clearfix uk-margin-small-bottom">
						<div class="uk-float-right">
							<form class="uk-search uk-search-default uk-margin-remove-righ" style="visibility: hidden;">
								<span uk-search-icon></span>
								<input class="uk-search-input" name="search_key" id="search_key" type="text" placeholder="Pencarian...">
							</form>
							<!-- <button class="uk-button uk-button-default" id="resetBtn"><span uk-icon="refresh"></span></button> -->
						</div>
						<div class="tambah uk-float-left">
							<button class="uk-button uk-button-danger uk-margin-small-right" id="tambahmodal" type="button"><span uk-icon="icon: plus"></span>
								<span class="uk-visible@s">Tambah Data</span></button>
						</div>
					</div>
					<div id="ajaxData">

						<!-- Loading Image -->
						<div class="loading" style="display: none;">
							<div class="contentloading"><img src="<?php echo base_url('public/img/loading.gif'); ?>" />
							</div>
						</div>
						<!-- Loading Image -->
					</div>
				</div>
			</div>

			<!-- form simpan dan edit -->
			<div class="uk-container uk-container-large" id="formsimpandaneditdata">
				<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
					<form class="uk-form-stacked" id="submitdata" method="post">
						<div class="uk-margin">
							<label class="uk-form-label" for="form-stacked-text">Nama Kategori </label>
							<div class="uk-form-controls">
								<input class="uk-input" id="id" name="id" type="hidden">
								<input class="uk-input" id="namakategori" name="namakategori" type="text" placeholder="Nama Kategori ">
							</div>
						</div>
						<div class="uk-modal-footer uk-text-right">
							<button class="uk-button uk-button-default uk-modal-close" id="kembalikeawal" type="button">Kembali</button>
							<button class="uk-button uk-button-primary" type="submit" id="simpandata">Simpan
							</button>
						</div>
					</form>
				</div>
			</div> <!-- Form -->
		</div>
	</div>
	<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('public/') ?>admin/data_kategori.js"></script>
