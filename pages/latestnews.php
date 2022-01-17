<?php header("Content-type: text/html; charset=utf-8"); ?>
<?php
if (!defined('INITIALIZED'))
	exit;
//var_dump($config['server']);
//News Ticker
$news_content .= '
	<div id="NewsTicker" class="Box">
		<div class="Corner-tl" style="background-image:url(' . $layout_name . '/images/global/content/corner-tl.gif);"></div>
		<div class="Corner-tr" style="background-image:url(' . $layout_name . '/images/global/content/corner-tr.gif);"></div>
		<div class="Border_1" style="background-image:url(' . $layout_name . '/images/global/content/border-1.gif);"></div>
		<div class="BorderTitleText" style="background-image:url(' . $layout_name . '/images/global/content/title-background-green.gif);"></div>
		<img id="ContentBoxHeadline" class="Title" src="headline.php?text=News Ticker" alt="Contentbox headline">
		<div class="Border_2">
	  		<div class="Border_3">
				<div class="BoxContent" style="background-image:url(' . $layout_name . '/images/global/content/scroll.gif);">';
//Show Tickers
$tickers = $SQL->query('SELECT * FROM ' . $SQL->tableName('newsticker') . ' ORDER BY ' . $SQL->fieldName('date') . ' DESC LIMIT 7;');
$number_of_tickers = 0;
if (is_object($tickers)) {
	foreach ($tickers as $ticker) {
		if (is_int($number_of_tickers / 2))
			$color = "Odd";
		else
			$color = "Even";
		//utf8_encode($variavel_contendo_string)
		$tickers_to_add .= '
							<div id="TickerEntry-' . $number_of_tickers . '" class="Row" onclick=\'TickerAction("TickerEntry-' . $number_of_tickers . '")\'>
								<div class="' . $color . '">
									<div class="NewsTickerIcon" style="background-image:url(' . $layout_name . '/images/global/content/' . $ticker['icon'] . '_small.gif)"></div>
									<div id="TickerEntry-' . $number_of_tickers . '-Button" class="NewsTickerExtend" style="background-image:url(' . $layout_name . '/images/global/general/plus.gif)"></div>
									<div class="NewsTickerText">
										<span class="NewsTickerDate">' . date("M j Y", $ticker['date']) . ' - </span>
										<div id="TickerEntry-' . $number_of_tickers . '-ShortText" class="NewsTickerShortText">' . (short_text($ticker['text'], 100)) . '</div>
										<div id="TickerEntry-' . $number_of_tickers . '-FullText" class="NewsTickerFullText">' . ($ticker['text']) . '</div>
									</div>
								</div>
							</div>';
		$number_of_tickers++;
	}
}
$news_content .= $tickers_to_add;

$news_content .= '
				</div>
			</div>
		</div>
		<div class="Border_1" style="background-image: url(' . $layout_name . '/images/global/content/border-1.gif);"></div>
		<div class="CornerWrapper-b"><div class="Corner-bl" style="background-image: url(' . $layout_name . '/images/global/content/corner-bl.gif);"></div></div>
		<div class="CornerWrapper-b"><div class="Corner-br" style="background-image: url(' . $layout_name . '/images/global/content/corner-br.gif);"></div></div>
	</div>';
//End Tickers

//Featured Article
$accounts = $SQL->query('SELECT COUNT(*) FROM `accounts`;')->fetch();
$players = $SQL->query('SELECT COUNT(*) FROM `players`;')->fetch();
$news_content .= '
		<div id="FeaturedArticle" class="Box">
			<div class="Corner-tl" style="background-image:url(' . $layout_name . '/images/global/content/corner-tl.gif);"></div>
			<div class="Corner-tr" style="background-image:url(' . $layout_name . '/images/global/content/corner-tr.gif);"></div>
			<div class="Border_1" style="background-image:url(' . $layout_name . '/images/global/content/border-1.gif);"></div>
			<div class="BorderTitleText" style="background-image:url(' . $layout_name . '/images/global/content/title-background-green.gif);"></div>
			<img id="ContentBoxHeadline" class="Title" src="headline.php?text=Featured Article" alt="Contentbox headline">
    		<div class="Border_2">
      			<div class="Border_3">
        			<div class="BoxContent" style="background-image:url('.$layout_name.'/images/global/content/scroll.gif);">
						<div id="TeaserThumbnail">
							<img src="'.$layout_name.'/images/news/announcement.gif" width="150" height="100" border="0" alt="">
						</div>
                    <div style="position: relative; top: -9px; margin-bottom: 10px;"><br>
				 <font size="2px"></font><center><font size="2px"><b> IP:</b> '.$config['server']['ip'].' |   <b>Port:</b> 7171 |   <b>Version:</b> '.$config['server']['clientVersionStr'].'</font> <br> </a></center><br><font size="2px">Welcome to <b><font color="brown">' . htmlspecialchars($config['server']['serverName']) . '</font></b>, 
				 <br><br>Servidor feito especialmente para jogadores que gostam do <b><font color="brown"> Tibia Oldstyle, </font></b><br>mas colocado na versao recente com novas mounts, outfits e itens. <br><br> 
				 <img src="images/bullet.gif"> Todos Outfits sao frees & Addons coletando itens <br> 
				 <img src="images/bullet.gif"> <b> Spells totalmente iguais a versao 8.60 </b><br> 
				 <img src="images/bullet.gif"> Areas custom e inovadoras como Hogwarts e Westeros <br>
				 </div>
						</div>
      				</div>
    			</div>
			<div class="Border_1" style="background-image:url(' . $layout_name . '/images/global/content/border-1.gif);"></div>
			<div class="CornerWrapper-b"><div class="Corner-bl" style="background-image:url(' . $layout_name . '/images/global/content/corner-bl.gif);"></div></div>
			<div class="CornerWrapper-b"><div class="Corner-br" style="background-image:url(' . $layout_name . '/images/global/content/corner-br.gif);"></div></div>
  		</div>
	';
//End Featured Article
///Queries ///
$query = $SQL->query("SELECT * FROM `players` ORDER BY `experience` DESC")->fetch();
    $query2 = $SQL->query('SELECT `id`, `name` FROM `players` ORDER BY `id` DESC LIMIT 1;')->fetch();
    $housesfree = $SQL->query('SELECT COUNT(*) FROM `houses` WHERE `owner`=0;')->fetch();
    $housesrented = $SQL->query('SELECT COUNT(*) FROM `houses` WHERE `owner`>0;')->fetch();
    $players = $SQL->query('SELECT COUNT(*) FROM `players` WHERE `id`>0;')->fetch();
    $accounts = $SQL->query('SELECT COUNT(*) FROM `accounts` WHERE `id`>0;')->fetch();
	$banned = $SQL->query('SELECT COUNT(*) FROM `account_bans` WHERE `account_id`>0;')->fetch(); 
    $guilds = $SQL->query('SELECT COUNT(*) FROM `guilds` WHERE `id`>0;')->fetch();
///End Queries ///

    $main_content .= '<table bgcolor='.$config['site']['darkborder'].' border=0 cellpadding=4 cellspacing=1 width=100%>
    <tr><td><table border=0 cellpadding=1 cellspacing=1 width=100%>

    <tr bgcolor='. $config['site']['lightborder'] .'><td><center>Last joined us: <a href="?subtopic=characters&name='.urlencode($query2['name']).'">'.$query2['name'].'</a>, player number '.$query2['id'].'. Welcome and wish you a nice game!</center></td></tr>
    <tr bgcolor='. $config['site']['lightborder'] .'><td><center>Currently, the best player on the server is: <a href="index.php?subtopic=characters&name='.urlencode($query['name']).'"> '.$query['name'].'</a> ('.urlencode($query['level']).'). Congratulations!</center></td></tr>
    <table border=0 cellpadding=0 cellspacing=1 width=100%>
    <tr bgcolor='. $config['site']['lightborder'] .'><td><center><b>Accounts</b>: '.$accounts[0].'</center></td>
    <td><center><b>Players</b>: '.$players[0].'</center></td></tr>
      <tr bgcolor='. $config['site']['lightborder'] .'><td><center><b>Free Houses</b>: '.$housesfree[0].'</center></td>
    <td><center><b>Rented Houses</b>: '.$housesrented[0].'</center></td></tr>      
    <tr bgcolor='. $config['site']['lightborder'] .'><td><center><b>Banned accounts</b>: '.$banned[0].'</center></td>
    <td><center><b>Guilds in databese</b>: '.$guilds[0].'</center></td></tr>
	
</table></td></tr></table>';

//Functions
function replaceSmile($text, $smile)
{
	$smileys = array(
		':p' => 1,
		':eek:' => 2,
		':rolleyes:' => 3,
		';)' => 4,
		':o' => 5,
		':D' => 6,
		':(' => 7,
		':mad:' => 8,
		':)' => 9,
		':cool:' => 10
	);
	if ($smile == 1)
		return $text;
	else {
		foreach ($smileys as $search => $replace)
			$text = str_replace($search, '<img src="./images/forum/smile/' . $replace . '.gif" />', $text);
		return $text;
	}
}

function replaceAll($text, $smile)
{
	$rows = 0;

	while (stripos($text, '[code]') !== false && stripos($text, '[/code]') !== false) {
		$code = substr($text, stripos($text, '[code]') + 6, stripos($text, '[/code]') - stripos($text, '[code]') - 6);
		if (!is_int($rows / 2)) {
			$bgcolor = 'ABED25';
		} else {
			$bgcolor = '23ED25';
		}
		$rows++;
		$text = str_ireplace('[code]' . $code . '[/code]', '<i>Code:</i><br /><table cellpadding="0" style="background-color: #' . $bgcolor . '; width: 480px; border-style: dotted; border-color: #CCCCCC; border-width: 2px"><tr><td>' . $code . '</td></tr></table>', $text);
	}
	$rows = 0;
	while (stripos($text, '[quote]') !== false && stripos($text, '[/quote]') !== false) {
		$quote = substr($text, stripos($text, '[quote]') + 7, stripos($text, '[/quote]') - stripos($text, '[quote]') - 7);
		if (!is_int($rows / 2)) {
			$bgcolor = 'AAAAAA';
		} else {
			$bgcolor = 'CCCCCC';
		}
		$rows++;
		$text = str_ireplace('[quote]' . $quote . '[/quote]', '<table cellpadding="0" style="background-color: #' . $bgcolor . '; width: 480px; border-style: dotted; border-color: #007900; border-width: 2px"><tr><td>' . $quote . '</td></tr></table>', $text);
	}
	$rows = 0;
	while (stripos($text, '[url]') !== false && stripos($text, '[/url]') !== false) {
		$url = substr($text, stripos($text, '[url]') + 5, stripos($text, '[/url]') - stripos($text, '[url]') - 5);
		$text = str_ireplace('[url]' . $url . '[/url]', '<a href="' . $url . '" target="_blank">' . $url . '</a>', $text);
	}
	while (stripos($text, '[player]') !== false && stripos($text, '[/player]') !== false) {
		$player = substr($text, stripos($text, '[player]') + 8, stripos($text, '[/player]') - stripos($text, '[player]') - 8);
		$text = str_ireplace('[player]' . $player . '[/player]', '<a href="?subtopic=characters&name=' . urlencode($player) . '">' . $player . '</a>', $text);
	}
	while (stripos($text, '[img]') !== false && stripos($text, '[/img]') !== false) {
		$img = substr($text, stripos($text, '[img]') + 5, stripos($text, '[/img]') - stripos($text, '[img]') - 5);
		$text = str_ireplace('[img]' . $img . '[/img]', '<img src="' . $img . '">', $text);
	}
	while (stripos($text, '[letter]') !== false && stripos($text, '[/letter]') !== false) {
		$letter = substr($text, stripos($text, '[letter]') + 8, stripos($text, '[/letter]') - stripos($text, '[letter]') - 8);
		$text = str_ireplace('[letter]' . $letter . '[/letter]', '<img src="./images/forum/letters/letter_martel_' . $letter . '.gif">', $text);
	}
	while (stripos($text, '[b]') !== false && stripos($text, '[/b]') !== false) {
		$b = substr($text, stripos($text, '[b]') + 3, stripos($text, '[/b]') - stripos($text, '[b]') - 3);
		$text = str_ireplace('[b]' . $b . '[/b]', '<b>' . $b . '</b>', $text);
	}
	while (stripos($text, '[i]') !== false && stripos($text, '[/i]') !== false) {
		$i = substr($text, stripos($text, '[i]') + 3, stripos($text, '[/i]') - stripos($text, '[i]') - 3);
		$text = str_ireplace('[i]' . $i . '[/i]', '<i>' . $i . '</i>', $text);
	}
	while (stripos($text, '[u]') !== false && stripos($text, '[/u]') !== false) {
		$u = substr($text, stripos($text, '[u]') + 3, stripos($text, '[/u]') - stripos($text, '[u]') - 3);
		$text = str_ireplace('[u]' . $u . '[/u]', '<u>' . $u . '</u>', $text);
	}
	return replaceSmile($text, $smile);
}

function showPost($topic, $text, $smile)
{
	$post = '';
	if (!empty($topic))
		$post .= '<b>' . replaceSmile($topic, $smile) . '</b>';
	$post .= replaceAll($text, $smile);
	return $post;
}

//End Functions

//Most Powerfull Guilds
$main_content .= '
<div class="InnerTableContainer">
	<div class="TableShadowContainerRightTop">
		<div class="TableShadowRightTop" style="background-image: url(' . $layout_name . '/images/global/content/table-shadow-rt.gif);"></div>
	</div>
	<div class="TableContentAndRightShadow" style="background-image: url(' . $layout_name . '/images/global/content/table-shadow-rm.gif);">
		<div class="TableContentContainer">
			<table class="TableContent" style="border: 1px solid #faf0d7;">
				<tbody>
					<tr class="Table">
						<td style="padding: 0; margin: 0 auto">
							<div class="NewsHeadline">
								<div class="NewsHeadlineBackground" style="background-image:url(' . $layout_name . '/images/global/content/newsheadline_background.gif)">
									<div class="MostPowerfullGuilds">Most Powerfull Guilds</div>
								</div>
							</div>
							<table border="0" cellspacing="3" cellpadding="4" width="100%">
								<tr>';
$guildsPower = $SQL->query('SELECT g.id as id, g.name as name, COALESCE(SUM(`pd`.`unjustified`),0) as `frags` FROM `players` p LEFT JOIN `player_deaths` pd ON `pd`.`killed_by` = `p`.`name` INNER JOIN `guild_membership` gm ON `p`.`id` = `gm`.`player_id` LEFT JOIN `guilds` g ON `gm`.`guild_id` = `g`.`id` GROUP BY g.id ORDER BY `frags` DESC, g.`id` ASC LIMIT 0, 4')->fetchAll();
foreach ($guildsPower as $guildp) {
	$main_content .= '
								<td style="text-align: center;">
									<a href="?subtopic=guilds&action=view&GuildName=' . $guildp['name'] . '"><img src="guild_image.php?id=' . $guildp['id'] . '" width="64" height="64" border="0"/><br />' . $guildp['name'] . '</a><br />' . $guildp['frags'] . ' kills
								</td>';
}
$main_content .= '
								</tr>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="TableShadowContainer">
		<div class="TableBottomShadow" style="background-image: url(' . $layout_name . '/images/global/content/table-shadow-bm.gif);">
			<div class="TableBottomLeftShadow" style="background-image: url(' . $layout_name . '/images/global/content/table-shadow-bl.gif);"></div>
			<div class="TableBottomRightShadow" style="background-image: url(' . $layout_name . '/images/global/content/table-shadow-br.gif);"></div>
		</div>
	</div>
</div>
<br />';
//Most Powerfull Guilds End


//News OT

    $main_content .= '<table bgcolor='.$config['site']['darkborder'].' border=0 cellpadding=4 cellspacing=1 width=100%>
    <tr><td><table border=0 cellpadding=1 cellspacing=1 width=100%>

    <tr bgcolor='. $config['site']['lightborder'] .'><td>
	
<p style="font-size: 14px; font-weight: 400;"><img src="https://static.tibia.com/images/global/letters/letter_martel_S.gif" />ervidor feito especialmente para jogadores que gostam do Tibia Oldstyle,<br />mas colocado na versao 12 com novas funcionalidades, mounts, outfits e itens.  </p>
<p style="font-size: 14px; font-weight: 400;"><br /><img style="font-family: Verdana, Arial, Helvetica, sans-serif; user-select: none; margin-top: auto; margin-bottom: auto; float: right;" src="https://static.tibia.com/images/news/balancingscrolls_weapons_250.png" width="214" height="217" /></p>
<ul style="font-size: 14px; font-weight: 400;">
<li>Todos <a href="/?subtopic=outfits">Outfits</a> sao frees & Addons coletando <a href="/?subtopic=addons">itens</a><br /><br /></li>
<li>PVP classico, old school times<br /><br /></li>
<li><a href="/?subtopic=spells">Spells</a> adaptadas a versao 8.60<br /><br /></li>
<li>Mais de 50 quests na Teleport Room<br /><br /></li>
<li>Tasks e <a href="/?subtopic=questinfo">Missions</a> para explorar o mapa<br /><br /></li>
<li><a href="/?subtopic=raids">Raids</a> automaticas com novos bosses<br /><br /></li>
<li>Reward System desabilitado, loot tradicional<br /><br /></li>
<li>Areas custom e inovadoras como Hogwarts e Westeros<br /><br /></li>
<li>Para mais informacoes sobre as configuracoes e mapa, confira nosso server <a href="/?subtopic=serverInfo">info</a></li>
</ul><br><br>

<p style="font-size: 14px; font-weight: 400;">Apesar de algumas configuracoes em 8.60, o server possui:</p>
<ul>
<li>Quickloot </li>
<li>Bestiary</li>
<li>Charms</li>
<li>Prey System </li>
<li>Loot analyser</li>
<li>Market System</li>
<li>Entre outras funcionalidades</li>
</ul><br>
<p style="font-size: 14px; font-weight: 400;">Para mais, confira fotos do nosso game:</p><br>
<p><img src="https://i.ibb.co/r4SRccH/Saruman2.png" alt="" width="724" height="407" /></p>
<p> </p>
<p>As novas Areas do Global, consideradas interessantes e divertidas foram adicionadas ao mapa: </p>
<p><img src="https://i.ibb.co/nCJxv7G/teste.png" alt="" width="729" height="541" /></p>
<p> </p>
<p>Alem disso, temos as areas Customs, com Hogwarts, Norte da Muralha, entre outras:</p>
<p><img src="https://i.ibb.co/vVdn2vp/Deletera2-1.png" alt="Areas Customs" width="729" height="538" /></p>
<p>Veja mais fotos em nossos <a href="/?subtopic=videos">videos</a>.</p>
<p> </p>
				 <br> <b><font color="brown"> <p>See you in the game!<br />Your Saruman</p>  </font></b>
                </font>
	
</td></tr>	
</table></td></tr></table>';
//End News OT
//Here start news
$last_threads = $SQL->query('SELECT ' . $SQL->tableName('players') . '.' . $SQL->fieldName('name') . ', ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('post_text') . ', ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('post_topic') . ', ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('icon_id') . ', ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('news_icon') . ', ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('post_smile') . ', ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('id') . ', ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('replies') . ', ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('post_date') . ' FROM ' . $SQL->tableName('players') . ', ' . $SQL->tableName('z_forum') . ' WHERE ' . $SQL->tableName('players') . '.' . $SQL->fieldName('id') . ' = ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('author_guid') . ' AND ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('section') . ' = 1 AND ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('first_post') . ' = ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('id') . ' ORDER BY ' . $SQL->tableName('z_forum') . '.' . $SQL->fieldName('post_date') . ' DESC LIMIT ' . $config['site']['news_limit'])->fetchAll();

if (isset($last_threads[0])) {
	foreach ($last_threads as $thread) {
		$main_content .= '
				<div class="NewsHeadline">
					<div class="NewsHeadlineBackground" style="background-image:url(' . $layout_name . '/images/global/content/newsheadline_background.gif)">
						<img src="' . $layout_name . '/images/global/content/' . $thread['news_icon'] . '.gif" class="NewsHeadlineIcon" alt=\'\' />
						<div class="NewsHeadlineDate">' . date('M d Y', $thread['post_date']) . ' -</div>
						<div class="NewsHeadlineText">' . htmlspecialchars($thread['post_topic']) . '</div>
					</div>
				</div>
				<table style="clear:both" border=0 cellpadding=0 cellspacing=0 width="100%">
				<tr>';
		$main_content .= '
				<td style="padding-left:10px;padding-right:10px" ><div style="max-width: 716px; word-wrap: break-word;">' . showPost('', $thread['post_text'], $thread['post_smile']) . '</div><br>';
		if ($group_id_of_acc_logged >= $config['site']['access_admin_panel'])
			$main_content .= '
					<p align="right"><a href="?subtopic=forum&action=edit_post&id=' . $thread['id'] . '">» Edit this news</a></p>';
		$main_content .= '
					<p align="right"><a href="?subtopic=forum&action=show_thread&id=' . $thread['id'] . '">» Comment on this news</a></p>
				</td>';

		$main_content .= '
				<td>
					<img src="' . $layout_name . '/images/global/general/blank.gif" width=10 height=1 border=0 alt=\'\' />
				</td>
			</tr>
		</table><br />';
	}
} else
	$main_content .= '';
