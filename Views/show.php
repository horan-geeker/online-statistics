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
<div class="container">
    <h1 class="text-muted">在线统计</h1>
    <table class="table table-bordered table-striped table-hover text-center">
        <tr>
            <td>#</td>
            <td>文件</td>
            <td>类型</td>
            <td>阅读&观看次数</td>
            <td>阅读&观看时间</td>
            <td>下载量</td>
            <td>操作</td>

        </tr>
        <?php
        foreach ($files as $file) {
            echo '<tr>';
            echo '<td>' . $file->id . '</td>';
            echo '<td>' . $file->name . '</td>';
            echo '<td>' . $file->type . '</td>';
            echo '<td>' . $file->read_count . '次</td>';
            echo '<td>' . $file->read_time . '秒</td>';
            echo '<td>' . $file->download . '秒</td>';
            echo '<td style="width: 180px">';
            if ($file->type == 'video') {
                echo '
                    <button class="btn btn-success btn-control pull-left" data-url="/video?id=' . $file->id . '"><a href="/video?id=' . $file->id . '" target="_black">在线观看</a></button>';
            } else {
                echo '
                    <button class="btn btn-success btn-control pull-left" data-url="/read?id=' . $file->id . '"><a href="' . $file->src . '">阅读</a></button>';
            }
            echo '<button class="btn btn-primary pull-right"><a href="/download?id=' . $file->id . '">下载</a></button>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>
</body>

<!--<script>-->
<!--    $('.btn-control').click(function () {-->
<!--        console.log($(this).prop('data-url'));-->
<!--        $.ajax({-->
<!--            url: $(this).prop('data-url'),-->
<!--            type: 'GET',-->
<!--        });-->
<!--    });-->
<!---->
<!--</script>-->

</html>