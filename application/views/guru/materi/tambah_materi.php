<!-- <style>
/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

:root {
	--ck-sample-base-spacing: 2em;
	--ck-sample-color-white: #fff;
	--ck-sample-color-green: #279863;
}
.centered {
	max-width: 100%;
	margin: 0 auto;
	padding: 0 var(--ck-sample-base-spacing);
}


/* --------- MAIN ------------------------------------------------------------------------------- */

main .message {
	padding: 0 0 var(--ck-sample-base-spacing);
	background: var(--ck-sample-color-green);
	color: var(--ck-sample-color-white);
}

main .message::after {
	content: "";
	z-index: -1;
	display: block;
	height: 10em;
	width: 100%;
	background: var(--ck-sample-color-green);
	position: absolute;
	left: 0;
}

main .message h1 {
	padding-top: var(--ck-sample-base-spacing);
	margin: 0 0 1em;
	font-size: 2.2em;
}

main .message p {
	font-size: 1.1em;
	line-height: 1.6em;
}

main .message p a {
	color: var(--ck-sample-color-white);
}

main #editor {
	background: var(--ck-sample-color-white);
	box-shadow: 2px 2px 2px rgba(0,0,0,.1);
	border: 1px solid #DFE4E6;			
	border-bottom-color: #cdd0d2;
	border-right-color: #cdd0d2;
}

main .ck.ck-editor {
	box-shadow: 2px 2px 2px rgba(0,0,0,.1);
}

main .ck.ck-content {
	font-size: 1em;
	line-height: 1.6em;
	margin-bottom: 0.8em;
	min-height: 200px;
	padding: 1.5em 2em;
}

main #references {
	margin: 4em 0 var(--ck-sample-base-spacing);
	display: grid;
	grid-template-columns: repeat( auto-fit, minmax(320px, 1fr) );
	grid-gap: var(--ck-sample-base-spacing);
}

main #references > section {
	background: var(--ck-sample-color-white);
	border-radius: 2px;
	border: 1px solid #DFE4E6;			
	padding: var(--ck-sample-base-spacing);
	line-height: 1.8em;

	display: flex;
	flex-flow: column nowrap;
	justify-content: space-between;
}

main #references > section h2 {
	margin: .5em 0;
}

main #references > section p:first-of-type {
	flex: 1 0 auto;
}

main #references > section p:last-child {
	margin: calc(.25*var(--ck-sample-base-spacing)) 0 0;
}

main #references > section p:last-child a {
	background: #38A5EE;
	border-radius: 5px;
	padding: .4em 1em;
	color: var(--ck-sample-color-white);
	text-decoration: none;
	font-weight: bold;
	display: block;
	text-align: center;
}

main #references > section p:last-child a:hover {
	background: #218cd4;
}

/* --------- MAIN / DOCUMENT EDITOR --------------------------------------------------------------- */

main .document-editor {
	border: 1px solid #DFE4E6;
	border-bottom-color: #cdd0d2;
	border-right-color: #cdd0d2;
	border-radius: 2px;
	max-height: 700px;
	display: flex;
	flex-flow: column nowrap;
	box-shadow: 2px 2px 2px rgba(0,0,0,.1);
}

main .toolbar-container {
	z-index: 1;
	position: relative;
	box-shadow: 2px 2px 1px rgba(0,0,0,.05);
}

main .toolbar-container .ck.ck-toolbar {
	border-top-width: 0;
	border-left-width: 0;
	border-right-width: 0;
	border-radius: 0;
}

main .content-container {
	padding: var(--ck-sample-base-spacing);
	background: #eee;
	overflow-y: scroll;
}

main .content-container #editor {
	border-top-left-radius: 0;
	border-top-right-radius: 0;

	width: 23cm;
	min-height: 8cm;
    max-height:12cm;
	padding: 1cm 1cm 2cm;
	margin: 0 auto;
	box-shadow: 2px 2px 1px rgba(0,0,0,.05);
}


</style> -->
<style>
	/**
 * @license Copyright (c) 2014-2021, CKSource - Frederico Knabben. All rights reserved.
 * This file is licensed under the terms of the MIT License (see LICENSE.md).
 */

:root {
	--ck-sample-base-spacing: 2em;
	--ck-sample-color-white: #fff;
	--ck-sample-color-green: #279863;
	--ck-sample-color-blue: #1a9aef;
	--ck-sample-container-width: 1285px;
	--ck-sample-sidebar-width: 350px;
	--ck-sample-editor-min-height: 400px;
	--ck-sample-editor-z-index: 10;
}

/* --------- EDITOR STYLES  ---------------------------------------------------------------------------------------- */

.editor__editable,
/* Classic build. */
main .ck-editor[role='application'] .ck.ck-content,
/* Decoupled document build. */
.ck.editor__editable[role='textbox'],
.ck.ck-editor__editable[role='textbox'],
/* Inline & Balloon build. */
.ck.editor[role='textbox'] {
	width: 100%;
	background: #fff;
	font-size: 1em;
	line-height: 1.6em;
	min-height: var(--ck-sample-editor-min-height);
	padding: 1.5em 2em;
}

.ck.ck-editor__editable {
	background: #fff;
	border: 1px solid hsl(0, 0%, 70%);
	width: 100%;
}

.ck.ck-editor {
	/* To enable toolbar wrapping. */
	width: 100%;
	overflow-x: hidden;
}

/* Because of sidebar `position: relative`, Edge is overriding the outline of a focused editor. */
.ck.ck-editor__editable {
	position: relative;
	z-index: var(--ck-sample-editor-z-index);
}

/* --------- DECOUPLED (DOCUMENT) BUILD. ---------------------------------------------*/
body[data-editor='DecoupledDocumentEditor'] .document-editor__toolbar {
	width: 100%;
}

body[ data-editor='DecoupledDocumentEditor'] .collaboration-demo__editable,
body[ data-editor='DecoupledDocumentEditor'] .row-editor .editor {
	width: 22cm;
	height: 14cm;
	min-height: 14cm;
	padding: 1.75cm 1.5cm;
	margin: 2.5rem;
	border: 1px hsl( 0, 0%, 82.7% ) solid;
	background-color: var(--ck-sample-color-white);
	box-shadow: 0 0 5px hsla( 0, 0%, 0%, .1 );
}

body[ data-editor='DecoupledDocumentEditor'] .row-editor {
	display: flex;
	position: relative;
	justify-content: center;
	overflow-y: auto;
	background-color: #f2f2f2;
	border: 1px solid hsl(0, 0%, 77%);
}

body[data-editor='DecoupledDocumentEditor'] .sidebar {
	background: transparent;
	border: 0;
	box-shadow: none;
}


/* --------- COLLABORATION FEATURES (USERS) ------------------------------------------------------------------------ */
.row-presence {
	width: 100%;
	border: 1px solid hsl(0, 0%, 77%);
	border-bottom: 0;
	background: hsl(0, 0%, 98%);
	padding: var(--ck-spacing-small);

	/* Make `border-bottom` as `box-shadow` to not overlap with the editor border. */
	box-shadow: 0 1px 0 0 hsl(0, 0%, 77%);

	/* Make `z-index` bigger than `.editor` to properly display tooltips. */
	z-index: 20;
}

.ck.ck-presence-list {
    flex: 1;
    padding: 1.25rem .75rem;
}

.presence .ck.ck-presence-list__counter {
	order: 2;
	margin-left: var(--ck-spacing-large)
}

/* --------- REAL TIME COLLABORATION FEATURES (SHARE TOPBAR CONTAINER) --------------------------------------------- */
.collaboration-demo__row {
	display: flex;
	position: relative;
	justify-content: center;
	overflow-y: auto;
	background-color: #f2f2f2;
	border: 1px solid hsl(0, 0%, 77%);
}

body[ data-editor='InlineEditor'] .collaboration-demo__row {
	border: 0;
}

.collaboration-demo__container {
	max-width: var(--ck-sample-container-width);
	margin: 0 auto;
	padding: 1.25rem;
}

.presence, .collaboration-demo__row {
	transition: .2s opacity;
}

.collaboration-demo__topbar {
	background: #fff;
	border: 1px solid var(--ck-color-toolbar-border);
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 0;
    border-radius: 4px 4px 0 0;
}

.collaboration-demo__topbar .btn {
	margin-right: 1em;
	outline-offset: 2px;
	outline-width: 2px;
	background-color: var( --ck-sample-color-blue );
}

.collaboration-demo__topbar .btn:focus,
.collaboration-demo__topbar .btn:hover {
	border-color: var( --ck-sample-color-blue );
}

.collaboration-demo__share {
	display: flex;
	align-items: center;
	padding: 1.25rem .75rem
}

.collaboration-demo__share-description p {
	margin: 0;
	font-weight: bold;
	font-size: 0.9em;
}

.collaboration-demo__share input {
	height: auto;
	font-size: 0.9em;
	min-width: 220px;
	margin: 0 10px;
	border-radius: 4px;
	border: 1px solid var(--ck-color-toolbar-border)
}

.collaboration-demo__share button,
.collaboration-demo__share input {
	height: 40px;
	padding: 5px 10px;
}

.collaboration-demo__share button {
	position: relative;
}

.collaboration-demo__share button:focus {
	outline: none;
}

.collaboration-demo__share button[data-tooltip]::before,
.collaboration-demo__share button[data-tooltip]::after {
	position: absolute;
    visibility: hidden;
    opacity: 0;
    pointer-events: none;
    transition: all .15s cubic-bezier(.5,1,.25,1);
	z-index: 1;
}

.collaboration-demo__share button[data-tooltip]::before {
	content: attr(data-tooltip);
    padding: 5px 15px;
    border-radius: 3px;
    background: #111;
    color: #fff;
    text-align: center;
    font-size: 11px;
	top: 100%;
    left: 50%;
    margin-top: 5px;
    transform: translateX(-50%);
}

.collaboration-demo__share button[data-tooltip]::after {
    content: '';
	border: 5px solid transparent;
    width: 0;
    font-size: 0;
    line-height: 0;
	top: 100%;
    left: 50%;
    transform: translateX(-50%);
    border-bottom: 5px solid #111;
	border-top: none;
}

.collaboration-demo__share button[data-tooltip]:hover:before,
.collaboration-demo__share button[data-tooltip]:hover:after {
	visibility: visible;
    opacity: 1;
}

.collaboration-demo--ready {
	overflow: visible;
	height: auto;
}

.collaboration-demo--ready .presence,
.collaboration-demo--ready .collaboration-demo__row {
	opacity: 1;
}

/* --------- PAGINATION FEATURE ------------------------------------------------------------------------------------ */

/* Pagination view line must be stacked at least at the same level as the editor,
   otherwise it will be hidden underneath. */
.ck.ck-pagination-view-line {
	z-index: var(--ck-sample-editor-z-index);
}

/* --------- SAMPLE GENERIC STYLES (not related to CKEditor) ------------------------------------------------------- */
body, html {
	padding: 0;
	margin: 0;

	font-family: sans-serif, Arial, Verdana, "Trebuchet MS", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
	font-size: 16px;
	line-height: 1.5;
}

body {
	height: 100%;
	color: #2D3A4A;
}

body * {
	box-sizing: border-box;
}

a {
	color: #38A5EE;
}

header .centered {
	display: flex;
	flex-flow: row nowrap;
	justify-content: space-between;
	align-items: center;
	min-height: 8em;
}

header h1 a {
	font-size: 20px;
	display: flex;
	align-items: center;
	color: #2D3A4A;
	text-decoration: none;
}

header h1 img {
	display: block;
	height: 64px;
}

header nav ul {
	margin: 0;
	padding: 0;
	list-style-type: none;
}

header nav ul li {
	display: inline-block;
}

header nav ul li + li {
	margin-left: 1em;
}

header nav ul li a {
	font-weight: bold;
	text-decoration: none;
	color: #2D3A4A;
}

header nav ul li a:hover {
	text-decoration: underline;
}

main .message {
	padding: 0 0 var(--ck-sample-base-spacing);
	background: var(--ck-sample-color-green);
	color: var(--ck-sample-color-white);
}

main .message::after {
	content: "";
	z-index: -1;
	display: block;
	height: 10em;
	width: 100%;
	background: var(--ck-sample-color-green);
	position: absolute;
	left: 0;
}

main .message h2 {
	position: relative;
	padding-top: 1em;
	font-size: 2em;
}

.centered {
	/* Hide overlapping comments. */
	overflow: hidden;
	max-width: var(--ck-sample-container-width);
	margin: 0 auto;
	padding: 0 var(--ck-sample-base-spacing);
}

.row {
	display: flex;
	position: relative;
}

/* .btn {
	cursor: pointer;
	padding: 8px 16px;
	font-size: 1rem;
	user-select: none;
	border-radius: 4px;
	transition: color .2s ease-in-out,background-color .2s ease-in-out,border-color .2s ease-in-out,opacity .2s ease-in-out;
	background-color: var(--ck-sample-color-button-blue);
	border-color: var(--ck-sample-color-button-blue);
	color: var(--ck-sample-color-white);
	display: inline-block;
} */

/* .btn--tiny {
	padding: 6px 12px;
	font-size: .8rem;
} */
.mgin {
	margin-left : 1.6em;
	margin-right : 1.6em;
}
.mgin2{
	width:96%;
}
.tright{
	margin-left: 1.6em;
}

/* --------- RWD --------------------------------------------------------------------------------------------------- */
@media screen and ( max-width: 800px ) {
	:root {
		--ck-sample-base-spacing: 1em;
	}

	header h1 {
		width: 100%;
	}

	header h1 img {
		height: 40px;
	}

	header nav ul {
		text-align: right;
	}

	main .message h2 {
		font-size: 1.5em;
	}
	.mgin {
	margin-left : 0.5em;
	margin-right : 0.5em;
  }
  .mgin2{
	width:97%;
}
}

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Materi Guru SMAN 1 SOOKO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Materi</a></li>
              <li class="breadcrumb-item active">Buat Materi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline">
              <!-- /.card-header -->
              <div class="card-body">
			  <label class="mgin" for="nama_kelas">Judul Materi</label>
			  <div class="input-group mgin mb-3 mgin2">
                  <!-- /btn-group -->
				  <input type="text" autocomplete="off"class="form-control" name="judul"id="judul" placeholder="Masukkan Judul Materi yang dibuat ">
				  <div class="input-group-prepend">
                    <button type="button" class="btn btn-danger" id="submit_save">Simpan</button>
                  </div>
              </div>
			  <body data-editor="DecoupledDocumentEditor" data-collaboration="false">
	<main>
		<div class="centered">
			<div class="row">
				<div class="document-editor__toolbar"></div>
			</div>
			<div class="row row-editor">
				<div class="editor">
				</div>
			</div></div>
		</div>
	</main>
			<div class="toolbar-container"></div>
			<div class="content-container">
				<div id="editor">
				</div>
			</div>
		</div>
	</div>
</main>
              <!-- /.card-body -->
            </div>

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  