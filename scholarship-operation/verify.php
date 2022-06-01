 <?php
    $path    = './';
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..'));

    $pattern1 =  "/.jpg/i";
    $pattern2 = "/.jpeg/i";
    $pattern3 = "/.png/i";
    $pattern4 = "/.pdf/i";
    $pattern5 = "/.zip/i";

    foreach ($files as $file) {
        if (file_exists($file) && (preg_match($pattern1, $file) || preg_match($pattern2, $file) || preg_match($pattern3, $file) || preg_match($pattern4, $file) || preg_match($pattern5, $file))) {
            echo $file;
            unlink($file);
        }
    }



    echo "<script>window.location.href='../Admin_Dashboard_Panel/verify-docs.php'</script>";

    ?>