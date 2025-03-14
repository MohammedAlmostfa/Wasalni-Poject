<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'يجب قبول :attribute.',
    'accepted_if' => 'يجب قبول :attribute عندما يكون :other يساوي :value.',
    'active_url' => ':attribute يجب أن يكون رابطًا صالحًا.',
    'after' => ':attribute يجب أن يكون تاريخًا بعد :date.',
    'after_or_equal' => ':attribute يجب أن يكون تاريخًا بعد أو يساوي :date.',
    'alpha' => ':attribute يجب أن يحتوي على أحرف فقط.',
    'alpha_dash' => ':attribute يجب أن يحتوي على أحرف وأرقام وشرطات فقط.',
    'alpha_num' => ':attribute يجب أن يحتوي على أحرف وأرقام فقط.',
    'array' => ':attribute يجب أن يكون مصفوفة.',
    'ascii' => ':attribute يجب أن يحتوي على أحرف وأرقام ورموز أحادية البايت فقط.',
    'before' => ':attribute يجب أن يكون تاريخًا قبل :date.',
    'before_or_equal' => ':attribute يجب أن يكون تاريخًا قبل أو يساوي :date.',
    'between' => [
        'array' => ':attribute يجب أن يحتوي على عدد عناصر بين :min و :max.',
        'file' => ':attribute يجب أن يكون حجمه بين :min و :max كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون بين :min و :max.',
        'string' => ':attribute يجب أن يكون طوله بين :min و :max أحرف.',
    ],
    'boolean' => ':attribute يجب أن يكون صحيحًا أو خاطئًا.',
    'can' => ':attribute يحتوي على قيمة غير مصرح بها.',
    'confirmed' => ':attribute التأكيد غير متطابق.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => ':attribute يجب أن يكون تاريخًا صالحًا.',
    'date_equals' => ':attribute يجب أن يكون تاريخًا يساوي :date.',
    'date_format' => ':attribute يجب أن يتطابق مع الصيغة :format.',
    'decimal' => ':attribute يجب أن يحتوي على :decimal منازل عشرية.',
    'declined' => ':attribute يجب أن يتم رفضه.',
    'declined_if' => ':attribute يجب أن يتم رفضه عندما يكون :other يساوي :value.',
    'different' => ':attribute و :other يجب أن يكونا مختلفين.',
    'digits' => ':attribute يجب أن يكون :digits أرقامًا.',
    'digits_between' => ':attribute يجب أن يكون بين :min و :max أرقامًا.',
    'dimensions' => ':attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => ':attribute يحتوي على قيمة مكررة.',
    'doesnt_end_with' => ':attribute يجب ألا ينتهي بأحد القيم التالية: :values.',
    'doesnt_start_with' => ':attribute يجب ألا يبدأ بأحد القيم التالية: :values.',
    'email' => ':attribute يجب أن يكون عنوان بريد إلكتروني صالحًا.',
    'ends_with' => ':attribute يجب أن ينتهي بأحد القيم التالية: :values.',
    'enum' => 'القيمة المحددة لـ :attribute غير صالحة.',
    'exists' => 'القيمة المحددة لـ :attribute غير صالحة.',
    'extensions' => ':attribute يجب أن يحتوي على أحد الامتدادات التالية: :values.',
    'file' => ':attribute يجب أن يكون ملفًا.',
    'filled' => ':attribute يجب أن يحتوي على قيمة.',
    'gt' => [
        'array' => ':attribute يجب أن يحتوي على أكثر من :value عناصر.',
        'file' => ':attribute يجب أن يكون أكبر من :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أكبر من :value.',
        'string' => ':attribute يجب أن يكون أطول من :value أحرف.',
    ],
    'gte' => [
        'array' => ':attribute يجب أن يحتوي على :value عناصر أو أكثر.',
        'file' => ':attribute يجب أن يكون أكبر من أو يساوي :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أكبر من أو يساوي :value.',
        'string' => ':attribute يجب أن يكون أطول من أو يساوي :value أحرف.',
    ],
    'hex_color' => ':attribute يجب أن يكون لونًا سداسيًا صالحًا.',
    'image' => ':attribute يجب أن يكون صورة.',
    'in' => 'القيمة المحددة لـ :attribute غير صالحة.',
    'in_array' => ':attribute يجب أن يكون موجودًا في :other.',
    'integer' => ':attribute يجب أن يكون عددًا صحيحًا.',
    'ip' => ':attribute يجب أن يكون عنوان IP صالحًا.',
    'ipv4' => ':attribute يجب أن يكون عنوان IPv4 صالحًا.',
    'ipv6' => ':attribute يجب أن يكون عنوان IPv6 صالحًا.',
    'json' => ':attribute يجب أن يكون نصًا JSON صالحًا.',
    'lowercase' => ':attribute يجب أن يكون بأحرف صغيرة.',
    'lt' => [
        'array' => ':attribute يجب أن يحتوي على أقل من :value عناصر.',
        'file' => ':attribute يجب أن يكون أصغر من :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أصغر من :value.',
        'string' => ':attribute يجب أن يكون أقصر من :value أحرف.',
    ],
    'lte' => [
        'array' => ':attribute يجب ألا يحتوي على أكثر من :value عناصر.',
        'file' => ':attribute يجب أن يكون أصغر من أو يساوي :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أصغر من أو يساوي :value.',
        'string' => ':attribute يجب أن يكون أقصر من أو يساوي :value أحرف.',
    ],
    'mac_address' => ':attribute يجب أن يكون عنوان MAC صالحًا.',
    'max' => [
        'array' => ':attribute يجب ألا يحتوي على أكثر من :max عناصر.',
        'file' => ':attribute يجب ألا يكون أكبر من :max كيلوبايت.',
        'numeric' => ':attribute يجب ألا يكون أكبر من :max.',
        'string' => ':attribute يجب ألا يكون أطول من :max أحرف.',
    ],
    'max_digits' => ':attribute يجب ألا يحتوي على أكثر من :max أرقامًا.',
    'mimes' => ':attribute يجب أن يكون ملفًا من نوع: :values.',
    'mimetypes' => ':attribute يجب أن يكون ملفًا من نوع: :values.',
    'min' => [
        'array' => ':attribute يجب أن يحتوي على الأقل :min عناصر.',
        'file' => ':attribute يجب أن يكون على الأقل :min كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون على الأقل :min.',
        'string' => ':attribute يجب أن يكون على الأقل :min أحرف.',
    ],
    'min_digits' => ':attribute يجب أن يحتوي على الأقل :min أرقامًا.',
    'missing' => ':attribute يجب أن يكون غير موجود.',
    'missing_if' => ':attribute يجب أن يكون غير موجود عندما يكون :other يساوي :value.',
    'missing_unless' => ':attribute يجب أن يكون غير موجود إلا إذا كان :other يساوي :value.',
    'missing_with' => ':attribute يجب أن يكون غير موجود عندما تكون :values موجودة.',
    'missing_with_all' => ':attribute يجب أن يكون غير موجود عندما تكون جميع :values موجودة.',
    'multiple_of' => ':attribute يجب أن يكون مضاعفًا لـ :value.',
    'not_in' => 'القيمة المحددة لـ :attribute غير صالحة.',
    'not_regex' => 'صيغة :attribute غير صالحة.',
    'numeric' => ':attribute يجب أن يكون رقمًا.',
    'password' => [
        'letters' => ':attribute يجب أن يحتوي على حرف واحد على الأقل.',
        'mixed' => ':attribute يجب أن يحتوي على حرف كبير وحرف صغير على الأقل.',
        'numbers' => ':attribute يجب أن يحتوي على رقم واحد على الأقل.',
        'symbols' => ':attribute يجب أن يحتوي على رمز واحد على الأقل.',
        'uncompromised' => ':attribute ظهر في تسريب بيانات. الرجاء اختيار قيمة أخرى.',
    ],
    'present' => ':attribute يجب أن يكون موجودًا.',
    'present_if' => ':attribute يجب أن يكون موجودًا عندما يكون :other يساوي :value.',
    'present_unless' => ':attribute يجب أن يكون موجودًا إلا إذا كان :other يساوي :value.',
    'present_with' => ':attribute يجب أن يكون موجودًا عندما تكون :values موجودة.',
    'present_with_all' => ':attribute يجب أن يكون موجودًا عندما تكون جميع :values موجودة.',
    'prohibited' => ':attribute ممنوع.',
    'prohibited_if' => ':attribute ممنوع عندما يكون :other يساوي :value.',
    'prohibited_unless' => ':attribute ممنوع إلا إذا كان :other موجودًا في :values.',
    'prohibits' => ':attribute يمنع وجود :other.',
    'regex' => 'صيغة :attribute غير صالحة.',
    'required' => ':attribute مطلوب.',
    'required_array_keys' => ':attribute يجب أن يحتوي على قيم لـ: :values.',
    'required_if' => ':attribute مطلوب عندما يكون :other يساوي :value.',
    'required_if_accepted' => ':attribute مطلوب عندما يتم قبول :other.',
    'required_unless' => ':attribute مطلوب إلا إذا كان :other موجودًا في :values.',
    'required_with' => ':attribute مطلوب عندما تكون :values موجودة.',
    'required_with_all' => ':attribute مطلوب عندما تكون جميع :values موجودة.',
    'required_without' => ':attribute مطلوب عندما لا تكون :values موجودة.',
    'required_without_all' => ':attribute مطلوب عندما لا تكون أي من :values موجودة.',
    'same' => ':attribute يجب أن يتطابق مع :other.',
    'size' => [
        'array' => ':attribute يجب أن يحتوي على :size عناصر.',
        'file' => ':attribute يجب أن يكون :size كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون :size.',
        'string' => ':attribute يجب أن يكون :size أحرف.',
    ],
    'starts_with' => ':attribute يجب أن يبدأ بأحد القيم التالية: :values.',
    'string' => ':attribute يجب أن يكون نصًا.',
    'timezone' => ':attribute يجب أن يكون منطقة زمنية صالحة.',
    'unique' => ':attribute تم استخدامه مسبقًا.',
    'uploaded' => ':attribute فشل في التحميل.',
    'uppercase' => ':attribute يجب أن يكون بأحرف كبيرة.',
    'url' => ':attribute يجب أن يكون رابطًا صالحًا.',
    'ulid' => ':attribute يجب أن يكون ULID صالحًا.',
    'uuid' => ':attribute يجب أن يكون UUID صالحًا.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'رسالة مخصصة',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'email' => 'البريد الإلكتروني',
        'password' => 'كلمة المرور',
        'first_name' => 'الاسم الأول',
        'last_name' => 'اسم العائلة',
        'gender' => 'الجنس',
        'birthday' => 'تاريخ الميلاد',
        'phone' => 'رقم الهاتف',
        'address' => 'العنوان',
        'country_id' => 'اسم الدولة',
        'city_name' => 'اسم المدينة',
        'country_name' => 'اسم الدولة',
        'trip_id' => ' الرحلة',
        'status' => 'الحالة',
        'seats_number' => 'عدد المقاعد',
        'user_id' => ' المستخدم',
        'favorite_user_id' => 'معرف المستخدم المفضل',
        'booking_id' => ' الحجز',
        'rate' => 'التقييم',
        'review' => 'المراجعة',
        'description' => 'الوصف',
        'trip_start' => 'بداية الرحلة',
        'from' => 'المدينة المنطلقة منها',
        'to' => 'المدينة المنطلقة إليها',
        'seat_price' => 'سعر المقعد',
        'available_seats' => 'المقاعد المتاحة',
        'code' => 'رمز التحقق',
    ],

];
