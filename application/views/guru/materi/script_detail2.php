<script src="<?=base_url()?>assets/admin_lte/plugins/ck-rs2/build/ckeditor.js"></script>
<!-- <script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script> -->
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
</script>