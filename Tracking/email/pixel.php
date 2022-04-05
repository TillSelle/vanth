<?php
include_once 'connector/mysqli.php';
// Taken from w3docs.com (https://www.w3docs.com/snippets/php/how-to-get-the-client-ip-address-in-php.html)
function getIP() {
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    } else if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    } else {
        $ip = $_SERVER["REMOTE_ADDR"];
    }
    return $ip;
}
function getUserAgent() {
    if (isset($_SERVER["HTTP_USER_AGENT"])) {
        $ua = $_SERVER["HTTP_USER_AGENT"];
    } else {
        $ua = "Not detected.";
    }
    return $ua;
}
function getCompanyName($connection, $id) {
    $sql = "SELECT company_name FROM companies WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        return $row['company_name'];
    } else {
        return "Not found.";
    }
}

if (isset($_GET["src"])) {
    header("content-type: image/png");
    echo base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAABhWlDQ1BJQ0MgcHJvZmlsZQAAKJF9kT1Iw0AcxV9TpSLVDhYREcxQnSyIijhKFYtgobQVWnUwufRDaNKQpLg4Cq4FBz8Wqw4uzro6uAqC4AeIo5OToouU+L+k0CLGg+N+vLv3uHsHCPUyU82OcUDVLCMVj4nZ3IoYeIUfwwihF/0SM/VEeiEDz/F1Dx9f76I8y/vcn6NHyZsM8InEs0w3LOJ14ulNS+e8TxxmJUkhPiceM+iCxI9cl11+41x0WOCZYSOTmiMOE4vFNpbbmJUMlXiKOKKoGuULWZcVzluc1XKVNe/JXxjMa8tprtMcQhyLSCAJETKq2EAZFqK0aqSYSNF+zMM/6PiT5JLJtQFGjnlUoEJy/OB/8LtbszA54SYFY0Dni21/jACBXaBRs+3vY9tunAD+Z+BKa/krdWDmk/RaS4scAaFt4OK6pcl7wOUOMPCkS4bkSH6aQqEAvJ/RN+WAvluge9XtrbmP0wcgQ10t3QAHh8BokbLXPN7d1d7bv2ea/f0AY+lyoeqNuRAAAAAGYktHRAC5ACQAJOfT2/cAAAAJcEhZcwAALiMAAC4jAXilP3YAAAAHdElNRQfmAx8PDzoJ2+1mAAAAGXRFWHRDb21tZW50AENyZWF0ZWQgd2l0aCBHSU1QV4EOFwAAAAtJREFUCNdjYAACAAAFAAHiJgWbAAAAAElFTkSuQmCC');
    $id = $_GET["src"];
    $ip = mysqli_real_escape_string($connection, getIP());
    $useragent = mysqli_real_escape_string($connection, getUserAgent());
    $company = mysqli_real_escape_string($connection, getCompanyName($connection, $id));
    $id = mysqli_real_escape_string($connection, $id);
    $sql = "INSERT INTO emailtrackingdb (id, ip, user_agent, company_name) VALUES ($id, '$ip', '$useragent', '$company')";
    mysqli_query($connection, $sql);
    mysqli_close($conn);
} else {
    die("This Page is not meant to be accessed directly!");
}
?>