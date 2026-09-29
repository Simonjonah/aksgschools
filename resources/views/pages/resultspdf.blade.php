
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>
        {{ optional($view_getresults->first())->school['schoolname'] ?? 'Student Result' }}
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet"
        href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet"
        href="{{ asset('assets/dist/css/adminlte.min.css') }}">

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Times New Roman", serif;
            background: #ffffff;
            margin: 0;
            padding: 20px;
            color: #000;
        }

        .result-container {
            width: 100%;
            max-width: 1000px;
            margin: auto;
        }

        /* ===========================
           GENERAL TABLE STYLE
        =========================== */

        .result-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .result-table th,
        .result-table td {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: middle;
        }

        .result-table th {
            font-weight: bold;
            text-align: center;
        }

        /* ===========================
           SCHOOL HEADER
        =========================== */

        .school-header {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .school-header td {
            border: 1px solid #000;
            padding: 10px;
        }

        .school-logo,
        .student-photo {
            width: 120px;
            text-align: center;
        }

        .school-logo img,
        .student-photo img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        .school-details {
            text-align: center;
        }

        .school-name {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .school-address {
            margin: 5px 0;
            font-size: 16px;
        }

        .school-motto {
            margin: 5px 0 0;
            font-size: 16px;
            font-style: italic;
            font-weight: bold;
        }

        .report-title {
            text-align: center;
            border: 1px solid #000;
            padding: 10px;
            margin-bottom: 15px;
        }

        .report-title h3 {
            margin: 0 0 5px;
            font-size: 18px;
            text-transform: uppercase;
        }

        .student-name {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* ===========================
           STUDENT INFORMATION
        =========================== */

        .student-info td {
            width: 16.66%;
            font-size: 14px;
        }

        .info-label {
            font-weight: bold;
            background: #f2f2f2;
        }

        /* ===========================
           ACADEMIC RESULT TABLE
        =========================== */

        .academic-table th {
            font-size: 13px;
            background: #e9e9e9;
        }

        .academic-table td {
            font-size: 14px;
            text-align: center;
        }

        .academic-table .subject {
            text-align: left;
            font-weight: bold;
        }

        .total-row {
            font-weight: bold;
            background: #f2f2f2;
        }

        /* ===========================
           DOMAIN SECTION
        =========================== */

        .domains-wrapper {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .domain-box {
            width: 50%;
        }

        .domain-table th {
            background: #e9e9e9;
            font-size: 12px;
        }

        .domain-table td {
            font-size: 12px;
            text-align: center;
        }

        .domain-table .domain-name {
            text-align: left;
            font-weight: bold;
        }

        .domain-table input[type="checkbox"] {
            pointer-events: none;
        }

        /* ===========================
           GRADING SYSTEM
        =========================== */

        .grading-table {
            text-align: center;
        }

        .grading-table th {
            background: #e9e9e9;
        }

        /* ===========================
           COMMENTS
        =========================== */

        .comment-table td {
            min-height: 50px;
            font-size: 14px;
        }

        .comment-label {
            width: 25%;
            font-weight: bold;
            background: #f2f2f2;
        }

        .signature-image {
            width: 120px;
            height: 70px;
            object-fit: contain;
        }

        /* ===========================
           PRINT SETTINGS
        =========================== */

        @media print {

            body {
                padding: 0;
            }

            .result-container {
                max-width: 100%;
            }

            @page {
                margin: 10mm;
                size: A4 portrait;
            }

        }

        @media screen and (max-width: 768px) {

            .domains-wrapper {
                flex-direction: column;
            }

            .domain-box {
                width: 100%;
            }

            .school-name {
                font-size: 20px;
            }

            .academic-table th,
            .academic-table td {
                font-size: 10px;
                padding: 3px;
            }

        }

    </style>
</head>

<body>

    @php

        /*
        |--------------------------------------------------------------------------
        | Get Main Student Result
        |--------------------------------------------------------------------------
        */

        $studentResult = $view_getresults->first();

        /*
        |--------------------------------------------------------------------------
        | Approved Results Only
        |--------------------------------------------------------------------------
        */

        $approvedResults = $view_getresults->where('status', 'approved');

        /*
        |--------------------------------------------------------------------------
        | Calculate Total Score
        |--------------------------------------------------------------------------
        */

        $total_score = $approvedResults->sum(function ($result) {

            return
                (float) $result->test_1 +
                (float) $result->test_2 +
                (float) $result->test_3 +
                (float) $result->exams;

        });

        /*
        |--------------------------------------------------------------------------
        | Number Of Subjects
        |--------------------------------------------------------------------------
        */

        $numberOfSubjects = $approvedResults->count();

        /*
        |--------------------------------------------------------------------------
        | Position Format
        |--------------------------------------------------------------------------
        */

        $position = $currentStudent['position'] ?? 0;

        if ($position == 1) {
            $positionText = $position . 'st';
        } elseif ($position == 2) {
            $positionText = $position . 'nd';
        } elseif ($position == 3) {
            $positionText = $position . 'rd';
        } else {
            $positionText = $position . 'th';
        }

    @endphp


    <div class="result-container">

        {{-- ================================
             SCHOOL HEADER
        ================================= --}}

        <table class="school-header">

            <tr>

                <td class="school-logo">

                    @if($studentResult && $studentResult->logo)

                        <img
                            src="{{ URL::asset('/public/../' . $studentResult->logo) }}"
                            alt="School Logo">

                    @endif

                </td>


                <td class="school-details">

                    <h1 class="school-name" style="color: green;">

                        {{ $studentResult->school['schoolname'] ?? '' }}

                    </h1>


                    <p class="school-address">

                        {{ $studentResult->school['address'] ?? '' }}

                        {{ $studentResult->school['lga'] ?? '' }}

                        L.G.A, Akwa Ibom State, Nigeria

                    </p>


                    <p class="school-motto" style="color: red;">

                        Motto:
                        {{ $studentResult->school['motor'] ?? '' }}

                    </p>

                </td>


                <td class="student-photo">

                    @if($studentResult && $studentResult->images)

                        <img
                            src="{{ URL::asset('/public/../' . $studentResult->images) }}"
                            alt="Student Photo">

                    @endif

                </td>

            </tr>

        </table>


        {{-- ================================
             REPORT TITLE
        ================================= --}}

        <div class="report-title">

            <h3>

                {{ $studentResult->term ?? '' }}
                REPORT FOR
                {{ $studentResult->academic_session ?? '' }} ACADEMIC
                SESSION

            </h3>


            <p class="student-name">

                {{ $studentResult->surname ?? '' }},
                {{ $studentResult->fname ?? '' }}
                {{ $studentResult->middlename ?? '' }}

            </p>

        </div>


        {{-- ================================
             STUDENT INFORMATION
        ================================= --}}

        <table class="result-table student-info">

            <tr>

                <td class="info-label">
                    REGISTRATION NO.
                </td>

                <td>
                    {{ $studentResult->regnumber ?? '-' }}
                </td>


                <td class="info-label">
                    SEX
                </td>

                <td>
                    {{ $studentResult->gender ?? '-' }}
                </td>


                <td class="info-label">
                    CLASS
                </td>

                <td>
                    {{ $studentResult->classname ?? '-' }}
                </td>

            </tr>


            <tr>

                <td class="info-label">
                    DATE OF BIRTH
                </td>

                <td>
                    {{ $studentResult->student['dob'] ?? '-' }}
                </td>


                <td class="info-label">
                    TERM
                </td>

                <td>
                    {{ $studentResult->term ?? '-' }}
                </td>


                <td class="info-label">
                    NEXT TERM BEGINS
                </td>

                <td>
                    {{ optional($view_getresultsdomains->first())->nextterm ?? '-' }}
                </td>

            </tr>

        </table>


        {{-- ================================
             ACADEMIC PERFORMANCE
        ================================= --}}

        <table class="result-table academic-table">

            <thead>

                <tr>

                    <th>SUBJECTS</th>

                    <th>1ST TEST</th>

                    <th>2ND TEST</th>

                    <th>EXAM</th>

                    <th>TOTAL</th>

                    <th>GRADE</th>

                    <th>REMARK</th>

                </tr>

            </thead>


            <tbody>

                @foreach ($approvedResults as $result)

                    @php

                        $subjectTotal =
                            (float) $result->test_1 +
                            (float) $result->test_2 +
                            (float) $result->test_3 +
                            (float) $result->exams;


                        if ($subjectTotal >= 80) {

                            $grade = 'A';
                            $remark = 'Excellent';

                        } elseif ($subjectTotal >= 70) {

                            $grade = 'B';
                            $remark = 'Very Good';

                        } elseif ($subjectTotal >= 60) {

                            $grade = 'C';
                            $remark = 'Good';

                        } elseif ($subjectTotal >= 50) {

                            $grade = 'D';
                            $remark = 'Pass';

                        } elseif($subjectTotal >= 40) {

                            $grade = 'F';
                            $remark = 'Fail';

                        }elseif($subjectTotal >= 0) {

                            $grade = '-';
                            $remark = '-';

                        }

                    @endphp


                    <tr>

                        <td class="subject">

                            {{ $result->subjectname }}

                        </td>


                        <td>

                            {{ $result->test_1 }}

                        </td>


                        <td>

                            {{ $result->test_2 }}

                        </td>


                        <td>

                            {{ $result->exams }}

                        </td>


                        <td>

                            <strong>
                                {{ $subjectTotal }}
                            </strong>

                        </td>


                        <td>

                            <strong>
                                {{ $grade }}
                            </strong>

                        </td>


                        <td>

                            {{ $remark }}

                        </td>

                    </tr>

                @endforeach


                <tr class="total-row">

                    <td>
                        TOTAL SCORE
                    </td>

                    <td colspan="3">
                        -
                    </td>

                    <td>
                        {{ $total_score }}
                    </td>

                    <td colspan="2">
                        -
                    </td>

                </tr>

            </tbody>

        </table>


        {{-- ================================
             RESULT SUMMARY
        ================================= --}}

        <table class="result-table student-info">

            <tr>

                <td class="info-label">
                    SCORE OBTAINED
                </td>

                <td>
                    <strong>
                        {{ $total_score }}
                    </strong>
                </td>


                <td class="info-label">
                    AVERAGE
                </td>

                <td>
                    {{ $average ?? '-' }}
                </td>


                <td class="info-label">
                    POSITION
                </td>

                <td>
                    {{ $positionText }}
                    <b>OUT OF</b>
                    {{ $numberinclass ?? '-' }}
                </td>

            </tr>

        </table>


        {{-- ================================
             AFFECTIVE & PSYCHOMOTOR
        ================================= --}}

        <div class="domains-wrapper">


            {{-- AFFECTIVE DOMAIN --}}

            <div class="domain-box">

                <table class="result-table domain-table">

                    <thead>

                        <tr>

                            <th>AFFECTIVE DOMAIN</th>

                            <th>A</th>

                            <th>B</th>

                            <th>C</th>

                            <th>D</th>

                            <th>E</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($view_getresultsdomains as $domain)

                            @if ($domain->psycomoto == 'Cognitive Domain')

                                <tr>

                                    <td class="domain-name">

                                        {{ $domain->cogname }}

                                    </td>


                                    @foreach(['A', 'B', 'C', 'D', 'E'] as $grade)

                                        <td>

                                            @if($domain->punt1 == $grade)

                                                <i class="fas fa-check"></i>

                                            @endif

                                        </td>

                                    @endforeach

                                </tr>

                            @endif

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- PSYCHOMOTOR DOMAIN --}}

            <div class="domain-box">

                <table class="result-table domain-table">

                    <thead>

                        <tr>

                            <th>PSYCHOMOTOR DOMAIN</th>

                            <th>A</th>

                            <th>B</th>

                            <th>C</th>

                            <th>D</th>

                            <th>E</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($view_getresultsdomains as $domain)

                            @if ($domain->psycomoto == 'Psychomotor Domain')

                                <tr>

                                    <td class="domain-name">

                                        {{ $domain->cogname }}

                                    </td>


                                    @foreach(['A', 'B', 'C', 'D', 'E'] as $grade)

                                        <td>

                                            @if($domain->punt5 == $grade)

                                                <i class="fas fa-check"></i>

                                            @endif

                                        </td>

                                    @endforeach

                                </tr>

                            @endif

                        @endforeach

                    </tbody>

                </table>

            </div>


        </div>


        {{-- ================================
             GRADING SYSTEM
        ================================= --}}

        <table class="result-table grading-table">

            <tr>

                <th colspan="5">
                    GRADING SYSTEM
                </th>

            </tr>


            <tr>

                <td>80 - 100</td>

                <td>70 - 79</td>

                <td>60 - 69</td>

                <td>50 - 59</td>

                <td>0 - 49</td>

            </tr>


            <tr>

                <td>A</td>

                <td>B</td>

                <td>C</td>

                <td>D</td>

                <td>F</td>

            </tr>

        </table>


        {{-- ================================
             ADDITIONAL INFORMATION
        ================================= --}}

        <table class="result-table student-info">

            <tr>

                <td class="info-label">
                    CONDUCT
                </td>

                <td>
                    {{ optional($view_getresultsdomains->first())->conduct ?? '-' }}
                </td>


                <td class="info-label">
                    ATTENDANCE
                </td>

                <td>
                    {{ optional($view_getresultsdomains->first())->attendant ?? '-' }}
                </td>


                <td class="info-label">
                    OUT OF
                </td>

                <td>
                    {{ optional($view_getresultsdomains->first())->outoff ?? '-' }}
                </td>

            </tr>


            <tr>

                <td class="info-label">Result Pass/Fail:</td>
                <td class="info-label">@if ($average >= 49) Pass @else Fail @endif</td>

                <td class="info-label">
                    NEXT TERM FEES
                </td>

                
                <td colspan="3">

                    ₦{{ number_format((float)(optional($view_getresultsdomains->first())->nextermschoolfees ?? 0), 2) }}

                </td>
                

            </tr>

        </table>


        {{-- ================================
             COMMENTS
        ================================= --}}

        <table class="result-table comment-table">

            <tr>

                <td class="comment-label">

                    CLASS TEACHER'S COMMENT

                </td>


                <td>

                    {{ optional($view_getresultsdomains->first())->teacher_comment ?? '-' }}

                </td>

            </tr>


            <tr>

                <td class="comment-label">

                    HEAD TEACHER'S COMMENT

                </td>


                <td>

                    {{ $result->headteach_comment ?? '-' }}

                </td>

            </tr>


            <tr>

                <td class="comment-label">

                    SIGNATURE

                </td>


                <td>

                    @if($studentResult && $studentResult->signature)

                        <img
                            class="signature-image"
                            src="{{ URL::asset('/public/../' . $studentResult->signature) }}"
                            alt="Signature">

                    @endif

                </td>

            </tr>

        </table>


    </div>


    <script>

        window.addEventListener('load', function () {

            window.print();

        });

    </script>

</body>

</html>

