<style>
  img{
    max-width:600px;
  }
  figure {
    display: inline-block;
    width: 12px;
    height: auto;
  }
  .image.image_resized {
    display: block;
    box-sizing: border-box;
}

.image.image_resized img {
    width: 100%;
}

.image.image_resized > figcaption {
    display: block;
}
.image-style-align-left {
    float: left;
}
.image-style-align-right {
    float: right;
}
</style>
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
	width: 12cm;
	height: 14cm;
	min-height: 100%;
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
.image.image_resized {
    display: block;
    box-sizing: border-box;
}

.image.image_resized img {
    width: 100%;
}

.image.image_resized > figcaption {
    display: block;
}
.image-style-align-left {
    float: left;
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
           <?php foreach($materi->result() as $result) : ?>
              <?php
                  $judul =$result->judul;
                  $content =$result->content;
              ?>
            <?php endforeach;?>
            <h1>Materi Pembelajaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Materi</a></li>
              <li class="breadcrumb-item active">Lihat Materi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <div class="row row-editor">
                  <div class="editor">
                    <?php echo $content ?>
                  </div>
                </div>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-3">
            <a href="mailbox.html" class="btn btn-primary btn-block mb-3">Kembali Ke List Materi</a>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Folders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="#" class="nav-link">
                      <i class="fas fa-inbox"></i> Inbox
                      <span class="badge bg-primary float-right">12</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-envelope"></i> Sent
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-file-alt"></i> Drafts
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-filter"></i> Junk
                      <span class="badge bg-warning float-right">65</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-trash-alt"></i> Trash
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Labels</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-danger"></i> Important</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-warning"></i> Promotions</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-primary"></i> Social</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->