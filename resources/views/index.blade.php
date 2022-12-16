<!DOCTYPE html>
<html lang="en">

@include('layer/header')

<body class="dark-mode" data-panel-auto-height-mode="height" style="overflow-x: hidden">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->

    <script>
        (function(d, s, id) {
            if (d.getElementById(id)) {
                if (window.__TOMORROW__) {
                    window.__TOMORROW__.renderWidget();
                }
                return;
            }
            const fjs = d.getElementsByTagName(s)[0];
            const js = d.createElement(s);
            js.id = id;
            js.src = "https://www.tomorrow.io/v1/widget/sdk/sdk.bundle.min.js";

            fjs.parentNode.insertBefore(js, fjs);
        })(document, 'script', 'tomorrow-sdk');
    </script>

    <div class="tab-content">
        <article id="top" class="wrapper style4" style="height: 800px;">
            <div class="row" style="padding: 5px 5px 5px 5px;">
                <div class="col-4" style="padding: 5px 5px 5px 5px;">
                    <div class="card" style="height: 100%; background-color: #505050;">
                        <div class="card-header">
                            <h3 class="card-title">오늘의 날씨</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <td>지역</td>
                                        <td>온도</td>
                                        <td>날씨</td>
                                    </tr>
                                </thead>
                                <tbody id="weather_form">
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-4" style="padding: 5px 5px 5px 5px;">
                    <div class="card" style="height: 100%; background-color: #505050;">
                        <div class="card-header">
                            <h3 class="card-title">오늘의 뉴스</h3>

                            <!--<div class="card-tools">
                                <ul class="pagination pagination-sm float-right">
                                    <li class="page-item"><a class="page-link" href="#">경제</a></li>
                                    <li class="page-item"><a class="page-link" href="#">정치</a></li>
                                    <li class="page-item"><a class="page-link" href="#">주식</a></li>
                                </ul>
                            </div>-->
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                </thead>
                                <tbody id="news_body">
                                @foreach($head as $tp)
                                    <tr>
                                        <td style="font-size: small; cursor: pointer;" onclick="view_popup('<?=$tp->news_href?>', '<?=urlencode($tp->news_title)?>');">{{ $tp->news_title  }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-4" style="padding: 5px 5px 5px 5px;" id="kakao_map">
                    <iframe style="width: 100%; height: 100%;" src="<?php echo $kakao_url[0]->kakao_url?>"></iframe>
                </div>
            </div>

            <div class="row" id="sensor_box" style="padding: 5px 5px 5px 5px;">
                <div class="col-12">
                    <div class="card-primary">
                        <div class="card-header">
                            <h4 class="card-title">외출 전 확인 필수!</h4>
                        </div>
                        <div class="card-body">
                            <div class="row" id="sen_other">
                                @foreach($sen_other as $tp)
                                    <div class="col-3 col-sm-6 col-md-3">
                                        <div class="info-box">
                                            <?php
                                            $light = "#99FF66";

                                            $msg = $tp->v."<small>%</small>";

                                            if($tp->c == "sen_gassvalve"){
                                                if($tp->v == 1){
                                                    $status = "가스벨브가 닫혀있습니다.";
                                                    $light = "gray";
                                                }else if($tp->v == 2){
                                                    $status = "가스벨브가 열려있습니다.";
                                                    $light = "#99FF66";
                                                }else{
                                                    $status = "상태를 알 수 없습니다.";
                                                    $light = "black";
                                                }
                                                $msg = "<small>".$status."</small>";
                                            }
                                            ?>
                                            <span class="info-box-icon elevation-1" style="background-color: <?=$light?>;"><i class="fa-sol"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">{{ $tp->loc }}</span>
                                                <span class="info-box-number">
                                                    <?php echo $msg; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row" id="sen_info">
                                @foreach($sen_block as $tp)
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box">
                                        <?php
                                            if($tp->v == 1){
                                                $light = "gray";
                                                $status = "이 꺼져있습니다.";
                                            }else if($tp->v == 2){
                                                $light = "#99FF66";
                                                $status = "이 켜져있습니다.";
                                            }else{
                                                $light = "black";
                                                $status = " 상태를 알 수 없습니다.";
                                            }

                                            $msg = "<small>전등".$status."</small>";
                                        ?>
                                        <span class="info-box-icon elevation-1" style="background-color: <?=$light?>;"><i class="fa-sol"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">{{ $tp->loc }}</span>
                                            <span class="info-box-number">
                                                <?php echo $msg; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="padding: 5px 5px 5px 5px;">
                <div class="col-12">
                    <div class="card-primary">
                        <div class="card-header">
                            <h4 class="card-title">센서 상세</h4>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>센서 위치</th>
                                        <th>센서 구분</th>
                                        <th>인입 데이터</th>
                                        <th>마지막 수집 시각</th>
                                    </tr>
                                </thead>
                                <tbody id="sen_infoList">
                                <?php $cnt = 1; ?>
                                @foreach($sen_total as $tp)
                                    <tr>
                                        <td style="font-size: small;"><?=$cnt?></td>
                                        <td style="font-size: small;">{{ $tp->loc }}</td>
                                        <td style="font-size: small;">{{ $tp->c }}</td>
                                        <td style="font-size: small;">{{ $tp->v }}</td>
                                        <td style="font-size: small;">{{ $tp->send_date  }}</td>
                                    </tr>
                                    <?php $cnt++; ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </article>
    </div>
</div>
<!-- ./wrapper -->

@include('layer/bottom_script')

<script>
    var timerID;

    function view_popup(url, title)
    {
        var name = title;
        var option = "width = 1200, height = 900, top = 250, left = 600, location = no";
        window.open(url, name, option);
    }

    function get_livetime()
    {
        $.ajax({
            type:'GET',
            url: "http://223.130.100.50:8000/a-posts",
            timeout: 3000,
            success:function(data){

                $("#sen_info").empty();
                data.forEach(function(tmp){
                    var light = "";
                    var status = "";
                    var htm = "";
                    var msg = "";

                    if(tmp['v'] == 1){
                        light = "gray";
                        status = "이 꺼져있습니다.";
                    }else if(tmp['v'] == 2){
                        light = "#99FF66";
                        status = "이 켜져있습니다.";
                    }else{
                        light = "black";
                        status = " 상태를 알 수 없습니다.";
                    }

                    msg = "<small>전등"+status+"</small>";

                    htm += '<div class="col-12 col-sm-6 col-md-3">';
                    htm += '<div class="info-box">';
                    htm += '<span class="info-box-icon elevation-1" style="background-color: '+light+';"><i class="fa-sol#99FF66"></i></span>';
                    htm += '<div class="info-box-content">';
                    htm += '<span class="info-box-text">'+tmp['loc']+'</span>';
                    htm += '<span class="info-box-number">'+msg+'</span>';
                    htm += '</div> </div> </div>';

                    $("#sen_info").append(htm);
                });

            }
        });
    }

    function get_livetime_other()
    {
        $.ajax({
            type:'GET',
            url: "http://223.130.100.50:8000/a-posts-other",
            timeout: 3000,
            success:function(data){

                $("#sen_other").empty();
                data.forEach(function(tmp){
                    var status = "";
                    var htm = "";
                    var light = "#99FF66";
                    var msg = tmp['v']+"<small>%</small>";

                    if(tmp['c'] == "sen_gassvalve"){
                        if(tmp['v'] == 1){
                            light = "gray";
                            status = "가스벨브가 닫혀있습니다.";
                        }else if(tmp['v'] == 2){
                            light = "#99FF66";
                            status = "가스벨브가 열려있습니다.";
                        }else{
                            light = "black";
                            status = "가스벨브의 상태를 알 수 없습니다.";
                        }
                        msg = "<small>"+status+"</small>";
                    }

                    htm += '<div class="col-12 col-sm-6 col-md-3">';
                    htm += '<div class="info-box">';
                    htm += '<span class="info-box-icon elevation-1" style="background-color: '+light+';"><i class="fa-sol"></i></span>';
                    htm += '<div class="info-box-content">';
                    htm += '<span class="info-box-text">'+tmp['loc']+'</span>';
                    htm += '<span class="info-box-number">'+msg+'</span>';
                    htm += '</div> </div> </div>';

                    $("#sen_other").append(htm);
                });

            }
        });
    }

    function get_livetime_infoList()
    {
        $.ajax({
            type:'GET',
            url: "http://223.130.100.50:8000/a-posts-infoList",
            timeout: 3000,
            success:function(data){
                var htm = "";
                
                var cnt = 1;
                $("#sen_infoList").empty();
                data.forEach(function(tmp){

                    htm += '<tr>';
                    htm += '<td style="font-size: small;">'+cnt+'</td>';
                    htm += '<td style="font-size: small;">'+tmp['loc']+'</td>';
                    htm += '<td style="font-size: small;">'+tmp['c']+'</td>';
                    htm += '<td style="font-size: small;">'+tmp['v']+'</td>';
                    htm += '<td style="font-size: small;">'+tmp['send_date']+'</td>';
                    htm += '</tr>';

                    cnt ++;
                });

                $("#sen_infoList").append(htm);

            }
        });
    }

    var url = "";
    function get_livetime_map()
    {
        $.ajax({
            type:'GET',
            url: "http://223.130.100.50:8000/a-posts-map",
            timeout: 3000,
            success:function(data){
                var htm = "";
                var ttt = "";

                data.forEach(function(tmp){
                    htm = '<iframe style="width: 100%; height: 100%;" src="'+tmp['kakao_url']+'"></iframe>';
                    ttt = tmp['kakao_url'];
                });

                if(url != ttt){
                    var cnt = 1;
                    $("#kakao_map").empty();

                    $("#kakao_map").append(htm);
                    url = ttt;
                }

            }
        });
    }

    function get_livetime_news()
    {
        $.ajax({
            type:'GET',
            url: "http://223.130.100.50:8000/a-posts-news",
            timeout: 3000,
            success:function(data){
                var htm = "";
                
                var cnt = 1;
                $("#news_body").empty();
                data.forEach(function(tmp){

                    htm = '';

                    htm += '<tr>';
                    htm += '<td style="font-size: small; cursor: pointer;" onclick="view_popup(\''+encodeURI(tmp['news_href'])+'\', \''+encodeURI(tmp['news_title'])+'\');">'+tmp['news_title']+'</td>';
                    htm += '</tr>';

                    htm = htm.replace(/%27/g, '\'');
                    htm = htm.replace(/%22/g, '"');

                    $("#news_body").append(htm);
                });
            }
        });
    }

    $(document).ready(function(){
        let weatherIcon = {
            '01' : 'fas fa-sun',
            '02' : 'fas fa-cloud-sun',
            '03' : 'fas fa-cloud',
            '04' : 'fas fa-cloud-meatball',
            '09' : 'fas fa-cloud-sun-rain',
            '10' : 'fas fa-cloud-showers-heavy',
            '11' : 'fas fa-poo-storm',
            '13' : 'far fa-snowflake',
            '50' : 'fas fa-smog'
        };

        let arr = ['Seoul', 'Chuncheon', 'Gangneung', 'Daejeon', 'Cheongju', 'Daegu', 'Gwangju', 'Jeonju', 'Busan']

        arr.forEach(function(tmp) {
            $.ajax({
                url: 'http://api.openweathermap.org/data/2.5/weather?q='+tmp+'&appid=ebac551248bfe97a33ee16eac8312483&units=metric',
                dataType: 'json',
                type: 'GET',
                success: function(data){
                    var $Icon = (data.weather[0].icon).substr(0,2);
                    var $Temp = Math.floor(data.main.temp) + 'º';
                    var $city = data.name;

                    var r = "<tr>";
                    r += "<td><div class = 'City_"+tmp+"'></div></td>";
                    r += "<td><div class = 'CurrTemp_"+tmp+"'></div></td>";
                    r += "<td><div class = 'CurrIcon_"+tmp+"'></div></td>";
                    r += "</tr>";

                    $("#weather_form").append(r);

                    $('.CurrIcon_'+tmp).append('<i class="' + weatherIcon[$Icon] + '"></i>');
                    $('.CurrTemp_'+tmp).prepend($Temp);
                    $('.City_'+tmp).append($city);
                }
            });
        });
    });


    $(function () {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    setInterval(function(){
        get_livetime();
        get_livetime_other();
        get_livetime_infoList();
        get_livetime_map();
    }, 1000);

    setInterval(function(){
        get_livetime_news();
    }, 10000);

</script>

</body>
</html>