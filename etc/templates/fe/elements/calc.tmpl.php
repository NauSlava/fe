<?
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
	$imgs='';
	$options='';
// Крошка SBR
	$query_sbr='SELECT * FROM products WHERE statusId=1 AND categoryId=26';
	$query_id1=$db->query ($query_sbr);
	while ($row=$db->get_row($query_id1)) {
		$i++;

		$query1="SELECT * FROM vfsFiles WHERE fileId='".$row['smallImageId']."' ";
		$query_id2=$db->query ($query1);
		while ($row1=$db->get_row($query_id2)) {
			$img='/shared/files/'.$row1['path'];
		}
		$arrprodsbr[$i][0]=$row['title'];
		$arrprodsbr[$i][1]=$row['foreword'];
		$arrprodsbr[$i][2]=$row['price'];
		$arrprodsbr[$i][3]="<img src='".$img."' alt='' style='width: 100px;'>";

		$sbr.="<option value='".$row['productId']."' style='background-size: 30px 20px; background-position: left top; background-image: url(".$img.");' data-price='".$arrprodsbr[$i][2]."'>".$arrprodsbr[$i][1]."</option>";
	}

// Крошка цветная SBR
$json='';
	$i=0;
	$query_color='SELECT * FROM products WHERE statusId=1 AND categoryId=42';
	$query_id1=$db->query ($query_color);
	while ($row=$db->get_row($query_id1)) {
		$i++;
		$query1="SELECT * FROM vfsFiles WHERE fileId='".$row['smallImageId']."' ";
		$query_id2=$db->query ($query1);
		while ($row1=$db->get_row($query_id2)) {
			$img='/shared/files/'.$row1['path'];
		}
		$arrprod[$i][0]=$row['title'];
		$arrprod[$i][1]=$row['foreword'];
		$arrprod[$i][2]=$row['price'];
		$arrprod[$i][3]='<img src="'.$img.'" alt="" style="width: 30px;">';
		$arrprod[$i][4]=$row['productId'];

		$json = json_encode($arrprod);
		$options.="<option value='".$i."' style='background-image: url(".$img.");' data-objid='".$i."' data-price='".$arrprod[$i][2]."' data-id='".$arrprod[$i][4]."'>".$arrprod[$i][1]."</option>";
	}

// Крошка EPDM
	$i=0;
	$epdm='';
	$query_epdm='SELECT * FROM products WHERE statusId=1 AND categoryId=28';
	$query_id1=$db->query ($query_epdm);
	while ($row=$db->get_row($query_id1)) {
		$i++;

		$query1="SELECT * FROM vfsFiles WHERE fileId='".$row['smallImageId']."' ";
		$query_id2=$db->query ($query1);
		while ($row1=$db->get_row($query_id2)) {
			$img='/shared/files/'.$row1['path'];
		}
		$arrprodepdm[$i][0]=$row['title'];
		$arrprodepdm[$i][1]=$row['foreword'];
		$arrprodepdm[$i][2]=$row['price'];
		$arrprodepdm[$i][3]='<img src="'.$img.'" alt="" style="width: 40px;">';
		$arrprodepdm[$i][4]=$row['productId'];
		$jsonepdm = json_encode($arrprodepdm);
		$epdm.="<option value='".$i."' style='background-image: url(".$img.");' data-objid='".$i."' 
			data-price='".$arrprodepdm[$i][2]."' data-id='".$arrprodepdm[$i][4]."'>".$arrprodepdm[$i][1]."</option>";
	}
?>
<style>
.calc {margin: 50px auto;width: 85%;}
label {margin-bottom: 20px;margin-right: 20px;position:relative;}
label input[type='range'] {width: 120px; margin-right: 30px;height: 30px;display:inline-block;}
input[type='number'] {min-width:30px; max-width:70px;text-align: center; margin-right: 10px;display:inline-block;vertical-align:top;}
#image {display: inline-block;margin-right: 20px;}
.pimg {display: inline-block;width: 30px;height: 30px;margin-right: 20px;}
.hidden {display:none !important;}
.delbtn {width:20px; line-height:22px;border:solid 1px #666;position: absolute; top:0;right:0;text-align:center;color: #666;text-decoration: none;}
.delbtn:hover {background:#666;color: #fff;text-decoration: none;}
</style>
<div class='contaner'>
<div class='calc'>
<h1>Калькулятор резинового покрытия</h1>
<form action='?' method='post' style='display: inline-block;'>
	<input type='hidden' name='action' value='calc'>

	<div id='sbrselect' class='hidden'><? echo $sbr;?></div>
	<div id='colorsselect' class='hidden'><? echo $options;?></div>
	<div id='epdmselect' class='hidden'><? echo $epdm;?></div>
	<label style='margin-right:30px;'>Общая покрываемая площадь (м<sup>2</sup>):<br>
		<input type='number' id='square' name='square' value='0' style='width:70px;'>
	</label><br><br>
	<h2>Первый (нижний) слой покрытия</h2>
	<label style='margin-right:30px;'>Покрытие нижнего слоя:<br>
		<select name='covertype1' title='Покрытие нижнего слоя' autocomplete='off'>
			<option value='0'> Не выбрано </option>
			<option value='1' title='обычная черная с пигментом'>Recro SBR</option>
			<option value='2' title='окрашенная крошка'>Recro SBR Color</option>
			<option value='3' title='епдм крошка'>Recro Kids EPDM</option>
			<option value='4' title='tpv крошка'>Recro Kids TPV</option>
		</select>
	</label> <br>

	<label>Толщина нижнего слоя (мм):<br>
		<input type='number' id='bottomlayer' name='bottomlayer' value='20'>
		<input type="range" name="layerbottom" id="layerbottom" min="5" max="40" step="5" value="20" list='layerbottomlist'> 	
		<datalist id="layerbottomlist">
			<option value="5" label="5 mm"><option value="10"><option value="15"><option value="20" label="20 mm"><option value="25"><option value="30"><option value="35"><option value="40" label="40 mm">
		</datalist>
	</label><br><br>
	<div class='sbr'></div>
	<div class='colors'></div>
	<div class='epdm'></div>
	<div id='resultfirst' class='resultfirst'></div><br><br>

	<label><input type="checkbox" name="grunt" value="0"> - Грунтовка</label><br>
	<label><input type="checkbox" name="skipidar" value="0"> - Скипидар / УС</label><br>
	<label><input type="checkbox" name="rashodniki" value="0"> - Расходники (тазы перчатки, тележки)</label><br>

	<input type='button' value='Расчитать' id='sendcalc'>
</form>
	<div class='resultcalc' id='resultcalc'  style='display: inline-block; vertical-align: top;'></div>

</div>

<div id='colorblock' class='hidden'>
		<label class='coloritem'>Материал слоя:<br>
			<select name='materialupcolor_xx' title='Материал слоя'>
				<option value='0'> Не выбрано </option>
				<option value='1' title='черный' style='background:#000; color:#fff;'>черный</option>
				<option value='2' title='желтый' style='background:#ffff00;'>желтый</option>
				<option value='3' title='розовый' style='background:#ff00ff;'>розовый</option>
				<option value='4' title='синий' style='background:#1155cc; color: #fff;'>синий</option>
			</select>
			<br>Площадь покрытия цветом, %: <br>
			<input type='number' id='squarelayer_xx' name='squarelayer_xx' value='33'>
			<input type='range' name='layersquare_xx' id='layersquare_xx' min='0' max='100' step='1' value='33'>

			<input type='button' id='addcolor' name='addcolor' value='Добавить цвет'>
		</label>
</div></div>
<script rel="preload" as="script" src="/shared/js/fe/jquery-3.3.1.min.js"></script>
<script>
	var j=0;
	$('body').on('change', 'input[type="number"]', function(){
		if($(this).attr('name')!='square' || $(this).attr('name')!='bottomlayer' ){
			$(this).next().val($(this).val());
			var massasbr=0;
			var massacolors=0;
			var massaepdm=0;
			var covertype1=$('select[name="covertype1"] option:selected').val();
			if(covertype1==1) {
				var f=$('.sbr').find('label.sbritem').length;
				for(var a=1;a<=f;a++){massasbr=parseInt(massasbr)+parseInt($('#square').val());	}
				range1=$('#square').val();
			}
			if(covertype1==2) {
				var j=$('.colors').find('label.coloritem').length;
				for(var i=1;i<=j;i++){massacolors=parseInt(massacolors)+parseInt($('#squarelayer_'+i).val());}
				range1=$('#square').val()*massacolors/100;
			}
			if(covertype1==3) {
				var e=$('.epdm').find('label.epdmitem').length;
				for(var i=1;i<=e;i++){massaepdm=parseInt(massaepdm)+parseInt($('#squarelayer_'+i).val());}
				range1=$('#square').val()*massaepdm/100;
				var bl=$('#bottomlayer').val();
//				for(var a=1;a<=f;a++){massasbr=parseInt(massasbr)+parseInt($('#square').val());	}

//				console.log(range1, bl);
			}

			layercalc(covertype1,range1);
		}
	});
	$('body').on('click', '.addcolor', function(){
		$(this).addClass('hidden');
		$('.delbtn').addClass('hidden');
		var optionlist=$('#colorsselect').html();
		j=$('.coloritem').length;
		var string="Материал слоя:<br><div id='image_"+j+"' class='pimg'></div><select class='material' data-img='image_"+j+"' name='materialupcolor_"+j+"' title='Материал слоя'>"+optionlist+"</select><br>Площадь покрытия цветом, %: <br><input type='number' id='squarelayer_"+j+"' name='squarelayer_"+j+"' value='33' min='0' max='100'><input type='range' name='layersquare_"+j+"' id='layersquare_"+j+"' min='0' max='100' step='1' value='33'><input type='button' class='addcolor' name='addcolor' value='Добавить цвет' data-img='image_"+(parseInt(j)+parseInt(1))+"'><a href='#' class='delbtn' title='Удалить'>X</a>";
		let parent = document.querySelector('.colors');
		let label = document.createElement('label'); // создаем td-шку
		label.className="coloritem";
		label.innerHTML = string; 
		parent.appendChild(label);
		var covertype1=$('select[name="covertype1"] option:selected').val();
		var range=$('input[name="layerbottom"]').val(); 
		var obj=[];
//		if(covertype1==2) {
			let msg=<? echo $json; ?>;
			obj = JSON.parse(JSON.stringify(msg));
//		} 
		var img=obj[1][3];
		var div='#'+$(this).attr('data-img');
		$(div).html(img);

		layercalc(covertype1,range)
	});

	$('body').on('click', '.addepdm', function(){
		$(this).addClass('hidden');
		$('.delbtn').addClass('hidden');
		var optionepdmlist=$('#epdmselect').html();
		let parent = document.querySelector('.epdm');
		let label = document.createElement('label'); // создаем td-шку

		j=parseInt($('.epdmitem').length) + parseInt(1);
		var string="Материал слоя:<br><div id='image_"+j+"' class='pimg'></div><select class='material' data-img='image_"+j+"' name='materialupepdm_"+j+"' title='Материал слоя'>"+optionepdmlist+"</select><br>Площадь покрытия цветом, %: <br><input type='number' id='squarelayer_"+j+"' name='squarelayer_"+j+"' value='33' min='0' max='100'><input type='range' name='layersquare_"+j+"' id='layersquare_"+j+"' min='0' max='100' step='1' value='33'><input type='button' class='addepdm' name='addepdm' value='Добавить цвет' data-img='image_"+(parseInt(j)+parseInt(1))+"'><a href='#' class='delbtn' title='Удалить'>X</a><div class='materialinfo_"+j+"'></div>";

		label.className="epdmitem";
		label.innerHTML = string; 
		parent.appendChild(label);
		var covertype1=$('select[name="covertype1"] option:selected').val();
		var range=$('input[name="layerbottom"]').val(); 
		var obj=[];
//		if(covertype1==3) {
			let msg=<? echo $jsonepdm; ?>;
			obj = JSON.parse(JSON.stringify(msg));
//		} 

		var img=obj[1][3];
		var div='#'+$(this).attr('data-img');
		$(div).html(img);
//		var massatotalcolor=range*(parseInt($('input[name="bottomlayer"]').val())/10);
//		var mcost=parseInt(massatotalcolor)*parseInt(obj[j][2]);
//		$('.materialinfo_'+j).html('Стоимость за кг: '+obj[j][2]+'руб.<br>Кол-во крошки: '+massatotalcolor+'кг<br>Общая стоимость: '+mcost+'руб.');

		layercalc(covertype1,range)
	});

	$('body').on('change', 'select.material', function(){
		var objid;
		var id=$(this).val();
		if(objid=='undefined'){objid=1;}
		else {objid=$(this).val();}
		var covertype1=$('select[name="covertype1"] option:selected').val();
		var range=$('input[name="layerbottom"]').val(); 
		var obj=[];
		if(covertype1==2) {
			let msg=<? echo $json; ?>;
			obj = JSON.parse(JSON.stringify(msg));
		} 

		if(covertype1==3) {
			let msg=<? echo $jsonepdm; ?>;
			obj = JSON.parse(JSON.stringify(msg));
		} 

		var img=obj[objid][3];
		var div='#'+$(this).attr('data-img');

		$(div).html(img);

		layercalc(covertype1, range, objid);
	});

	$('body').on('click', '.delbtn', function(){
		$(this).parent().remove();
		var covertype1=$('select[name="covertype1"] option:selected').val();
		if(covertype1==2){
			$('.colors .coloritem:last').find('.addcolor').removeClass('hidden');
			$('.colors .coloritem:last').find('.delbtn').removeClass('hidden');
		}
		if(covertype1==3){
			$('.epdm .epdmitem:last').find('.addepdm').removeClass('hidden');
			$('.epdm .epdmitem:last').find('.delbtn').removeClass('hidden');
		}

		var range=$('input[name="layerbottom"]').val(); 
		layercalc(covertype1,range)

		return false;
	});

//document.getElementById("layertop").addEventListener("change", function() { $('#toplayer').val(this.value);});
document.getElementById("layerbottom").addEventListener("change", function() { $('#bottomlayer').val(this.value);});

<? include 'sendform.php';?>
	$('#layerbottom').change(function(){ 
		var covertype1=$('select[name="covertype1"] option:selected').val();
		layercalc(covertype1, $(this).val()); 
	});

	$('body').on('change', 'input[type="range"]', function(){
		var covertype1=$('select[name="covertype1"] option:selected').val();
		$(this).prev().val(this.value);		
		layercalc(covertype1, $(this).val()); 
	});

	$('select[name="covertype1"]').change(function(){
		var range, thickness; //=$('input[name="layerbottom"]').val(); 
		range=$('input[name="square"]').val(); 
		var i=0, a=0;
		if($(this).val()>0) {
			var obj=[];
			if($(this).val()==1) {
				$('.sbr').removeClass('hidden');
				$('.epdm').addClass('hidden');
				$('.colors').addClass('hidden');
				$('.sbritem').each(function(){i++; });
				var optionlist=$('#sbrselect').html();
				var string="<div id='image'></div><label class='sbritem'>Материал слоя:<br><select name='materialupcolor_1' title='Материал слоя'>"+optionlist+"</select>";
				$('.sbr').html(string);
				$('.colors').addClass('hidden'); $('.colors').empty();
			}

			if($(this).val()==2) {
				$('.sbr').addClass('hidden');
				$('.colors').removeClass('hidden');
				$('.epdm').addClass('hidden');
				var optionlist=$('#colorsselect').html();
				var string="<label class='coloritem'>Материал слоя:<br><div id='image_1' class='pimg'></div><select class='material' data-img='image_1' data-id='1' name='materialupcolor_1' title='Материал слоя'>"+optionlist+"</select><br>Площадь покрытия цветом, %: <br><input type='number' id='squarelayer_1' name='squarelayer_1' value='33' min='0' max='100'><input type='range' name='layersquare_1' id='layersquare_1' min='0' max='100' step='1' value='33'><input type='button' class='addcolor' name='addcolor' value='Добавить цвет' data-img='image_2'></label>";
				$('.colors').html(string);

				let msg=<? echo $json; ?>;
				obj = JSON.parse(JSON.stringify(msg));
				var img=obj[1][3];
				$('#image_1').html(img);
			}

			if($(this).val()==3) {
				$('.sbr').addClass('hidden'); $('.sbr').empty();
				$('.colors').addClass('hidden'); $('.colors').empty();
				$('.epdm').removeClass('hidden');
				var optionepdmlist=$('#epdmselect').html();
				var string="<label class='epdmitem'>Материал слоя:<br><div id='image_1' class='pimg'></div><select class='material' data-img='image_1' data-id='1' name='materialupepdm_1' title='Материал слоя'>"+optionepdmlist+"</select><br>Площадь покрытия цветом, %: <br><input type='number' id='squarelayer_1' name='squarelayer_1' value='33' min='0' max='100'><input type='range' name='layersquare_1' id='layersquare_1' min='0' max='100' step='1' value='33'><input type='button' class='addepdm' name='addepdm' value='Добавить цвет' data-img='image_2'><div class='materialinfo_1'></div></label>";
				$('.epdm').html(string);

				let msg=<? echo $jsonepdm; ?>;
				obj = JSON.parse(JSON.stringify(msg));
				var img=obj[1][3];
				$('#image_1').html(img);
			}
			
		} else { 
			$('.colors').addClass('hidden'); $('.colors').empty();
			$('.epdm').addClass('hidden'); $('.epdm').empty();
		}

		layercalc($(this).val(),range,1); 

	});
	$('#square').change(function(){ 
		var covertype1=$('select[name="covertype1"] option:selected').val();
		var range=$('input[name="square"]').val(); 
		layercalc(covertype1,range); 
	});

	$('#bottomlayer').change(function(){ 
		var covertype1=$('select[name="covertype1"] option:selected').val();
		var range=$('input[name="square"]').val();
		layercalc(covertype1,range); 
	});

	function layercalc(covertype1,range,objid) {	

		if($('#square').val()>0) {} else {alert('Не указана площадь покрытия'); return false;}
		var resultbottom, koff, massa, backet, barrel, glue, glueup, massacost, massacolors, sglue, solvent, range1;
		if(covertype1==1) {     

			var price=<? echo $arrprodsbr[1][2]; ?>;
			var img="<? echo $arrprodsbr[1][3]; ?>";
			var bottomlayer=$('#bottomlayer').val();
			koff=bottomlayer/10;
			massa=7*koff*range;
			glue=massa*0.2;
			var mcost=massa*(price);
			$('#image').html(img);
		}
		if(covertype1==2) { 
			var i, massaprice=[];
			let massaitemcost=[], totalmassaarr=[], massacolors=[];
			massa=0;
			var bottomlayer=$('#bottomlayer').val();
			koff=bottomlayer/10;

			let msg=<? echo $json; ?>;
			const obj = JSON.parse(JSON.stringify(msg));

			var j=$('.colors').find('label.coloritem').length;
			for(i=1;i<=j;i++){
				massacolors[i-1]=$('#squarelayer_'+i).val();
				massaprice[i-1]=$('select[name="materialupcolor_'+i+'"] option:selected').data('price');
			}

			var ttl=0, totalmassa=0, totalmassacost=0;
			for( var a=0; a<massacolors.length; a++ ) {
				totalmassa+=parseInt(massacolors[a]);
				totalmassacost+=(parseInt($('#square').val())*(parseInt(massacolors[a])/100))*parseInt(massaprice[a]);
//				totalmassacost+=parseInt(massacolors[a])*parseInt(massaprice[a]);
				totalmassaarr[a]=parseInt(massacolors[a])*parseInt(massaprice[a]);
			}

			range1=$('#square').val()*totalmassa/100;
			massa=7*koff*range1;
			glue=massa*0.18;
			massacost=totalmassacost;

			var massatotalcolor=7*range1*(parseInt($('input[name="bottomlayer"]').val())/10);
			glue=massatotalcolor*0.18;
			var mcost=8*totalmassacost; //parseInt(massatotalcolor)*parseInt(obj[1][2]);
//			$('.materialinfo_1').html('Стоимость за кг: '+obj[1][2]+'руб.<br>Кол-во крошки: '+massatotalcolor+'кг<br>Общая стоимость: '+mcost+'руб.');
			massa=Math.ceil(massatotalcolor);
console.log(massacolors,massaprice,totalmassa,massacost);
		}
		if(covertype1==3) { 
			var i, epdmmassaprice=[], massaepdm=[];
			let epdmmassaitemcost=[], epdmtotalmassaarr=[];
			massa=0;
			var bottomlayer=$('#bottomlayer').val();
			koff=bottomlayer/10;

			let msg=<? echo $jsonepdm; ?>;
			const obj = JSON.parse(JSON.stringify(msg));

			var j=$('.epdm').find('label.epdmitem').length;
			for(i=1;i<=j;i++){
				massaepdm[i-1]=$('#squarelayer_'+i).val();
				epdmmassaprice[i-1]=$('select[name="materialupepdm_'+i+'"] option:selected').data('price');
			}
			var ttl=0, totalmassa=0, epdmtotalmassacost=0;
			for( var a=0; a<=(massaepdm.length-1); a++ ) {
				totalmassa+=parseInt(massaepdm[a]);
				epdmtotalmassacost+=(parseInt($('#square').val())*(parseInt(massaepdm[a])/100))*parseInt(epdmmassaprice[a]);

				epdmtotalmassaarr[a]=parseInt(massaepdm[a])*parseInt(epdmmassaprice[a]);
			}
			range1=$('#square').val()*totalmassa/100;
			massacost=epdmtotalmassacost;
			var massatotalcolor=8*range1*(parseInt($('input[name="bottomlayer"]').val())/10);
			glue=massatotalcolor*0.18;
			var mcost=8*epdmtotalmassacost; //parseInt(massatotalcolor)*parseInt(obj[1][2]);
//			$('.materialinfo_1').html('Стоимость за кг: '+obj[1][2]+'руб.<br>Кол-во крошки: '+massatotalcolor+'кг<br>Общая стоимость: '+mcost+'руб.');
			massa=Math.ceil(massatotalcolor);

		}
		if(covertype1==4) { alert('Вычисление невозможно!');}

		glueup=Math.round(glue / 20) * 20;
		backet= Math.ceil(glue / 20);
		barrel= Math.ceil(glueup / 215);

		sglue=massa*0.2;
		solvent=massa*0.2;

		$('#resultfirst').html('Кол-во крошки: '+massa+' кг - '+(mcost).toFixed(2)+'руб<br>Кол-во клея: '+glue.toFixed(2)
		+' кг (Ведро: '+backet+' -'+backet*275*20+'руб ) (Бочек: '+barrel+' -'+barrel*270*215 + 'руб)<br>'
		+' Грунтовка (клей + растворитель): '+sglue.toFixed(2)+' кг + '+solvent.toFixed(2)+' кг');
	};
</script>