<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="School Name Student Portal">
    <meta name="keywords" content="School Name, Student Portal, student portal, abuyog">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PNHS Attendance - {{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('dist/img/PNHS_Logo.png') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <style type="text/css">
        body {
            background-image: url('dist/img/main_bg.jpg');
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        @media (min-width: 768px) {

            body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper,
            body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer,
            body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
                transition: margin-left .3s ease-in-out;
                margin-left: 50px;
                margin-top: 50px;
                margin-right: 50px;
                margin-bottom: 50px;
                min-height: 700px;
            }
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        p {
            font-weight: bolder;
            text-transform: uppercase;
        }

        .card {
            border: 1px solid gray;
        }
    </style>
</head>
</head>

<body class="hold-transition">
    <div class="content-wrapper" style="min-height: 100% !important;">

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-widget widget-user-2">
                    <div class="widget-user-header bg-gray">
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="{{ asset('dist/img/PNHS_Logo.png') }}"
                                alt="User Avatar">
                        </div>
                        <h3 class="widget-user-username" style="font-weight: bolder;">PALALE NATION HIGH SCHOOL</h3>
                        <h5 class="widget-user-desc">BRGY. PALALE, MAC ARTHUR, LEYTE</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" style="margin: 20px 30px;">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header bg-gray" style="margin: 0; padding: 0;">
                            <h3 class="text-center" style="margin: 0; padding: 5px 0;">GATE KEEPING</h3>
                        </div>
                        <div class="card-body">
                            <h1 class="text-center" id="time_now" style="text-align: justify"></h1>
                        </div>
                        <div class="card-footer bg-gray" style="margin: 0; padding: 0;">
                            <h5 class="text-center" style="margin: 0; padding: 5px 0;">
                                {{ Str::upper(date('l - M d, Y')) }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-header bg-gray" style="margin: 0; padding: 0;">
                            <h3 class="text-center" style="margin: 0; padding: 5px 0;">RFID SCANNER</h3>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="rfid_no" id="rfid_no"
                                    placeholder="RFID No" autocomplete="false" autofocus>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-tag"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-header bg-gray" style="margin: 0; padding: 0;">
                                <h3 class="text-center" style="margin: 0; padding: 5px 0;">SYSTEM MESSAGE</h3>
                            </div>
                            <div class="card-body">
                                <h1 class="text-center" style="text-align: justify" id="failedScan">0</h1>
                            </div>
                            <div class="card-footer bg-gray" style="margin: 0; padding: 0;">
                                <h5 class="text-center" style="margin: 0; padding: 5px 0;">NO. FAILED SCAN</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-header bg-gray" style="margin: 0; padding: 0;">
                                <h3 class="text-center" style="margin: 0; padding: 5px 0;" id="birthday">BIRTHDAYS</h3>
                            </div>
                            <div class="card-body">
                                <h1 class="text-center" style="text-align: justify">0</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" style="margin: 20px 0;">
                <div id="attendance-list" class="row"></div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Fileinput -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <!-- Validation -->
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/additional-methods.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="{{ asset('js/bundle.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Display current time
            setInterval(() => {
                $('#time_now').text(new Date().toLocaleTimeString());
            }, 1000);

            let attendanceData = [];
            const maxAttendance = 8;

            function displayStudent(rfid_no, status) {
                if (!rfid_no || typeof rfid_no !== 'string') {
                    console.error('Invalid RFID provided.');
                    return;
                }

                // Clear previous failed attempts count
                var failedScan = $('#failedScan').text();
                var noBirthday = $('#birthday').text();

                $.ajax({
                    method: 'GET',
                    url: `/getStudentByRFID/${encodeURIComponent(rfid_no)}/${encodeURIComponent(status)}`,
                    dataType: 'JSON',
                    cache: false,
                    success: function(response) {
                        if (response.valid) {
                            const {
                                fullName,
                                date,
                                time,
                                student_lrn,
                                image,
                                parent_number,
                                message,
                                isBirthday,
                                birthdayMessage,
                                timeInOut
                            } = response;

                            // Add student to attendance data
                            attendanceData.push({
                                rfid_no,
                                name: fullName,
                                lrn: student_lrn,
                                img: image || '/dist/img/avatar.png',
                                date,
                                time,
                                isBirthday,
                                birthdayMessage,
                                timeInOut
                            });

                            if (attendanceData.length > maxAttendance) {
                                attendanceData.shift();
                            }

                            renderAttendance();

                            // Send SMS message
                            window.sendMessageSequence(parent_number, message);

                            if (isBirthday) {
                                $('#birthday').text(parseInt(noBirthday) + 1);
                            }

                            console.log(`Student ${fullName} recorded at ${date} ${time}.`);
                        } else {
                            // Increment failed scan count
                            $('#failedScan').text(parseInt(failedScan) + 1);
                        }
                    },
                    error: function(jqXHR) {
                        var failedScan = $('#failedScan').text();
                        $('#failedScan').text(parseInt(failedScan) + 1);
                        const error = jqXHR.responseJSON?.error || 'Unable to fetch student data.';
                        console.error('Error:', error);
                    }
                });
            }

            function renderAttendance() {
                const attendanceContainer = $('#attendance-list');
                attendanceContainer.empty();

                attendanceData.forEach(student => {
                    attendanceContainer.append(`
                        <div class="col-lg-6" style="margin: 0; padding: 0 5px;">
                            <div class="card card-widget widget-user-2" style="border: 3px solid gray;">
                                <div class="widget-user-header" style="margin: 0; padding: 0;">
                                    <div class="widget-user-image">
                                        <img class="img" src="${student.img}"
                                            alt="User Avatar"
                                            style="height: 175px; width: 100px; border: 1px solid gray;">
                                    </div>
                                    <div style="padding-top: 10px;">
                                        <p style="text-align: center; border-bottom: 1px solid black;">
                                            ${student.name}
                                        </p>
                                        <p style="text-align: center; margin-top: -20px; padding: 0;">
                                            Student Name
                                        </p>
                                        <p style="text-align: center; border-bottom: 1px solid black;">
                                            ${student.lrn}
                                        </p>
                                        <p style="text-align: center; margin-top: -20px; padding: 0;">
                                            Student LRN
                                        </p>
                                        <p style="text-align: center; border-top: 1px solid black;">
                                            ${student.timeInOut}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                });

                // Fill remaining slots with placeholders
                for (let i = attendanceData.length; i < maxAttendance; i++) {
                    attendanceContainer.append(`
                        <div class="col-lg-6" style="margin: 0; padding: 0 5px;">
                            <div class="card card-widget widget-user-2" style="border: 3px solid gray;">
                                <div class="widget-user-header" style="margin: 0; padding: 0;">
                                    <div class="widget-user-image">
                                        <img class="img" src="/dist/img/avatar.png"
                                            alt="User Avatar"
                                            style="height: 175px; width: 100px; border: 1px solid gray;">
                                    </div>
                                    <div style="padding-top: 10px;">
                                        <p style="text-align: center; border-bottom: 1px solid black;">
                                            -
                                        </p>
                                        <p style="text-align: center; margin-top: -20px; padding: 0;">
                                            Student Name
                                        </p>
                                        <p style="text-align: center; border-bottom: 1px solid black;">
                                            -
                                        </p>
                                        <p style="text-align: center; margin-top: -20px; padding: 0;">
                                            Student LRN
                                        </p>
                                        <p style="text-align: center; border-top: 1px solid black;">
                                            <span>Time In: <strong class="text-danger">-</strong></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                }
            }

            $('#rfid_no').change(function(event) {
                event.preventDefault();

                // Clear previous failed attempts count
                var failedScan = $('#failedScan').text();

                $.ajax({
                    method: 'POST',
                    url: '/attendances',
                    data: {
                        rfid_no: $('#rfid_no').val()
                    },
                    dataType: 'JSON',
                    cache: false,
                    success: function(response) {
                        $('#rfid_no').val(''); // Reset RFID input field
                        if (response.valid) {
                            const status = response.status === 'enter' ? 'enter' : 'exit';
                            displayStudent(response.rfid_no, status);
                        } else {
                            // Increment failed scan count
                            $('#failedScan').text(parseInt(failedScan) + 1);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $('#rfid_no').val(''); // Reset RFID input field
                        // Increment failed scan count
                        $('#failedScan').text(parseInt(failedScan) + 1);

                        const errorMsg = jqXHR.responseJSON?.error ||
                            'Something went wrong! Please try again later.';
                        console.error('Error:', errorMsg);

                        // Optionally, you can reset the failedScan count if the error is resolved later
                        // $('#failedScan').text(0);
                    }
                });
            });

            renderAttendance();
        });
    </script>
</body>

</html>
