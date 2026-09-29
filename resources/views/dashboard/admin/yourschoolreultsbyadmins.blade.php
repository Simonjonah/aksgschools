<!-- <!DOCTYPE html>
<html>
<head>
    @foreach ($getyour_results as $getyour_result)
    @if ($getyour_result->status == 'approved' || $getyour_result->status == null)
        
    @else
        
    @endif

@endforeach
    <title>{{ $getyour_result->schoolname }}</title>
</head> -->


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @foreach ($getyour_results as $getyour_result)
    @if ($getyour_result->status == 'approved' || $getyour_result->status == null)
        
    @else
        
    @endif

@endforeach
    <title>{{ $getyour_result->schoolname }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="icon" href="assets/dist/img/AdminLTELogo.png" type="image/x-icon">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../assets/plugins/summernote/summernote-bs4.css">

  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0" />
  {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}"> --}}
  <!-- Ionicons -->
  <!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- Theme style -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />


  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>


  <!-- Main Sidebar Container -->
  @include('dashboard.admin.sidebar')


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<style>
    /* table{
    width:200px;
    height:auto;
    table-layout:fixed;
} */


td {
  height: 3px; /* Adjust the height as per your requirements */
}
tr {
  height: 3px; /* Adjust the height as per your requirements */
}

td {
    margin: 0px;
  padding-top: 0px;
  padding-bottom: 0px;
}
table, th {
    border: 1px solid black;
  border-collapse: collapse;
}
table, td {
  border: 1px solid black;
  border-collapse: collapse;
  font-size: 12px;
  text-align: center;
  /* height:10px;
  padding: 0px;
  margin: 0px; */
}
table .b{
    border-style: none;
}
/* .dayopen, .von{
    font-size: 20px;
} */
table, tr, td{
    margin: 0;
    padding: 0;
}

</style>
<body>

    <?php

        //  $position = 0;

        // $rank = 1;
    // echo $studentpositions;

    // foreach ($studentpositions as $studentposition) {
    //  echo "Rank: " . $rank . ", Sum: " . $studentposition->total_score . "<br>";
    // $rank++;

    //     // $position += $studentpositions;
    // }


    // foreach ($totalScoreAndRank as $studentposition) {
    //     echo "Rank: " . $rank . ", Sum: " . $studentposition->total_score . "<br>";
    //     $rank++;
    // }

    // $totalScore
    ?>
       
   @php
       $total_score = 0;
   @endphp
        
        @foreach ($getyour_results as $getyour_result)
            @if ($getyour_result->status == 'approved' || $getyour_result->status == null)
                
            @else
                
            @endif

        @endforeach
 
  
  
    <table class="table">

        <tr>
            <th style="text-align: center; width: 120px;">
                {{-- <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('assets/dist/img/AdminLTELogo.png')))}}"> --}}
                {{-- <img src="{{ public_path('public/../'.$getyour_result->logo) }}"> --}}
				<img style="width: 100%; height: 100%" src="{{ URL::asset("/public/../$getyour_result->logo")}}">
            </th>
            <th style="text-transform:uppercase; text-align: center; width: 450px; font-weight: bold;"><h1>{{ $getyour_result->school['schoolname'] }}</h1>
                <p style="font-weight: normal; margin-bottom: -8px; font-size: 20px;">{{ $getyour_result->school['address'] }} {{ $getyour_result->school['lga'] }} L. G. Area, Akwa Ibom State - Nigeria</p>
                <p  style="font-weight: normal; font-style:italic; font-size: 20px;">Motto: {{ $getyour_result->school['motor'] }}</p> 
            </th>
                
            <th style="text-align: center; width: 120px;">
				<img style="width: 100%; height: 100%" src="{{ URL::asset("/public/../$getyour_result->images")}}">
            </th>
        </tr>
       

            <tr>
                <th colspan="2" style="text-align: center; text-transform: uppercase;">{{ $getyour_result->term }} REPORT FOR {{ $getyour_result->academic_session }} SESSION <br>
                    {{ $getyour_result->surname }}, {{ $getyour_result->fname }} {{ $getyour_result->middlename }}
                </th>
                <th>-</th>
            </tr>
    </table>

        
        

        <table id="myTable">
            <tr>
              <th style="font-size: 17px">SUBJECT</th>
              <th style="font-size: 17px">CONTINUOUS ASSESSMENT TEST 1</th>
              <th style="font-size: 17px">CONTINUOUS ASSESSMENT TEST 2</th>
              {{-- <th style="font-size: 17px">CAT 3</th> --}}
              <th style="font-size: 17px;">EXAMINATION</th>
              <th style="font-size: 17px;">TOTAL</th>
              <th style="font-size: 17px;">-</th>
              <th style="font-size: 17px;">GRADE</th>
              
            </tr>
            <tr>

              <td>-</td>
              <td>15</td>
              <td>15</td>
              <td>70</td>
              <td>100</td>
              <td>-</td>
              {{-- <td>-</td> --}}
              {{-- <td>-</td> --}}

            </tr>
       
            @foreach ($getyour_results as $getyour_result)
                @if ($getyour_result->status == 'approved' || $getyour_result->status == null)
                    @php
                    $total_score +=$getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams;
                    // $position +=$getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams;
                @endphp
            <tr>
                <td style="text-align: left; font-size: 17px;">{{ $getyour_result->subjectname }}</td>
                <td style="font-size: 17px;">{{ $getyour_result->test_1 }}</td>
                <td style="font-size: 17px;">{{ $getyour_result->test_2 }}</td>
                {{-- <td style="font-size: 17px;">{{ $getyour_result->test_3 }}</td> --}}
                <td style="font-size: 17px;">{{ $getyour_result->exams }}</td>
                <td style="font-size: 17px;">{{ $getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams}}</td>
                <td style="font-size: 17px;">@if ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 79)
                   
                    <td>A</td>
                    @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 69)
                    <td>B</td>

                    @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 59)
                    <td>C</td>

                    @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 49)
                    <td>D</td>

                    @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 49)
                    <td>E</td>

                    @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 39)
                    <td>F</td>

                    @else
                    <td>F</td>

                @endif</td>
                {{-- <td>{{ $totalaverage / 2 }}</td> --}}
                {{-- <td>{{ round($getyour_result['test_1'] + $getyour_result['test_2'] + $getyour_result['test_3'] + $getyour_result['exams'] / 2)  }}</td> --}}
                {{-- round( ($row['result1'] + $row['result2']) /2) ; --}}
            </tr>
                @else
                    
                @endif
           
            @endforeach

        

              <tr>
                <td>Total</td>
                <td>-</td>
                <td>-</td>
                {{-- <td>-</td> --}}
                <td>-</td>
                <td><b>{{ $total_score }}</b></td>
                <td></td>
                <td>Grade</td>
                
              </tr>

          </table>

          <style>
            .container .row .col .psy{
                width: 410px;
                display: inline-block;
            }

          </style>
          
          <div class="container" style="margin-top: 10px;">
            <div class="row">
                <div class="col">
                    <div class="psy">
                        <table class="table">
                            <tr>
                              <th style="font-size: 10px;"><b>AFFECTIVE DOMAIN</b></th>
                              <th>4</th>
                              <th>3</th>
                              <th>2</th>
                              <th>1</th>
                            </tr>

                            <tr>
                                @foreach ($getyour_resultsdomains as $getyour_resultsdomain)
                                    @if ($getyour_resultsdomain->psycomoto == 'Cognitive Domain')
                                    <tr>
                                <td style="text-align: left; font-size: 10px;">{{ $getyour_resultsdomain->cogname }}</td>
                                @if ($getyour_resultsdomain->punt1 == 'Yes')
                                    <td><i style="color: green" class="icon fas fa-check"></i> </td>
                                    @else
                                    <td><input type="checkbox" name="mentalalert1" value="Yes" id=""></td>
                                @endif

                                @if ($getyour_resultsdomain->punt2 == 'Yes')
                                    <td><i style="color: green" class="icon fas fa-check"></i> </td>
                                    @else
                                    <td><input type="checkbox" name="mentalalert1" value="Yes" id=""></td>
                                @endif

                                @if ($getyour_resultsdomain->punt3 == 'Yes')
                                    <td><i style="color: green" class="icon fas fa-check"></i> </td>
                                    @else
                                    <td><input type="checkbox" name="mentalalert1" value="Yes" id=""></td>
                                @endif

                                @if ($getyour_resultsdomain->punt4 == 'Yes')
                                    <td><i style="color: green" class="icon fas fa-check"></i> </td>
                                    @else
                                    <td><input type="checkbox" name="mentalalert1" value="Yes" id=""></td>
                                @endif

                               
                            </tr>
                            @else
                                
                            @endif
                            
                            @endforeach
                            </tr>
                            
                 
                          </table>
                    </div>

                    <div class="psy">
                        <table class="table">
                            <tr>
                              
                              <th style="font-size: 10px;"><b>PSYCOMOTOR DOMAIN</b></th>
                              <th>4</th>
                              <th>3</th>
                              <th>2</th>
                              <th>1</th>
                            </tr>
                             <tr>
                                @foreach ($getyour_resultsdomains as $getyour_resultsdomain)
                            @if ($getyour_resultsdomain->psycomoto == 'Psychomotor Domain')
                                <tr>
                                <td style="text-align: left; font-size: 10px;">{{ $getyour_resultsdomain->cogname }}</td>
                                @if ($getyour_resultsdomain->punt1 == 'Yes')
                                    <td><i style="color: green" class="icon fas fa-check"></i> </td>
                                    @else
                                    <td><input type="checkbox" name="mentalalert1" value="Yes" id=""></td>
                                @endif

                                @if ($getyour_resultsdomain->punt2 == 'Yes')
                                    <td><i style="color: green" class="icon fas fa-check"></i> </td>
                                    @else
                                    <td><input type="checkbox" name="mentalalert1" value="Yes" id=""></td>
                                @endif

                                @if ($getyour_resultsdomain->punt3 == 'Yes')
                                    <td><i style="color: green" class="icon fas fa-check"></i> </td>
                                    @else
                                    <td><input type="checkbox" name="mentalalert1" value="Yes" id=""></td>
                                @endif

                                @if ($getyour_resultsdomain->punt4 == 'Yes')
                                    <td><i style="color: green" class="icon fas fa-check"></i> </td>
                                    @else
                                    <td><input type="checkbox" name="mentalalert1" value="Yes" id=""></td>
                                @endif

                               
                            </tr>
                            @else
                                
                            @endif
                            
                            {{-- <td colspan="5" style="text-align: center">AFFECTIVE/PSYCOMOTOR DOMAIN</td> --}}
                
                            @endforeach
                             </tr>
                            
                            
                
                          </table>
                    </div>


                    {{-- <div class="psy">
                        <table class="table">
                            <tr>
                    
                              <th colspan="5">GRADING AND KEY</th>
                             
                            </tr>
                            <tr>

                              <td>4</td>
                              <td>3</td>
                              <td>2</td>
                              <td>1</td>
                
                            </tr> 

                            <tr>
                                <td> Exellence</td>
                                <td> Very Good</td>
                                <td> Good</td>
                                <td> Fair</td>
                            </tr>
                           
                          </table>
                    </div> --}}
                </div>
            </div>
          </div>
          
          </table>

          
          <table class="table" style="width: 880px;">
            <tr>
              <th colspan="5">GRADING AND KEY</th>
            </tr>
            <tr>

              <td>4</td>
              <td>3</td>
              <td>2</td>
              <td>1</td>

            </tr> 

            <tr>
                <td> Exellence</td>
                <td> Very Good</td>
                <td> Good</td>
                <td> Fair</td>
            </tr>
           
          </table>

          <table style="width: 880px">
            <tr>
                <td style="font-size: 20px"><b>REG NO:</b></td>
                <td style="font-size: 20px">{{ $getyour_result->regnumber }}</td>
                <td style="font-size: 20px"><b>SEX:</b></td>
                <td style="font-size: 20px">{{ $getyour_result->gender }}</td>
                {{-- <td>TOTAL SCORE OBTAINABLE:</td>
                <td>{{ $total_subject * 100 }}</td> --}}
                @php
                    // $rank = 1;
                @endphp
              
            </tr>
    
            <tr>
                <td style="font-size: 20px"><b>CLASS:</b></td>
                <td style="font-size: 20px">{{ $getyour_result->classname }}</td>
                <td style="font-size: 20px"><b>TERM:</b></td>
                <td style="font-size: 20px">{{ $getyour_result->term }} </td>
                <td style="font-size: 20px"><b>SCORE OBTAINED:</b></td>
                <td style="font-size: 20px">{{ $total_score }}</td>
    
                
            </tr>
            <tr>
                <td style="font-size: 20px"><b>AGE:</b></td>
                <td style="font-size: 20px">{{ $getyour_result->student['dob'] }}</td>
                <td style="font-size: 20px" colspan="2"></td>
               
                <td style="font-size: 20px"><b>PERCENTAGE:</b></td>
                <td style="font-size: 20px">{{ $total_score/100 }}</td>
            </tr>
            
        
    
         </table>
    
          
          
        <table class="dayopen" style="margin-top: 10px; width: 880px;" >
            <tr>
                <td class="von" style="font-size: 20px"><b>Next Term Begins:</b></td>
                <td class="von" style="font-size: 20px">{{ $getyour_result->next_term }}</td>
            </tr>

           
            </table>

            <table style="margin-top: 2px; width: 880px;">
                <tr>
                    <td style="font-size: 20px"><b>Class Teacher's Comment</b></td>
                    <td style="font-size: 20px">{{ $getyour_result->teacher_comment}}</td>
                    <td style="font-size: 20px"><b>Position:</b> {{ $rankedStudents->rank }} </td>
                    <!-- <td style="font-size: 20px">Position: {{ $rankedStudents->rank }} </td> -->
                    <td style="font-size: 20px">
                        {{-- @foreach ($rankedStudents as  $team)
                        
                        {{ $team->rank }} --}}
                        {{-- @endforeach --}}
                    </td> 
                </tr>

                <tr>
                    <td style="font-size: 20px;"><b>Head Teacher's Comment</b></td>
                    <td style="font-size: 20px;">{{ $getyour_result->headteachercomment}}								
                    </td>
                <td style="font-size: 20px; height: 90px"><b>Signature:</b> <img style="width: 100%; height: 100%" src="{{ URL::asset("/public/../$getyour_result->signature")}}"></td>
                </tr>
        
            </table>



@include('dashboard.admin.footer')

  
</body>
</html><script type="text/javascript"> 
    window.addEventListener("load", window.print());
  </script>