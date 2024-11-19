<?php
    if ( !empty($__useEditor) ) {
?>
<div id="smallImage" class="window"></div>
<!--script src="{web:js://ext/modal/modal.js}"></script-->
<script src="{web:js://ext/tiny_mce/tiny_mce_gzip.js}"></script>
<script >
$('body').on('click', '#ui-id-1', function(){
	$('.examplesimg').addClass('hidden');
	$('.miniimg').removeClass('hidden');
	$('.bigimg').removeClass('hidden');
});
$('body').on('click', '#ui-id-2', function(){
	$('.examplesimg').removeClass('hidden');
	$('.miniimg').addClass('hidden');
	$('.bigimg').addClass('hidden');
});

$('body').on('click', '#ui-id-3', function(){
	$('.examplesimg').removeClass('hidden');
	$('.miniimg').addClass('hidden');
	$('.bigimg').addClass('hidden');
});

$('body').on('click', '#ui-id-4', function(){
	$('.examplesimg').addClass('hidden');
	$('.miniimg').addClass('hidden');
	$('.bigimg').addClass('hidden');
});

/*
    tinyMCE_GZ.init({
    	plugins : "advimage,advlink,contextmenu,fullscreen,inlinepopups," +
    	          "nonbreaking,paste,style,visualchars,table",
    	themes : 'advanced',
    	languages : 'ru',
    	disk_cache : true,
    	debug : false
    });

    function vfsBrowser(field_name, url, type, win) {
        var cmsURL = '{web:vt://vfs/mce}';
        var searchString = window.location.search;

        if (searchString.length < 1) {
            searchString = "?";
        }

        tinyMCE.activeEditor.windowManager.open({
            file : cmsURL + searchString + "&type=" + type + "&file=" + url, // PHP session ID is now included if there is one at all
            title: "File Browser",
            width : 900,  // Your dimensions may differ - toy around with them!
            height : 730,
            resizable : "yes",
            close_previous : "no"
        }, {
            window : win,
            input : field_name,
            resizable : "yes",
            inline : "yes",  // This parameter only has an effect if you use the inlinepopups plugin!
            editor_id : tinyMCE.selectedInstance.editorId
        });
        return false;
    }


    if ( $(".mceEditor").length > 0 )  {
        $(".mceEditor").wrap('<div style="display: inline-block; //display: inline;"></div>')
                tinyMCE.init({
                mode : "textareas",
                editor_selector : "mceEditor",
                language : "ru",
                theme : "advanced",
                plugins : "advhr,advimage,advlink,contextmenu,fullscreen,inlinepopups,nonbreaking,paste,style,table,visualchars",
                content_css: "{web:css://fe/tynimce_content.css}?<?= AssetHelper::GetRevision() ?>",

                    // Theme options
                theme_advanced_buttons1 : "bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,|,fullscreen,|,removeformat,charmap,|,tablecontrols",
                theme_advanced_buttons2 : "cut,copy,paste,pastetext,|,undo,redo,|,link,unlink,anchor,image,cleanup,code,|,styleprops,|,visualchars,nonbreaking,|,bullist,numlist, hr",
                theme_advanced_buttons3 : "",
                theme_advanced_toolbar_location : "top",
                theme_advanced_toolbar_align : "left",
                theme_advanced_statusbar_location : "bottom",
                theme_advanced_resizing : true,
        	    plugi2n_insertdate_dateFormat : "%d.%m.%Y",
        	    plugi2n_insertdate_timeFormat : "%H:%M:%S",
        		file_browser_callback : 'vfsBrowser',
        		theme_advanced_resize_horizontal : true,
                extended_valid_elements : "iframe[src|width|height|name|align|frameborder|scrolling|marginheight|marginwidth]",
                paste_auto_cleanup_on_paste : true,
        		paste_convert_headers_to_strong : false,
        		paste_strip_class_attributes : "all",
        		paste_remove_spans : true,
        		paste_remove_styles : true,
                relative_urls : false,
                remove_script_host : true,
                verify_html : true,
                cleanup : true,
                <?php if ( !empty( $__editorDisableP ) ) { ?>
					forced_root_block : '',
					force_br_newlines : true,
					force_p_newlines : false,
                <?php } ?>
                document_base_url : "{web:/}"
                , style_formats : [
                    { title : 'Таблица цвет: голубой', selector : 'table', classes : 'tableProduct tableProduct-blue',  exact : true }
                    , { title : 'Таблица цвет: синий', selector : 'table', classes : 'tableProduct tableProduct-darkblue',  exact : true }
                    , { title : 'Таблица цвет: зеленый', selector : 'table', classes : 'tableProduct tableProduct-green',  exact : true }
                    , { title : 'Таблица цвет: оранжевый', selector : 'table', classes : 'tableProduct tableProduct-orange',  exact : true }
                    , { title : 'Фото', selector : 'a', classes : 'fancybox',  exact : true }
                ]
            });
    }   */
</script>
<?php
    }
?>
<script>
var files; // переменная. будет содержать данные файлов

// заполняем переменную данными, при изменении значения поля file 
$('input[type=file]').on('change', function(){
	files = this.files;
});

// обработка и отправка AJAX запроса при клике на кнопку upload_files
$('.upload_files').on( 'click', function( event ){

	var catid=$('input[name="catid"]').val();
	var itemid=$('input[name="itemid"]').val();
	event.stopPropagation(); // остановка всех текущих JS событий
	event.preventDefault();  // остановка дефолтного события для текущего элемента - клик для <a> тега
	// ничего не делаем если files пустой
	if( typeof files == 'undefined' ) return;
	// создадим объект данных формы
	var data = new FormData();
	data.append('catid',catid);
	data.append('itemid',itemid);
	// заполняем объект данных файлами в подходящем для отправки формате
	$.each( files, function( key, value ){
		data.append( key, value );
	});
	// добавим переменную для идентификации запроса
	data.append( 'my_file_upload', 1 );
	// AJAX запрос
	$.ajax({
		url         : '/shared/uploads.php',
		type        : 'POST', // важно!
		data        : data,
		cache       : false,
		dataType    : 'json',
		// отключаем обработку передаваемых данных, пусть передаются как есть
		processData : false,
		// отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
		contentType : false, 
		// функция успешного ответа сервера
		success     : function( respond, status, jqXHR ){
//		success     : function( msg ){
//alert(msg);
			// ОК - файлы загружены

			if( typeof respond.error === 'undefined' ){
				// выведем пути загруженных файлов в блок '.ajax-reply'
				var files_path = respond.files;
				var html = '';
				$.each( files_path, function( key, val ){
					 html += val +'<br>';
				} )
				window.location = window.location.href;
//				$('.ajax-reply').html( '<img src="'+html+'" alt="" style="width: 30px; height: 30px;"' );
			}
			// ошибка
			else {
				console.log('ОШИБКА: ' + respond.data );
			}

		},
		// функция ошибки ответа сервера
		error: function( jqXHR, status, errorThrown ){
			console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
		}
	});
});
// обработка и отправка AJAX запроса при клике на кнопку upload_files
$('body').on( 'click','.imagedel', function(){

	var obj=$(this).attr('data-object');
	var imgs=$(this).attr('data-ids');
	var imgb=$(this).attr('data-idb');

	// AJAX запрос
	$.ajax({
		url         : '/shared/deleteimg.php',
		type        : 'POST', // важно!
		data        : {obj:obj, imgs:imgs, imgb:imgb},
		success     : function( msg ){

			if( msg === 'deleteok' ){
				getImgs();
			} else {
				console.log('ОШИБКА');
			}
		}
	});
	return false;
});
</script>
</body>
</html>