
		<!-- Main -->
			<div id="preview" class="vertical">
				<div class="inner" >
					<div class="image fit">
                                            <img src="<?=base_url()?>images/deacons.png" alt="" />
					</div>
					<div class="content">
						<header>
							<h2 style="text-align: right;">..اختار اللحن اللى عايز تتعلمه</h2>
						</header>
                                                <?php
                                                    foreach($alhan as $lahn)
                                                    {
                                                ?>
                                            <a style="text-align: right;" href="<?=base_url()?>alhan/view_lahn/<?=$lahn->id?>"><p style="margin:0;font-size: 20px;"> <?=$lahn->name?> ♦</p></a> 
                                            <?php
                                                    }
                                                ?>
                                            
						</div>
				</div>
				
			</div>

		
			