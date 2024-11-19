<?php
    /** @var Album $object */

    $__pageTitle = LocaleLoader::Translate( "vt.screens.album.editTitle");
	
    $grid = array(
        "basepath"   => Site::GetWebPath( "vt://albums/" )
        , "deleteStr"  => LocaleLoader::Translate( "vt.album.deleteString")
    );
	
	$__breadcrumbs = array( 
		array( 'link' => Site::GetWebPath( "vt://albums/" ) , 'title' => LocaleLoader::Translate( "vt.screens.album.list" ) )
		, array( 'link' => Site::GetWebPath( "vt://albums/edit/" . $objectId ) , 'title' => LocaleLoader::Translate( "vt.common.crumbEdit" ) ) 
	);
//print_r($object);
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
//echo $object->image->folderId.', ';
		if($row['folderId']==$object->image->folderId)
			$folders.='<option value="'.$row['folderId'].'" selected>'.$row['title'].'</option>';
		else
			$folders.='<option value="'.$row['folderId'].'" >'.$row['title'].'</option>';

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
		$i++;
	};
	$j=1; $images=''; $imagesarr=[];
	$query="SELECT * FROM objectImages WHERE objectId=".$objectId." AND objectClass='Album'";
//echo $query;
	$query_id1=$db->query ($query);
	while ($row=$db->get_row($query_id1)) {
		if($row['smallImageId']!='') {
			$query1="SELECT * FROM vfsFiles WHERE fileId=".$row['smallImageId']." LIMIT 1";
			$query_id_small=$db->super_query ($query1);
			$imagesarr[0][0][$j]='<img class="smallimage" style="max-width: 150px; display: inline-block; margin: 0 10px 10px 0;" src="/shared/files/'.$query_id_small['path'].'">';
			$imagesarr[0][1][$j]=$query_id_small['title'];
			$imagesarr[0][2][$j]=$query_id_small['fileId'];
		} else {
			$imagesarr[0][0][$j]='<div id="vfsArea_smallImageId" class="fileinput"><a href="javascript:vfsSelector.Open( null, '.$row['smallImageId'].' );">Выбрать</a></div>';
		}

		$query2="SELECT * FROM vfsFiles WHERE fileId=".$row['bigImageId']." LIMIT 1";
		$query_id_big=$db->query ($query2);
		while ($row1=$db->get_row($query_id_big)) {
			$imagesarr[1][0][$j]='<img class="bigimage" style="max-width: 150px; display: inline-block; margin: 0 10px 10px 0;" src="/shared/files/'.$row1['path'].'">';
			$imagesarr[1][1][$j]=$row1['title'];
			$imagesarr[1][2][$j]=$row1['fileId'];
		}

		$images.='<tr>
				<td >'.$j.'</td>
				<td>'.$imagesarr[0][0][$j].'<a href="#"></a></td>
				<td>'.$imagesarr[1][0][$j].'<a href="#"></a></td>
				<td><a href="#" class="imagedel" data-object="'.$row['objectImageId'].'" data-ids="'.$imagesarr[0][2][$j].'" data-idb="'.$imagesarr[1][2][$j].'">X</a></td>
			</tr>';
		$j++;
	};
//echo 'asasdasdfsdfsdf';
//print_r($mapping);

?>
{increal:tmpl://vt/header.tmpl.php}
<script type="text/javascript">
    var objectDeleteStr = '{$grid[deleteStr]}';
    var objectBasePath = '{$grid[basepath]}';
</script>
<script>   
	function hideBtn(){
		console.log($(this).attr('id'));
		$('#upload').hide();
		$('#res').html("Идет загрузка файла");
	}
	function handleResponse(mes) {
		$('#upload').show();
		if (mes.errors != null) {
			$('#res').html("Возникли ошибки во время загрузки файла: " + mes.errors);
		} else {
			$('#res').html("Файл " + mes.name + " загружен");   
			getImgs();
		}
	}

	function getImgs() {
//		console.log('id');
		var objectId=$('input[name="catid"]').val();
		var cat=$('input[name="cat"]').val();
		$.ajax({
			url         : '/shared/getImgs.php',
			type        : 'POST', // важно!
			data        : {objectId:objectId, cat:cat},
			success     : function( msg ){
				$('#imgblock1').html(msg);
//				window.location.reload();
//console.log(msg);
			}
		});
	}
</script>

<div class="main">
	<div class="inner">
		<form action="/shared/uploads.php" method="post" target="hiddenframe" enctype="multipart/form-data" onsubmit="hideBtn();">
			<input type="hidden" id="catid" name="catid" value='{$objectId}'>
			<input type="hidden" id="cat" name="cat" value='Album'>
			<input type="hidden" id="action" name="action" value="addportfolioimage">
			<input type="hidden" id="path" name="path" value='{$path}'>
			<select id="folder" name="folder" value="" >{$folders}</select>
			<input type="file" id="userfile" name="userfile" >
			<input type="submit" name="upload" id="upload" value="Загрузить" >
		</form>
		<div id="res"></div>
		<iframe id="hiddenframe" name="hiddenframe" style="width:0px; height:0px; border:0px"></iframe>

		<form method="post" action="" enctype="multipart/form-data" data-object-id="{$objectId}" id="data-form">
			{increal:tmpl://vt/elements/menu/breadcrumbs.tmpl.php}
			<div class="pagetitle">
				<div class="controls">
					<a href="#" class="big-delete delete-object-return">{lang:vt.common.delete}</a>
				</div>
				<h1>{$__pageTitle}</h1>
			</div>
			
			<?= FormHelper::FormHidden( 'action', BaseSaveAction::UpdateAction ); ?>
			<?= FormHelper::FormHidden( 'redirect', '', 'redirect' ); ?>
			
			{increal:tmpl://vt/albums/data.tmpl.php}
			
			<div class="buttons">
				<a href="{web:vt://albums/}" class="back">&larr; {lang:vt.common.back}</a>
				<div class="buttons-inner">
					<?= FormHelper::FormSubmit( 'edit', LocaleLoader::Translate( 'vt.common.saveChanges' ), null, 'large' ); ?>
					<?= FormHelper::FormSubmit( 'editPreview', LocaleLoader::Translate( 'vt.common.editPreview' ), '', 'large gray edit-preview' ); ?>
				</div>
			</div>
		</form>
	</div>
</div>
{increal:tmpl://vt/footer.tmpl.php}