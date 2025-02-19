<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>استمارة المخططات النهائية</title>
    <!-- Bootstrap RTL -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Google Fonts - Cairo -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 800px;
            margin: 30px auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .nav-tabs .nav-link {
            color: #495057;
            border: none;
            padding: 15px 20px;
            border-radius: 0;
            position: relative;
        }
        .nav-tabs .nav-link.active {
            color: #0d6efd;
            background-color: transparent;
            border-bottom: 3px solid #0d6efd;
        }
        .tab-content {
            padding: 20px 0;
        }
        .form-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 12px;
            display: block;
        }
        .required-star {
            color: #dc3545;
        }
        .form-text {
            color: #6c757d;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }
        .form-navigation {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
        }
        .step-indicator {
            text-align: center;
            margin-bottom: 20px;
            color: #6c757d;
        }
        .step-buttons {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        .questions-counter {
            display: inline-block;
            padding: 2px 8px;
            margin-right: 8px;
            border-radius: 4px;
            font-size: 0.875rem;
            background-color: #e9ecef;
            color: #495057;
        }
        .custom-radio-group,
        .custom-check-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .form-check {
            margin-bottom: 8px;
        }
        .form-check-label {
            color: #495057;
            cursor: pointer;
        }
        .btn {
            padding: 8px 20px;
            font-weight: 600;
        }
        .alert {
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }
        #incompleteQuestionsList {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 8px;
            z-index: 1001;
            max-width: 90%;
            width: 500px;
            max-height: 80vh;
            overflow-y: auto;
        }
        .answers-summary {
            max-width: 800px;
            margin: 0 auto;
        }
        .answer-item {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            border-right: 4px solid #0d6efd;
        }
        .answer-item .question {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
        }
        .answer-item .answer {
            color: #0d6efd;
        }
        .no-answers {
            text-align: center;
            color: #6c757d;
            padding: 20px;
        }
        .file-info {
            font-family: monospace;
            background-color: #f8f9fa;
            padding: 5px 10px;
            border-radius: 4px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="form-container">
            <h2 class="text-center mb-4">استمارة المخططات النهائية</h2>
            <p class="text-muted text-center mb-4">الرجاء تزويدنا بالمعلومات اللازمة لإعداد المخططات النهائية. نود الإحاطة بأن أي تعديلات على المواصفات بعد تجهيز المخططات ستستلزم رسوماً إضافية</p>
            
            <form id="finalPlansForm" method="POST" action="process.php" enctype="multipart/form-data">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#step1">
                            معلومات أساسية
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step2">
                            الوحدات والعزل
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step3">
                            الارتفاعات
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step4">
                            الأنظمة الذكية
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step5">
                            التكييف
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step6">
                            خزانات المياه
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step7">
                            السباكة
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step8">
                            الأعمال الإنشائية
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step10">
                            مواصفات المصعد
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step9">
                            طلبات إضافية
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#answers-summary">
                            النتيجة
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="formTabsContent">
                    <!-- المرحلة الأولى -->
                    <div class="tab-pane fade show active" id="step1">
                        <div class="mb-4" id="question_0">
                            <label class="form-label">اسم المالك <span class="required-star">*</span></label>
                            <input type="text" class="form-control" name="owner_name" required>
                        </div>

                        <div class="mb-4" id="question_1">
                            <label class="form-label">رقم المشروع <span class="required-star">*</span></label>
                            <input type="text" class="form-control" name="project_number" placeholder="مثال: A 220800" required>
                            <div class="form-text">تجده في عنوان قروب الواتساب</div>
                        </div>

                        <div class="mb-4" id="question_2">
                            <label class="form-label">البريد الإلكتروني <span class="required-star">*</span></label>
                            <input type="email" 
                                   class="form-control" 
                                   name="email" 
                                   pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                                   oninvalid="this.setCustomValidity('الرجاء إدخال بريد إلكتروني صحيح')"
                                   oninput="this.setCustomValidity('')"
                                   placeholder="example@domain.com"
                                   required>
                            <div class="form-text">سيتم إرسال تأكيد استلام الاستمارة والمتابعة على هذا البريد</div>
                        </div>

                        <div class="mb-4" id="question_2_1">
                            <label class="form-label">رقم الجوال <span class="required-star">*</span></label>
                            <input type="tel" 
                                   class="form-control" 
                                   name="phone" 
                                   pattern="05[0-9]{8}"
                                   maxlength="10"
                                   placeholder="05xxxxxxxx"
                                   title="يجب أن يبدأ رقم الجوال بـ 05 ويتكون من 10 أرقام"
                                   required>
                            <div class="form-text">سيتم استخدام هذا الرقم للتواصل معك بخصوص المشروع</div>
                        </div>
                    </div>

                    <!-- المرحلة الثانية -->
                    <div class="tab-pane fade" id="step2">
                        <div class="mb-4" id="question_3">
                            <label class="form-label">عدد الوحدات السكنية <span class="required-star">*</span></label>
                            <div class="form-text">حدد عدد الوحدات حسب ما سيتم إخراج الرخصة عليه</div>
                            <div class="custom-radio-group">
                                <div class="form-check">
                                    <input class="form-check-input units-radio" type="radio" name="units_count" value="فيلا سكنية" required>
                                    <label class="form-check-label">فيلا سكنية</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input units-radio" type="radio" name="units_count" value="فيلا وشقة">
                                    <label class="form-check-label">فيلا وشقة</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input units-radio" type="radio" name="units_count" value="فيلا وشقتين">
                                    <label class="form-check-label">فيلا وشقتين</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input units-radio" type="radio" name="units_count" value="other">
                                    <label class="form-check-label">أخرى</label>
                                </div>
                                <div id="unitsOtherDiv" class="mt-2" style="display: none;">
                                    <input type="text" class="form-control" name="units_count_other" placeholder="حدد العدد">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4" id="question_4">
                            <label class="form-label">نوع العزل الحراري للحوائط الخارجية <span class="required-star">*</span></label>
                            <div class="form-text">اختيارك للعازل يؤثر على كمية الحديد المستخدمة في المبنى</div>
                            <div class="custom-radio-group">
                                <div class="form-check">
                                    <input class="form-check-input insulation-radio" type="radio" name="insulation_type" value="طابوق عازل بولسترين أزرق 20 سم" required>
                                    <label class="form-check-label">طابوق عازل بولسترين أزرق 20 سم - ( الخيار الأمثل )</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input insulation-radio" type="radio" name="insulation_type" value="بلك ابيض سيبوركس 20">
                                    <label class="form-check-label">بلك ابيض سيبوركس 20</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input insulation-radio" type="radio" name="insulation_type" value="بلك 15 + عازل5 + بلك 10">
                                    <label class="form-check-label">بلك 15 + عازل5 + بلك 10 (30 سم ) (زيادة تكلفة في التنفيذ)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input insulation-radio" type="radio" name="insulation_type" value="طابوق عازل بولسترين أزرق 30 سم">
                                    <label class="form-check-label">طابوق عازل بولسترين أزرق 30 سم - ضغط 35 (زيادة تكلفة في التنفيذ)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input insulation-radio" type="radio" name="insulation_type" value="other">
                                    <label class="form-check-label">أخرى</label>
                                </div>
                                <div id="insulationOtherDiv" class="mt-2" style="display: none;">
                                    <input type="text" class="form-control" name="insulation_type_other" placeholder="حدد نوع العزل">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- المرحلة الثالثة -->
                    <div class="tab-pane fade" id="step3">
                        <div class="alert alert-info mb-4">
                            <i class="fas fa-info-circle me-2"></i>
                            الارتفاع الصافي يُقاس من خرسانة الأرضية إلى السقف، دون احتساب 10 سم للتشطيبات أو السقف المستعار. ارتفاع أكثر من 360 سم قد يزيد سماكة بعض الأعمدة إلى 25 أو 30 سم وفقًا للحسابات الهندسية.
                        </div>

                        <div class="mb-4" id="question_5">
                            <label class="form-label">ارتفاع سقف الدور الأرضي <span class="required-star">*</span></label>
                            <div class="custom-radio-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ground_floor_height" value="330" required>
                                    <label class="form-check-label">330 م | 24 درجة <small class="text-success">(المعتاد)</small></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ground_floor_height" value="360">
                                    <label class="form-check-label">360 م | 26 درجة</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ground_floor_height" value="390">
                                    <label class="form-check-label">390 م | 28 درجة</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ground_floor_height" value="420">
                                    <label class="form-check-label">420 م | 30 درجة</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4" id="question_6">
                            <label class="form-label">ارتفاع سقف الدور الأول <span class="required-star">*</span></label>
                            <div class="custom-radio-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="first_floor_height" value="330" required>
                                    <label class="form-check-label">330 م | 24 درجة <small class="text-success">(المعتاد)</small></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="first_floor_height" value="360">
                                    <label class="form-check-label">360 م | 26 درجة</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="first_floor_height" value="390">
                                    <label class="form-check-label">390 م | 28 درجة</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="first_floor_height" value="420">
                                    <label class="form-check-label">420 م | 30 درجة</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4" id="question_7">
                            <label class="form-label">ارتفاع سقف الملحق <span class="required-star">*</span></label>
                            <div class="custom-radio-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="annex_height" value="300" required>
                                    <label class="form-check-label">300 م | 20 درجة <small class="text-success">(المعتاد)</small></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="annex_height" value="330">
                                    <label class="form-check-label">330 م | 22 درجة</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="annex_height" value="360">
                                    <label class="form-check-label">360 م | 24 درجة</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4" id="question_8">
                            <label class="form-label">ارتفاع الأبواب الداخلية <span class="required-star">*</span></label>
                            <div class="form-text">زيادة الارتفاع عن 240 قد يسبب زيادة في تكلفة قيمة الباب</div>
                            <div class="custom-radio-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="door_height" value="210" required>
                                    <label class="form-check-label">210 سم <small class="text-success">(المعتاد)</small></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="door_height" value="240">
                                    <label class="form-check-label">240 سم</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="door_height" value="260">
                                    <label class="form-check-label">260 سم</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="door_height" value="300">
                                    <label class="form-check-label">300 سم</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- المرحلة الرابعة -->
                    <div class="tab-pane fade" id="step4">
                        <!-- تجهيز البيت للنظام الذكي -->
                        <div class="mb-4" id="question_9">
                            <label class="form-label">هل تريد تجهيز البيت للنظام الذكي؟</label>
                            <div class="custom-radio-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="smart_home" value="yes">
                                    <label class="form-check-label">نعم</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="smart_home" value="no">
                                    <label class="form-check-label">لا</label>
                                </div>
                            </div>
                        </div>

                        <!-- مكان كاميرات المراقبة -->
                        <div class="mb-4" id="question_10">
                            <label class="form-label">مكان استقبال جهاز كاميرات المراقبة (CCTV) <span class="required-star">*</span></label>
                            <div class="custom-radio-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="cctv_location" value="مستودع" required>
                                    <label class="form-check-label">مستودع</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="cctv_location" value="الصالة">
                                    <label class="form-check-label">الصالة</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="cctv_location" value="المطبخ">
                                    <label class="form-check-label">المطبخ</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="cctv_location" value="other">
                                    <label class="form-check-label">أخرى</label>
                                </div>
                                <div class="mb-3 mt-2 d-none" id="cctvOtherDiv">
                                    <input type="text" class="form-control" name="cctv_location_other" placeholder="يرجى تحديد المكان">
                                </div>
                            </div>
                        </div>

                        <!-- مكان جهاز الجرس الداخلي -->
                        <div class="mb-4" id="question_11">
                            <label class="form-label">مكان جهاز الجرس الداخلي (Intercom) <span class="required-star">*</span></label>
                            <div class="custom-radio-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="intercom_location" value="الصالة" required>
                                    <label class="form-check-label">الصالة</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="intercom_location" value="المطبخ">
                                    <label class="form-check-label">المطبخ</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="intercom_location" value="other">
                                    <label class="form-check-label">أخرى</label>
                                </div>
                                <div class="mb-3 mt-2 d-none" id="intercomOtherDiv">
                                    <input type="text" class="form-control" name="intercom_location_other" placeholder="يرجى تحديد المكان">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- المرحلة الخامسة -->
                    <div class="tab-pane fade" id="step5">
                        <div class="mb-4" id="question_12">
                            <label class="form-label">نظام التكييف <span class="required-star">*</span></label>
                            <div class="form-text mb-3">جميع فراغات البيت سيتم تزويدها بمكيف السبليت ما عدا الفراغات التالية سيتم عملها كونسيلد (نظام التكييف المزود بمجاري للهواء)</div>
                            <div class="custom-check-group">
                                <div class="form-check">
                                    <input class="form-check-input ac-check" type="checkbox" name="ac_concealed[]" value="mens_majlis">
                                    <label class="form-check-label">مجلس الرجال</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input ac-check" type="checkbox" name="ac_concealed[]" value="womens_majlis">
                                    <label class="form-check-label">مجلس النساء</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input ac-check" type="checkbox" name="ac_concealed[]" value="main_hall">
                                    <label class="form-check-label">الصالة الرئيسية</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input ac-check" type="checkbox" name="ac_concealed[]" value="kitchen">
                                    <label class="form-check-label">المطبخ</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input ac-check" type="checkbox" name="ac_concealed[]" value="stairs_area">
                                    <label class="form-check-label">منطقة الدرج</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input ac-check" type="checkbox" name="ac_concealed[]" value="first_floor_hall">
                                    <label class="form-check-label">الصالة بالدور الأول</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input ac-check" type="checkbox" name="ac_concealed[]" value="master_bedroom">
                                    <label class="form-check-label">غرفة النوم الرئيسية</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="ac_concealed[]" value="other" id="ac_other_checkbox">
                                    <label class="form-check-label">أخرى</label>
                                    <div class="mt-2" id="ac_other_input" style="display: none;">
                                        <input type="text" class="form-control" name="ac_concealed_other" placeholder="يرجى التحديد">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- المرحلة السادسة -->
                    <div class="tab-pane fade" id="step6">
                        <div class="mb-4" id="question_13">
                            <label class="form-label">خزان الماء الخارجي <span class="required-star">*</span></label>
                            <div class="custom-radio-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="external_tank" value="under_garage" required>
                                    <label class="form-check-label">تحت كراج السيارة</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="external_tank" value="above_ground">
                                    <label class="form-check-label">فوق الأرض</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="external_tank" value="other" id="external_tank_other">
                                    <label class="form-check-label">أخرى</label>
                                    <div class="mt-2" id="external_tank_other_input" style="display: none;">
                                        <input type="text" class="form-control" name="external_tank_other_text" placeholder="يرجى التحديد">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4" id="question_14">
                            <label class="form-label">خزان السطح (خزان مياه الغسيل) <span class="required-star">*</span></label>
                            <div class="custom-radio-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="roof_tank" value="above_stairs" required>
                                    <label class="form-check-label">فوق بيت الدرج</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="roof_tank" value="above_room">
                                    <label class="form-check-label">فوق غرفة في السطح</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="roof_tank" value="roof_level">
                                    <label class="form-check-label">في نفس مستوى السطح مع مضخة</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="roof_tank" value="no_tank">
                                    <label class="form-check-label">لا أريد خزان فوق السطح</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="roof_tank" value="other" id="roof_tank_other">
                                    <label class="form-check-label">أخرى</label>
                                    <div class="mt-2" id="roof_tank_other_input" style="display: none;">
                                        <input type="text" class="form-control" name="roof_tank_other_text" placeholder="يرجى التحديد">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4" id="question_15">
                            <label class="form-label">خزان الماء الحلو <span class="required-star">*</span></label>
                            <div class="form-text mb-3">هل نعمل على تمديد مواصير للماء الحلو الخاص بالشرب</div>
                            <div class="custom-radio-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="drinking_water" value="yes" required>
                                    <label class="form-check-label">نعم</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="drinking_water" value="no">
                                    <label class="form-check-label">لا</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="drinking_water" value="other" id="drinking_water_other">
                                    <label class="form-check-label">أخرى</label>
                                    <div class="mt-2" id="drinking_water_other_input" style="display: none;">
                                        <input type="text" class="form-control" name="drinking_water_other_text" placeholder="يرجى التحديد">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- المرحلة السابعة -->
                    <div class="tab-pane fade" id="step7">
                        <div class="mb-4" id="question_16">
                            <label class="form-label">هل تريد عمل بيارة صرف صحي داخل أرضك؟ <span class="required-star">*</span></label>
                            <div class="form-text mb-3">يجب عليك عمل بيارة داخل أرضك اذا كانت أرضك غير متصلة بشبكة الصرف الصحي العامة</div>
                            <select class="form-select" name="sewage_tank" required>
                                <option value="">اختر إجابة</option>
                                <option value="yes">نعم، أريد بيارة</option>
                                <option value="no">لا، لا أريد بيارة</option>
                            </select>
                        </div>

                        <div class="mb-4" id="question_17">
                            <label class="form-label">كرسي الحمام <span class="required-star">*</span></label>
                            <div class="form-text mb-3">الأفضل أن تجتمع مع المكتب لتحديد نوع الأثاث لكل دورة مياه، أو الاكتفاء بتوحيد الكراسي</div>
                            <select class="form-select" name="toilet_type" id="toilet_type" required>
                                <option value="">اختر نوع كرسي الحمام</option>
                                <option value="normal">كرسي حمام عادي</option>
                                <option value="wall_mounted">كرسي حمام معلق مع سيفون مخفي</option>
                                <option value="wall_mounted_guest">كرسي حمام معلق في الضيافة والنوم الرئيسية</option>
                                <option value="other">أخرى</option>
                            </select>
                            <div class="mt-2" id="toilet_type_other_input" style="display: none;">
                                <input type="text" class="form-control" name="toilet_type_other_text" placeholder="يرجى التحديد">
                            </div>
                        </div>

                        <div class="mb-4" id="question_18">
                            <label class="form-label">سخان الماء <span class="required-star">*</span></label>
                            <div class="form-text mb-3">هل تريد عمل سخان لكل دورة مياه أو سخانة مركزية لمجموعة من دورات المياه</div>
                            <select class="form-select" name="water_heater" id="water_heater" required>
                                <option value="">اختر نوع سخان الماء</option>
                                <option value="external_individual">سخانة ماء خارجية لكل دورة مياه</option>
                                <option value="internal_individual">سخانة داخلية لكل دورة مياه</option>
                                <option value="central_unit">سخانة مركزية لكل وحدة سكنية</option>
                                <option value="central_floor">سخانة مركزية لكل دور</option>
                                <option value="central_house">سخانة مركزية واحدة للبيت بالكامل</option>
                                <option value="other">أخرى</option>
                            </select>
                            <div class="mt-2" id="water_heater_other_input" style="display: none;">
                                <input type="text" class="form-control" name="water_heater_other_text" placeholder="يرجى التحديد">
                            </div>
                        </div>

                        <div class="mb-4" id="question_19">
                            <label class="form-label">نوع المسبح <span class="required-star">*</span></label>
                            <select class="form-select" name="pool_type" id="pool_type" required>
                                <option value="">اختر نوع المسبح</option>
                                <option value="no_pool">لا يوجد مسبح</option>
                                <option value="overflow">أوفر فلو | Overflow</option>
                                <option value="skimmer">سكيمر | Skimmer</option>
                                <option value="other">أخرى</option>
                            </select>
                            <div class="mt-2" id="pool_type_other_input" style="display: none;">
                                <input type="text" class="form-control" name="pool_type_other_text" placeholder="يرجى التحديد">
                            </div>
                        </div>
                    </div>

                    <!-- المرحلة الثامنة -->
                    <div class="tab-pane fade" id="step8">
                        <div class="mb-4" id="question_20">
                            <label class="form-label">تسليح الأسقف <span class="required-star">*</span></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ceiling_reinforcement" id="ceiling_reinforcement" value="agree" required>
                                <label class="form-check-label" for="ceiling_reinforcement">اعتمد تصميم سقف الدور الأرضي والأول بنظام الهوردي وسقف الملحق بنظام العادي المصمت، وأنه بعض الفراغات التي لا يمكن عملها بالتسليح العادي سيتم عملها هوردي</label>
                            </div>
                        </div>

                        <div class="mb-4" id="question_21">
                            <label class="form-label">تصميم قواعد البيت لتتحمل <span class="required-star">*</span></label>
                            <div class="form-text mb-3">كلما زادت عدد الأدوار زادت تكلفة البناء بزيادة الحديد</div>
                            <select class="form-select" name="foundation_design" id="foundation_design" required>
                                <option value="">اختر عدد الأدوار</option>
                                <option value="one_floor">دور واحد، سقف الأرضي</option>
                                <option value="two_floors">دورين، سقف الأرضي والأول</option>
                                <option value="two_half_floors">دورين ونصف، سقف الارضي والأول والملحق</option>
                                <option value="three_floors">ثلاثة أدوار</option>
                                <option value="other">أخرى</option>
                            </select>
                            <div class="mt-2" id="foundation_design_other_input" style="display: none;">
                                <input type="text" class="form-control" name="foundation_design_other_text" placeholder="يرجى التحديد">
                            </div>
                        </div>
                    </div>

                    <!-- المرحلة التاسعة -->
                    <div class="tab-pane fade" id="step9">
                        <div class="mb-3" id="question_22">
                            <label class="form-label">طلبات إضافية <span class="required-star">*</span></label>
                            <textarea class="form-control" name="additional_requests" rows="5" placeholder="اكتب أي طلبات أو ملاحظات إضافية هنا..." required></textarea>
                            <div class="form-text">يرجى كتابة أي طلبات خاصة أو ملاحظات تريد إضافتها للمشروع</div>
                        </div>
                        
                        <div class="mb-4" id="question_23">
                            <label class="form-label">تقرير التربة <span class="required-star">*</span></label>
                            <input type="file" class="form-control" name="soil_report" required>
                            <div class="form-text">تقرير التربة اجباري، حسب تعليمات الأمانة</div>
                        </div>
                    </div>

                    <!-- المرحلة العاشرة -->
                    <div class="tab-pane fade" id="step10">
                        <div class="mb-4" id="question_24">
                            <label class="form-label">مواصفات المصعد <span class="required-star">*</span></label>
                            <div class="form-text mb-3">يرجى اختيار نوع المصعد المناسب لمشروعك</div>
                            <div class="custom-check-group">
                                <div class="form-check">
                                    <input class="form-check-input elevator-check" type="checkbox" name="elevator_specs[]" value="no_elevator">
                                    <label class="form-check-label">لا يوجد مصعد</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input elevator-check" type="checkbox" name="elevator_specs[]" value="hydraulic">
                                    <label class="form-check-label">هيدروليك</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input elevator-check" type="checkbox" name="elevator_specs[]" value="no_top_room">
                                    <label class="form-check-label">بدون غرفة علوية في السطح</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input elevator-check" type="checkbox" name="elevator_specs[]" value="two_sided">
                                    <label class="form-check-label">فتحة من جهتين</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input elevator-check" type="checkbox" name="elevator_specs[]" value="no_pit">
                                    <label class="form-check-label">بدون حفرة (بير)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input elevator-check" type="checkbox" name="elevator_specs[]" value="standard">
                                    <label class="form-check-label">العادي بغرفة وبير</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ملخص الإجابات -->
                    <div class="tab-pane fade" id="answers-summary" role="tabpanel">
                        <div class="container">
                            <h3 class="text-center mb-4">النتيجة</h3>
                            <div id="answers-container" class="answers-summary">
                                <!-- سيتم ملء هذا القسم ديناميكياً -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- تحديث قسم الأزرار -->
                <div class="form-navigation">
                    <div class="step-indicator">
                        الخطوة <span id="currentStepNumber">1</span> من <span id="totalSteps">10</span>
                    </div>
                    <div class="step-buttons">
                        <button type="button" class="btn btn-secondary" id="prevBtn" style="display: none;">السابق</button>
                        <button type="button" class="btn btn-primary" id="nextBtn">التالي</button>
                        <button type="submit" class="btn btn-success" id="submitBtn" style="display: none;">إرسال النموذج</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal-overlay"></div>
    <div id="incompleteQuestionsList">
        <h4>الأسئلة غير المكتملة</h4>
        <p>يرجى إكمال الأسئلة التالية:</p>
        <div class="questions-container"></div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

    <script>
    $(document).ready(function() {
        let currentTab = 0;
        const tabs = ['#step1', '#step2', '#step3', '#step4', '#step5', '#step6', '#step7', '#step8', '#step10', '#step9', '#answers-summary'];
        let formStarted = false;

        // التحقق من صحة الحقول في التبويب الحالي
        function validateCurrentTab() {
            const currentTabPane = $(tabs[currentTab]);
            const requiredFields = currentTabPane.find('[required]');
            let isValid = true;
            
            requiredFields.removeClass('is-invalid');
            requiredFields.next('.invalid-feedback').remove();

            requiredFields.each(function() {
                const field = $(this);
                if (!field.val()) {
                    isValid = false;
                    field.addClass('is-invalid');
                    if (!field.next('.invalid-feedback').length) {
                        field.after('<div class="invalid-feedback">هذا الحقل مطلوب</div>');
                    }
                } else if (field.attr('type') === 'radio') {
                    const name = field.attr('name');
                    if (!$(`input[name="${name}"]:checked`).length) {
                        isValid = false;
                        field.closest('.custom-radio-group').find('.invalid-feedback').remove();
                        field.closest('.custom-radio-group').append('<div class="invalid-feedback d-block">يرجى اختيار أحد الخيارات</div>');
                    }
                }
            });

            return isValid;
        }

        // تحديث أزرار التنقل مع إضافة حالة الإكمال
        function updateNavigationButtons() {
            const isLastTab = currentTab === tabs.length - 1;
            $('#prevBtn').toggle(currentTab > 0);
            $('#nextBtn').toggle(!isLastTab);
            $('#submitBtn').toggle(isLastTab);
            
            // تحديث حالة الأزرار في شريط التنقل
            $('.nav-tabs .nav-link').removeClass('completed current');
            for (let i = 0; i < currentTab; i++) {
                $(`button[data-bs-target="${tabs[i]}"]`).addClass('completed');
            }
            $(`button[data-bs-target="${tabs[currentTab]}"]`).addClass('current');
        }

        // تحديث مؤشر التقدم
        function updateProgress() {
            $('#currentStepNumber').text(currentTab + 1);
            $('#totalSteps').text(tabs.length);
            $('.progress-bar').css('width', Math.round((currentTab / (tabs.length - 1)) * 100) + '%').attr('aria-valuenow', Math.round((currentTab / (tabs.length - 1)) * 100));
        }

        // زر التالي مع التحقق
        $('#nextBtn').click(function() {
            if (validateCurrentTab()) {
                if (currentTab < tabs.length - 1) {
                    $(tabs[currentTab]).removeClass('show active');
                    currentTab++;
                    $(tabs[currentTab]).addClass('show active');
                    $(`button[data-bs-target="${tabs[currentTab]}"]`).tab('show');
                    updateNavigationButtons();
                    updateProgress();
                    $('html, body').animate({ scrollTop: 0 }, 'smooth');
                }
            } else {
                Swal.fire({
                    title: 'تنبيه',
                    text: 'يرجى ملء جميع الحقول المطلوبة قبل المتابعة',
                    icon: 'warning',
                    confirmButtonText: 'حسناً'
                });
            }
        });

        // زر السابق محدث
        $('#prevBtn').click(function() {
            if (currentTab > 0) {
                $(tabs[currentTab]).removeClass('show active');
                currentTab--;
                $(tabs[currentTab]).addClass('show active');
                $(`button[data-bs-target="${tabs[currentTab]}"]`).tab('show');
                updateNavigationButtons();
                updateProgress();
                $('html, body').animate({ scrollTop: 0 }, 'smooth');
            }
        });

        // التحقق من الحقول عند تغيير قيمتها
        $('input, select, textarea').on('change input', function() {
            const field = $(this);
            if (field.val()) {
                field.removeClass('is-invalid');
                field.next('.invalid-feedback').remove();
            }
        });

        // تهيئة الحالة الأولية
        updateNavigationButtons();
        updateProgress();
    });
    </script>
    
    <script>
        const MAX_FILE_SIZE = 5 * 1024 * 1024; // 5 ميجابايت
        const ALLOWED_FILE_TYPES = {
            'application/pdf': 'PDF',
            'image/jpeg': 'JPEG',
            'image/png': 'PNG'
        };
        
        // التحقق من صحة رقم الجوال السعودي
        function isValidSaudiPhone(phone) {
            const regex = /^(05[0-9]{8})$/;
            return regex.test(phone);
        }
        
        // التحقق من صحة البريد الإلكتروني
        function isValidEmail(email) {
            const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return regex.test(email);
        }
        
        // التحقق من الملف
        function isValidFile(file) {
            if (file.size > MAX_FILE_SIZE) {
                return {
                    valid: false,
                    error: `حجم الملف يتجاوز الحد المسموح به (${MAX_FILE_SIZE / 1024 / 1024} ميجابايت)`
                };
            }
            
            if (!ALLOWED_FILE_TYPES[file.type]) {
                return {
                    valid: false,
                    error: `نوع الملف غير مسموح به. الأنواع المسموحة: ${Object.values(ALLOWED_FILE_TYPES).join(', ')}`
                };
            }
            
            return { valid: true };
        }
        
        $(document).ready(function() {
            // إضافة خصائص التحقق لحقل رقم الجوال
            $('input[name="phone"]').attr({
                'pattern': '05[0-9]{8}',
                'maxlength': '10',
                'title': 'يجب أن يبدأ رقم الجوال بـ 05 ويتكون من 10 أرقام'
            }).on('input', function() {
                const phone = $(this).val();
                if (phone && !isValidSaudiPhone(phone)) {
                    $(this).addClass('is-invalid');
                    if (!$(this).next('.invalid-feedback').length) {
                        $(this).after('<div class="invalid-feedback">يجب إدخال رقم جوال سعودي صحيح يبدأ بـ 05</div>');
                    }
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).next('.invalid-feedback').remove();
                }
            });
            
            // إضافة خصائص التحقق لحقل البريد الإلكتروني
            $('input[type="email"]').on('input', function() {
                const email = $(this).val();
                if (email && !isValidEmail(email)) {
                    $(this).addClass('is-invalid');
                    if (!$(this).next('.invalid-feedback').length) {
                        $(this).after('<div class="invalid-feedback">يرجى إدخال بريد إلكتروني صحيح</div>');
                    }
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).next('.invalid-feedback').remove();
                }
            });
            
            // إضافة التحقق من الملفات
            $('input[type="file"]').attr({
                'accept': Object.keys(ALLOWED_FILE_TYPES).join(',')
            }).on('change', function() {
                const file = this.files[0];
                if (file) {
                    const validation = isValidFile(file);
                    if (!validation.valid) {
                        $(this).addClass('is-invalid');
                        if (!$(this).next('.invalid-feedback').length) {
                            $(this).after(`<div class="invalid-feedback">${validation.error}</div>`);
                        }
                        // إفراغ حقل الملف
                        $(this).val('');
                    } else {
                        $(this).removeClass('is-invalid');
                        $(this).next('.invalid-feedback').remove();
                    }
                }
            });
        });
    </script>
    
    <script>
        $(document).ready(function() {
            let currentTab = 0;
            const tabs = ['#step1', '#step2', '#step3', '#step4', '#step5', '#step6', '#step7', '#step8', '#step10', '#step9', '#answers-summary'];
            
            // تحديث عداد الأسئلة للتبويب
            function updateTabCount(tabId) {
                if (!formStarted) return;
                
                const tab = $(tabId);
                const questions = tab.find('.mb-4');
                let totalQuestions = 0;
                let completedQuestions = 0;

                questions.each(function() {
                    if ($(this).find('[required]').length > 0) {
                        totalQuestions++;
                        if (isQuestionComplete(this)) {
                            completedQuestions++;
                        }
                    }
                });

                const navLink = $(`button[data-bs-target="${tabId}"]`);
                const counter = navLink.find('.questions-counter');
                
                counter.text(`${completedQuestions}/${totalQuestions}`);
                
                if (totalQuestions > 0) {
                    if (completedQuestions === totalQuestions) {
                        navLink.removeClass('incomplete').addClass('complete');
                        counter.removeClass('incomplete').addClass('complete');
                    } else {
                        navLink.removeClass('complete').addClass('incomplete');
                        counter.removeClass('complete').addClass('incomplete');
                    }
                }
            }

            // تحديث جميع العدادات
            function updateAllTabsCount() {
                if (!formStarted) return;
                tabs.forEach(tabId => updateTabCount(tabId));
            }

            // التحقق من اكتمال سؤال
            function isQuestionComplete(questionDiv) {
                if (!formStarted) return true;
                
                const $question = $(questionDiv);
                const requiredInputs = $question.find('[required]');
                let isComplete = true;

                requiredInputs.each(function() {
                    const input = $(this);
                    if (input.is('input[type="radio"]') || input.is('input[type="checkbox"]')) {
                        const name = input.attr('name');
                        if (!$(`input[name="${name}"]:checked`).length) {
                            isComplete = false;
                            return false;
                        }
                    } else if (input.is('select')) {
                        if (!input.val()) {
                            isComplete = false;
                            return false;
                        }
                    } else {
                        if (!input.val().trim()) {
                            isComplete = false;
                            return false;
                        }
                    }
                });

                return isComplete;
            }

            // زر التالي
            $('#nextBtn').click(function() {
                formStarted = true;
                if (validateCurrentTab()) {
                    if (currentTab < tabs.length - 1) {
                        $(tabs[currentTab]).removeClass('show active');
                        currentTab++;
                        $(tabs[currentTab]).addClass('show active');
                        $(`button[data-bs-target="${tabs[currentTab]}"]`).tab('show');
                        updateNavigationButtons();
                        updateProgress();
                        updateAllTabsCount();
                    }
                }
            });

            // إضافة مراقب للتفاعل مع النموذج
            $('#finalPlansForm').on('input change', 'input, select, textarea', function() {
                if (!formStarted) formStarted = true;
                updateAllTabsCount();
            });
        });
    </script>
    
    <script>
        $(document).ready(function() {
            let currentTab = 0;
            const tabs = ['#step1', '#step2', '#step3', '#step4', '#step5', '#step6', '#step7', '#step8', '#step10', '#step9', '#answers-summary'];
            
            // تحديث أزرار التنقل
            function updateNavigationButtons() {
                const isLastTab = currentTab === tabs.length - 1;
                $('#prevBtn').toggle(currentTab > 0);
                $('#nextBtn').toggle(!isLastTab);
                $('#submitBtn').toggle(isLastTab);
            }

            // تحديث مؤشر التقدم
            function updateProgress() {
                $('#currentStepNumber').text(currentTab + 1);
                $('#totalSteps').text(tabs.length);
            }

            // زر التالي
            $('#nextBtn').click(function() {
                if (currentTab < tabs.length - 1) {
                    $(tabs[currentTab]).removeClass('show active');
                    currentTab++;
                    $(tabs[currentTab]).addClass('show active');
                    $(`button[data-bs-target="${tabs[currentTab]}"]`).tab('show');
                    updateNavigationButtons();
                    updateProgress();
                }
            });

            // زر السابق
            $('#prevBtn').click(function() {
                if (currentTab > 0) {
                    $(tabs[currentTab]).removeClass('show active');
                    currentTab--;
                    $(tabs[currentTab]).addClass('show active');
                    $(`button[data-bs-target="${tabs[currentTab]}"]`).tab('show');
                    updateNavigationButtons();
                    updateProgress();
                }
            });

            // معالجة إرسال النموذج
            $('#finalPlansForm').on('submit', function(e) {
                e.preventDefault();
                
                // التحقق من جميع الحقول المطلوبة
                let isValid = true;
                const requiredFields = $(this).find('[required]');
                const incompleteQuestions = [];
                
                requiredFields.each(function() {
                    const field = $(this);
                    const questionLabel = field.closest('.mb-4').find('.form-label').first().text().trim();
                    
                    if (field.attr('type') === 'radio') {
                        const name = field.attr('name');
                        if (!$(`input[name="${name}"]:checked`).length) {
                            isValid = false;
                            if (!incompleteQuestions.includes(questionLabel)) {
                                incompleteQuestions.push(questionLabel);
                            }
                        }
                    } else if (!field.val() || field.val().trim() === '') {
                        isValid = false;
                        if (!incompleteQuestions.includes(questionLabel)) {
                            incompleteQuestions.push(questionLabel);
                        }
                    }
                });
                
                if (!isValid) {
                    const questionsList = incompleteQuestions.map(q => `<li>${q}</li>`).join('');
                    Swal.fire({
                        title: 'تنبيه',
                        html: `
                            <div class="text-right">
                                <p>يرجى إكمال الأسئلة التالية قبل إرسال النموذج:</p>
                                <ul class="text-right" style="list-style-position: inside;">
                                    ${questionsList}
                                </ul>
                            </div>
                        `,
                        icon: 'warning',
                        confirmButtonText: 'حسناً'
                    });
                    return;
                }
                
                // إرسال النموذج
                const formData = new FormData(this);
                $('#submitBtn').prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> جاري الإرسال...');
                
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                title: 'تم الإرسال بنجاح!',
                                text: 'شكراً لك. سنقوم بمراجعة طلبك والرد عليك قريباً.',
                                icon: 'success',
                                confirmButtonText: 'حسناً'
                            }).then(() => window.location.reload());
                        } else {
                            throw new Error(response.message || 'حدث خطأ غير متوقع');
                        }
                    },
                    error: function(xhr) {
                        let errorMessage = 'حدث خطأ أثناء إرسال النموذج. الرجاء المحاولة مرة أخرى.';
                        if (xhr.responseJSON?.errors) {
                            const errorsList = Object.values(xhr.responseJSON.errors)
                                .map(error => `<li>${error}</li>`).join('');
                            errorMessage = `
                                <div class="text-right">
                                    <p>يرجى تصحيح الأخطاء التالية:</p>
                                    <ul class="text-right" style="list-style-position: inside;">
                                        ${errorsList}
                                    </ul>
                                </div>
                            `;
                        }
                        Swal.fire({
                            title: 'خطأ!',
                            html: errorMessage,
                            icon: 'error',
                            confirmButtonText: 'حسناً'
                        });
                    },
                    complete: function() {
                        $('#submitBtn').prop('disabled', false).text('إرسال');
                    }
                });
            });
        });
    </script>
    
    <script>
        function updateAnswersSummary() {
            const answersContainer = document.getElementById('answers-container');
            answersContainer.innerHTML = '';
            
            let hasAnswers = false;
            let answersMap = new Map();
            
            // قائمة النصوص التي يجب تجاهلها
            const ignoreTexts = [
                'اختر إجابة',
                'اختر نوع كرسي الحمام',
                'اختر نوع سخان الماء',
                'اختر نوع المسبح',
                'اختر عدد الادوار'
            ];
            
            // البحث عن جميع عناصر الإدخال في النموذج
            const inputs = document.querySelectorAll(`
                input[type="radio"]:checked, 
                input[type="checkbox"]:checked, 
                input[type="text"]:not([value=""]), 
                input[type="email"]:not([value=""]),
                input[type="tel"]:not([value=""]),
                input[type="file"],
                select:not([value=""]),
                textarea:not(:empty)
            `);
            
            inputs.forEach(input => {
                let questionElement = input.closest('.mb-4')?.querySelector('label');
                if (!questionElement) {
                    questionElement = input.closest('.form-group')?.querySelector('label') || 
                                    input.closest('.tab-pane')?.querySelector('h4');
                }
                if (!questionElement) return;
                
                const question = questionElement.textContent.trim().replace(' *', '');
                let answer = '';
                
                if (input.type === 'file') {
                    const files = Array.from(input.files);
                    if (files.length > 0) {
                        answer = files.map(file => {
                            const size = (file.size / 1024 / 1024).toFixed(2);
                            return `${file.name} (${size} MB)`;
                        }).join('، ');
                    }
                } else if (input.type === 'radio' || input.type === 'checkbox') {
                    const optionLabel = input.closest('.form-check')?.querySelector('.form-check-label');
                    if (optionLabel) {
                        answer = optionLabel.textContent.trim();
                    }
                } else if (input.tagName.toLowerCase() === 'select') {
                    const selectedOption = input.querySelector('option:checked');
                    if (selectedOption && selectedOption.value !== '') {
                        answer = selectedOption.textContent.trim();
                    }
                } else if (input.tagName.toLowerCase() === 'textarea') {
                    answer = input.value.trim();
                } else {
                    answer = input.value.trim();
                }
                
                if (answer && !ignoreTexts.includes(answer)) {
                    hasAnswers = true;
                    if (answersMap.has(question)) {
                        answersMap.get(question).push(answer);
                    } else {
                        answersMap.set(question, [answer]);
                    }
                }
            });
            
            // معالجة خاصة للطلبات الإضافية
            const additionalRequests = document.querySelector('textarea[name="additional_requests"]');
            if (additionalRequests && additionalRequests.value.trim()) {
                hasAnswers = true;
                answersMap.set('الطلبات الإضافية', [additionalRequests.value.trim()]);
            }
            
            if (hasAnswers) {
                answersMap.forEach((answers, question) => {
                    const answerItem = document.createElement('div');
                    answerItem.className = 'answer-item';
                    
                    const questionDiv = document.createElement('div');
                    questionDiv.className = 'question';
                    questionDiv.textContent = question;
                    
                    const answerDiv = document.createElement('div');
                    answerDiv.className = 'answer';
                    answerDiv.textContent = answers.join('، ');
                    
                    answerItem.appendChild(questionDiv);
                    answerItem.appendChild(answerDiv);
                    answersContainer.appendChild(answerItem);
                });
            } else {
                answersContainer.innerHTML = '<div class="text-center text-muted">لم يتم إدخال أي إجابات بعد</div>';
            }
        }

        // تحديث ملخص الإجابات عند تغيير أي إجابة
        document.querySelectorAll('input, textarea, select').forEach(element => {
            element.addEventListener('change', updateAnswersSummary);
        });
        
        // تحديث ملخص الإجابات عند تحميل الصفحة
        document.addEventListener('DOMContentLoaded', updateAnswersSummary);
        
        // تحديث ملخص الإجابات عند النقر على تبويب الملخص
        document.getElementById('answers-summary-tab').addEventListener('click', updateAnswersSummary);
    </script>
</body>
</html>
