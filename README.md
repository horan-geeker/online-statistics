# 在线统计

## 文档和视频的下载量统计
用户每点击“下载”按钮一次，将下载量加1

## 视频的观看时间
使用HTML5<video>标签定义视频，通过Media.duration方法得到视频的总时长，通过Media.paused的值为0位1来判断视频是否开始播放，通过Media.currentTime方法可以得到当前的播放时间，通过Media.ended方法判断视频是否结束。禁止视频的快进和慢进功能，当Media.ended值为1时，即表示视频播放完毕，当为0时，获得Media.currentTime的值，即表示当前观看时长。

