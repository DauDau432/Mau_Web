<!DOCTYPE html>
<html>
<head>
    <title>Đậu Đậu</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        .download-button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .download-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Danh sách</h2>
    <table>
        <tr>
            <th>Tên file</th>
            <th>Ngày sửa đổi gần nhất</th>
            <th>Dung lượng</th>
            <th>Mã nguồn</th>
        </tr>
        
        <?php
        $directory = '/var/www/html/';
        $files = scandir($directory);
        
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..' && $file !== 'index.php') {
                $file_path = $directory . $file;
                $file_size = filesize($file_path);
                $file_modified = date("H:i:s d-m-y", filemtime($file_path));
                echo '<tr>';
                echo '<td>' . $file . '</td>';
                echo '<td>' . $file_modified . '</td>';
                echo '<td>' . $file_size . ' bytes</td>';
                echo '<td><a href="' . basename($file_path) . '" class="download-button">Xem</a></td>';
                echo '</tr>';
            }
        }
        ?>
    </table>
</body>
</html>
