<?php

// Lấy danh sách proxy từ file txt
function getProxyList($filename) {
    $proxies = array();
    $file = fopen($filename, "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $proxy = trim($line);
            if (!empty($proxy)) {
                $proxies[] = $proxy;
            }
        }
        fclose($file);
    }
    return $proxies;
}

// Chọn một proxy ngẫu nhiên từ danh sách
function getRandomProxy($proxyList) {
    $index = rand(0, count($proxyList) - 1);
    return $proxyList[$index];
}

// Đổi IP bằng cách đặt proxy
function changeIP($proxy) {
    $options = array(
        CURLOPT_HTTPPROXYTUNNEL => 1,
        CURLOPT_PROXY => $proxy,
    );
    $ch = curl_init();
    curl_setopt_array($ch, $options);
    curl_setopt($ch, CURLOPT_URL, "http://139.162.30.13/"); // Cập nhật URL của trang web muốn hiển thị
    curl_exec($ch);
    curl_close($ch);
}

// Thực thi API
$proxyList = getProxyList("/var/www/html/proxy.txt"); // Đường dẫn đến file proxy.txt
if (!empty($proxyList)) {
    while (true) {
        $proxy = getRandomProxy($proxyList);
        changeIP($proxy);
        $delay = rand(30, 60); // Khoảng thời gian chờ trước khi thay đổi proxy (giây)
        sleep($delay);
    }
} else {
    echo "Không tìm thấy proxy trong file.";
}

?>
