<!DOCTYPE html>
<html lang="zh">
<head>
    <title>online-statistics</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-5">
        <h1 class="page-title">观看视频:<span class="text-muted"><?php echo $video->name ?></span>
            <a class="btn btn-primary" href="/">返回</a>
        </h1>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-4">
        <h3><span class="text-center">观看时间: <b id="time">0</b></span></h3>
    </div>
    <div class="col-md-1"></div>
</div>
<div class="container">
    <div class="row">
        <div align="center" class="col-md-10">
            <video poster="/img/video-poster.png" onclick="changeStatus()" id="player" loop controls preload="metadata">
                <source src="<?php echo $video->src ?>" type="video/mp4">
            </video>
        </div>
        <div class="col-md-2">
<!--            <button onclick="getVidDur()" type="button">获得视频的长度</button>-->
<!--            <button  type="button">暂停</button>-->
        </div>
    </div>
</div>
</body>

<script>
    video = $("#player").get(0);
    time = $("#time");
    function changeStatus() {
        if(video.paused){
            video.play();
            timer = setInterval(getTime,1000);
        }else{
            video.pause();
            clearInterval(timer);
        }
    }

    function getTime() {
        time.text(parseInt(time.text())+1);
    }

</script>

</html>