@extends('Admin.layouts.main')

@section('pageTitle')
    إضافة مشتريات
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        /* تصميم الهواتف المحمولة */
        @media (max-width: 767px) {
            #main.mobile-design {
                /* إضافة أنماط CSS للهواتف المحمولة هنا */
            }
        }

        /* تصميم الأجهزة اللوحية والحواسيب الشخصية */
        @media (min-width: 768px) {
            #main.desktop-design {
                /* إضافة أنماط CSS للأجهزة اللوحية والحواسيب الشخصية هنا */
            }
        }
    </style>
@endsection


@section('Content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>إدراج مشتريات جديدة</h1>

        </div><!-- نهاية عنوان الصفحة -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <div class="card mt-5">
                            <div class="card-body">
                                <h5 class="card-title">نموذج المشتريات</h5>

                                <!-- نموذج عدة أعمدة -->
                                <form id="form" method="post" class="row g-3">
                                    @csrf
                                    <div class="col-md-6">
                                        <label class="mb-2" for="form-label">معلومات المورد</label>
                                        <select class="form-select" aria-label="State" id="sup_id" name="sup_id">
                                            <option value="">اختر موردًا</option>
                                        </select>
                                        <small id="sup_id_error" class="form-text text-danger"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="payment_method" class="form-label">طريقة الدفع</label>
                                        <select class="form-select" id="payment_method" name="payment_method" required>
                                            <option value="نقد">نقد</option>
                                            <option value="آجل">آجل</option>
                                        </select>
                                        <small id="payment_method_error" class="form-text text-danger"></small>
                                    </div>

                                    <!-- قسم تفاصيل الشراء -->
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <label for="pro_id" class="form-label">رقم المنتج</label>
                                            <select class="form-select" id="pro_id" name="pro_id">
                                                <option value="">اختر المنتج</option>
                                            </select>
                                            <small id="pro_id_error" class="form-text text-danger"></small>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="product_price" class="form-label">سعر المنتج</label>
                                            <div class="input-group">
                                                <span class="input-group-text">ر.س</span>
                                                <input type="number" class="form-control" id="product_price"
                                                    name="product_price" placeholder="سعر المنتج" min="1">

                                            </div>
                                            <small id="product_price_error" class="form-text text-danger"></small>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="quantity" class="form-label">الكمية</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity"
                                                placeholder="الكمية" min="1">

                                            <small id="quantity_error" class="form-text text-danger"></small>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="total_cost" class="form-label">التكلفة الإجمالية</label>
                                            <div class="input-group">
                                                <span class="input-group-text">ر.س</span>
                                                <input type="text" class="form-control" id="total_cost" name="total_cost"
                                                    placeholder="التكلفة الإجمالية" readonly>
                                            </div>
                                            <small id="total_cost_error" class="form-text text-danger"></small>
                                        </div>


                                        <div class="col-md-2">
                                            <label for="add_product" class="form-label">&nbsp;</label>
                                            <button type="button" class="btn btn-success form-control"
                                                id="add_product">إضافة المنتج</button>
                                            <!-- عنصر لعرض رسالة الخطأ -->
                                            <small id="product_exists_error" class="form-text text-danger"></small>
                                        </div>


                                        <table class="table table-bordered mt-3">
                                            <thead>
                                                <tr>
                                                    <th>رقم</th>
                                                    <th>معرف المنتج</th>
                                                    <th>اسم المنتج</th>
                                                    <th>سعر المنتج</th>
                                                    <th>الكمية</th>
                                                    <th>التكلفة الإجمالية</th>
                                                    <th>الإجراء</th>
                                                </tr>
                                            </thead>
                                            <tbody id="purchaseDetailsBody">
                                                <!-- إضافة صفوف ديناميكية لتفاصيل الشراء -->
                                            </tbody>
                                        </table>

                                        <div class="col-md-6">
                                            <label for="additional_costs" class="form-label">التكاليف الإضافية</label>
                                            <input type="number" class="form-control" id="additional_costs"
                                                name="additional_costs" value="0"
                                                placeholder="أدخل التكاليف الإضافية"min="1">
                                            <small id="additional_costs_error" class="form-text text-danger"></small>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="total" class="form-label">المجموع</label>
                                            <input type="number" class="form-control" id="total" name="total"
                                                placeholder="أدخل المجموع" readonly>
                                            <small id="total_error" class="form-text text-danger"></small>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="amount_paid" class="form-label">المبلغ المدفوع</label>
                                            <input type="number" class="form-control" id="amount_paid"
                                                name="amount_paid" placeholder="أدخل المبلغ المدفوع" min="1">
                                            <small id="amount_paid_error" class="form-text text-danger"></small>
                                        </div>

                                        <br>

                                        <div class="text-center">
                                            <button type="submit" id="submit" class="btn btn-primary"
                                                data-action="update">حفظ </button>
                                            <button type="reset" class="btn btn-secondary">إعادة تعيين</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- النهاية #main -->
@endsection

@section('js')
    <script>
        // التحقق من حجم الشاشة وتحديد التصميم المناسب
        function checkScreenSize() {
            var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

            if (screenWidth < 768) {
                // تحديد تصميم للهواتف المحمولة
                // يمكنك إضافة أي تحديدات أو أنماط CSS إضافية هنا
                document.getElementById('main').classList.add('mobile-design');
            } else {
                // تحديد تصميم للأجهزة اللوحية والحواسيب الشخصية
                // يمكنك إضافة أي تحديدات أو أنماط CSS إضافية هنا
                document.getElementById('main').classList.add('desktop-design');
            }
        }

        // تحقق من حجم الشاشة عند تحميل الصفحة
        window.onload = function() {
            checkScreenSize();
        };

        // تحقق من حجم الشاشة عند تغيير حجم النافذة
        window.onresize = function() {
            checkScreenSize();
        }


        // قم بتحميل بيانات الموردين باستخدام AJAX
        $.ajax({
            type: 'get',
            url: "{{ route('admin.supplier.getSuppliers') }}",
            async: false,
            success: function(data) {
                // قم بإضافة البيانات إلى عنصر الـselect
                $.each(data, function(key, supplier) {
                    $('#sup_id').append('<option value="' + supplier.sup_id + '">' +
                        '[ ID : ' + supplier.sup_id + ' ] Name : ' + supplier.name +
                        '</option>');

                });
            },
            error: function(reject) {
                console.error('Error loading suppliers:', reject);
            }
        });

        // قم بتحميل بيانات المنتجات باستخدام AJAX
        $.ajax({
            type: 'get',
            url: "{{ route('admin.product.getProducts') }}",
            async: false,
            success: function(data) {
                // قم بإضافة البيانات إلى عنصر الـselect
                $.each(data, function(key, product) {
                    $('#pro_id').append('<option value="' + product.id + '">' +
                        '' + product.name +
                        '</option>');
                    //  $('#product_price').val(product.purchasing_price);
                });
            },
            error: function(reject) {
                console.error('Error loading suppliers:', reject);
            }
        });

        // Function to remove a row from the purchase details table
        function removeRow(btn) {
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }


        $(document).ready(function() {

            var purchaseDetailsCounter = 1;
            // Function to add a new product row to the table
            function addProductRow(productID, productName, productPrice, quantity, totalCost, isEditMode) {
                var newRow = $("<tr>");
                var cells = [
                    $("<td>").text(purchaseDetailsCounter),
                    $("<td>").text(productID),
                    $("<td>").text(productName),
                    $("<td>").text(productPrice),
                    $("<td>").text(quantity),
                    $("<td>").text(totalCost),
                    $("<td>").html('')
                ];

                // إذا كنت في وضع التحرير، قم بإخفاء زر الحذف
                if (!isEditMode) {
                    cells[6] = $("<td>").html(
                        '<button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">حذف</button>'
                        );
                }

                // إضافة الخلايا إلى الصف
                newRow.append(cells);
                // إضافة الصف إلى الجدول
                $("#purchaseDetailsBody").append(newRow);
                // زيادة عداد التفاصيل
                purchaseDetailsCounter++;
            }

            // Function to calculate and update the total of the purchase details
            function updateTotal() {
                var total = 0;

                $('#purchaseDetailsBody tr').each(function(index, row) {
                    var totalCost = parseFloat($(this).find('td:eq(5)').text());
                    total += isNaN(totalCost) ? 0 : totalCost;
                });

                // إضافة التكاليف الإضافية إلى المجموع
                var additionalCosts = parseFloat($('#additional_costs').val()) || 0;
                total += additionalCosts;

                $('#total').val(total.toFixed(2));

                var paymentMethod = $('#payment_method').val();
                if (paymentMethod === 'نقد') {
                    $('#amount_paid').val(total.toFixed(2));
                } else {
                    $('#amount_paid').val(0);
                }
            }

            // Event handler for changes in additional costs field
            $(document).on('input', '#additional_costs', function() {
                // حساب وتحديث الإجمالي عند تغيير التكاليف الإضافية
                updateTotal();
            });

            // Event handler for payment method change
            $(document).on('change', '#payment_method', function() {
                var selectedPaymentMethod = $(this).val();

                // إذا كانت طريقة الدفع "آجل"
                if (selectedPaymentMethod === 'آجل') {
                    // جعل حقل المبلغ المدفوع صفرًا وغير قابل للتحرير
                    $('#amount_paid').val(0).prop('readonly', true);
                } else {
                    // إذا كانت طريقة الدفع "نقد"، قم بجعل المبلغ المدفوع قابل للتحرير
                    $('#amount_paid').prop('readonly', false);
                }

                // حساب وتحديث الإجمالي
                updateTotal();
            });

            // Event handler for input changes in the fields related to product price and quantity
            $(document).on('input', '#product_price, #quantity', function() {
                // حساب تكلفة المنتج تلقائيًا
                var productPrice = $("#product_price").val();
                var quantity = $("#quantity").val();
                var totalCost = (productPrice * quantity).toFixed(2);

                // عرض تكلفة المنتج في حقل التكلفة الإجمالية
                $('#total_cost').val(totalCost);

                // تحديث إجمالي الفاتورة
                updateTotal();

                // جعل زر التكلفة الإجمالية غير قابل للنقر
                $('#total_cost_button').prop('disabled', true);
            });




            // Event handler for the "Add Product" button
            $(document).on('click', '#add_product', function() {
                var productid = $("select[name='pro_id']").val();
                var productName = $("select[name='pro_id'] option:selected").text();
                var productPrice = $("#product_price").val();
                var quantity = $("#quantity").val();



                var totalCost = (productPrice * quantity).toFixed(2);

                if (!productid || !productName || !productPrice || !quantity || !totalCost) {

                    alert('Please fill in all product details before adding.');
                    return;
                }

                // التحقق مما إذا كان المنتج موجودًا بالفعل في القائمة
                var productExists = false;
                $('#purchaseDetailsBody tr').each(function() {
                    var existingProductId = $(this).find('td:eq(1)').text().trim();
                    var existingProductName = $(this).find('td:eq(2)').text().trim();

                    if (existingProductId == productid || existingProductName == productName) {
                        productExists = true;

                        // إذا كان المنتج موجود، عرض رسالة الخطأ والخروج من الحلقة
                        Swal.fire({
                            icon: 'error',
                            title: 'خطأ',
                            text: 'المنتج بنفس الرقم أو الاسم موجود بالفعل في القائمة.',
                        });

                        return false;
                    }
                });

                // إذا كان المنتج موجود، لا تقم بإضافته إلى القائمة
                if (productExists) {
                    return;
                }

                // إضافة سطر للجدول
                addProductRow(productid, productName, productPrice, quantity, totalCost);
                // تحديث إجمالي الفاتورة
                updateTotal();
                // إعادة تعيين حقول الإدخال
                $("#pro_id, #product_price, #quantity, #total_cost").val('');

                // جعل حقل المجموع غير قابل للتحرير وتحديث قيمته
                $('#total_cost_button').prop('disabled', true);
            });


            // Event handler for input changes in the fields related to product price and quantity
            $(document).on('input', '#product_price, #quantity', function() {
                // تحديث إجمالي الفاتورة
                updateTotal();
            });


            var purchaseData = @json($purchase ?? null);
            if (purchaseData != null) {
                // تحديث قيم حقول الإدخال
                $('#sup_id').val(purchaseData.sup_id).prop('disabled', true);
                $('#payment_method').val(purchaseData.payment_method).prop('disabled', true);
                $('#additional_costs').val(purchaseData.additional_costs);
                $('#total').val(purchaseData.total);
                $('#amount_paid').val(purchaseData.amount_paid);



                // قم بتعبئة تفاصيل المشتريات في الجدول
                var purchaseDetails = @json($purchase->purchaseDetails ?? null);
                var isEditMode = @json(isset($purchase) && $purchase !== null);

                if (purchaseDetails != null && purchaseDetails.length > 0) {
                    for (var i = 0; i < purchaseDetails.length; i++) {
                        addProductRow(
                            purchaseDetails[i].product.id,
                            purchaseDetails[i].product.name,
                            purchaseDetails[i].product.purchasing_price,
                            purchaseDetails[i].quantity,
                            purchaseDetails[i].total_cost,
                            isEditMode
                        );

                        // قم بتعبئة الحقول في الصف المضاف بالبيانات
                        var currentRow = $("#purchaseDetailsBody tr").eq(i + 1); // انطلق من 1 لأن الصفوف تبدأ من 1
                        currentRow.find('td:eq(0)').text(i + 1); // رقم الصف
                        currentRow.find('td:eq(1)').text(purchaseDetails[i].product.id.name); // اسم المنتج
                        currentRow.find('td:eq(2)').text(purchaseDetails[i].product.id.purchasing_price);
                        currentRow.find('td:eq(3)').text(purchaseDetails[i].quantity);
                        currentRow.find('td:eq(4)').text(purchaseDetails[i].total_cost);

                        // قم بإخفاء زر الحذف إذا كنت في وضع التحرير
                        if (isEditMode) {
                            currentRow.find('td:eq(5)').html('');
                        } else {
                            currentRow.find('td:eq(5)').html(
                                '<button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">حذف</button>'
                                );
                        }

                        // قد تحتاج إلى تكرار هذا للحقول الأخرى حسب احتياجاتك
                        console.log('Purchase Details:', purchaseDetails[i]);
                    }
                }

                // Event handler for the "Submit" button
                $(document).on('click', '#submit', function(e) {
                    e.preventDefault();

                    var productsData = [];

                    $('#purchaseDetailsBody tr').each(function(index, row) {
                        // احصل على قيمة العناصر داخل كل صف
                        var productID = $(this).find('td:eq(1)').text();
                        var purchasing_price = $(this).find('td:eq(3)').text();
                        var quantity = $(this).find('td:eq(4)').text();
                        var totalCost = $(this).find('td:eq(5)').text();

                        // أضف البيانات إلى مصفوفة المنتجات
                        productsData.push({
                            pro_id: productID,
                            quantity: quantity,
                            purchasing_price: purchasing_price,
                            total_cost: totalCost
                        });
                    });

                    if ($('#purchaseDetailsBody tr').length === 0) {
                        alert('Please add at least one product before submitting.');
                        return;
                    }
                    $.ajax({
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                        },
                        url: "{{ route('admin.purchase.update') }}",
                        data: {
                            'id': purchaseData.id,
                            'products': productsData,
                            'sup_id': $("select[name='sup_id']").val(),
                            'payment_method': $("select[name='payment_method']").val(),
                            'additional_costs': $("input[name='additional_costs']").val(),
                            'total': $("input[name='total']").val(),
                            'amount_paid': $("input[name='amount_paid']").val(),
                        },
                        success: function(data) {
                            $("#form")[0].reset();
                            $("#purchaseDetailsBody").empty();
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "تمت التحديث بنجاح",
                                showConfirmButton: false,
                                timer: 2000
                            });
                        },
                        error: function(reject) {
                            var response = $.parseJSON(reject.responseText);
                            $.each(response.errors, function(key, val) {
                                $("#" + key + "_error").text(val[0])
                            })
                        }
                    });
                });

            } else {
                // Event handler for the "Submit" button
                $(document).on('click', '#submit', function(e) {
                    e.preventDefault();

                    var productsData = [];

                    $('#purchaseDetailsBody tr').each(function(index, row) {
                        var productID = $(this).find('td:eq(1)').text();
                        var purchasing_price = $(this).find('td:eq(3)').text();
                        var quantity = $(this).find('td:eq(4)').text();
                        var totalCost = $(this).find('td:eq(5)').text();

                        productsData.push({
                            pro_id: productID,
                            quantity: quantity,
                            purchasing_price: purchasing_price,
                            total_cost: totalCost
                        });
                    });

                    if ($('#purchaseDetailsBody tr').length === 0) {
                        alert('Please add at least one product before submitting.');
                        return;
                    }
                    $.ajax({
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                        },
                        url: "{{ route('admin.purchase.store') }}",
                        data: {
                            'products': productsData,
                            'sup_id': $("select[name='sup_id']").val(),
                            'payment_method': $("select[name='payment_method']").val(),
                            'additional_costs': $("input[name='additional_costs']").val(),
                            'total': $("input[name='total']").val(),
                            'amount_paid': $("input[name='amount_paid']").val(),
                        },
                        success: function(data) {
                            $("#form")[0].reset();
                            $("#purchaseDetailsBody").empty();
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "تمت العملية بنجاح",
                                showConfirmButton: false,
                                timer: 2000
                            });
                        },
                        error: function(reject) {
                            var response = $.parseJSON(reject.responseText);
                            $.each(response.errors, function(key, val) {
                                $("#" + key + "_error").text(val[0])
                            })
                        }
                    });
                });


            }

            // Reset fields when the reset button is clicked
            $(document).on('click', '#reset', function() {
                $("#form")[0].reset();
                $('#purchaseDetailsBody').empty();
                purchaseDetailsCounter = 1;
            });
        });
    </script>
@endsection
