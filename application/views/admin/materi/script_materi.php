<script src="<?=base_url()?>assets/admin_lte/plugins/ck_latestv.1/build/ckeditor.js"></script>
<script src="<?=base_url()?>assets/admin_lte/plugins/ckfinder2/ckfinder.js"></script>
<script>
	let datack;
	const watchdog = new CKSource.Watchdog();
	
	window.watchdog = watchdog;
	
	watchdog.setCreator( ( element, config ) => {
		return CKSource.Editor
			.create( element, config )
			.then( editor => {
				datack =editor;
	
				// Set a custom container for the toolbar.
				document.querySelector( '.document-editor__toolbar' ).appendChild( editor.ui.view.toolbar.element );
				document.querySelector( '.ck-toolbar' ).classList.add( 'ck-reset_all' );
				return editor;
			} )
	} );
	
	watchdog.setDestructor( editor => {
		// Set a custom container for the toolbar.
		document.querySelector( '.document-editor__toolbar' ).removeChild( editor.ui.view.toolbar.element );
		return editor.destroy();
	} );
	
	watchdog.on( 'error', handleError );
	watchdog
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
			// image: {
			// 	toolbar: [
			// 		'imageTextAlternative',
			// 		'imageStyle:full',
			// 		'imageStyle:side',
			// 		'linkImage'
			// 	]
			// },
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
			licenseKey: '',
			ckfinder: {
				uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
			},
		} )
		.catch( handleError );
		
	function handleError( error ) {
		console.error( 'Oops, something went wrong!' );
		console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
		console.warn( 'Build id: j4n5lovjciwu-9g53zugngdh2' );
		console.error( error );
	}
    // $(document).on('input', '#judul', function(){
    //     let judul = $("#judul").val();
    //     $.ajax({
    //     url: '<?=site_url('materi/crud/update_judul')?>',
    //     type: 'POST',
    //     dataType: 'json',
    //     data: {
    //             judul: judul
    //         },
    //     success: function(data){ 
    //     },
    //     error: function(response){
    //         alert(response);
    //     }
    //     })
    // });	
	function jam(){
		var dayName =['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        var daySet = dayName[new Date().getDay()];
		const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
          "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        var monthName = monthNames[new Date().getMonth()]
		var now     = new Date(); 
        var year    = now.getFullYear();
        var month   = now.getMonth()+1; 
        var day     = now.getDate();
        var hour    = now.getHours();
        var minute  = now.getMinutes();
        var second  = now.getSeconds(); 
		var dateTime = daySet+','+day+' '+monthName+' '+year+' '+hour+':'+minute+':'+second;   
		$("#jam").val(dateTime);
	}
	function autoSave() {
		ajax_update();
		jam();
	}
    setInterval(autoSave, 60*1000);
	// setTimeout(autoSave, 10000);
	function ajax_update(){
		let judul = $("#judul").val();
		const editorData = datack.getData();
		$.ajax({
        url: '<?=site_url('materi/crud/update')?>',
        type: 'POST',
        dataType: 'json',
        data: {
                judul: judul,
				content : editorData
            },
        success: function(data){ 
        },
        error: function(response){
            alert(response);
        }
        })
	}
	document.querySelector( '#submit_save' ).addEventListener( 'click', () => {
		ajax_update();
		jam();
    });
	$(window).bind("beforeunload",function() {
	  ajax_update();
	  jam();
    });
</script>