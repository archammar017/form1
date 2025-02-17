<?php
// معلومات الاتصال بـ FTP
$ftp_server = " ";
$ftp_username = "";
$ftp_password = " ";
$remote_dir = " "; 
$local_dir = __DIR__;

// دالة لعرض التقدم
function showProgress($message) {
    echo $message . "<br>\n";
    ob_flush();
    flush();
}

// دالة للتحقق من وجود ملف على السيرفر
function checkFileExists($conn_id, $remote_file) {
    $file_list = ftp_nlist($conn_id, dirname($remote_file));
    return in_array($remote_file, $file_list);
}

// دالة لإنشاء المجلد على السيرفر
function createRemoteDir($conn_id, $dir) {
    $parts = explode('/', $dir);
    $path = '';
    foreach ($parts as $part) {
        if (!empty($part)) {
            $path .= '/' . $part;
            @ftp_mkdir($conn_id, $path);
        }
    }
    return $path;
}

// دالة لرفع مجلد كامل
function uploadDirectory($conn_id, $local_dir, $remote_dir) {
    if (!is_dir($local_dir)) {
        return;
    }

    $files = scandir($local_dir);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $local_path = $local_dir . DIRECTORY_SEPARATOR . $file;
            $remote_path = $remote_dir . '/' . $file;

            if (is_dir($local_path)) {
                createRemoteDir($conn_id, $remote_path);
                uploadDirectory($conn_id, $local_path, $remote_path);
            } else {
                showProgress("📄 جاري رفع $file...");
                if (ftp_put($conn_id, $remote_path, $local_path, FTP_BINARY)) {
                    if (checkFileExists($conn_id, $remote_path)) {
                        showProgress("✅ تم رفع وتأكيد وجود $file بنجاح");
                    } else {
                        showProgress("⚠️ تم الرفع لكن لم يتم العثور على $file في السيرفر");
                    }
                } else {
                    showProgress("❌ فشل رفع $file");
                }
            }
        }
    }
}

// إنشاء اتصال FTP
$conn_id = ftp_connect($ftp_server);
if ($conn_id === false) {
    die("❌ فشل الاتصال بسيرفر FTP<br>\n");
}

showProgress("✅ تم الاتصال بنجاح");
showProgress("📂 جاري التحقق من المجلد على السيرفر...");

// تسجيل الدخول
if (!ftp_login($conn_id, $ftp_username, $ftp_password)) {
    die("❌ فشل تسجيل الدخول إلى FTP<br>\n");
}

showProgress("✅ تم تسجيل الدخول بنجاح");

// تفعيل الوضع السلبي
ftp_pasv($conn_id, true);

// عرض المجلد الحالي
showProgress("📂 المجلد الحالي على السيرفر: " . ftp_pwd($conn_id));

// إنشاء المجلد على السيرفر إذا لم يكن موجوداً
createRemoteDir($conn_id, $remote_dir);
showProgress("✅ تم إنشاء/التحقق من المجلد بنجاح");

// رفع مجلد assets
$assets_dir = $local_dir . DIRECTORY_SEPARATOR . 'assets';
if (is_dir($assets_dir)) {
    showProgress("📁 جاري رفع مجلد assets...");
    uploadDirectory($conn_id, $assets_dir, $remote_dir . 'assets');
}

// الملفات التي نريد رفعها
$files_to_upload = [
    'config.php',
    'index.php',
    'process.php'
];

// رفع كل ملف
foreach ($files_to_upload as $file) {
    $local_file = $local_dir . DIRECTORY_SEPARATOR . $file;
    if (file_exists($local_file)) {
        showProgress("📄 جاري رفع $file...");
        $remote_file = $remote_dir . $file;
        if (ftp_put($conn_id, $remote_file, $local_file, FTP_ASCII)) {
            if (checkFileExists($conn_id, $remote_file)) {
                showProgress("✅ تم رفع وتأكيد وجود $file بنجاح");
            } else {
                showProgress("⚠️ تم الرفع لكن لم يتم العثور على $file في السيرفر");
            }
        } else {
            showProgress("❌ فشل رفع $file");
        }
    } else {
        showProgress("⚠️ الملف $file غير موجود في " . $local_file);
    }
}

// عرض محتويات المجلد على السيرفر
showProgress("\n📂 محتويات المجلد على السيرفر:");
$files = ftp_nlist($conn_id, $remote_dir);
foreach ($files as $file) {
    showProgress("- " . basename($file));
}

// إغلاق الاتصال
ftp_close($conn_id);
showProgress("\n✅ تم إكمال عملية الرفع!");
showProgress("📤 جاري بدء عملية الرفع...");
showProgress("✅ تم اكتمال عملية الرفع بنجاح");
showProgress("👋 تم إغلاق الاتصال");
?>
