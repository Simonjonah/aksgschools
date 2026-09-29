@include('dashboard.teacher.header')

<!-- Main Sidebar Container -->
@include('dashboard.teacher.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>View Result</h1>
          @php
            $globalIndex = 0;
            $total = 0;
          @endphp
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <style>
    /* ============================================================
       Report card redesign
       All classes are prefixed "rc-" so they never collide with
       the surrounding AdminLTE dashboard styles.
       ============================================================ */

    .rc-page {
      --rc-navy: #1B3A5C;
      --rc-navy-dark: #122A44;
      --rc-green: #2F7D5C;
      --rc-green-bg: #E7F5EF;
      --rc-red: #C0392B;
      --rc-red-bg: #FBEAE8;
      --rc-amber: #B7791F;
      --rc-amber-bg: #FBF3E3;
      --rc-border: #E1E6ED;
      --rc-bg: #F6F8FA;
      --rc-text: #2A3342;
      --rc-text-soft: #6B7686;

      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
      color: var(--rc-text);
      max-width: 1140px;
      margin: 0 auto 40px auto;
    }

    .rc-card {
      background: #fff;
      border: 1px solid var(--rc-border);
      border-radius: 10px;
      padding: 24px 28px;
      margin-bottom: 20px;
      box-shadow: 0 1px 3px rgba(16, 24, 40, 0.04);
    }

    /* ---------- Letterhead ---------- */
    .rc-letterhead {
      display: flex;
      align-items: center;
      gap: 24px;
      background: var(--rc-navy);
      color: #fff;
      border-radius: 10px;
      padding: 22px 28px;
      margin-bottom: 20px;
    }
    .rc-letterhead__logo,
    .rc-letterhead__photo {
      width: 84px;
      height: 84px;
      border-radius: 8px;
      object-fit: cover;
      background: #fff;
      flex-shrink: 0;
    }
    .rc-letterhead__photo {
      margin-left: auto;
      border: 2px solid rgba(255, 255, 255, 0.5);
    }
    .rc-letterhead__body {
      flex: 1;
      text-align: center;
    }
    .rc-letterhead__name {
      font-family: Georgia, "Times New Roman", serif;
      font-size: 26px;
      font-weight: 700;
      letter-spacing: 0.3px;
      margin: 0 0 4px 0;
      text-transform: uppercase;
    }
    .rc-letterhead__motto {
      font-style: italic;
      font-size: 13px;
      opacity: 0.85;
      margin: 0 0 2px 0;
    }
    .rc-letterhead__address {
      font-size: 13px;
      opacity: 0.85;
      margin: 0;
    }

    /* ---------- Action bar ---------- */
    .rc-actionbar {
      display: flex;
      align-items: center;
      gap: 10px;
      flex-wrap: wrap;
      margin-bottom: 18px;
    }
    .rc-btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      border: 1px solid transparent;
      border-radius: 7px;
      padding: 9px 16px;
      font-size: 13.5px;
      font-weight: 600;
      cursor: pointer;
      transition: filter 0.15s ease;
    }
    .rc-btn:hover { filter: brightness(0.94); }
    .rc-btn-primary { background: var(--rc-navy); color: #fff; }
    .rc-btn-success { background: var(--rc-green); color: #fff; }
    .rc-btn-danger  { background: var(--rc-red); color: #fff; }
    .rc-btn-outline {
      background: #fff;
      color: var(--rc-navy);
      border-color: var(--rc-border);
    }

    /* ---------- Student meta grid ---------- */
    .rc-meta {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }
    .rc-meta dl {
      margin: 0;
      display: grid;
      grid-template-columns: 150px 1fr;
      row-gap: 10px;
      column-gap: 12px;
    }
    .rc-meta dt {
      font-size: 12.5px;
      font-weight: 600;
      color: var(--rc-text-soft);
      text-transform: uppercase;
      letter-spacing: 0.3px;
    }
    .rc-meta dd {
      margin: 0;
      font-size: 14px;
      font-weight: 600;
      color: var(--rc-text);
    }
    .rc-meta dd a { color: var(--rc-navy); text-decoration: none; }
    .rc-meta dd a:hover { text-decoration: underline; }

    /* ---------- Results table ---------- */
    .rc-table-scroll { overflow-x: auto; }
    .rc-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 13px;
      min-width: 720px;
    }
    .rc-table caption {
      text-align: left;
      font-weight: 700;
      font-size: 15px;
      padding-bottom: 12px;
      color: var(--rc-navy-dark);
    }
    .rc-table thead th {
      background: var(--rc-bg);
      color: var(--rc-text-soft);
      font-size: 11.5px;
      text-transform: uppercase;
      letter-spacing: 0.3px;
      font-weight: 700;
      padding: 10px 8px;
      border-bottom: 2px solid var(--rc-border);
      text-align: center;
      white-space: nowrap;
    }
    .rc-table thead th:first-child { text-align: left; }
    .rc-table tbody td {
      padding: 8px;
      border-bottom: 1px solid var(--rc-border);
      text-align: center;
    }
    .rc-table tbody td:first-child {
      text-align: left;
      font-weight: 600;
    }
    .rc-table tbody td a { color: var(--rc-text); text-decoration: none; }
    .rc-table tbody tr:nth-child(even) { background: #FAFBFC; }
    .rc-table tbody tr:hover { background: #F1F5F9; }
    .rc-table tfoot td {
      font-weight: 700;
      padding: 10px 8px;
      border-top: 2px solid var(--rc-border);
      text-align: center;
    }
    .rc-table tfoot td:first-child { text-align: left; }

    .rc-link-edit { color: var(--rc-navy); font-weight: 600; text-decoration: none; }
    .rc-link-edit:hover { text-decoration: underline; }

    .rc-radio-cell, .rc-check-cell {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      font-size: 12.5px;
      font-weight: 600;
      color: var(--rc-text-soft);
    }

    /* ---------- Badges ---------- */
    .rc-badge {
      display: inline-block;
      padding: 3px 10px;
      border-radius: 999px;
      font-size: 11.5px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.3px;
    }
    .rc-badge-approved { background: var(--rc-green-bg); color: var(--rc-green); }
    .rc-badge-suspended { background: var(--rc-red-bg); color: var(--rc-red); }
    .rc-badge-unapproved { background: var(--rc-amber-bg); color: var(--rc-amber); }

    /* ---------- Domain grades ---------- */
    .rc-domains {
      display: grid;
      grid-template-columns: 1fr 1fr 0.7fr;
      gap: 18px;
    }
    .rc-domain-card table {
      width: 100%;
      border-collapse: collapse;
      font-size: 12.5px;
    }
    .rc-domain-card caption {
      text-align: left;
      font-weight: 700;
      font-size: 13px;
      padding-bottom: 8px;
      color: var(--rc-navy-dark);
      text-transform: uppercase;
      letter-spacing: 0.3px;
    }
    .rc-domain-card th, .rc-domain-card td {
      border-bottom: 1px solid var(--rc-border);
      padding: 6px 4px;
      text-align: center;
    }
    .rc-domain-card td:first-child, .rc-domain-card th:first-child { text-align: left; }
    .rc-domain-card .fas.fa-check { color: var(--rc-green); }
    .rc-key-card td { font-weight: 600; }

    /* ---------- Summary ---------- */
    .rc-summary table {
      width: 100%;
      border-collapse: collapse;
      font-size: 13.5px;
    }
    .rc-summary td {
      padding: 8px 6px;
      border-bottom: 1px solid var(--rc-border);
    }
    .rc-summary td.rc-label {
      font-weight: 700;
      color: var(--rc-text-soft);
      width: 15%;
      white-space: nowrap;
    }

    /* ---------- Remarks ---------- */
    .rc-remarks table {
      width: 100%;
      border-collapse: collapse;
      font-size: 13.5px;
    }
    .rc-remarks td {
      padding: 10px 6px;
      border-bottom: 1px solid var(--rc-border);
      vertical-align: middle;
    }
    .rc-remarks td.rc-label {
      font-weight: 700;
      color: var(--rc-text-soft);
      width: 18%;
      white-space: nowrap;
    }
    .rc-remarks a { color: var(--rc-navy); text-decoration: none; }
    .rc-remarks a:hover { text-decoration: underline; }
    .rc-signature {
      width: 46px;
      height: 46px;
      object-fit: cover;
      border-radius: 6px;
      border: 1px solid var(--rc-border);
      vertical-align: middle;
      margin-right: 10px;
    }

    @media (max-width: 900px) {
      .rc-meta,
      .rc-domains { grid-template-columns: 1fr; }
      .rc-letterhead { flex-wrap: wrap; text-align: center; }
      .rc-letterhead__photo { margin-left: 0; }
    }

    @media print {
      .rc-actionbar,
      .content-header,
      .main-sidebar,
      .main-header,
      .main-footer { display: none !important; }
      .rc-card, .rc-letterhead { box-shadow: none; border: 1px solid #ccc; }
    }
  </style>

  <div class="rc-page">

    <!-- Letterhead -->
    @foreach ($view_getresults as $view_getresult)
      @if ($view_getresult->status == 'approved' || $view_getresult->status == null || $view_getresult->status == 'suspend')
        <div class="rc-letterhead">
          <img class="rc-letterhead__logo" src="{{ asset('public/../'.$view_getresult->logo) }}" alt="School logo">
          <div class="rc-letterhead__body">
            <h1 class="rc-letterhead__name">{{ $view_getresult->school['schoolname'] }}</h1>
            <p class="rc-letterhead__motto">{{ $view_getresult->school['motor'] }}</p>
            <p class="rc-letterhead__address">{{ $view_getresult->school['address'] }}</p>
          </div>
          <img class="rc-letterhead__photo" src="{{ asset('public/../'.$view_getresult->images) }}" alt="Student photo">
        </div>
        @break
      @endif
    @endforeach

    <!-- Student / academic meta -->
    @foreach ($view_getresults as $view_getresult)
      @if ($view_getresult->status == 'approved' || $view_getresult->status == null || $view_getresult->status == 'suspend')
        <div class="rc-card rc-meta">
          <dl>
            <dt>Name of student</dt>
            <dd><a href="#">{{ $view_getresult->surname }}, {{ $view_getresult->fname }} {{ $view_getresult->middlename }}</a></dd>

            <dt>Class</dt>
            <dd>{{ $view_results->classname }}</dd>

            <dt>Position</dt>
            <dd>
              @if($currentStudent['position'] == 1) {{ $currentStudent['position'] }}st
              @elseif($currentStudent['position'] == 2) {{ $currentStudent['position'] }}nd
              @elseif($currentStudent['position'] == 3) {{ $currentStudent['position'] }}rd
              @else {{ $currentStudent['position'] }}th
              @endif
            </dd>

            <dt>Date of birth</dt>
            <dd>{{ $view_getresult->dob }}</dd>

            <dt>Gender</dt>
            <dd>{{ $view_getresult->gender }}</dd>
          </dl>

          <dl>
            <dt>Session / term</dt>
            <dd>{{ $view_results->academic_session }}/{{ $view_results->term }}</dd>

            <dt>Admission no.</dt>
            <dd>{{ $view_results->regnumber }}</dd>

            <dt>Date</dt>
            <dd>{{ $view_results->created_at->format('d M, Y') }}</dd>

            <dt>No. in class</dt>
            <dd>{{ $numberinclass }}</dd>

            <dt>Average</dt>
            <dd>{{ $currentStudent['average'] }}</dd>

            <dt>Next term begins</dt>
            <dd>{{ $view_results->nextterm }}</dd>
          </dl>
        </div>
        @break
      @endif
    @endforeach

    <?php $total_score = 0; ?>

    <form method="POST" action="{{ route('admin.approveallprimary') }}">
      @csrf
      <input type="hidden" name="action_type" id="action_type" value="">

      <div class="rc-actionbar">
        @if(Auth::guard('web')->user()->role == 'Principal')
          <button type="button" class="rc-btn rc-btn-success" id="approve_all" name="approve_all">Approve all</button>
        @endif
        <button type="button" class="rc-btn rc-btn-danger" id="delete_all" name="delete_all">Delete all</button>
      </div>

      <div class="rc-card">
        <div class="rc-table-scroll">
          <table class="rc-table">
            <caption>Subject results</caption>
            <thead>
              <tr>
                <th>Subject</th>
                <th>1st test (20%)</th>
                <th>2nd test (20%)</th>
                <th>Exam (60%)</th>
                <th>Total (100%)</th>
                <th>Grade</th>
                <th>Remark</th>
                <th>Edit</th>
                @if(Auth::guard('web')->user()->role == 'Principal')
                  <th>Approve</th>
                @endif
                <th>Delete</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($view_getresults as $view_getresult)
                @if ($view_getresult->status == 'approved' || $view_getresult->status == 'suspend' || $view_getresult->status == null)
                  @php
                    $total += $view_getresult->test_1 + $view_getresult->test_2 + $view_getresult->exams;
                  @endphp
                  @if ($view_getresult)
                    <tr>
                      <td><a href="#">{{ $view_getresult->subjectname }}</a></td>

                      <td>
                        @if($view_getresult->test_1 == 0 || $view_getresult->test_1 == null) <span>-</span>
                        @else <span>{{ $view_getresult->test_1 }}</span>
                        @endif
                      </td>

                      <td>
                        @if($view_getresult->test_2 == 0 || $view_getresult->test_2 == null) <span>-</span>
                        @else <span>{{ $view_getresult->test_2 }}</span>
                        @endif
                      </td>

                      <td>
                        @if($view_getresult->exams == 0 || $view_getresult->exams == null) <span>-</span>
                        @else <span>{{ $view_getresult->exams }}</span>
                        @endif
                      </td>

                      <td>
                        @if((float)$view_getresult->test_1 + (float)$view_getresult->test_2 + $view_getresult->exams == 0 || $view_getresult->test_1 + (float)$view_getresult->test_2 + $view_getresult->exams == null)
                          <span>-</span>
                        @else
                          <span>{{ (float)$view_getresult->test_1 + (float)$view_getresult->test_2 + (float)$view_getresult->exams }}</span>
                        @endif
                      </td>

                      <td>
                        @if((float)$view_getresult->test_1 + (float)$view_getresult->test_2 + (float)$view_getresult->exams == 0 || (float)$view_getresult->test_1 + (float)$view_getresult->test_2 + (float)$view_getresult->exams == null)
                          <span>-</span>
                        @elseif((float)$view_getresult->test_1 + (float)$view_getresult->test_2 + (float)$view_getresult->exams > 80)
                          <span>A</span>
                        @elseif((float)$view_getresult->test_1 + (float)$view_getresult->test_2 + (float)$view_getresult->exams > 70)
                          <span>B</span>
                        @elseif((float)$view_getresult->test_1 + (float)$view_getresult->test_2 + (float)$view_getresult->exams > 60)
                          <span>C</span>
                        @elseif((float)$view_getresult->test_1 + (float)$view_getresult->test_2 + (float)$view_getresult->exams > 50)
                          <span>D</span>
                          @elseif((float)$view_getresult->test_1 + (float)$view_getresult->test_2 + (float)$view_getresult->exams > 40)
                          <span>E</span>
                        @else
                          <span>F</span>
                        @endif
                      </td>

                      <td>
                        @if((float)$view_getresult->test_1 + (float)$view_getresult->test_2 + (float)$view_getresult->exams == 0 || (float)$view_getresult->test_1 + (float)$view_getresult->exams == null)
                          <span>-</span>
                        @elseif((float)$view_getresult->test_1 + (float)$view_getresult->test_2 + (float)$view_getresult->exams > 79)
                          <span>Excellent</span>
                        @elseif((float)$view_getresult->test_1 + (float)$view_getresult->test_2 + (float)$view_getresult->exams > 69)
                          <span>Very good</span>
                        @elseif((float)$view_getresult->test_1 + (float)$view_getresult->test_2 + (float)$view_getresult->exams > 59)
                          <span>Good</span>
                        @elseif((float)$view_getresult->test_1 + (float)$view_getresult->test_2 + (float)$view_getresult->exams > 49)
                          <span>Pass</span>
                        @elseif((float)$view_getresult->test_1 + (float)$view_getresult->test_2 + (float)$view_getresult->exams > 48)
                          <span>Fail</span>
                        @else
                          <span>Fail</span>
                        @endif
                      </td>

                      <td><a class="rc-link-edit" href="{{ url('admin/editresultsbyteacher/'.$view_getresult->ref_no2) }}">Edit</a></td>

                      @if(Auth::guard('web')->user()->role == 'Principal')
                        <td>
                          <label class="rc-radio-cell">
                            <input type="hidden" name="terminals[{{ $globalIndex }}][id]" value="{{ $view_getresult->id }}">
                            <input type="radio" name="terminals[{{ $globalIndex }}][status]" value="approved" class="approve_radio">
                            Approve
                          </label>
                        </td>
                        @php $globalIndex++; @endphp
                      @endif

                      <td>
                        <label class="rc-check-cell">
                          <input type="hidden" name="terminals[{{ $globalIndex }}][id]" value="{{ $view_getresult->id }}">
                          <input type="checkbox" name="delete_ids[]" value="{{ $view_getresult->id }}" class="delete_checkbox">
                          Delete
                        </label>
                      </td>

                      <td>
                        @if($view_getresult->status == 'approved')
                          <span class="rc-badge rc-badge-approved">Approved</span>
                        @elseif($view_getresult->status == 'suspend')
                          <span class="rc-badge rc-badge-suspended">Suspended</span>
                        @elseif($view_getresult->status == null)
                          <span class="rc-badge rc-badge-unapproved">Unapproved</span>
                        @endif
                      </td>
                    </tr>
                  @endif
                @endif
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td>Total</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>{{ $total }}</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>

      <div class="rc-actionbar">
        @if(Auth::guard('web')->user()->role == 'Principal')
          <button type="submit" class="rc-btn rc-btn-primary">Submit approval</button>
          <button type="submit" class="rc-btn rc-btn-danger" id="delete_all_submit">Delete</button>
        @else
          <button type="submit" class="rc-btn rc-btn-danger" id="delete_all_submit">Delete</button>
        @endif
      </div>
    </form>

    <!-- Domain grades -->
    <div class="rc-domains">
      <div class="rc-card rc-domain-card">
        <table>
          <caption>Cognitive domain</caption>
          <thead>
            <tr><th>-</th><th>A</th><th>B</th><th>C</th><th>D</th><th>E</th></tr>
          </thead>
          <tbody>
            @foreach ($getyour_resultsdomains as $getyour_resultsdomain)
              @if ($getyour_resultsdomain->psycomoto == 'Cognitive Domain')
                <tr>
                  <td>{{ $getyour_resultsdomain->cogname }}</td>
                  <td>@if ($getyour_resultsdomain->punt1 == 'A') <i class="fas fa-check"></i> @endif</td>
                  <td>@if ($getyour_resultsdomain->punt1 == 'B') <i class="fas fa-check"></i> @endif</td>
                  <td>@if ($getyour_resultsdomain->punt1 == 'C') <i class="fas fa-check"></i> @endif</td>
                  <td>@if ($getyour_resultsdomain->punt1 == 'D') <i class="fas fa-check"></i> @endif</td>
                  <td>@if ($getyour_resultsdomain->punt1 == 'E') <i class="fas fa-check"></i> @endif</td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="rc-card rc-domain-card">
        <table>
          <caption>Psychomotor domain</caption>
          <thead>
            <tr><th>-</th><th>A</th><th>B</th><th>C</th><th>D</th><th>E</th></tr>
          </thead>
          <tbody>
            @foreach ($getyour_resultsdomains as $getyour_resultsdomain)
              @if ($getyour_resultsdomain->psycomoto == 'Psychomotor Domain')
                <tr>
                  <td>{{ $getyour_resultsdomain->cogname }}</td>
                  <td>@if ($getyour_resultsdomain->punt5 == 'A') <i class="fas fa-check"></i> @endif</td>
                  <td>@if ($getyour_resultsdomain->punt5 == 'B') <i class="fas fa-check"></i> @endif</td>
                  <td>@if ($getyour_resultsdomain->punt5 == 'C') <i class="fas fa-check"></i> @endif</td>
                  <td>@if ($getyour_resultsdomain->punt5 == 'D') <i class="fas fa-check"></i> @endif</td>
                  <td>@if ($getyour_resultsdomain->punt5 == 'E') <i class="fas fa-check"></i> @endif</td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="rc-card rc-domain-card rc-key-card">
        <table>
          <caption>Key</caption>
          <thead>
            <tr><th>A</th><th>B</th><th>C</th><th>D</th><th>E</th></tr>
          </thead>
          <tbody>
            <tr>
              <td>Excellent</td>
              <td>Very good</td>
              <td>Good</td>
              <td>Pass</td>
              <td>Fail</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Summary -->
    <div class="rc-card rc-summary">
      <table>
        <tr>
          <td class="rc-label">Average</td>
          <td>{{ $average }}</td>
          <td class="rc-label">Result</td>
          <td>@if ($average >= 49) Pass @else Fail @endif</td>
          <td class="rc-label">Position in class</td>
          <td>
            @if($currentStudent['position'] == 1) {{ $currentStudent['position'] }}st
            @elseif($currentStudent['position'] == 2) {{ $currentStudent['position'] }}nd
            @elseif($currentStudent['position'] == 3) {{ $currentStudent['position'] }}rd
            @else {{ $currentStudent['position'] }}th
            @endif
          </td>
        </tr>
        <tr>
          <td class="rc-label">Out of</td>
          <td>{{ $numberinclass }}</td>
          <td class="rc-label">Conduct</td>
          <td>{{ $getyour_resultsdomain->conduct }}</td>
          <td class="rc-label">Attendance</td>
          <td>{{ $getyour_resultsdomain->attendant }}</td>
        </tr>
        <tr>
          <td class="rc-label">Next term begins</td>
          <td>{{ $view_results->nextterm }}</td>
          <td class="rc-label">Next term fees</td>
          <td colspan="3">NGN {{ $getyour_resultsdomain->nextermschoolfees }}</td>
        </tr>
        <tr>
          <td class="rc-label">Teacher remarks</td>
          <td colspan="5">{{ $view_results->teacher_comment }}</td>
        </tr>
        <tr>
          <td class="rc-label">
            @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
              Head teacher remarks
            @elseif (Auth::guard('web')->user()->schooltype == 'SSEB')
              Principal remarks
            @endif
          </td>
          <td colspan="5">{{ $view_getresult->headteach_comment }}</td>
        </tr>
      </table>
    </div>

    <!-- Comments -->
    <div class="rc-card rc-remarks">
      <table>
        <tr>
          <td class="rc-label">Teacher's comment</td>
          <td><a style="text-decoration: underline; color: blue;" href="{{ url('admin/editcommentteacher/'.$view_results->ref_no) }}">{{ $view_results->teacher_comment }}</a></td>
        </tr>
        <tr>
          <td class="rc-label">Head teacher comment</td>
          <td><a style="text-decoration: underline; color: blue;" href="{{ url('admin/addheadteachercomment/'.$view_getresult->ref_no2) }}">{{ $view_getresult->headteach_comment }}</a></td>
          <td>
            @if (Auth::guard('web')->user()->role == 'Principal')
              <img class="rc-signature" src="{{ asset('public/../'.$view_getresult->signature) }}" alt="Signature">
              <a style="text-decoration: underline; color: blue;" href="{{ url('admin/addheadteachercomment/'.$view_getresult->ref_no2) }}">Add head teacher comment</a>
            @else
              <span>Principal</span>
            @endif
          </td>
        </tr>
      </table>
    </div>

  </div>

  <script>
    document.getElementById('approve_all').addEventListener('click', function () {
      document.getElementById('action_type').value = 'approve';
      document.querySelectorAll('.approve_radio').forEach(radio => radio.checked = true);
    });

    document.getElementById('delete_all').addEventListener('click', function () {
      document.querySelectorAll('.delete_checkbox').forEach(box => box.checked = true);
      if (confirm('Are you sure you want to delete all selected results?')) {
        this.closest('form').submit();
      }
    });
  </script>

</div>
@include('dashboard.teacher.footer')