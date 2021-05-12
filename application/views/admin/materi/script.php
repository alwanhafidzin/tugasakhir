<script src="<?=base_url()?>assets/admin_lte/plugins/ckeditor5/ckeditor.js"></script>
<script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>
<script src="<?=base_url()?>assets/admin_lte/plugins/ckfinder/ckfinder.js"></script>
<script>
DecoupledEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
			toolbar : [
        'heading', '|',
        'alignment', '|',
        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
        'link', '|',
        'bulletedList', 'numberedList', 'todoList',
        '-', // break point
        'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
        'code', 'codeBlock', '|',
        'insertTable', '|',
        'outdent', 'indent', '|',
        'ckfinder', 'blockQuote', '|',
        'undo', 'redo'
    ],
			 ckfinder: {
                 uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
             },
		} )
		.then( editor => {
			const toolbarContainer = document.querySelector( '.toolbar-container' );

			toolbarContainer.prepend( editor.ui.view.toolbar.element );

			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>