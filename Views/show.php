<!DOCTYPE html>
<html lang="zh">
<head>
    <title>online-statistics</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="text-muted">在线统计</h1>
        <table class="table table-bordered table-striped table-hover text-center">
            <tr>
                <td>文件</td>
                <td>平均阅读&观看时间（秒/人）</td>
                <td>下载量</td>
                <td>操作</td>

            </tr>
            <?php
            foreach ($data as $file){
                echo '<tr>';
                echo '<td>'.$file['name'].'</td>';
                echo '<td>'.$file['read_count'].'</td>';
                echo '<td>'.$file['download'].'</td>';
                echo '<td>
                    <button class="btn btn-success"><a href="/read/?file=word-test.docx">阅读</a></button>
                    <button class="btn btn-primary"><a href="/download/?file=word-test.docx">下载</a></button>
                </td>';
                echo '</tr>';
            }
            ?>
        </table>

    </div>
</body>
</html>