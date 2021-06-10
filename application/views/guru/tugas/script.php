<script src="<?=base_url()?>assets/admin_lte/plugins/ck-standart/build/ckeditor.js"></script>
<script src="<?=base_url()?>assets/admin_lte/plugins/ckfinder2/ckfinder.js"></script>
<script>
    function refresh_table() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>/tugas/get_all",
        cache: false,
        success: function(data) {
          $("#tampil").html(data);
          $('#tugas').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false
          });
        }
      });
    };
    refresh_table();
    // $('#filter_t_akademik').select2({
    //   theme: 'bootstrap4',
    //   placeholder: "Filter Tahun Akademik"
    // });
    // $('#filter_semester').select2({
    //   theme: 'bootstrap4',
    //   placeholder: "Filter Semester"
    // });
    // $('#filter_mapel').select2({
    //   theme: 'bootstrap4',
    //   placeholder: "Filter Mapel"
    // });
	$('#kode_mapel-tbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Mapel"
    });
    let datack;
    ClassicEditor
			.create( document.querySelector( '.editor' ), {
				
				toolbar: {
				items: [
					'heading',
					'|',
					'fontSize',
					'fontFamily',
					'|',
					'fontColor',
					'fontBackgroundColor',
					'|',
					'bold',
					'italic',
					'underline',
					'strikethrough',
					'subscript',
					'superscript',
					'specialCharacters',
					'|',
					'alignment',
					'|',
					'numberedList',
					'bulletedList',
					'|',
					'outdent',
					'indent',
					'|',
					'todoList',
					'link',
					'blockQuote',
					'CKFinder',
					'imageInsert',
					'insertTable',
					'mediaEmbed',
					'highlight',
					'|',
					'undo',
					'redo',
					'restrictedEditingException',
					'textPartLanguage',
					'codeBlock',
					'horizontalLine',
					'htmlEmbed',
					'pageBreak',
					'code',
					'removeFormat',
					// 'imageUpload'
				]
			},
			language: 'en',
			image: {
            // Configure the available styles.
            styles: [
                'alignLeft', 'alignCenter', 'alignRight'
            ],

            // Configure the available image resize options.
            resizeOptions: [
                {
                    name: 'resizeImage:original',
                    label: 'Original',
                    value: null
                },
				{
                    name: 'resizeImage:25',
                    label: '25%',
                    value: '25'
                },
                {
                    name: 'resizeImage:50',
                    label: '50%',
                    value: '50'
                },
                {
                    name: 'resizeImage:75',
                    label: '75%',
                    value: '75'
                }
            ],
			
            // You need to configure the image toolbar, too, so it shows the new style
            // buttons as well as the resize buttons.
            toolbar: [
                'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',
                '|',
                'resizeImage',
                '|',
                'imageTextAlternative'
            ]
            },
			table: {
				contentToolbar: [
					'tableColumn',
					'tableRow',
					'mergeTableCells',
					'tableCellProperties',
					'tableProperties'
				]
			},
			table: {
				contentToolbar: [
					'tableColumn',
					'tableRow',
					'mergeTableCells',
					'tableCellProperties',
					'tableProperties'
				]
			},
				licenseKey: '',
        ckfinder: {
				uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
		  	},
				
				
			} )
			.then( editor => {
                datack=editor;
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: 27gw32nl3ltt-cd9y4a801chs' );
				console.error( error );
			} );
    modal_tambah = $("#modal-tambah");
    document.querySelector( '#submit_save' ).addEventListener( 'click', () => {
	   let judul = $("#judul-tbh").val();
	   let kode_mapel = $("#kode_mapel-tbh").val();
	   const editorData = datack.getData();
	   $.ajax({
       url: '<?=site_url('tugas/crud/insert')?>',
       type: 'POST',
       dataType: 'json',
       data: {
		   judul :judul,
		   content : editorData,
		   kode_mapel : kode_mapel
	   },
       success: function(){ 
        modal_tambah.modal('hide');
        $("#judul-tbh").val('');
        $("#kode_mapel_tbh").prop("selectedIndex", 0);
        datack.setData( '' );
		$('#tugas').DataTable().clear().destroy();
        refresh_table();
        swal("Berhasil!", "Data Tugas Baru Berhasil Ditambahkan.", "success");
       },
       error: function(response){
          alert(response);
       }
	  })
    });
</script>