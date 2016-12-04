/**
 * Created by Chen on 2016-12-04.
 */
    let init_map = function (map_id="baidu_map") {
        // 百度地图API功能
        let map = new BMap.Map(map_id);    // 创建Map实例

        var user_marker = new BMap.Marker(new BMap.Point(120.091555, 30.315245));
        map.addOverlay(user_marker);
        user_marker.enableDragging();

        // 添加定位控件
        var geolocationControl = new BMap.GeolocationControl({enableAutoLocation: true, locationIcon: null});
        geolocationControl.addEventListener("locationSuccess", function (e) {
            /*当定位成功后，进行相应处理*/
            /*从事件中获取当前位置信息*/
            current_location = e.point;
            console.log(current_location);
            /*初始化地图，设置当前点为地图中心 16/200m,17/100m,18/50m, 19/20m*/
            map.centerAndZoom(current_location, 18);  // 初始化地图,设置中心点坐标和地图级别
            user_marker.setPosition(current_location);

        });
        geolocationControl.addEventListener("locationError", function (e) {
            /*定位失败时显示警告*/
            alert_dialog(e.message);
        });
        map.addControl(geolocationControl);

        /*触发定位*/
        geolocationControl.location();

        /*开启鼠标滚轮缩放*/
        map.enableScrollWheelZoom(true);


        /*添加版权信息*/
        var cr = new BMap.CopyrightControl({anchor: BMAP_ANCHOR_TOP_RIGHT});   //设置版权控件位置
        map.addControl(cr); //添加版权控件

        var bs = map.getBounds();   //返回地图可视区域
        cr.addCopyright({id: 1, content: "<a href='#' class='link'>Pickup Ltd.</a>", bounds: bs});
    };
