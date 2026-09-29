<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $print_students->surname }} {{ $print_students->fname }} — Registration slip</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600&family=Spectral:wght@400;600&display=swap" rel="stylesheet">

  <style>
    :root{
      --paper:#ffffff;
      --ink:#16201b;
      --muted:#6d7772;
      --green:#0f4c37;
      --gold:#a8813a;
      --rule:#d6dbd7;
      --tint:#f4f6f4;
    }

    *{box-sizing:border-box;margin:0;padding:0}

    body{
      background:#e8ebe8;
      color:var(--ink);
      font-family:"Archivo","Helvetica Neue",Arial,sans-serif;
      font-size:12px;
      line-height:1.5;
      -webkit-font-smoothing:antialiased;
      padding:24px 16px;
    }

    .sheet{
      width:210mm;
      min-height:297mm;
      margin:0 auto;
      background:var(--paper);
      padding:18mm 16mm 14mm;
      box-shadow:0 2px 24px rgba(22,32,27,.18);
    }

    /* ---------- masthead ---------- */
    .masthead{
      display:grid;
      grid-template-columns:28mm 1fr 28mm;
      gap:10mm;
      align-items:center;
    }

    .crest img{
      width:28mm;
      height:28mm;
      object-fit:contain;
    }

    .portrait{
      width:28mm;
      height:34mm;
      border:1px solid var(--rule);
      padding:2px;
      background:var(--tint);
    }
    .portrait img{
      width:100%;
      height:100%;
      object-fit:cover;
      display:block;
    }

    .school-name{
      font-family:"Spectral",Georgia,serif;
      font-weight:600;
      font-size:25px;
      line-height:1.15;
      letter-spacing:.005em;
      text-align:center;
      color:var(--green);
      text-transform: uppercase;
      font-weight: bold;
    }

    .school-meta{
      text-align:center;
      color:var(--muted);
      font-size:11px;
      font-style:normal;
      margin-top:5px;
    }
    .school-meta .motto{
      font-family:"Spectral",Georgia,serif;
      font-style:italic;
      color:var(--ink);
      display:block;
      margin-top:3px;
    }

    .crest-rule{
      margin-top:7mm;
      border-top:2.5px solid var(--green);
      border-bottom:1px solid var(--gold);
      height:4px;
    }

    /* ---------- document line ---------- */
    .doc-line{
      display:flex;
      justify-content:space-between;
      align-items:baseline;
      gap:12px;
      padding:4mm 0 0;
      color:var(--muted);
      font-size:11px;
    }
    .doc-line strong{
      color:var(--ink);
      font-weight:600;
      letter-spacing:.06em;
      font-size:11px;
    }

    /* ---------- hero: the student ---------- */
    .student{
      padding:7mm 0 6mm;
      border-bottom:1px solid var(--rule);
    }
    .student h1{
      font-family:"Spectral",Georgia,serif;
      font-weight:600;
      font-size:31px;
      line-height:1.1;
      letter-spacing:-.01em;
    }
    .student .sub{
      margin-top:5px;
      color:var(--muted);
      font-size:12px;
    }
    .student .sub span + span:before{
      content:"/";
      color:var(--rule);
      margin:0 7px;
    }

    /* ---------- data ---------- */
    .columns{
      display:grid;
      grid-template-columns:1fr 1fr;
      column-gap:14mm;
      padding-top:5mm;
    }

    .field{
      display:flex;
      align-items:baseline;
      gap:6px;
      padding:6px 0;
      border-bottom:1px dotted var(--rule);
    }
    .field dt{
      color:var(--muted);
      white-space:nowrap;
      flex:0 0 auto;
      min-width:34mm;
    }
    .field dd{
      font-weight:500;
      text-align:right;
      margin-left:auto;
      word-break:break-word;
    }
    .field dd:empty:after{
      content:"—";
      color:var(--rule);
    }

    .group-title{
      font-family:"Spectral",Georgia,serif;
      font-size:14px;
      font-weight:600;
      color:var(--green);
      padding:6mm 0 2px;
      border-bottom:1px solid var(--green);
    }
    .columns > div > .group-title:first-child{padding-top:3mm}

    /* ---------- footer ---------- */
    .footnote{
      margin-top:9mm;
      background:var(--tint);
      border-left:3px solid var(--gold);
      padding:9px 12px;
      color:var(--muted);
      font-size:11px;
    }

    .issued{
      margin-top:6mm;
      display:flex;
      justify-content:space-between;
      color:var(--muted);
      font-size:10px;
      border-top:1px solid var(--rule);
      padding-top:3mm;
    }

    /* ---------- print ---------- */
    @page{size:A4;margin:12mm}

    @media print{
      body{background:none;padding:0}
      .sheet{
        width:auto;
        min-height:0;
        box-shadow:none;
        padding:0;
      }
      .footnote,.portrait{
        -webkit-print-color-adjust:exact;
        print-color-adjust:exact;
      }
    }

    @media screen and (max-width:760px){
      .sheet{width:100%;padding:20px}
      .masthead{grid-template-columns:20mm 1fr;gap:12px}
      .portrait{grid-column:1 / -1;justify-self:center}
      .school-name{font-size:20px;text-align:left}
      .school-meta{text-align:left}
      .columns{grid-template-columns:1fr}
      .student h1{font-size:24px}
    }
  </style>
</head>
<body>

<div class="sheet">

  <header class="masthead">
    <div class="crest">
      <img src="{{ URL::asset("/public/../$print_students->logo") }}" alt="{{ $print_students->schoolname }} crest">
    </div>

    <div>
      <div class="school-name">{{ $print_students->schoolname }}</div>
      <div class="school-meta">
        {{ $print_students->address }}
        <span class="motto">{{ $print_students->motor }}</span>
      </div>
    </div>

    <div class="portrait">
      <img src="{{ URL::asset("/public/../$print_students->images") }}" alt="Passport photograph of {{ $print_students->surname }} {{ $print_students->fname }}">
    </div>
  </header>

  <div class="crest-rule"></div>

  <div class="doc-line">
    <strong>Student registration slip</strong>
    <span>{{ $print_students->created_at->format('D d M Y, H:i') }}</span>
  </div>

  <section class="student">
    <h1>{{ $print_students->surname }}, {{ $print_students->fname }} {{ $print_students->middlename }}</h1>
    <p class="sub">
      <span>{{ $print_students->classname }}</span>
      <span>{{ $print_students->section }}</span>
      <span>{{ $print_students->term }}, {{ $print_students->academic_session }}</span>
    </p>
  </section>

  <div class="columns">

    <div>
      <div class="group-title">Student</div>
      <dl>
        <div class="field"><dt>Surname</dt><dd>{{ $print_students->surname }}</dd></div>
        <div class="field"><dt>First name</dt><dd>{{ $print_students->fname }}</dd></div>
        <div class="field"><dt>Middle name</dt><dd>{{ $print_students->middlename }}</dd></div>
        <div class="field"><dt>Gender</dt><dd>{{ $print_students->gender }}</dd></div>
        <div class="field"><dt>Registration Number</dt><dd>{{ $print_students->regnumber }}</dd></div>
        <div class="field"><dt>DOB</dt><dd>{{ $print_students->dob }}</dd></div>
        <div class="field"><dt>Alm</dt><dd>{{ $print_students->alms }}</dd></div>
      </dl>
    </div>

    <div>
      <div class="group-title">School</div>
      <dl>
        <div class="field"><dt>School</dt><dd>{{ $print_students->school['schoolname'] }}</dd></div>
        <div class="field"><dt>Address</dt><dd>{{ $print_students->school['address'] }}</dd></div>
        <div class="field"><dt>Local government</dt><dd>{{ $print_students->school['lga'] }}</dd></div>
        <div class="field"><dt>Board</dt><dd>{{ $print_students->school['schooltype'] }}</dd></div>
        <div class="field"><dt>Class</dt><dd>{{ $print_students->classname }}</dd></div>
        <div class="field"><dt>Section</dt><dd>{{ $print_students->section }}</dd></div>
      </dl>
    </div>

  </div>

  <p class="footnote">This slip is generated by the school records system and is valid without a signature.</p>

  <div class="issued">
    <span>{{ $print_students->schoolname }}</span>
    <span>Printed {{ $print_students->created_at->format('d/m/Y') }}</span>
  </div>

</div>

<script>
  window.addEventListener("load", function () {
    window.print();
  });
</script>

</body>
</html>