
		<!-- Main -->
			<div id="preview" class="vertical">
				<div class="inner" >
					<div class="image fit">
                                            <img src="<?=base_url()?>images/Record-Album-02.jpg" alt="" />
					</div>
					<div class="content">
						<header>
							<h2 style="text-align: right;">..اختار الترنيمة اللى هترنمها</h2>
						</header>
                                                <?php
                                                    foreach($hymns as $hymn)
                                                    {
                                                ?>
                                            <a style="text-align: right;" href="<?=base_url()?>Hymns/view_hymn/<?=$hymn->id?>"><p style="margin:0;font-size: 20px;"> <?=$hymn->name?> ♦</p></a> 
                                            <?php
                                                    }
                                                ?>
                                            
						</div>
				</div>
				
			</div>

		
			