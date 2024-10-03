<?php
if (isset($_POST['btntest'])) {
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'student';

    // إنشاء اتصال بقاعدة البيانات
    $conn = mysqli_connect($host, $user, $password, $db);

    // التحقق من اتصال قاعدة البيانات
    if (!$conn) {
        die("فشل الاتصال: " . mysqli_connect_error());
    }

    // الحصول على القيم المدخلة من النموذج
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $mark = floatval($_POST['mark']);
    $register = mysqli_real_escape_string($conn, $_POST['register']);

    // إعداد استعلام الإدخال
    $insert = "INSERT INTO student (name, mark, register) VALUES ('$name', $mark, '$register')";
    
    // تنفيذ الاستعلام والتحقق من النجاح
    if (mysqli_query($conn, $insert)) {
        echo "تم إنشاء سجل جديد بنجاح";
    } else {
        echo "خطأ: " . $insert . "<br>" . mysqli_error($conn);
    }

    // إغلاق الاتصال
    mysqli_close($conn);
}
?>