<script src="<?=base_url()?>assets/admin_lte/plugins/ck-standart/build/ckeditor.js"></script>
<script src="<?=base_url()?>assets/admin_lte/plugins/ckfinder2/ckfinder.js"></script>
<script>
    function refresh_table() {
    var id_kategori = $('#filter_kategori').val();
    var id_tipe = $('#filter_tipe_soal').val();
    $.ajax({
        url: "<?php echo base_url(); ?>/banksoal/get_all",
        data: {
        id_tipe : id_tipe,
        id_kategori : id_kategori
        },
        success: function(data) {
          $("#tampil").html(data);
          $('#soal').DataTable({
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
      placeholder: "pilih Mapel"
    });
    $('#filter_kategori').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Kategori Ujian"
    });
	$('#filter_tipe_soal').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Tipe Soal"
    });
	$('#kategori_ujian-tbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Kategori Ujian"
    });
	$('#kategori_soal-tbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Tipe Soal"
    });
	$('#kunci_jawaban-tbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Kunci Jawaban"
    });
	function myKategoriFilter()
    { 
      let kategori = $("#filter_kategori").val();
      $.ajax({
        url: '<?=site_url('banksoal/get_tipe_soal')?>',
        type: 'GET',
        dataType: 'json',
        data: {kategori: kategori},
        success: function(response) {
          $("#filter_tipe_soal").empty();
          $.each(response,function(index,data){
		   $("#filter_tipe_soal").append(new Option("Perlihatkan Semua", "0"));
           $("#filter_tipe_soal").append(new Option("Filter Tipe Soal", ""));
           $('#filter_tipe_soal').append('<option value="'+data['id']+'">'+data['kategori']+'</option>');
         });
        },
        error: function (request, status, error) {
		    $("#filter_tipe_soal").empty();
			$("#filter_tipe_soal").append(new Option("Perlihatkan Semua", "0"));
            $("#filter_tipe_soal").append(new Option("Filter Tipe Soal", ""));
        }
      })
    }
	function detailUjian()
    { 
      let id_kategori = $("#kategori_ujian-tbh").val();
      $.ajax({
        url: '<?=site_url('banksoal/get_detail_ujian')?>',
        type: 'GET',
        dataType: 'json',
        data: {id_kategori: id_kategori},
        success: function(data) {
          $("#keterangan-tbh").val(data.object.tipe+'('+data.object.mapel+')');
        },
        error: function (request, status, error) {
          alert(request.responseText);
        }
      })
    }
	$(document).ready(function() {
      $('#filter_tipe_soal').change(function() {
        filter_bank_soal();
      });
      $('#filter_kategori').change(function() {
      filter_bank_soal();
      });
    });
    function filter_bank_soal() {
	var id_kategori = $('#filter_kategori').val();
    var id_tipe = $('#filter_tipe_soal').val();
    $.ajax({
        url: "<?php echo base_url(); ?>/banksoal/get_all",
        data: {
		id_tipe : id_tipe,
        id_kategori : id_kategori
        },
      success: function(data) {
        $('#soal').DataTable().clear().destroy();
        $("#tampil").html(data);
        $('#soal').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false
        });
      },
      error: function (request, status, error) {
        alert(request.responseText);
    }
    });
  }
    let datack_soal;
    ClassicEditor
			.create( document.querySelector( '.editor_soal' ), {
				
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
                datack_soal=editor;
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: 27gw32nl3ltt-cd9y4a801chs' );
				console.error( error );
		} );
			let datack_a;
			ClassicEditor
			.create( document.querySelector( '.editor_a' ), {
				
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
                datack_a=editor;
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: 27gw32nl3ltt-cd9y4a801chs' );
				console.error( error );
	} );
	let datack_b;
	ClassicEditor
			.create( document.querySelector( '.editor_b' ), {
				
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
                datack_b=editor;
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: 27gw32nl3ltt-cd9y4a801chs' );
				console.error( error );
	} );
	let datack_c;
	ClassicEditor
			.create( document.querySelector( '.editor_c' ), {
				
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
                datack_c=editor;
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: 27gw32nl3ltt-cd9y4a801chs' );
				console.error( error );
	} );
	let datack_d;
	ClassicEditor
			.create( document.querySelector( '.editor_d' ), {
				
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
                datack_d=editor;
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: 27gw32nl3ltt-cd9y4a801chs' );
				console.error( error );
	} );
	let datack_e;
	ClassicEditor
			.create( document.querySelector( '.editor_e' ), {
				
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
                datack_e=editor;
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
	   let kategori_ujian = $("#kategori_ujian-tbh").val();
	   let kategori_soal = $("#kategori_soal-tbh").val();
	   let kunci_jawaban = $("#kunci_jawaban-tbh").val();
	   const soal = datack_soal.getData();
	   const a = datack_a.getData();
	   const b = datack_b.getData();
	   const c = datack_c.getData();
	   const d = datack_d.getData();
	   const e = datack_e.getData();
	   $.ajax({
       url: '<?=site_url('banksoal/crud/insert')?>',
       type: 'POST',
       dataType: 'json',
       data: {
		   id_k_ujian : kategori_ujian,
		   id_k_soal : kategori_soal,
		   soal : soal,
		   opsi_a : a,
		   opsi_b : b,
		   opsi_c : c,
		   opsi_d : d,
		   opsi_e :e,
		   kunci_jawaban : kunci_jawaban
	   },
       success: function(){ 
        modal_tambah.modal('hide');
		$('#soal').DataTable().clear().destroy();
        refresh_table();
        swal("Berhasil!", "Data Soal Baru Berhasil Ditambahkan.", "success");
       },
       error: function(response){
          alert(response);
       }
	  })
    });
</script>