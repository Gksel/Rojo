<?php $submenu = $this->session->userdata('submenu');?>
<div style="float:left;width:350px;margin-top:80px;">
	<?php if(!empty($cmslist)){for ($i = 0; $i < count($cmslist); $i++) {?>
		<div style="float:left;width:100%;color:black;font-size:24px;line-height:24px;margin-top:15px;">
			<div style="float:left;<?php if($submenu == 'service_'.$cmslist[$i]['shorturl']){echo 'border-bottom:2px solid black;';}else{echo 'border-bottom:2px solid white;';}?>">
				<a href="<?php echo base_url().'index.php/service/'.$cmslist[$i]['shorturl']?>" style="color:black;"><?php echo $cmslist[$i]['cms_name'.$this->langtype]?></a>
			</div>
		</div>
	<?php }}?>
	
	<?php if (isset ( $_COOKIE ['rojoclothinginfo'] )) {?>
		<div style="float:left;width:100%;color:black;font-size:26px;line-height:40px;margin-top:15px;">
			<div onclick="toshowbooknowbtn()" style="cursor:pointer;float:left;width:298px;border:2px solid black;text-align:center;">
				BOOK YOUR TAILOR
			</div>
		</div>
	<?php } else {?>
		<div style="float:left;width:100%;color:black;font-size:26px;line-height:40px;margin-top:15px;">
			<div onclick="javascript:location.href='<?php echo base_url().'index.php/account/tologin'?>';" style="cursor:pointer;float:left;width:298px;border:2px solid black;text-align:center;">
				BOOK YOUR TAILOR
			</div>
		</div>
	<?php }?>
	
</div>

<script>
	function toshowbooknowbtn(){
		$('.booknowarea').fadeIn(800);
	}
</script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.3"></script>
<div class="booknowarea" style="display:none;position:fixed;left:0px;top:0px;width:100%;height:100%;">
	<table cellspacing="0" cellpadding="0" style="float: left;width:100%;height:100%;">
		<tr>
			<td>
				<div class="booknow_step1" style="width:600px;margin:0 auto;">
					<div style="float:left;width:calc(100% - 2px);background-color:rgba(255,255,255,0.8);border:1px solid black;">
						<div style="float: left;width:calc(100% - 40px);margin:20px;">
							<div style="float: left;width:100%;font-size:20px;line-height:26px;">
								Our tailoring fleet only operates within the
								Shanghai district. Refer to map below for
								locations.
							</div>
							<div id="container" style="float:left;
				                width: 100%; 
				                height: 400px; 
				                border: 1px solid gray;
				                overflow:hidden;">
				    		</div>
				    		<div style="float:left;width: 100%;margin-top:20px;">
				    			<div style="float:left;font-size:18px;">
					    			I am a Shanghai resident
					    		</div>
					    		<div onclick="tosubmitbooknow_step1()" style="float:right;border:1px solid black;font-size:18px;line-height:30px;padding:0px 15px;">
					    			Book Now
					    		</div>
				    		</div>
						</div>
					</div>
				</div>
				<div class="booknow_step2" style="display:none;width:600px;margin:0 auto;">
					<div style="float:left;width:calc(100% - 2px);background-color:rgba(255,255,255,0.8);border:1px solid black;">
						<div style="float: left;width:calc(100% - 40px);margin:20px;">
							<div style="float: left;width:100%;font-size:20px;line-height:26px;">
								<input type="hidden" readonly="readonly" isopten="0" id="eventdate_start" name="eventdate_start" value=""/>
								<div style="float:left;width:250px;font-size:14px;" id="eventdate_start_area"></div>
								
								<div style="float:left;width:calc(100% - 250px);font-size:14px;">
									<div style="float:left;width:100%;">
										<div style="float:left;">
											<input type="radio" onclick="toselectshijianduan(1)" name="shijianduan_id" id="shijianduan_id_1" value="1" checked/> <label for="shijianduan_id_1">MORNING</label>
										</div>
										<div style="float:left;">
											<input type="radio" onclick="toselectshijianduan(2)" name="shijianduan_id" id="shijianduan_id_2" value="1"/> <label for="shijianduan_id_2">AFTERNOON</label>
										</div>
										<div style="float:left;">
											<input type="radio" onclick="toselectshijianduan(3)" name="shijianduan_id" id="shijianduan_id_3" value="1"/> <label for="shijianduan_id_3">EVENING</label>
										</div>
									</div>
									<div class="clocktime_1_area" style="float:left;width:100%;">
										<div style="float:left;width:100%;margin-top:20px;">
											<div style="float:left;width:50%;">
												<div class="clocktime_1" id="clocktime_1_1" onclick="tochoosedetailtime(1,1)" style="float:left;background:black;color:white;padding:5px 10px;border-radius:6px;">
													8 AM
												</div>
											</div>
											<div style="float:left;width:50%;">
												<div class="clocktime_1" id="clocktime_1_2" onclick="tochoosedetailtime(1,2)" style="float:left;background:#999;padding:5px 10px;border-radius:6px;">
													9 AM
												</div>
											</div>
										</div>
										<div style="float:left;width:100%;margin-top:20px;">
											<div style="float:left;width:50%;">
												<div class="clocktime_1" id="clocktime_1_3" onclick="tochoosedetailtime(1,3)" style="float:left;background:#999;padding:5px 10px;border-radius:6px;">
													10 AM
												</div>
											</div>
											<div style="float:left;width:50%;">
												<div class="clocktime_1" id="clocktime_1_4" onclick="tochoosedetailtime(1,4)" style="float:left;background:#999;padding:5px 10px;border-radius:6px;">
													11 AM
												</div>
											</div>
										</div>
									</div>
									<div class="clocktime_2_area" style="float:left;width:100%;display:none;">
										<div style="float:left;width:100%;margin-top:20px;">
											<div style="float:left;width:50%;">
												<div class="clocktime_2" id="clocktime_2_1" onclick="tochoosedetailtime(2,1)" style="float:left;background:#999;padding:5px 10px;border-radius:6px;">
													2 PM
												</div>
											</div>
											<div style="float:left;width:50%;">
												<div class="clocktime_2" id="clocktime_2_2" onclick="tochoosedetailtime(2,2)" style="float:left;background:#999;padding:5px 10px;border-radius:6px;">
													3 PM
												</div>
											</div>
										</div>
										<div style="float:left;width:100%;margin-top:20px;">
											<div style="float:left;width:50%;">
												<div class="clocktime_2" id="clocktime_2_3" onclick="tochoosedetailtime(2,3)" style="float:left;background:#999;padding:5px 10px;border-radius:6px;">
													4 PM
												</div>
											</div>
											<div style="float:left;width:50%;">
												<div class="clocktime_2" id="clocktime_2_4" onclick="tochoosedetailtime(2,4)" style="float:left;background:#999;padding:5px 10px;border-radius:6px;">
													5 PM
												</div>
											</div>
										</div>
									</div>
									<div class="clocktime_3_area" style="float:left;width:100%;display:none;">
										<div style="float:left;width:100%;margin-top:20px;">
											<div style="float:left;width:50%;">
												<div class="clocktime_3" id="clocktime_3_1" onclick="tochoosedetailtime(3,1)" style="float:left;background:#999;padding:5px 10px;border-radius:6px;">
													7 PM
												</div>
											</div>
											<div style="float:left;width:50%;">
												<div class="clocktime_3" id="clocktime_3_2" onclick="tochoosedetailtime(3,2)" style="float:left;background:#999;padding:5px 10px;border-radius:6px;">
													8 PM
												</div>
											</div>
										</div>
										<div style="float:left;width:100%;margin-top:20px;">
											<div style="float:left;width:50%;">
												<div class="clocktime_3" id="clocktime_3_3" onclick="tochoosedetailtime(3,3)" style="float:left;background:#999;padding:5px 10px;border-radius:6px;">
													9 PM
												</div>
											</div>
											<div style="float:left;width:50%;">
												<div class="clocktime_3" id="clocktime_3_4" onclick="tochoosedetailtime(3,4)" style="float:left;background:#999;padding:5px 10px;border-radius:6px;">
													10 PM
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
				    		<div style="float:left;width: 100%;margin-top:20px;">
					    		<div onclick="tobookyourtailor()" style="float:right;border:1px solid black;font-size:18px;line-height:30px;padding:0px 15px;">
					    			BOOK YOUR TAILOR
					    		</div>
				    		</div>
						</div>
					</div>
				</div>
				<div class="booknow_step3" style="width:600px;margin:0 auto;display:none;">
					<div style="float:left;width:calc(100% - 2px);background-color:rgba(255,255,255,0.8);border:1px solid black;">
						<div style="float: left;width:calc(100% - 40px);margin:20px;">
							<div style="float: left;width:100%;font-size:20px;line-height:26px;">
								Success
							</div>
						</div>
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>
<script>
toggle_calendar('eventdate_start');
function tosubmitbooknow_step1(){
	$('.booknow_step1').hide();
	$('.booknow_step2').show();
}
var current_shijianduan_id = 1;
var current_shijianduan_num = 1;
var current_date = '';
function toselectshijianduan(shijianduan_id){
	for(var i = 1; i <= 3; i++){
		$('.clocktime_'+i+'_area').hide();
	}
	$('.clocktime_'+shijianduan_id+'_area').show();

	current_shijianduan_id = shijianduan_id;

	tochoosedetailtime(current_shijianduan_id, 1);
}

function tochoosedetailtime(shijianduan_id, num){
	$('.clocktime_'+shijianduan_id).css({'background':'#999', 'color':'black'});
	$('#clocktime_'+shijianduan_id+'_'+num).css({'background':'black', 'color':'white'});

	current_shijianduan_num = num;
}

function tobookyourtailor(){
	if(currentshiwudi != ''){
		$.post(baseurl+'index.php/welcome/tobookyourtailor', {currentshiwudi:currentshiwudi, current_shijianduan_id:current_shijianduan_id, current_shijianduan_num:current_shijianduan_num}, function (){
			$('.booknow_step2').hide();
			$('.booknow_step3').show();
		})
	}else{
		alert('please choose date');
	}
	
}

//打开或关闭日历
function toggle_calendar(id){
	var isopten=$('#'+id).attr('isopten');
	if(isopten==0){
		var default_val=$('#'+id).val();
		$.post(baseurl+'index.php/welcome/calendar_select',{id:id,default_val:default_val},function (data){
			$('#'+id+'_area').html(data);
			$('#'+id).attr('isopten',1);
		});
	}else{
		$('#'+id+'_area').html('');
		$('#'+id).attr('isopten',0);
	}
}
var currentshiwudi = '';
function togetrilidatatoinput(id,year,month,day){
	if(day<10){
		var day_show='0'+day;
	}else{
		var day_show=day;
	}
	$('#'+id).val(year+'-'+month+'-'+day_show);
// 	toggle_calendar(id);

	if(currentshiwudi != ''){
		$('#shiwu_'+currentshiwudi).find('font').css({'color':'#1F9237'});
	}

	$('#shiwu_'+year+'_'+month+'_'+day).find('font').css({'color':'red'});

	currentshiwudi = year+'_'+month+'_'+day;

}

function togetshiwucalendar_month(id,year,month){
	$.post(baseurl+'index.php/welcome/calendar_select/'+year+'/'+month,{id:id},function (data){
		$('#'+id+'_area').html(data);
	});
}






var map = new BMap.Map("container");
map.centerAndZoom("上海", 12);

map.enableScrollWheelZoom();    //启用滚轮放大缩小，默认禁用
map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用


map.addControl(new BMap.NavigationControl());  //添加默认缩放平移控件
map.addControl(new BMap.OverviewMapControl()); //添加默认缩略地图控件
map.addControl(new BMap.OverviewMapControl({ isOpen: true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT }));   //右下角，打开


    var localSearch = new BMap.LocalSearch(map);
    localSearch.enableAutoViewport(); //允许自动调节窗体大小

    function searchByStationName() {
        map.clearOverlays();//清空原来的标注
        var keyword = document.getElementById("address").value;
        localSearch.setSearchCompleteCallback(function (searchResult){
            var poi = searchResult.getPoi(0);
//            document.getElementById("result_").value = poi.point.lng + "," + poi.point.lat;
            document.getElementById("longitude").value = poi.point.lng;
            document.getElementById("latitude").value = poi.point.lat;
            
            map.centerAndZoom(poi.point, 13);
            var marker = new BMap.Marker(new BMap.Point(poi.point.lng, poi.point.lat));// 创建标注，为要查询的地址对应的经纬度
    		map.addOverlay(marker);
    		var content = document.getElementById("address").value + "<br/><br/>经度：" + poi.point.lng + "<br/>纬度：" + poi.point.lat;
    		var infoWindow = new BMap.InfoWindow("<p style='font-size:14px;'>" + content + "</p>");
    		marker.addEventListener("click", function (){
        		this.openInfoWindow(infoWindow); });
    			// marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画 
			});
        
		localSearch.search(keyword);
	}
    searchByStationName();
</script>




