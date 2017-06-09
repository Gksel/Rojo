<?php $submenu = $this->session->userdata('submenu');?>
<div style="float:left;width:350px;margin-top:80px;">
<?php if(!empty($cmslist)){for ($i = 0; $i < count($cmslist); $i++) {?>
	<div style="float:left;width:100%;color:black;font-size:24px;line-height:24px;margin-top:15px;">
		<div style="float:left;<?php if($submenu == 'company_'.$cmslist[$i]['shorturl']){echo 'border-bottom:2px solid black;';}else{echo 'border-bottom:2px solid white;';}?>">
			<a href="<?php echo base_url().'index.php/company/'.$cmslist[$i]['shorturl']?>" style="color:black;"><?php echo $cmslist[$i]['cms_name'.$this->langtype]?></a>
		</div>
	</div>
<?php }}?>
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
				<div style="width:600px;margin:0 auto;">
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
					    		<div style="float:right;border:1px solid black;font-size:18px;line-height:30px;padding:0px 15px;">
					    			Book Now
					    		</div>
				    		</div>
				    		
						</div>
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>
<script>
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




