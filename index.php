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
            margin-bottom: 15px;
            font-size: 0.9rem;
        }
        .custom-radio-group .form-check {
            margin-bottom: 10px;
        }
        /* أنماط التبويبات العمودية */
        .vertical-tabs {
            display: flex;
            min-height: 500px;
            margin: 20px 0;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .tabs-navigation {
            width: 280px;
            background: #f8f9fa;
            border-radius: 10px 0 0 10px;
            border-right: 1px solid #dee2e6;
            padding: 20px 0;
        }
        .tab-content {
            flex: 1;
            padding: 25px;
            background: #fff;
            border-radius: 0 10px 10px 0;
        }
        /* أنماط الروابط */
        .nav-pills .nav-link {
            padding: 12px 20px;
            color: #495057;
            border-right: 3px solid transparent;
            border-radius: 0;
            margin: 5px 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .nav-pills .nav-link:hover {
            background: #e9ecef;
        }
        .nav-pills .nav-link.active {
            background: #fff;
            color: #0d6efd;
            border-right-color: #0d6efd;
            font-weight: 600;
        }
        /* أنماط الأقسام */
        .tab-section {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #dee2e6;
        }
        .tab-section:last-child {
            border-bottom: none;
        }
        .tab-section-title {
            color: #6c757d;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 10px 20px;
        }
        .progress-indicator {
            position: fixed;
            top: 0;
            right: 0;
            padding: 10px 20px;
            background: #fff;
            border-radius: 0 0 0 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            z-index: 1000;
        }
        .completion-text {
            font-weight: 600;
            color: #0d6efd;
        }
        /* نمط مجموعة الأسئلة */
        .mb-4 {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px !important;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        /* نمط عداد الأسئلة */
        .questions-counter {
            background-color: #e9ecef;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            color: #495057;
            margin-right: 8px;
            font-weight: 600;
        }
        .nav-link .questions-counter {
            margin-right: auto;
        }
        /* أنماط حالة التبويبات */
        .nav-link.incomplete {
            color: #dc3545 !important;
            background-color: #f8d7da !important;
        }
        .nav-link.complete {
            color: #198754 !important;
            background-color: #d1e7dd !important;
        }
        .questions-counter.incomplete {
            background-color: #dc3545 !important;
            color: #fff !important;
        }
        .questions-counter.complete {
            background-color: #198754 !important;
            color: #fff !important;
        }
        /* تأثير الاهتزاز */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        .shake {
            animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;
        }
        /* تمييز السؤال غير المكتمل */
        .question-incomplete {
            border: 2px solid #dc3545 !important;
            background-color: #fff5f5 !important;
            padding: 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        /* تنسيق قائمة الأسئلة غير المكتملة */
        #incompleteQuestionsList {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
            max-width: 80%;
            max-height: 80vh;
            overflow-y: auto;
            direction: rtl;
        }
        #incompleteQuestionsList h3 {
            color: #dc3545;
            margin-bottom: 15px;
        }
        .incomplete-question-link {
            display: block;
            padding: 8px;
            margin: 5px 0;
            color: #dc3545;
            cursor: pointer;
            text-decoration: none;
            border-bottom: 1px solid #eee;
        }
        .incomplete-question-link:hover {
            background: #f8f9fa;
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
            width: 90%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
            direction: rtl;
        }

        .questions-container {
            margin-top: 15px;
        }

        .incomplete-question-link {
            display: block;
            padding: 10px;
            margin: 5px 0;
            background: #f8f9fa;
            border-radius: 4px;
            color: #dc3545;
            text-decoration: none;
            cursor: pointer;
        }

        .incomplete-question-link:hover {
            background: #e9ecef;
        }

        .question-incomplete {
            animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both;
            transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
            perspective: 1000px;
            border: 2px solid #dc3545;
            border-radius: 8px;
            padding: 15px;
        }

        @keyframes shake {
            10%, 90% { transform: translate3d(-1px, 0, 0); }
            20%, 80% { transform: translate3d(2px, 0, 0); }
            30%, 50%, 70% { transform: translate3d(-4px, 0, 0); }
            40%, 60% { transform: translate3d(4px, 0, 0); }
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="progress-indicator">
            <span class="completion-text">0% مكتمل</span>
        </div>
        <div class="form-container">
            <h2 class="text-center mb-4">استمارة المخططات النهائية</h2>
            <p class="text-muted text-center mb-4">الرجاء تزويدنا بالمعلومات اللازمة لإعداد المخططات النهائية. نود الإحاطة بأن أي تعديلات على المواصفات بعد تجهيز المخططات ستستلزم رسوماً إضافية</p>
            
            <form id="finalPlansForm" method="POST" action="process.php" enctype="multipart/form-data">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#step1">
                            معلومات أساسية
                            <span class="questions-counter">0/0</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step2">
                            الوحدات والعزل
                            <span class="questions-counter">0/0</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step3">
                            الارتفاعات
                            <span class="questions-counter">0/0</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step4">
                            الأنظمة الذكية
                            <span class="questions-counter">0/0</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step5">
                            التكييف
                            <span class="questions-counter">0/0</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step6">
                            خزانات المياه
                            <span class="questions-counter">0/0</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step7">
                            السباكة
                            <span class="questions-counter">0/0</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step8">
                            الأعمال الإنشائية
                            <span class="questions-counter">0/0</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step10">
                            مواصفات المصعد
                            <span class="questions-counter">0/0</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#step9">
                            طلبات إضافية
                            <span class="questions-counter">0/0</span>
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
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-secondary" id="prevBtn">السابق</button>
                    <button type="button" class="btn btn-primary" id="nextBtn">التالي</button>
                    <button type="submit" class="btn btn-success" id="submitBtn" style="display: none;">ارسال النموذج</button>
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
    <!-- Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            let currentTab = 0;
            const tabs = ['#step1', '#step2', '#step3', '#step4', '#step5', '#step6', '#step7', '#step8', '#step10', '#step9'];
            
            // دوال التحقق من اكتمال النموذج
            
            // التحقق من اكتمال سؤال واحد
            function isQuestionComplete(questionDiv) {
                const $question = $(questionDiv);
                
                // التحقق من الحقول المطلوبة
                const requiredInputs = $question.find('[required]');
                let isComplete = true;

                requiredInputs.each(function() {
                    const input = $(this);
                    
                    if (input.is('input[type="radio"]') || input.is('input[type="checkbox"]')) {
                        // للراديو والتشيك بوكس
                        const name = input.attr('name');
                        const checked = $question.find(`input[name="${name}"]:checked`).length;
                        if (!checked) {
                            isComplete = false;
                            return false;
                        }
                    } else if (input.is('select')) {
                        // للقوائم المنسدلة
                        if (!input.val()) {
                            isComplete = false;
                            return false;
                        }
                    } else if (input.is('input[type="file"]')) {
                        // للملفات
                        if (!input.get(0).files.length) {
                            isComplete = false;
                            return false;
                        }
                    } else {
                        // للحقول النصية
                        if (!input.val().trim()) {
                            isComplete = false;
                            return false;
                        }
                    }
                });

                // التحقق من خيارات المصعد إذا كانت موجودة
                const elevatorChecks = $question.find('input[name="elevator_specs[]"]');
                if (elevatorChecks.length > 0) {
                    isComplete = elevatorChecks.filter(':checked').length > 0;
                }

                return isComplete;
            }

            // التحقق من اكتمال تبويب
            function checkTabCompletion(tabId) {
                const tab = $(tabId);
                const questions = tab.find('.mb-4');
                let totalQuestions = 0;
                let completedQuestions = 0;

                questions.each(function() {
                    if ($(this).find('[required]').length > 0 || $(this).find('input[name="elevator_specs[]"]').length > 0) {
                        totalQuestions++;
                        if (isQuestionComplete(this)) {
                            completedQuestions++;
                        }
                    }
                });

                return {
                    total: totalQuestions,
                    completed: completedQuestions,
                    isComplete: totalQuestions > 0 && completedQuestions === totalQuestions
                };
            }

            // تحديث حالة جميع التبويبات
            function highlightIncompleteTabs() {
                const tabs = ['#step1', '#step2', '#step3', '#step4', '#step5', '#step6', '#step7', '#step8', '#step10', '#step9'];
                let hasIncomplete = false;

                tabs.forEach(tabId => {
                    const status = checkTabCompletion(tabId);
                    const navLink = $(`button[data-bs-target="${tabId}"]`);
                    const counter = navLink.find('.questions-counter');

                    if (status.total > 0) {
                        if (status.isComplete) {
                            navLink.removeClass('incomplete').addClass('complete');
                            counter.removeClass('incomplete').addClass('complete');
                        } else {
                            navLink.removeClass('complete').addClass('incomplete');
                            counter.removeClass('complete').addClass('incomplete');
                            hasIncomplete = true;
                        }
                    }
                });

                return hasIncomplete;
            }

            // معالجة إرسال النموذج
            $('#finalPlansForm').on('submit', function(e) {
                e.preventDefault(); // منع الإرسال الافتراضي
                
                // إعادة تعيين حالة الأخطاء
                $('.form-control, .form-select, .form-check-input').removeClass('is-invalid');
                $('.invalid-feedback').remove();
                
                // جمع الأسئلة غير المكتملة
                const incompleteQuestions = [];
                let isValid = true;

                // التحقق من كل تبويب
                tabs.forEach((tabId, index) => {
                    const $tab = $(tabId);
                    
                    // التحقق من الحقول المطلوبة
                    $tab.find('[required]').each(function() {
                        const $field = $(this);
                        const $question = $field.closest('.mb-4');
                        const questionLabel = $question.find('.form-label').text().trim();
                        
                        let fieldValid = true;
                        
                        // التحقق من نوع الحقل
                        if ($field.is(':radio, :checkbox')) {
                            const name = $field.attr('name');
                            if (!$(`[name="${name}"]:checked`).length) {
                                fieldValid = false;
                            }
                        } else if ($field.is('select')) {
                            if (!$field.val() || $field.val() === '') {
                                fieldValid = false;
                            }
                        } else {
                            if (!$field.val().trim()) {
                                fieldValid = false;
                            }
                        }
                        
                        if (!fieldValid) {
                            isValid = false;
                            $field.addClass('is-invalid');
                            
                            // إضافة رسالة خطأ
                            if (!$field.next('.invalid-feedback').length) {
                                $field.after(`<div class="invalid-feedback">هذا الحقل مطلوب</div>`);
                            }
                            
                            // إضافة السؤال إلى قائمة غير المكتملة
                            if (!incompleteQuestions.includes(questionLabel)) {
                                incompleteQuestions.push(questionLabel);
                            }
                            
                            // تمييز التبويب كغير مكتمل
                            $(`.nav-link[data-bs-target="${tabId}"]`).addClass('incomplete');
                        }
                    });
                });

                if (!isValid) {
                    // عرض قائمة الأسئلة غير المكتملة
                    const $list = $('#incompleteQuestionsList');
                    const $overlay = $('.modal-overlay');
                    
                    let questionsHtml = '<h4>الأسئلة غير المكتملة:</h4><ul>';
                    incompleteQuestions.forEach(q => {
                        questionsHtml += `<li>${q}</li>`;
                    });
                    questionsHtml += '</ul>';
                    questionsHtml += '<button class="btn btn-primary mt-3" onclick="closeIncompleteList()">حسناً</button>';
                    
                    $list.html(questionsHtml);
                    $list.show();
                    $overlay.show();
                    
                    // التمرير إلى أول سؤال غير مكتمل
                    const $firstIncomplete = $('.is-invalid').first();
                    if ($firstIncomplete.length) {
                        const $tab = $firstIncomplete.closest('.tab-pane');
                        const tabId = $tab.attr('id');
                        
                        // تفعيل التبويب المحتوي على الخطأ
                        $(`.nav-link[data-bs-target="#${tabId}"]`).tab('show');
                        
                        // التمرير إلى الحقل
                        $('html, body').animate({
                            scrollTop: $firstIncomplete.offset().top - 100
                        }, 500);
                    }
                    
                    return false;
                }

                // إذا كان النموذج صحيحاً، قم بإرساله
                const formData = new FormData(this);
                
                // تعطيل زر الإرسال لمنع الإرسال المتكرر
                $('#submitBtn').prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> جاري الإرسال...');
                
                // إرسال النموذج
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status === 'success') {
                            // عرض رسالة النجاح
                            Swal.fire({
                                title: 'تم الإرسال بنجاح!',
                                text: 'شكراً لك. سنقوم بمراجعة طلبك والرد عليك قريباً.',
                                icon: 'success',
                                confirmButtonText: 'حسناً'
                            }).then((result) => {
                                // إعادة تحميل الصفحة بعد الإرسال الناجح
                                window.location.reload();
                            });
                        } else {
                            throw new Error(response.message || 'حدث خطأ غير متوقع');
                        }
                    },
                    error: function(xhr, status, error) {
                        // عرض رسالة الخطأ
                        Swal.fire({
                            title: 'خطأ!',
                            text: xhr.responseJSON?.message || 'حدث خطأ أثناء إرسال النموذج. الرجاء المحاولة مرة أخرى.',
                            icon: 'error',
                            confirmButtonText: 'حسناً'
                        });
                    },
                    complete: function() {
                        // إعادة تفعيل زر الإرسال
                        $('#submitBtn').prop('disabled', false).text('إرسال النموذج');
                    }
                });
            });
            
            // معالجة النقر على سؤال غير مكتمل
            $(document).on('click', '.incomplete-question-link', function() {
                const tabId = $(this).data('tab');
                const questionId = $(this).data('question-id');
                
                // تفعيل التبويب المطلوب
                $(`button[data-bs-target="${tabId}"]`).click();
                
                // الانتقال إلى السؤال
                const questionElement = $(`#${questionId}`);
                if (questionElement.length) {
                    // إزالة التمييز السابق
                    $('.question-incomplete').removeClass('question-incomplete');
                    
                    // تمييز السؤال الحالي
                    questionElement.addClass('question-incomplete');
                    
                    // الانتقال إلى السؤال
                    setTimeout(() => {
                        $('html, body').animate({
                            scrollTop: questionElement.offset().top - 100
                        }, 500);
                    }, 300);
                }
                
                // إخفاء القائمة
                $('.modal-overlay, #incompleteQuestionsList').hide();
            });
            
            // إغلاق القائمة عند النقر خارجها
            $('.modal-overlay').click(function() {
                $('.modal-overlay, #incompleteQuestionsList').hide();
            });

            // التحقق من اختيار خيار واحد على الأقل للمصعد
            $('.elevator-check').change(function() {
                updateAllTabsCount();
            });

            // إظهار/إخفاء حقل الإدخال الإضافي للتكييف
            $('#ac_other_checkbox').change(function() {
                if ($(this).is(':checked')) {
                    $('#ac_other_input').show();
                    $('input[name="ac_concealed_other"]').prop('required', true);
                } else {
                    $('#ac_other_input').hide();
                    $('input[name="ac_concealed_other"]').prop('required', false);
                }
            });

            // إظهار/إخفاء حقول الإدخال الإضافية للخزانات
            $('#external_tank_other').change(function() {
                if ($(this).is(':checked')) {
                    $('#external_tank_other_input').show();
                    $('input[name="external_tank_other_text"]').prop('required', true);
                } else {
                    $('#external_tank_other_input').hide();
                    $('input[name="external_tank_other_text"]').prop('required', false);
                }
            });

            $('#roof_tank_other').change(function() {
                if ($(this).is(':checked')) {
                    $('#roof_tank_other_input').show();
                    $('input[name="roof_tank_other_text"]').prop('required', true);
                } else {
                    $('#roof_tank_other_input').hide();
                    $('input[name="roof_tank_other_text"]').prop('required', false);
                }
            });

            $('#drinking_water_other').change(function() {
                if ($(this).is(':checked')) {
                    $('#drinking_water_other_input').show();
                    $('input[name="drinking_water_other_text"]').prop('required', true);
                } else {
                    $('#drinking_water_other_input').hide();
                    $('input[name="drinking_water_other_text"]').prop('required', false);
                }
            });

            // إظهار/إخفاء حقول الإدخال الإضافية لأعمال السباكة
            $('#sewage_tank_other, #toilet_type_other, #water_heater_other, #pool_type_other').change(function() {
                const inputId = $(this).attr('id');
                const otherInputDiv = '#' + inputId + '_input';
                const otherInputField = 'input[name="' + inputId + '_text"]';
                
                if ($(this).is(':checked')) {
                    $(otherInputDiv).show();
                    $(otherInputField).prop('required', true);
                } else {
                    $(otherInputDiv).hide();
                    $(otherInputField).prop('required', false);
                }
            });

            // إظهار/إخفاء حقل الإدخال الإضافي لكرسي الحمام
            $('#toilet_type').change(function() {
                if ($(this).val() === 'other') {
                    $('#toilet_type_other_input').show();
                    $('input[name="toilet_type_other_text"]').prop('required', true);
                } else {
                    $('#toilet_type_other_input').hide();
                    $('input[name="toilet_type_other_text"]').prop('required', false);
                }
            });

            // إظهار/إخفاء حقل الإدخال الإضافي لسخان الماء
            $('#water_heater').change(function() {
                if ($(this).val() === 'other') {
                    $('#water_heater_other_input').show();
                    $('input[name="water_heater_other_text"]').prop('required', true);
                } else {
                    $('#water_heater_other_input').hide();
                    $('input[name="water_heater_other_text"]').prop('required', false);
                }
            });

            // إظهار/إخفاء حقل الإدخال الإضافي لنوع المسبح
            $('#pool_type').change(function() {
                if ($(this).val() === 'other') {
                    $('#pool_type_other_input').show();
                    $('input[name="pool_type_other_text"]').prop('required', true);
                } else {
                    $('#pool_type_other_input').hide();
                    $('input[name="pool_type_other_text"]').prop('required', false);
                }
            });

            // إظهار/إخفاء حقل الإدخال الإضافي لتصميم القواعد
            $('#foundation_design').change(function() {
                if ($(this).val() === 'other') {
                    $('#foundation_design_other_input').show();
                    $('input[name="foundation_design_other_text"]').prop('required', true);
                } else {
                    $('#foundation_design_other_input').hide();
                    $('input[name="foundation_design_other_text"]').prop('required', false);
                }
            });

            // إظهار/إخفاء حقل الإدخال الإضافي لتصميم تسليح الأسقف
            $('#ceiling_reinforcement').change(function() {
                if ($(this).val() === 'other') {
                    $('#ceiling_reinforcement_other_input').show();
                    $('input[name="ceiling_reinforcement_other_text"]').prop('required', true);
                } else {
                    $('#ceiling_reinforcement_other_input').hide();
                    $('input[name="ceiling_reinforcement_other_text"]').prop('required', false);
                }
            });

            function updateAllTabsCount() {
                ['#step1', '#step2', '#step3', '#step4', '#step5', '#step6', '#step7', '#step8', '#step10', '#step9'].forEach(tabId => {
                    updateTabCount(tabId);
                });
            }

            // تحديث عداد الأسئلة
            function updateTabCount(tabId) {
                const tab = $(tabId);
                const questions = tab.find('.mb-4');
                let totalQuestions = 0;
                let completedQuestions = 0;

                questions.each(function() {
                    if ($(this).find('[required]').length > 0 || $(this).find('input[name="elevator_specs[]"]').length > 0) {
                        totalQuestions++;
                        if (isQuestionComplete(this)) {
                            completedQuestions++;
                        }
                    }
                });

                const counterElement = $(`button[data-bs-target="${tabId}"] .questions-counter`);
                if (totalQuestions > 0) {
                    if (completedQuestions === totalQuestions) {
                        counterElement.text(`${completedQuestions}/${totalQuestions}`);
                        counterElement.css('background-color', '#d1e7dd').css('color', '#0a3622');
                    } else {
                        counterElement.text(`${completedQuestions}/${totalQuestions}`);
                        counterElement.css('background-color', '#e9ecef').css('color', '#495057');
                    }
                } else {
                    counterElement.text('0/0');
                    counterElement.css('background-color', '#e9ecef').css('color', '#495057');
                }
            }

            // التحديث الأولي
            updateAllTabsCount();
            
            // تحديث أزرار التنقل
            function updateNavigationButtons() {
                const isLastTab = currentTab === tabs.length - 1;
                $('#prevBtn').toggle(currentTab > 0);
                $('#nextBtn').toggle(!isLastTab);
                $('#submitBtn').toggle(isLastTab);
                
                // تحديث النص على الزر
                if (isLastTab) {
                    $('#submitBtn').show();
                    $('#nextBtn').hide();
                } else {
                    $('#submitBtn').hide();
                    $('#nextBtn').show();
                }
            }

            // عند النقر على أي تبويب
            $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
                const targetId = $(e.target).data('bs-target');
                currentTab = tabs.indexOf(targetId);
                updateNavigationButtons();
                updateProgress();
            });

            // عند النقر على زر التالي
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

            // عند النقر على زر السابق
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

            // تحديث حالة الأزرار عند بدء التحميل
            updateNavigationButtons();
        });
    </script>
</body>
</html>
