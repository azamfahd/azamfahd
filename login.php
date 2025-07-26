<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $defaultPassword = "123456789";

    // التحقق من أن اسم المستخدم نص فقط
    if (!ctype_alpha($username)) {
        echo "<script>alert('اسم المستخدم يجب أن يحتوي على نصوص فقط!'); window.history.back();</script>";
        exit;
    }

    // التحقق من كلمة المرور
    if ($password !== $defaultPassword) {
        echo "<script>alert('كلمة المرور غير صحيحة!'); window.history.back();</script>";
        exit;
    }

    // حفظ اسم المستخدم في ملف
    $file = 'users.txt';
    file_put_contents($file, $username . PHP_EOL, FILE_APPEND);

    // إعادة التوجيه إلى index.html
    header("Location: index.html");
    exit;
}
?>
