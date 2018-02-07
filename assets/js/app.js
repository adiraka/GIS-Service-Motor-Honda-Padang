$(function() {

	$('#tb-kecamatan').DataTable({
		responsive: {
			details: {
				display: $.fn.dataTable.Responsive.display.modal( {
					header: function ( row ) {
						var data = row.data();
						return 'Detail Angkatan Diklat';
					}
				} ),
				renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
					tableClass: 'table'
				} )
			}
		}, 
		language: {
			url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian.json'
		}
	});

	$('#tb-kelurahan').DataTable({
		responsive: {
			details: {
				display: $.fn.dataTable.Responsive.display.modal( {
					header: function ( row ) {
						var data = row.data();
						return 'Detail Angkatan Diklat';
					}
				} ),
				renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
					tableClass: 'table'
				} )
			}
		}, 
		language: {
			url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian.json'
		}
	});

	$('#tb-lokasi').DataTable({
		dom: 'Bfrtip',
		responsive: {
			details: {
				display: $.fn.dataTable.Responsive.display.modal( {
					header: function ( row ) {
						var data = row.data();
						return 'Detail Angkatan Diklat';
					}
				} ),
				renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
					tableClass: 'table'
				} ),
			},
		}, 
		language: {
			url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian.json'
		},
		buttons: [
            {
                text: 'Cetak Laporan',
                className: 'btn btn-success',
                action: function ( e, dt, node, config ) {
                    window.open("lokasi/laporan_lokasi.php");
                }
            }
        ]
	});

	$('#bengkel_id').on('change', function(){
		var bengkel_id = this.value;
		$.ajax({
			type: "POST",
			url: "lokasi/get_data_bengkel.php",
			data: "bengkel_id="+bengkel_id,
			dataType: "json",
			success: function(data){
				$('#alamat_bengkel').val(data.alamat);
				$('#telepon_bengkel').val(data.no_telp);
			}
		});
	});

	$('#kecamatan_id').on('change', function(){
		var kecamatan_id = this.value;
		$.ajax({
			type: 'POST',
			url: 'lokasi/get_data_kelurahan.php',
			data: 'kecamatan_id='+kecamatan_id,
			success: function(data) {
				$("#kelurahan_id").html(data);
			}
		});
	});

});

