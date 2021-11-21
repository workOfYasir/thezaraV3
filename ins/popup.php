
<?php if ($sstatus == 'Active' ) {?>
		<div class="modal" id="noTice">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" style="text-align: center;"><b style="color: #f00"><?php echo $stexts_row['popup_title']; ?></b><button class="close" data-dismiss="modal" type="button">&times;</button></h4>
					</div>

					<div class="modal-body">
						<?php echo $stexts_row['popup_text']; ?>
					</div>

					<div class="modal-footer"><button class="btn btn-danger" data-dismiss="modal" type="button">Close</button></div>
				</div>
			</div>
		</div>
<?php } else { ?>
<?php }?>