<?php

namespace App\Http\Controllers;

use App\Models\Log as GateLog;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LogController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rfid_no' => 'required|string|max:20',
        ]);

        $rfid_no = $request->rfid_no;
        $timeNow = Carbon::now('Asia/Manila');
        $currentDate = $timeNow->toDateString();
        $currentTime = $timeNow->toTimeString();

        // Check if there's already a log for this RFID and date
        $existingLogsCount = GateLog::where('rfid_no', $rfid_no)
            ->where('date', $currentDate)
            ->count();

        // Determine the status based on the number of existing logs
        $status = $existingLogsCount % 2 === 0 ? 'enter' : 'exit';

        // Attempt to create the log entry
        $log = GateLog::create([
            'rfid_no' => $rfid_no,
            'time' => $currentTime,
            'date' => $currentDate,
            'status' => $status, // Add the status column
        ]);

        // Check if log creation was successful
        if (!$log) {
            return response()->json([
                'valid' => false,
                'error' => 'Failed to log attendance. Please try again.',
                'rfid_no' => $rfid_no
            ], 200); // Return a 500 error if the log creation fails
        }

        return response()->json([
            'valid' => true,
            'success' => 'Attendance logged',
            'time' => date('h:i A', strtotime($currentTime)),
            'date' => $currentDate,
            'rfid_no' => $rfid_no,
            'status' => $status,
            'count' => 0, // You might want to handle this value better
        ], 200); // Return success message if log was successful
    }

    public function getStudentByRFID($rfid_no, $status)
    {
        // Validate RFID
        if (empty($rfid_no) || !is_string($rfid_no)) {
            return response()->json(['error' => 'Invalid RFID provided.'], 400);
        }

        $client = new Client();

        try {
            // Fetch student details
            $apiUrl = env('API_URL', 'http://127.0.0.1:8000/api'); // Use environment variable
            $response = $client->request('GET', $apiUrl . '/getStudentByRFID/' . urlencode($rfid_no));

            if ($response->getStatusCode() == 200) {
                $data = json_decode($response->getBody()->getContents(), true);

                if (isset($data['student_lrn'])) {
                    $studentImage = $data['image'] ?? 'default.png';
                    $studentLrn = $data['student_lrn'];
                    $studentBirthday = $data['birthday']; // Assuming this is in 'Y-m-d' format, e.g., '2000-01-06'
                    $studentName = trim(implode(' ', [$data['first_name'], $data['middle_name'], $data['last_name']]));
                    $parentContact = $this->formatPhoneNumber($data['parent_contact']);
                    $timeNow = Carbon::now('Asia/Manila');
                    $date = $timeNow->toDateString();
                    $time = $timeNow->format('h:i A');  // This formats time in 12-hour format with AM/PM

                    // Initialize default values for birthday checks
                    $isBirthday = false;
                    $birthdayMessage = '';  // Empty message if it's not the student's birthday

                    // Check if today is the student's birthday
                    if ($studentBirthday == $date) {
                        // It's the student's birthday
                        $isBirthday = true;
                        $birthdayMessage = "Happy Birthday, {$studentName}!";  // Set the birthday message
                    }

                    // Construct the notification message based on status (enter or exit)
                    $message = sprintf(
                        "Dear Parent/Guardian,\n\nThis is to notify you that your child, %s (LRN: %s), has %s the school premises at %s on %s.\n\nThis is an automated message, and no reply is required.\n\nThank you.",
                        $studentName,
                        $studentLrn,
                        $status === 'enter' ? 'entered' : 'exited', // Adjust message based on enter/exit status
                        $time,
                        $date
                    );

                    return response()->json([
                        'valid' => true,
                        'parent_number' => $parentContact,
                        'message' => $message,
                        'date' => $date,
                        'time' => $time,
                        'image' => $studentImage,
                        'student_lrn' => $studentLrn,
                        'fullName' => $studentName,
                        'isBirthday' => $isBirthday,
                        'birthdayMessage' => $birthdayMessage,
                        'timeInOut' => '<span>Time In: <strong class="text-danger">' . $time . '</strong></span>',
                    ]);
                } else {
                    return response()->json(['valid' => false, 'msg' => 'Student not found.'], 200);
                }
            } else {
                return response()->json(['valid' => false, 'msg' => 'Failed to fetch data from the API.'], $response->getStatusCode());
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return response()->json(['valid' => false, 'msg' => 'API request error: ' . $e->getMessage()], 200);
        } catch (\Exception $e) {
            return response()->json(['valid' => false, 'msg' => 'Unexpected error: ' . $e->getMessage()], 200);
        }
    }

    private function formatPhoneNumber($number)
    {
        $formatted = preg_replace('/\D+/', '', $number); // Remove non-digit characters
        if (substr($formatted, 0, 2) === '63') {
            $formatted = '0' . substr($formatted, 2);
        }
        return $formatted;
    }
}
