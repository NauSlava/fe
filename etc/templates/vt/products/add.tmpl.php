<?php
    /** @var Product $object */

    $__pageTitle = LocaleLoader::Translate( "vt.screens.product.addTitle");
	
	$__breadcrumbs = array( 
		array( 'link' => Site::GetWebPath( "vt://products/" ) , 'title' => LocaleLoader::Translate( "vt.screens.product.list" ) )
		, array( 'link' => Site::GetWebPath( "vt://products/add" ) , 'title' => LocaleLoader::Translate( "vt.common.crumbAdd" ) ) 
	);

	$path = strtr(dirname (__FILE__), '\\', '/'); 

	define('ROOT_DIR', $path);
	define('PIENGINE',true);
	define('ENGINE_DIR', '/home/b/born2fly/public_html/shared/myengine');
	define('INC_DIR', '/home/b/born2fly/public_html/include');
	require_once ENGINE_DIR.'/classes/mysql.php';

	define ("DBHOST", "localhost"); 
	define ("DBNAME", "born2fly_new");
	define ("DBUSER", "born2fly_new"); 	
	define ("DBPASS", "zNjGXInHcAyIIBKAi8V4");  
	define ("COLLATE", "UTF8"); 

	$db = new db;
	$i=0;
	$folders='<option value="0">-- Выбрать папку --</option>';
	$query="SELECT * FROM vfsFolders WHERE parentFolderId=1";
	$query_id1=$db->query ($query);
	while ($row=$db->get_row($query_id1)) {
		$i++;
		$folders.='<option value="'.$row['folderId'].'">'.$row['title'].'</option>';

		$query1="SELECT * FROM vfsFolders WHERE parentFolderId='".$row['folderId']."' ";
		$query_id2=$db->query ($query1);
		while ($row1=$db->get_row($query_id2)) {
			$folders.='<option value="'.$row1['folderId'].'">&nbsp- '.$row1['title'].'</option>';

			$query2="SELECT * FROM vfsFolders WHERE parentFolderId='".$row1['folderId']."' ";
			$query_id3=$db->query ($query2);
			while ($row2=$db->get_row($query_id3)) {
				$folders.='<option value="'.$row2['folderId'].'">&nbsp&nbsp&nbsp-- '.$row2['title'].'</option>';
			}		
		}		
	};

?>
{increal:tmpl://vt/header.tmpl.php}
<div class="main">
	<div class="inner">
		<form method="post" action="" enctype="multipart/form-data" id="data-form">
			{increal:tmpl://vt/elements/menu/breadcrumbs.tmpl.php}
			<div class="pagetitle">
				<h1>{$__pageTitle}</h1>
			</div>
			
			<?= FormHelper::FormHidden( 'action', BaseSaveAction::AddAction ); ?>
			
			{increal:tmpl://vt/products/data.tmpl.php}
			
			<div class="buttons">
				<a href="{web:vt://products/}" class="back">&larr; {lang:vt.common.back}</a>
				<div class="buttons-inner">
					<?= FormHelper::FormSubmit( 'add', LocaleLoader::Translate( 'vt.common.saveChanges' ), null, 'large' ); ?>
				</div>
			</div>
		</form>
	</div>
</div>
{increal:tmpl://vt/footer.tmpl.php}