@extends('Admin.layouts.main')

@section('pageTitle')
    الفئات الفرعية
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('Content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>الفئات الفرعية</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <p></p>

                            <div class="table-responsive">
                                <!-- Table with stripped rows -->
                                <table id="Sub_Categories_Managment" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>الاسم</th>
                                            <th>معرف الفئة الرئيسية</th>
                                            <th>الفئة الرئيسية</th>
                                            <th>تاريخ الانشاء</th>
                                            <th>تاريخ التحديث</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>

                                </table>
                                <!-- End Table with stripped rows -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

@section('js')
    <script type="text/javascript">
        $(function() {

            var subCategories_data = $('#Sub_Categories_Managment').DataTable({
                processing: true,
                serverSide: true,
                "autoWidth": false,
                //إمكانية تحريك الاعمدة
                colReorder: true,
                responsive: true,
                order: [
                    [0, "desc"]
                ],
                //عرض اسم الحقل و محتويات الحقول من اليمين لليسار
                columnDefs: [{
                    targets: '_all',//كل الحقول
                    className: 'dt-right'//الاتجاه
                }],
                ajax: "{{ Route('admin.subCategories.data') }}",
                dom: "<'row'<'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f><'col-sm-12 col-md-4'l>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Arabic.json" // توفير ملف ترجمة للعربية
                },
                buttons: [{
                        extend: 'print',
                        autoPrint: false,
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6] // Column index which needs to export
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6] // Column index which needs to export
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6] // Column index which needs to export
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6] // Column index which needs to export
                        }
                    },
                    {
                        text: 'اضافة',
                        className: 'custom-add-button',
                        action: function(e, dt, node, config) {
                            // تحويل المستخدم إلى الصفحة الجديدة عند النقر على زر "Add"
                            window.location.href = "{{ route('admin.subCategories.create') }}";
                        }
                    },
                ],
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'cat_id',
                        name: 'cat_id'
                    },
                    {
                        data: 'categorie',
                        name: 'categorie'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data, type, full, meta) {
                            // تنسيق التاريخ باستخدام moment.js
                            return moment(data).format('YYYY-MM-DD HH:mm:ss');
                        }
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        render: function(data, type, full, meta) {
                            // تنسيق التاريخ باستخدام moment.js
                            return moment(data).format('YYYY-MM-DD HH:mm:ss');
                        }
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]

            });

        });

        $(document).on('click', '.delete_btn', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "هل انت متأكد ؟",
                text: "لن تتمكن من التراجع عن هذا",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "تراجع",
                confirmButtonText: "نعم، احذفه"
            }).then((result) => {
                if (result.isConfirmed) {

                    var subCategorie_id = $(this).attr('data-subCategorie-id');
                    $.ajax({
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                        },
                        url: "{{ route('admin.subCategories.destroy') }}",
                        data: {
                            'id': subCategorie_id
                        },
                        success: function(data) {
                            Swal.fire({

                                title: "تم الحذف ",
                                text: "لقد تم حذف بنجاح",
                                icon: "success"
                            });

                            //تحديث جدول البيانات لكي يظهر التعديل في الجدول بعد الحذف
                            $('#Sub_Categories_Managment').DataTable().ajax.reload();
                        },
                        error: function(reject) {
                        }
                    });

                }
            });





        });

    </script>
@endsection
