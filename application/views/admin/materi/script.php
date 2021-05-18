<script src="<?=base_url()?>assets/admin_lte/plugins/ckeditor5.2/build/ckeditor.js"></script>
<!-- <script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script> -->
<script src="<?=base_url()?>assets/admin_lte/plugins/ckfinder2/ckfinder.js"></script>
<!-- <script>
DecoupledEditor
		.create( document.querySelector( '#editor' ), {
	// 		toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
	// 		toolbar : [
    //     'heading', '|',
    //     'alignment', '|',
    //     'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
    //     'link', '|',
    //     'bulletedList', 'numberedList', 'todoList',
    //     '-', // break point
    //     'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
    //     'code', 'codeBlock', '|',
    //     'insertTable', '|',
    //     'outdent', 'indent', '|',
    //     'ckFinder', 'uploadImage' ,'blockQuote', '|',
    //     'undo', 'redo'
    // ],
			//  ckfinder: {
            //      uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            //  },
		} )
		.then( editor => {
			const toolbarContainer = document.querySelector( '.toolbar-container' );

			toolbarContainer.prepend( editor.ui.view.toolbar.element );

			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

	</script> -->
    <script>
		const watchdog = new CKSource.Watchdog();
		
		window.watchdog = watchdog;
		
		watchdog.setCreator( ( element, config ) => {
			return CKSource.Editor
				.create( element, config )
				.then( editor => {
					
					
					
		
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
			.create( document.querySelector( '#editor' ), {
				
				toolbar: {
					items: [
						'heading',
						'|',
                        'ckFinder',
						'fontSize',
						'fontFamily',
						'|',
						'fontColor',
						'fontBackgroundColor',
						'|',
						'bold',
						'pageBreak',
						'italic',
						'underline',
						'strikethrough',
						'subscript',
						'superscript',
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
                        'ckFinder',
						'imageUpload',
						'insertTable',
						'mediaEmbed',
						'|',
						'undo',
						'redo',
						'codeBlock',
						'highlight',
						'htmlEmbed',
						'removeFormat',
						'restrictedEditingException',
						'specialCharacters',
						'code',
						'horizontalLine'
					]
				},
				language: 'en-gb',
				image: {
					toolbar: [
						'imageTextAlternative',
						'imageStyle:full',
						'imageStyle:side',
						'linkImage'
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
			console.warn( 'Build id: nn5r3xq6dj2x-e22cdvy6reov' );
			console.error( error );
		}
		
	</script>
</script>