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

        .login-box {
            width: 950px;
        }

        .login-logo {
            margin: 0 !important;
            background-image: url('dist/img/BG.png');
        }

        .attendance-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .attendance-header p {
            font-size: 0.9rem;
            color: #555;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .attendance-body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 0;
        }

        .student-img {
            max-width: 100px;
            max-height: 120px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .attendance-footer {
            text-align: center;
            font-size: 0.8rem;
            color: #555;
        }

        .attendance-footer p {
            margin: 0;
        }

        .attendance {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            padding: 10px;
        }
    </style>
</head>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-success">
            <div class="row" style="margin: 0 !important; padding: 0 !important;">
                <div class="col-lg-6" style="margin: 0 !important; padding: 0 !important;">
                    <div class="card-header text-center" style="border: none;">
                        <img src="dist/img/header.png" class="login-logo"
                            style="margin: 0px; width: 100%; height: 150px;" id="login-header">
                        <p href="index.php" class="h3 text-bold text-success mt-5">ATTENDANCE PORTAL</p>
                    </div>
                    <div class="card-body">
                        <p class="login-box-msg text-left text-bold" style="padding: 10px 1px;">Student Information</p>

                        <form id="quickForm">
                            <div id="error-msg"></div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="rfid_no" id="rfid_no"
                                    placeholder="RFID No" autocomplete="false" autofocus>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-tag"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="time_now" id="time_now"
                                    placeholder="Time-In" autocomplete="false" readonly>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-clock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="date" id="date"
                                    placeholder="Date" autocomplete="false" value="{{ date('F j, Y') }}" readonly>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-calendar"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6" style="margin: 0 !important; padding: 0 !important;">
                    <div class="attendance">
                        <div class="attendance-content">
                            <div class="attendance-header">
                                <p>RFID: X</p>
                            </div>
                            <div class="attendance-body">
                                <img src="{{ asset('dist/img/avatar5.png') }}" alt="Empty Slot" class="student-img">
                            </div>
                            <div class="attendance-footer">
                                <p>
                                    <span>Empty</span><br>
                                    <span>Slot</span>
                                </p>
                            </div>
                        </div>
                        <div class="attendance-content">
                            <div class="attendance-header">
                                <p>RFID: X</p>
                            </div>
                            <div class="attendance-body">
                                <img src="{{ asset('dist/img/avatar5.png') }}" alt="Empty Slot" class="student-img">
                            </div>
                            <div class="attendance-footer">
                                <p>
                                    <span>Empty</span><br>
                                    <span>Slot</span>
                                </p>
                            </div>
                        </div>
                        <div class="attendance-content">
                            <div class="attendance-header">
                                <p>RFID: X</p>
                            </div>
                            <div class="attendance-body">
                                <img src="{{ asset('dist/img/avatar5.png') }}" alt="Empty Slot" class="student-img">
                            </div>
                            <div class="attendance-footer">
                                <p>
                                    <span>Empty</span><br>
                                    <span>Slot</span>
                                </p>
                            </div>
                        </div>
                        <div class="attendance-content">
                            <div class="attendance-header">
                                <p>RFID: X</p>
                            </div>
                            <div class="attendance-body">
                                <img src="{{ asset('dist/img/avatar5.png') }}" alt="Empty Slot" class="student-img">
                            </div>
                            <div class="attendance-footer">
                                <p>
                                    <span>Empty</span><br>
                                    <span>Slot</span>
                                </p>
                            </div>
                        </div>
                        <div class="attendance-content">
                            <div class="attendance-header">
                                <p>RFID: X</p>
                            </div>
                            <div class="attendance-body">
                                <img src="{{ asset('dist/img/avatar5.png') }}" alt="Empty Slot" class="student-img">
                            </div>
                            <div class="attendance-footer">
                                <p>
                                    <span>Empty</span><br>
                                    <span>Slot</span>
                                </p>
                            </div>
                        </div>
                    </div>
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

                let myClock = setInterval(myTimer, 1000);

                function myTimer() {
                    var d = new Date();
                    $('#time_now').val(d.toLocaleTimeString());
                }

                let attendanceData = []; // Array to store up to 4 students' data
                const maxAttendance = 4; // Maximum number of students displayed

                function displayStudent(rfid_no, status) {
                    if (!rfid_no || typeof rfid_no !== 'string') {
                        console.error('Invalid RFID provided.');
                        return;
                    }

                    $.ajax({
                        method: 'GET',
                        url: `/getStudentByRFID/${encodeURIComponent(rfid_no)}/${encodeURIComponent(status)}`, // Correct URL format
                        dataType: 'JSON',
                        cache: false,
                        success: function(response) {
                            if (response) {
                                const fullName = response.fullName;
                                const date = response.date;
                                const time = response.time;

                                // Add student to the attendance array
                                attendanceData.push({
                                    rfid_no,
                                    name: fullName,
                                    lrn: response.student_lrn,
                                    img: response.image || 'default.png',
                                    date,
                                    time
                                });

                                // Ensure attendance array contains only the last 4 entries
                                if (attendanceData.length > maxAttendance) {
                                    attendanceData.shift();
                                }

                                renderAttendance();

                                // Send SMS message
                                window.sendMessageSequence(response.parent_number, response.message);

                                // Example: Log message for debugging
                                console.log(`Student ${fullName} recorded at ${date} ${time}.`);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            const error = jqXHR.responseJSON?.error || 'Unable to fetch student data.';
                            console.error('Error:', error);
                            alert(error); // Optional: Show alert for error feedback
                        }
                    });
                }

                function renderAttendance() {
                    const attendanceContainer = $('.attendance');
                    attendanceContainer.empty();

                    attendanceData.forEach(student => {
                        attendanceContainer.append(`
            <div class="attendance-content">
                <div class="attendance-header">
                    <p>RFID: ${student.rfid_no}</p>
                </div>
                <div class="attendance-body">
                    <img src="${student.img}" alt="Student Image" class="student-img">
                </div>
                <div class="attendance-footer">
                    <p>
                        <span>${student.name}</span><br>
                        <span>LRN: ${student.lrn}</span>
                    </p>
                </div>
            </div>
        `);
                    });

                    // Add placeholders for remaining slots
                    for (let i = attendanceData.length; i < maxAttendance; i++) {
                        attendanceContainer.append(`
            <div class="attendance-content">
                <div class="attendance-header">
                    <p>RFID: X</p>
                </div>
                <div class="attendance-body">
                    <img src="{{ asset('dist/img/avatar5.png') }}" alt="Empty Slot" class="student-img">
                </div>
                <div class="attendance-footer">
                    <p>
                        <span>Empty</span><br>
                        <span>Slot</span>
                    </p>
                </div>
            </div>
        `);
                    }
                }

                $('#rfid_no').change(function(event) {
                    event.preventDefault();

                    $.ajax({
                        method: 'POST',
                        url: '/attendances',
                        data: $('#quickForm').serialize(),
                        dataType: 'JSON',
                        cache: false,
                        success: function(response) {
                            if (response) {
                                $('#rfid_no').val("");
                                const status = response.status === 'enter' ? 'enter' :
                                    'exit'; // Use status from response
                                displayStudent(response.rfid_no, status);
                            }
                        },
                        error: function(jqXHR, textStatus, error) {
                            if (jqXHR.responseJSON && jqXHR.responseJSON.error) {
                                var errors = jqXHR.responseJSON.error;
                                var errorMsg = "Error submitting data: " + errors + ". ";
                                console.log(errorMsg);
                            } else {
                                console.log('Something went wrong! Please try again later.');
                            }
                        }
                    });
                });

            });
        </script>
</body>

</html>
