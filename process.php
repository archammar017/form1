<?php
// تفعيل عرض الأخطاء للتطوير
error_reporting(E_ALL);
ini_set('display_errors', 1);

// التحقق من أن الطلب هو POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // تجهيز البيانات
        $full_name = $_POST['full_name'] ?? 'غير محدد';
        $phone = $_POST['phone'] ?? 'غير محدد';
        $email = $_POST['email'] ?? 'غير محدد';
        $job = $_POST['job'] ?? 'غير محدد';
        $land_address = $_POST['land_address'] ?? 'غير محدد';
        $land_size = $_POST['land_size'] ?? 'غير محدد';
        $building_area = $_POST['building_area'] ?? 'غير محدد';
        $facade_design = $_POST['facade_design'] ?? 'غير محدد';
        $floors = $_POST['floors'] ?? 'غير محدد';
        $foundation = $_POST['foundation'] ?? 'غير محدد';
        $additions = $_POST['additions'] ?? 'غير محدد';
        $other_requests = $_POST['other_requests'] ?? 'غير محدد';

        // معالجة الملف المرفق
        $attachment_info = '';
        if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
            $file = $_FILES['attachment'];
            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];
            $file_size = $file['size'];
            
            // إنشاء مجلد للمرفقات إذا لم يكن موجوداً
            $upload_dir = __DIR__ . '/uploads/';
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
            
            // نقل الملف
            $new_file_name = time() . '_' . $file_name;
            $file_path = $upload_dir . $new_file_name;
            
            if (move_uploaded_file($file_tmp, $file_path)) {
                $attachment_info = "
🔗 *المرفق:* $file_name
📦 *حجم الملف:* " . round($file_size / 1024 / 1024, 2) . " MB";
            }
        }

        // تنسيق الرسالة لتيليجرام
        $message = "
🏗️ *طلب تصميم معماري جديد*

👤 *الاسم:* $full_name
📱 *الجوال:* $phone
📧 *البريد:* $email
💼 *المهنة:* $job

📍 *معلومات الأرض:*
🗺️ *العنوان:* $land_address
📐 *مساحة الأرض:* $land_size
🏢 *مساحة البناء:* $building_area

🎨 *تفاصيل التصميم:*
🏛️ *تصميم الواجهة:* $facade_design
🏗️ *عدد الأدوار:* $floors
🔨 *نوع الأساس:* $foundation
➕ *الإضافات:* $additions

📝 *طلبات أخرى:*
$other_requests
$attachment_info

⏰ *وقت الطلب:* " . date('Y-m-d H:i:s') . "
";

        // إرسال إلى تيليجرام
        $telegram_token = '6889676608:AAGgqF1L1Jf-GhSuWHzaLjGYuZVXjKqnxoM';
        $chat_id = '-4014今6今4今0今1今6'; // تم إخفاء بعض الأرقام
        
        // تنظيف رقم الدردشة
        $chat_id = str_replace('今', '', $chat_id);
        
        $telegram_api_url = "https://api.telegram.org/bot$telegram_token/sendMessage";
        $params = [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'Markdown'
        ];

        // إرسال الطلب إلى تيليجرام
        $ch = curl_init($telegram_api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $telegram_response = curl_exec($ch);
        curl_close($ch);

        if ($telegram_response === false) {
            throw new Exception("فشل في إرسال الرسالة إلى تيليجرام");
        }

        // إرسال استجابة نجاح
        http_response_code(200);
        echo json_encode(['status' => 'success', 'message' => 'تم إرسال الطلب بنجاح']);

    } catch (Exception $e) {
        // تسجيل الخطأ
        error_log("Error: " . $e->getMessage());
        
        // إرسال استجابة خطأ
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ أثناء معالجة طلبك']);
    }
} else {
    // إذا لم يكن الطلب POST
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'طريقة الطلب غير مسموح بها']);
}
?>
