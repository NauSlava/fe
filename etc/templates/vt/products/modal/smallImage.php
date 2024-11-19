<?
define('SECTION','site');
header("Content-type: text/html; charset=utf8"); 
header("Cache-Control: no-store, no-cache, must-revalidate");// HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");// HTTP/1.0
require_once "../../defines.php";
require_once ROOT_DIR.'/engine/init.php'; 


$tpl->load_template('modal/smallImage.html'); //ЗАГРУЖАЕМ ШАБЛОН
/*
/* Добавляем фразы языковые *
$query="SELECT * FROM ".PREFIX."_languages";
$query_id1=$db->query($query);
while($row = $db->get_row($query_id1))
{
	$title="{lang.".$row['title']."}";
	if (LANG=='') $text=$row['ru'];
	else $text=$row[LANG];
	$tpl->set($title,$text);
};
$db->free($query_id1);	
*/


/* Добавляем фразы языковые *
$query="SELECT * FROM ".PREFIX."_languages";
$query_id1=$db->query($query);
while($row = $db->get_row($query_id1))
{
	$title="{lang.".$row['title']."}";
	if (LANG=='') $text=$row['ru'];
	else $text=$row[LANG];
	$tpl->set($title,$text);
};
$db->free($query_id1);	
*/

$tpl->compile('smallImage');
echo $tpl->result['smallImage'];

