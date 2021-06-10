<table id="soal" class="table table-bordered ">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Kategori Ujian</th>
         <th class="text-center">Soal</th>
         <th class="text-center">Tanggal Dibuat</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($bank_soal->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->nama_ujian ?></td>
            <td><?php echo $result->soal ?></td>
            <td class="text-center"><?php echo $result->dibuat_pada ?></td>
            <td class="text-center">
                <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="<?php echo $result->id ?>" data-placement="top" title="Edit"></i>
                <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data"  data-id="<?php echo $result->id ?>" data-placement="top" title="Delete"></i>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<script>
   let datack_soal_edit;
    ClassicEditor
			.create( document.querySelector( '.editor_soal_edit' ), {
				
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
        datack_soal_edit=editor;
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: 27gw32nl3ltt-cd9y4a801chs' );
				console.error( error );
		} );
			let datack_a_edit;
			ClassicEditor
			.create( document.querySelector( '.editor_a_edit' ), {
				
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
        datack_a_edit=editor;
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: 27gw32nl3ltt-cd9y4a801chs' );
				console.error( error );
	} );
	let datack_b_edit;
	ClassicEditor
			.create( document.querySelector( '.editor_b_edit' ), {
				
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
        datack_b_edit=editor;
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: 27gw32nl3ltt-cd9y4a801chs' );
				console.error( error );
	} );
	let datack_c_edit;
	ClassicEditor
			.create( document.querySelector( '.editor_c_edit' ), {
				
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
        datack_c_edit=editor;
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: 27gw32nl3ltt-cd9y4a801chs' );
				console.error( error );
	} );
	let datack_d_edit;
	ClassicEditor
			.create( document.querySelector( '.editor_d_edit' ), {
				
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
        datack_d_edit=editor;
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: 27gw32nl3ltt-cd9y4a801chs' );
				console.error( error );
	} );
	let datack_e_edit;
	ClassicEditor
			.create( document.querySelector( '.editor_e_edit' ), {
				
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
        datack_e_edit=editor;
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: 27gw32nl3ltt-cd9y4a801chs' );
				console.error( error );
	} );
    modal_edit = $("#modal-edit");
    $(document).on('click', '.edit-data', function(e){
      id = $(this).data('id');
      $.ajax({
        url: '<?=site_url('tugas/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#id-edit").val(data.object.id);
        $("#judul-edit").val(data.object.judul);
        datack_edit.setData(data.object.content);
        $("#kode_mapel-edit").val(data.object.kode_mapel);
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#id-edit").focus();
        });
      });
    });
    //Proses Update ke Db
    document.querySelector( '#submit_edit' ).addEventListener( 'click', () => {
	   let judul = $("#judul-edit").val();
	   let kode_mapel = $("#kode_mapel-edit").val();
	   const editorData = datack_edit.getData();
     let id = $("#id-edit").val();
	   $.ajax({
       url: '<?=site_url('tugas/crud/update')?>',
       type: 'POST',
       dataType: 'json',
       data: {
       id:id,
		   judul :judul,
		   content : editorData,
		   kode_mapel : kode_mapel
	   },
       success: function(){ 
        // $("#id-edit").val('');
        // $("#judul-edit").val('');
        // $("#kode_mapel_edit").prop("selectedIndex", 0);
        // datack_edit.setData( '' );
        modal_edit.modal('hide');
        swal("Berhasil!", "Data Tugas Berhasil di Update.", "success");
        $('#tugas').DataTable().clear().destroy();
        refresh_table();
       },
       error: function(response){
          alert(response);
       }
	  })
    });
    $(document).on('click', '.hapus-data', function(e){ 
      e.preventDefault();
      id = $(this).data('id');
      swal({
        title: "Apa Anda Yakin?",
        text: "Data yang terhapus,tidak dapat dikembalikan!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batalkan!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '<?=site_url('tugas/crud/delete')?>',
             type: 'POST',
             dataType: 'json',
             data: {
               id: id,
               },
             error: function() {
              swal("Gagal!", "Terjadi Kesalahan.", "warning");
             },
             success: function(data) {
                  swal("Berhasil!", "Data Berhasil Dihapus.", "success");
                  $('#tugas').DataTable().clear().destroy();
                  refresh_table();
             }
          });
        } else {
          swal("Dibatalkan", "Data yang dipilih tidak jadi dihapus", "error");
        }
      });
    });
</script>