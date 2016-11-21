# 在线统计

## 文档和视频的下载量统计
用户每点击“下载”按钮一次，将下载量加1

## 文档的阅读时间
估算正常速度阅读文档的时间，监测“阅读”按钮，用户点击时，在打开文档的同时开始计时，点击“结束阅读”或关闭网页时停止计时，将统计时间和预设时间作对比，大于，则表示阅读完成，小于，则表示没有完全阅读。

## 视频的观看时间
使用HTML5<video>标签定义视频，通过Media.duration方法得到视频的总时长，通过Media.paused的值为0位1来判断视频是否开始播放，通过Media.currentTime方法可以得到当前的播放时间，通过Media.ended方法判断视频是否结束。禁止视频的快进和慢进功能，当Media.ended值为1时，即表示视频播放完毕，当为0时，获得Media.currentTime的值，即表示当前观看时长。

