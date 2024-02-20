<section id="chat_sp_fsc" class="message-area" data-chat="<?= $ochat->id ?>" data-url="<?=url('chat') ?>">
	<div class="chat-area">
		<div class="chat-list"></div>
		<div class="chatbox">
			<div class="modal-dialog-scrollable">
			  <div class="modal-content">
				<div class="msg-head">
				  <div class="row">
					<div class="col-10">
					  <div class="d-flex align-items-center info_chat_user"></div>
					</div>
					<div class="col-2">
					  <ul class="moreoption d-none">
						<li class="navbar nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
						  <ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li>
							  <hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						  </ul>
						</li>
					  </ul>
					</div>
				  </div>
				</div>

				<div class="modal-body scroll_chat_fsc">
				  <div class="msg-body">
					<ul class="msg-list-fsc"></ul>
				  </div>
				</div>

				<div class="send-box">
				  <div class="form-send-box">
					<input type="text" class="form-control inp_new_msj_fsc" aria-label="message…" placeholder="Escribe aquí…">
					<button type="button" class="btn_new_msj_fsc"><i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar</button>
				  </div>

				  <div class="send-btns d-none">
					<div class="attach">
					  <div class="button-wrapper">
						<span class="label">
						  <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/upload.svg" alt="image title"> attached file
						</span><input type="file" name="upload" id="upload" class="upload-box" placeholder="Upload File" aria-label="Upload File">
					  </div>

					  <select class="form-control" id="exampleFormControlSelect1">
						<option>Select template</option>
						<option>Template 1</option>
						<option>Template 2</option>
					  </select>

					  <div class="add-apoint">
						<a href="#" data-toggle="modal" data-target="#exampleModal4"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16" fill="none">
							<path d="M8 16C3.58862 16 0 12.4114 0 8C0 3.58862 3.58862 0 8 0C12.4114 0 16 3.58862 16 8C16 12.4114 12.4114 16 8 16ZM8 1C4.14001 1 1 4.14001 1 8C1 11.86 4.14001 15 8 15C11.86 15 15 11.86 15 8C15 4.14001 11.86 1 8 1Z" fill="#7D7D7D" />
							<path d="M11.5 8.5H4.5C4.224 8.5 4 8.276 4 8C4 7.724 4.224 7.5 4.5 7.5H11.5C11.776 7.5 12 7.724 12 8C12 8.276 11.776 8.5 11.5 8.5Z" fill="#7D7D7D" />
							<path d="M8 12C7.724 12 7.5 11.776 7.5 11.5V4.5C7.5 4.224 7.724 4 8 4C8.276 4 8.5 4.224 8.5 4.5V11.5C8.5 11.776 8.276 12 8 12Z" fill="#7D7D7D" />
						  </svg> Appoinment</a>
					  </div>
					</div>
				  </div>

				</div>
			  </div>
			</div>
		</div>
	</div>
</section>