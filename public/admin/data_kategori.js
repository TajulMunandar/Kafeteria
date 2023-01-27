 $(document).ready(function () {
 	$('#formsimpandaneditdata').hide();

 	// bencana
 	/*--first time load--*/
 	ajaxlist(page_url = false);

 	/*-- Search keyword--*/
 	$(document).on('keyup', "#search_key", function (event) {
 		ajaxlist(page_url = false);
 		event.preventDefault();
 	});

 	/*-- Reset Search--*/
 	$(document).on('click', "#resetBtn", function (event) {
 		$("#search_key").val('');
 		ajaxlist(page_url = false);
 		event.preventDefault();
 	});

 	/*-- Page click --*/
 	$(document).on('click', ".uk-pagination li a", function (event) {
 		var page_url = $(this).attr('href');
 		ajaxlist(page_url);
 		event.preventDefault();
 	});

 	/*-- create function ajaxlist --*/
 	function ajaxlist(page_url = false) {
 		var search_key = $("#search_key").val();
 		var url = base_url + 'administrator/tampilkategori';
 		var dataString = 'search_key=' + search_key;
 		if (page_url == false) {
 			var page_url = url;
 		}

 		$.ajax({
 			type: "POST",
 			url: page_url,
 			data: dataString,
 			beforeSend: function () {
 				$('.loading').show();
 			},
 			success: function (response) {
 				// console.log(response);
 				$('#ajaxData').html(response);
 				$('.loading').fadeOut("slow");
 			}
 		});
 	}
 	// bencana

 	$('body').on('click', '#tambahmodal', function (e) {
 		e.preventDefault();
 		$('#formsimpandaneditdata').show().fadeIn(3000);
 		$('#tampillayanansemua').hide().fadeOut(3000);

 		$('#namakategori').val("");

 		$('#simpandata').text('Simpan Data');
 		$('#submiteditdata').attr("id", "submitdata");
 		$("#uploadPreview").attr("src", base_url + "public/img/no.png");

 	});

 	$('body').on('click', '#formedit', function (e) {
 		e.preventDefault();

 		var id = $(this).data("id");
 		var namakategori = $(this).data("nama");

 		$('#id').val(id);
 		$('#namakategori').val(namakategori);

 		$('#formsimpandaneditdata').show().fadeIn(3000);
 		$('#tampillayanansemua').hide().fadeOut(3000);

 		$('#simpandata').text('Edit Layanan');
 		$('#submitdata').attr("id", "submiteditdata");


 	});

 	$('body').on('submit', '#submitdata', function (e) {
 		e.preventDefault();

 		var kategori = $('#namakategori').val();

 		if (kategori == "") {
 			UIkit.notification({
 				message: '<span uk-icon="icon: close"></span> Kategori Tidak Boleh Kosong!',
 				status: 'danger',
 				pos: 'top-right',
 				timeout: 1000,
 			});
 			$('#namakategori').focus();
 		} else {
 			$.ajax({
 				url: base_url + 'savedatakategori',
 				type: "post",
 				data: new FormData(this),
 				processData: false,
 				contentType: false,
 				cache: false,
 				async: false,
 				beforeSend: function () {
 					$("#simpandata").html("Loading...");
 				},

 				success: function (data) {
 					$("#simpandata").html("Simpan Data");
 					ajaxlist(page_url = false);
 					UIkit.notification({
 						message: '<span uk-icon="icon: check"></span> Data berhasil tersimpan!',
 						status: 'success',
 						pos: 'top-right',
 						timeout: 1000,
 					});
 					$('#formsimpandaneditdata').hide().fadeOut(3000);
 					$('#tampillayanansemua').show().fadeIn(3000);
 				}
 			});
 		}
 	});

 	$('body').on('click', '#hapusdata', function (e) {
 		e.preventDefault();
 		var id = $(this).data('id');

 		swal({
 				title: "Apakah Anda Yakin?",
 				text: "akan terhapus permanen!",
 				icon: "warning",
 				buttons: true,
 				dangerMode: true,
 			})
 			.then((willDelete) => {
 				if (willDelete) {
 					$.ajax({
 						type: "POST",
 						url: base_url + "hapuskategori",
 						data: {
 							id: id
 						},
 						dataType: "text",
 						success: function (data) {
 							ajaxlist(page_url = false);
 							swal("Berhasil! Data Layanan PLN sudah terhapus!", {
 								icon: "success",
 							});
 						},
 						error: function (data) {
 							ajaxlist(page_url = false);
 							swal("Data Kategori Ini Masih Digunakan..!", {
 								icon: "warning",
 							});
 						}
 					});
 				} else {
 					swal("Data anda masih aman!");
 				}
 			});

 	});
 	$('body').on('submit', '#submiteditdata', function (e) {
 		e.preventDefault();
 		$.ajax({
 			url: base_url + 'editdatakategori',
 			type: "post",
 			data: new FormData(this),
 			processData: false,
 			contentType: false,
 			cache: false,
 			async: false,
 			beforeSend: function () {
 				$("#simpandata").html("Loading...");
 			},
 			success: function (data) {
 				ajaxlist(page_url = false);
 				UIkit.notification({
 					message: '<span uk-icon="icon: check"></span> Data berhasil diedit!',
 					status: 'success',
 					pos: 'top-right',
 					timeout: 1000,
 				});
 				$('#formsimpandaneditdata').hide().fadeOut(3000);
 				$('#tampillayanansemua').show().fadeIn(3000);
 				$('#simpandata').text('Simpan Data');
 				$('#submiteditdata').attr("id", "submitdata");
 			}
 		});



 	});

 	$('#kembalikeawal').click(function (e) {
 		e.preventDefault();

 		$('#judul').val("");

 		$('#gbr').val("");
 		$('#id').val("");

 		$('#simpandata').text('Simpan Data');
 		$('#submiteditdata').attr("id", "submitdata");
 		$("#uploadPreview").attr("src", base_url + "public/img/no.png");
 		$('#formsimpandaneditdata').hide().fadeOut(3000);
 		$('#tampillayanansemua').show().fadeIn(3000);

 	});

 });
