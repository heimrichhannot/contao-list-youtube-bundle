<?php
$table = 'tl_list_config_element';
\Contao\Controller::loadDataContainer($table);
$dca = &$GLOBALS['TL_DCA'][$table];

$dca['palettes'][\HeimrichHannot\ListYoutubeBundle\ConfigElementType\YouTubeListConfigElementType::TYPE] =
	'{title_type_legend},title,type;{config_legend},typeSelectorField,typeField;';