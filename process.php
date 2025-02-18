<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'طريقة الطلب غير صحيحة']);
    exit;
}

try {
    // التحقق من البيانات المطلوبة
    $requiredFields = [
        'owner_name' => 'اسم المالك',
        'units_count' => 'عدد الوحدات السكنية',
        'floor_height' => 'ارتفاع الدور',
        'annex_height' => 'ارتفاع سقف الملحق'
    ];

    $errors = [];
    foreach ($requiredFields as $field => $label) {
        if (empty($_POST[$field])) {
            $errors[] = "حقل {$label} مطلوب";
        }
    }

    if (!empty($errors)) {
        throw new Exception(implode("\n", $errors));
    }

    // تنظيف وتحضير البيانات
    $formData = array_map('strip_tags', $_POST);
    
    // إضافة تاريخ الإرسال
    $formData['submission_date'] = date('Y-m-d H:i:s');
    
    // حفظ البيانات في قاعدة البيانات
    $columns = implode(', ', array_keys($formData));
    $values = implode(', ', array_fill(0, count($formData), '?'));
    
    $stmt = $pdo->prepare("INSERT INTO form_submissions ({$columns}) VALUES ({$values})");
    $stmt->execute(array_values($formData));
    
    // معالجة الملفات المرفقة إن وجدت
    if (!empty($_FILES)) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        foreach ($_FILES as $fileKey => $file) {
            if ($file['error'] === UPLOAD_ERR_OK) {
                $fileName = time() . '_' . basename($file['name']);
                $filePath = $uploadDir . $fileName;
                
                if (move_uploaded_file($file['tmp_name'], $filePath)) {
                    // تحديث السجل بمسار الملف
                    $stmt = $pdo->prepare("UPDATE form_submissions SET {$fileKey}_path = ? WHERE id = LAST_INSERT_ID()");
                    $stmt->execute([$filePath]);
                }
            }
        }
    }
    
    echo json_encode([
        'status' => 'success',
        'message' => 'تم إرسال النموذج بنجاح'
    ]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}