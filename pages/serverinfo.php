<?php
if(!defined('INITIALIZED'))
	exit;
if($action == "") {	
	
	$main_content .= '
		<div class="TableContainer">
			<div class="CaptionContainer">
				<div class="CaptionInnerContainer"> 
					<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
					<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
					<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
					<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span>
					<div class="Text">Information</div>
					<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/global/content/box-frame-vertical.gif);"></span> 
					<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/global/content/table-headline-border.gif);"></span> 
					<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
					<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/global/content/box-frame-edge.gif);"></span> 
				</div>
			</div>
			<table class="Table3" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td>
							<div class="InnerTableContainer" >
								<table style="width:100%;" >
									<tr>
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%">
														<tr style="background-color:#D4C0A1;" >
															<td width="30%" class="LabelV">PvP Protection:</td>
															<td>to level '.$config['server']['protectionLevel'].'</td>
														</tr>
														<tr style="background-color:#F1E0C6;" >
															<td class="LabelV">Exp Rate:</td>
															<td> Variado
															</td>
														</tr>
														<tr style="background-color:#D4C0A1;" >
															<td class="LabelV">Skill Rate:</td>
															<td>'.$config['server']['rateSkill'].'x</td>
														</tr>
														<tr style="background-color:#F1E0C6;" >
															<td class="LabelV">Magic Rate:</td>
															<td>'.$config['server']['rateMagic'].'x</td>
														</tr>
														<tr style="background-color:#D4C0A1;" >
															<td class="LabelV">Loot Rate:</td>
															<td>'.$config['server']['rateLoot'].'x</td>
														</tr>
														<tr style="background-color:#F1E0C6;" >
															<td class="LabelV">Day Kills to RedSkull: <img src="images/red_skull.gif"></td>
															<td>'.$config['server']['dayKillsToRedSkull'].'x</td>
														</tr>
														<tr style="background-color:#F1E0C6;" >
															<td class="LabelV">Week Kills to RedSkull: <img src="images/red_skull.gif"></td>
															<td>'.$config['server']['weekKillsToRedSkull'].'x</td>
														</tr>
														<tr style="background-color:#F1E0C6;" >
															<td class="LabelV">Month Kills to RedSkull: <img src="images/red_skull.gif"></td>
															<td>'.$config['server']['monthKillsToRedSkull'].'x</td>
														</tr>
														<tr style="background-color:#D4C0A1;" >
															<td class="LabelV">Kills to BlackSkull: <img src="images/black_skull.gif"></td>
															<td> Dobro das RedSkull </td>
														</tr>
														<tr style="background-color:#F1E0C6;" >
															<td class="LabelV">Free bless to level:</td>
															<td>'.$config['server']['protectionLevel'].'</td>
														</tr>
														<tr style="background-color:#D4C0A1;" >
															<td class="LabelV">Level to Create a Guild:</td>
															<td> 150 </td>
														</tr> 
														<tr style="background-color:#F1E0C6;" >
															<td class="LabelV">Level to Buy a House:</td>
															<td> 150 (!buyhouse; !sellhouse; !leavehouse;)</td>
														</tr>
														<tr style="background-color:#D4C0A1;" >
															<td class="LabelV">Comandos dentro da Casa:</td>
															<td> (Aleta Sio; Aleta Som; Aleta Grav; Alana Sio) </td>
														</tr>
													</table>
												</div>
											</div>
											<center><h3> Mapa </h3><center></br>
											<img src="images/world2.png"> 
											<div class="TableShadowContainer" >
												<div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bm.gif);" >
													<div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-bl.gif);" ></div>
													<div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/global/content/table-shadow-br.gif);" ></div>
												</div>
											</div>
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div><br>';
}