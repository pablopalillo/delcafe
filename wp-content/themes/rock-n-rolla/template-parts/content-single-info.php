<div id="info-area" class="row">
	<ul id="info-list">
		<?php if(!empty(getAdvanceLabel("tipo")) ): ?>
		<li>	
			<span class="entry-meta-info"><i class="fa fa-bullseye"></i><?php echo getAdvanceLabel("tipo") ?></span>
		</li>
		<?php endif; ?>
		<?php if(!empty(getAdvanceLabel("genero")) ): ?>
		<li>	
			<span class="entry-meta-info"><i class="fa fa-music"></i><?php echo getAdvanceLabel("genero") ?></span>
		</li>
		<?php endif; ?>
		<?php if(!empty(getAdvanceLabel("cover")) ): ?>
		<li>	
			<span class="entry-meta-info"><i class="fa fa-dollar"></i><?php echo getAdvanceLabel("cover") ?></span>
		</li>
		<?php endif; ?>
		<?php if(!empty(getAdvanceLabel("abierto")) ): ?>
		<li>	
			<span class="entry-meta-info"><i class="fa fa-thumbs-up"></i>Abierto <?php echo getAdvanceLabel("abierto") ?></span>
		</li>
		<?php endif; ?>
		<?php if(!empty(get_field("telefono")) ): ?>
		<li>	
			<span class="entry-meta-info"><i class="fa fa-phone"></i><?php echo get_field("telefono") ?></span>
		</li>
		<?php endif; ?>
		<?php if(!empty(get_field("direccion")) ): ?>
		<li>	
			<span class="entry-meta-info"><i class="fa fa-map-marker"></i><?php echo get_field("direccion") ?></span>
		</li>
		<?php endif; ?>
	</ul>
</div>