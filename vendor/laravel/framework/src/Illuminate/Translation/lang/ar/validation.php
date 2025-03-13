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

    'accepted' => 'يجب قبول حقل :attribute.',
    'accepted_if' => 'يجب قبول حقل :attribute عندما يكون :other يساوي :value.',
    'active_url' => 'حقل :attribute يجب أن يكون رابطًا صالحًا.',
    'after' => 'حقل :attribute يجب أن يكون تاريخًا بعد :date.',
    'after_or_equal' => 'حقل :attribute يجب أن يكون تاريخًا بعد أو يساوي :date.',
    'alpha' => 'حقل :attribute يجب أن يحتوي على أحرف فقط.',
    'alpha_dash' => 'حقل :attribute يجب أن يحتوي على أحرف وأرقام وشرطات فقط.',
    'alpha_num' => 'حقل :attribute يجب أن يحتوي على أحرف وأرقام فقط.',
    'array' => 'حقل :attribute يجب أن يكون مصفوفة.',
    'ascii' => 'حقل :attribute يجب أن يحتوي على أحرف وأرقام ورموز أحادية البايت فقط.',
    'before' => 'حقل :attribute يجب أن يكون تاريخًا قبل :date.',
    'before_or_equal' => 'حقل :attribute يجب أن يكون تاريخًا قبل أو يساوي :date.',
    'between' => [
        'array' => 'حقل :attribute يجب أن يحتوي على عدد عناصر بين :min و :max.',
        'file' => 'حقل :attribute يجب أن يكون حجمه بين :min و :max كيلوبايت.',
        'numeric' => 'حقل :attribute يجب أن يكون بين :min و :max.',
        'string' => 'حقل :attribute يجب أن يكون طوله بين :min و :max أحرف.',
    ],
    'boolean' => 'حقل :attribute يجب أن يكون صحيحًا أو خاطئًا.',
    'can' => 'حقل :attribute يحتوي على قيمة غير مصرح بها.',
    'confirmed' => 'حقل :attribute التأكيد غير متطابق.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'حقل :attribute يجب أن يكون تاريخًا صالحًا.',
    'date_equals' => 'حقل :attribute يجب أن يكون تاريخًا يساوي :date.',
    'date_format' => 'حقل :attribute يجب أن يتطابق مع الصيغة :format.',
    'decimal' => 'حقل :attribute يجب أن يحتوي على :decimal منازل عشرية.',
    'declined' => 'حقل :attribute يجب أن يتم رفضه.',
    'declined_if' => 'حقل :attribute يجب أن يتم رفضه عندما يكون :other يساوي :value.',
    'different' => 'حقل :attribute و :other يجب أن يكونا مختلفين.',
    'digits' => 'حقل :attribute يجب أن يكون :digits أرقامًا.',
    'digits_between' => 'حقل :attribute يجب أن يكون بين :min و :max أرقامًا.',
    'dimensions' => 'حقل :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'حقل :attribute يحتوي على قيمة مكررة.',
    'doesnt_end_with' => 'حقل :attribute يجب ألا ينتهي بأحد القيم التالية: :values.',
    'doesnt_start_with' => 'حقل :attribute يجب ألا يبدأ بأحد القيم التالية: :values.',
    'email' => 'حقل :attribute يجب أن يكون عنوان بريد إلكتروني صالحًا.',
    'ends_with' => 'حقل :attribute يجب أن ينتهي بأحد القيم التالية: :values.',
    'enum' => 'القيمة المحددة لحقل :attribute غير صالحة.',
    'exists' => 'القيمة المحددة لحقل :attribute غير صالحة.',
    'extensions' => 'حقل :attribute يجب أن يحتوي على أحد الامتدادات التالية: :values.',
    'file' => 'حقل :attribute يجب أن يكون ملفًا.',
    'filled' => 'حقل :attribute يجب أن يحتوي على قيمة.',
    'gt' => [
        'array' => 'حقل :attribute يجب أن يحتوي على أكثر من :value عناصر.',
        'file' => 'حقل :attribute يجب أن يكون أكبر من :value كيلوبايت.',
        'numeric' => 'حقل :attribute يجب أن يكون أكبر من :value.',
        'string' => 'حقل :attribute يجب أن يكون أطول من :value أحرف.',
    ],
    'gte' => [
        'array' => 'حقل :attribute يجب أن يحتوي على :value عناصر أو أكثر.',
        'file' => 'حقل :attribute يجب أن يكون أكبر من أو يساوي :value كيلوبايت.',
        'numeric' => 'حقل :attribute يجب أن يكون أكبر من أو يساوي :value.',
        'string' => 'حقل :attribute يجب أن يكون أطول من أو يساوي :value أحرف.',
    ],
    'hex_color' => 'حقل :attribute يجب أن يكون لونًا سداسيًا صالحًا.',
    'image' => 'حقل :attribute يجب أن يكون صورة.',
    'in' => 'القيمة المحددة لحقل :attribute غير صالحة.',
    'in_array' => 'حقل :attribute يجب أن يكون موجودًا في :other.',
    'integer' => 'حقل :attribute يجب أن يكون عددًا صحيحًا.',
    'ip' => 'حقل :attribute يجب أن يكون عنوان IP صالحًا.',
    'ipv4' => 'حقل :attribute يجب أن يكون عنوان IPv4 صالحًا.',
    'ipv6' => 'حقل :attribute يجب أن يكون عنوان IPv6 صالحًا.',
    'json' => 'حقل :attribute يجب أن يكون نصًا JSON صالحًا.',
    'lowercase' => 'حقل :attribute يجب أن يكون بأحرف صغيرة.',
    'lt' => [
        'array' => 'حقل :attribute يجب أن يحتوي على أقل من :value عناصر.',
        'file' => 'حقل :attribute يجب أن يكون أصغر من :value كيلوبايت.',
        'numeric' => 'حقل :attribute يجب أن يكون أصغر من :value.',
        'string' => 'حقل :attribute يجب أن يكون أقصر من :value أحرف.',
    ],
    'lte' => [
        'array' => 'حقل :attribute يجب ألا يحتوي على أكثر من :value عناصر.',
        'file' => 'حقل :attribute يجب أن يكون أصغر من أو يساوي :value كيلوبايت.',
        'numeric' => 'حقل :attribute يجب أن يكون أصغر من أو يساوي :value.',
        'string' => 'حقل :attribute يجب أن يكون أقصر من أو يساوي :value أحرف.',
    ],
    'mac_address' => 'حقل :attribute يجب أن يكون عنوان MAC صالحًا.',
    'max' => [
        'array' => 'حقل :attribute يجب ألا يحتوي على أكثر من :max عناصر.',
        'file' => 'حقل :attribute يجب ألا يكون أكبر من :max كيلوبايت.',
        'numeric' => 'حقل :attribute يجب ألا يكون أكبر من :max.',
        'string' => 'حقل :attribute يجب ألا يكون أطول من :max أحرف.',
    ],
    'max_digits' => 'حقل :attribute يجب ألا يحتوي على أكثر من :max أرقامًا.',
    'mimes' => 'حقل :attribute يجب أن يكون ملفًا من نوع: :values.',
    'mimetypes' => 'حقل :attribute يجب أن يكون ملفًا من نوع: :values.',
    'min' => [
        'array' => 'حقل :attribute يجب أن يحتوي على الأقل :min عناصر.',
        'file' => 'حقل :attribute يجب أن يكون على الأقل :min كيلوبايت.',
        'numeric' => 'حقل :attribute يجب أن يكون على الأقل :min.',
        'string' => 'حقل :attribute يجب أن يكون على الأقل :min أحرف.',
    ],
    'min_digits' => 'حقل :attribute يجب أن يحتوي على الأقل :min أرقامًا.',
    'missing' => 'حقل :attribute يجب أن يكون غير موجود.',
    'missing_if' => 'حقل :attribute يجب أن يكون غير موجود عندما يكون :other يساوي :value.',
    'missing_unless' => 'حقل :attribute يجب أن يكون غير موجود إلا إذا كان :other يساوي :value.',
    'missing_with' => 'حقل :attribute يجب أن يكون غير موجود عندما تكون :values موجودة.',
    'missing_with_all' => 'حقل :attribute يجب أن يكون غير موجود عندما تكون جميع :values موجودة.',
    'multiple_of' => 'حقل :attribute يجب أن يكون مضاعفًا لـ :value.',
    'not_in' => 'القيمة المحددة لحقل :attribute غير صالحة.',
    'not_regex' => 'صيغة حقل :attribute غير صالحة.',
    'numeric' => 'حقل :attribute يجب أن يكون رقمًا.',
    'password' => [
        'letters' => 'حقل :attribute يجب أن يحتوي على حرف واحد على الأقل.',
        'mixed' => 'حقل :attribute يجب أن يحتوي على حرف كبير وحرف صغير على الأقل.',
        'numbers' => 'حقل :attribute يجب أن يحتوي على رقم واحد على الأقل.',
        'symbols' => 'حقل :attribute يجب أن يحتوي على رمز واحد على الأقل.',
        'uncompromised' => 'حقل :attribute ظهر في تسريب بيانات. الرجاء اختيار قيمة أخرى.',
    ],
    'present' => 'حقل :attribute يجب أن يكون موجودًا.',
    'present_if' => 'حقل :attribute يجب أن يكون موجودًا عندما يكون :other يساوي :value.',
    'present_unless' => 'حقل :attribute يجب أن يكون موجودًا إلا إذا كان :other يساوي :value.',
    'present_with' => 'حقل :attribute يجب أن يكون موجودًا عندما تكون :values موجودة.',
    'present_with_all' => 'حقل :attribute يجب أن يكون موجودًا عندما تكون جميع :values موجودة.',
    'prohibited' => 'حقل :attribute ممنوع.',
    'prohibited_if' => 'حقل :attribute ممنوع عندما يكون :other يساوي :value.',
    'prohibited_unless' => 'حقل :attribute ممنوع إلا إذا كان :other موجودًا في :values.',
    'prohibits' => 'حقل :attribute يمنع وجود :other.',
    'regex' => 'صيغة حقل :attribute غير صالحة.',
    'required' => 'حقل :attribute مطلوب.',
    'required_array_keys' => 'حقل :attribute يجب أن يحتوي على قيم لـ: :values.',
    'required_if' => 'حقل :attribute مطلوب عندما يكون :other يساوي :value.',
    'required_if_accepted' => 'حقل :attribute مطلوب عندما يتم قبول :other.',
    'required_unless' => 'حقل :attribute مطلوب إلا إذا كان :other موجودًا في :values.',
    'required_with' => 'حقل :attribute مطلوب عندما تكون :values موجودة.',
    'required_with_all' => 'حقل :attribute مطلوب عندما تكون جميع :values موجودة.',
    'required_without' => 'حقل :attribute مطلوب عندما لا تكون :values موجودة.',
    'required_without_all' => 'حقل :attribute مطلوب عندما لا تكون أي من :values موجودة.',
    'same' => 'حقل :attribute يجب أن يتطابق مع :other.',
    'size' => [
        'array' => 'حقل :attribute يجب أن يحتوي على :size عناصر.',
        'file' => 'حقل :attribute يجب أن يكون :size كيلوبايت.',
        'numeric' => 'حقل :attribute يجب أن يكون :size.',
        'string' => 'حقل :attribute يجب أن يكون :size أحرف.',
    ],
    'starts_with' => 'حقل :attribute يجب أن يبدأ بأحد القيم التالية: :values.',
    'string' => 'حقل :attribute يجب أن يكون نصًا.',
    'timezone' => 'حقل :attribute يجب أن يكون منطقة زمنية صالحة.',
    'unique' => 'حقل :attribute تم استخدامه مسبقًا.',
    'uploaded' => 'حقل :attribute فشل في التحميل.',
    'uppercase' => 'حقل :attribute يجب أن يكون بأحرف كبيرة.',
    'url' => 'حقل :attribute يجب أن يكون رابطًا صالحًا.',
    'ulid' => 'حقل :attribute يجب أن يكون ULID صالحًا.',
    'uuid' => 'حقل :attribute يجب أن يكون UUID صالحًا.',

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
        'from' => 'المدينةالمنطلق منها',
        'to' => 'المدينةالمنطلق اليها',
        'seat_price' => 'سعر المقعد',
        'available_seats' => 'المقاعد المتاحة',

    ],

];
