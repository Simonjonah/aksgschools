@include('dashboard.teacher.header')

  @include('dashboard.teacher.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
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
    font-size: 15px;
} */
table, tr, td{
    margin: 0;
    padding: 0;
}

</style>
<body>
       
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
            <th style="text-align: center; width: 120px; height: 100px; padding: 0px">
                <img style="width: 100%; height: 50px;" src="{{ asset('public/../'.$getyour_result->logo) }}">
            </th>
           
            <th style="text-transform:uppercase; text-align: center; width: 450px; font-size: px"><h1>{{ $getyour_result->school['schoolname'] }}</h1>
                <p style="font-weight: normal; margin-bottom: -8px;">{{ $getyour_result->school['address'] }}</p>
                <p  style="font-weight: normal; font-style:italic; color: red; margin-top: 20px">Motor: {{ $getyour_result->school['motor'] }}</p> 
            </th>
                
            <th style="text-align: center; width: 120px;">
                <img style="width: 100%; height: 100px;" src="{{ asset('public/../'.$getyour_result->images) }}">

               
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
              <th>SUBJECTS OFFERED </th>
              <th>CONTINIEUS ASSESSMENT TEST 1</th>
              <th>CONTINIEUS ASSESSMENT TEST 2</th>
              <th>EXAMINATION SCORES</th>
              <th>TOTAL</th>
              <th>-</th>
              <th>GRADE</th>
              
            </tr>
            <tr>

              <td>-</td>
              <td>15</td>
              <td>15</td>
              <td>70</td>
              <td>100</td>
              <!-- <td>-</td> -->
              <td>-</td>

            </tr>
       
            @foreach ($getyour_results as $getyour_result)
                @if ($getyour_result->status == 'approved' || $getyour_result->status == null)
                    @php
                    $total_score +=$getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams;
                @endphp
            <tr>
                <td>{{ $getyour_result->subjectname }}</td>
                <td>{{ $getyour_result->test_1 }}</td>
                <td>{{ $getyour_result->test_2 }}</td>
                <td>{{ $getyour_result->exams }}</td>
                <td>{{ $getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams}}</td>
                <td>@if ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 79)
                   
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
                {{-- <td>-</td> --}}
                <td>-</td>
                <!-- <td><b>-</b></td> -->
                <td><b>{{ $total_score }}</b></td>
                <td></td>
                <td>Grade</td>

              </tr>

          </table>

          <style>
            .container .row .col .psy{
                width: 300px;
                display: inline-block;
            }

          </style>
          
          <div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col">
                    <div class="psy">
                        <table class="table">
                            <tr>
                              <th>AFFECTIVE DOMAIN</th>
                              <th colspan="5">GRADE</th>
                             </tr>
                             <tr>
                              <th>-</th>
                              <th>A</th>
                              <th>B</th>
                              <th>C</th>
                              <th>D</th>
                              <th>E</th>
                              
                            </tr>
                            @foreach ($getyour_resultsdomains as $getyour_resultsdomain)
                            @if ($getyour_resultsdomain->psycomoto == 'Cognitive Domain')
                            <tr>
                                <td>{{ $getyour_resultsdomain->cogname }}</td>
                                @if ($getyour_resultsdomain->punt1 == 'Yes')
                                <td><i class="fas fa-check"></i> </td>
                                @else
                                <td></td>
                                @endif

                                @if ($getyour_resultsdomain->punt2 == 'Yes')
                                <td><i class="fas fa-check"></i> </td>
                                @else
                                <td></td>
                                @endif

                                @if ($getyour_resultsdomain->punt3 == 'Yes')
                                <td><i class="fas fa-check"></i> </td>
                                @else
                                <td></td>
                                @endif
                                @if ($getyour_resultsdomain->punt4 == 'Yes')
                                <td><i class="fas fa-check"></i> </td>
                                @else
                                <td></td>
                                @endif
                                @if ($getyour_resultsdomain->punt5 == 'Yes')
                                <td><i class="fas fa-check"></i> </td>
                                @else
                                <td></td>
                                @endif
                            </tr>
                             @else
                                
                            @endif 
                            
                            @endforeach
                 
                          </table>
                    </div>

                    <div class="psy">
                        <table class="table">
                            <tr>
                              <th>PSYCOMOTOR DOMAIN</th>
                              <th colspan="5">GRADE</th>
                            </tr>
                            <tr>
                              <th>-</th>
                              <th>A</th>
                              <th>B</th>
                              <th>C</th>
                              <th>D</th>
                              <th>E</th>
                              
                            </tr>
                            @foreach ($getyour_resultsdomains as $getyour_resultsdomain)
                            @if ($getyour_resultsdomain->psycomoto == 'Psychomotor Domain')
                                <tr>
                              

                                <td>{{ $getyour_resultsdomain->cogname }}</td>
                                @if ($getyour_resultsdomain->punt1 == 'Yes')
                                <td><i class="fas fa-check"></i> </td>
                                @else
                                <td></td>
                                @endif

                                @if ($getyour_resultsdomain->punt2 == 'Yes')
                                <td><i class="fas fa-check"></i> </td>
                                @else
                                <td></td>
                                @endif

                                @if ($getyour_resultsdomain->punt3 == 'Yes')
                                <td><i class="fas fa-check"></i> </td>
                                @else
                                <td></td>
                                @endif
                                @if ($getyour_resultsdomain->punt4 == 'Yes')
                                <td><i class="fas fa-check"></i> </td>
                                @else
                                <td></td>
                                @endif
                                @if ($getyour_resultsdomain->punt5 == 'Yes')
                                <td><i class="fas fa-check"></i> </td>
                                @else
                                <td></td>
                                @endif
                            </tr>
                            @else
                                
                            @endif
                            
                            {{-- <td colspan="5" style="text-align: center">AFFECTIVE/PSYCOMOTOR DOMAIN</td> --}}
                
                            @endforeach
                            
                
                          </table>
                    </div>


                    <div class="psy">
                        <table class="table">
                            <tr>
                    
                              <th colspan="5">GRADING AND KEY</th>
                             
                            </tr>
                            <tr>

                              <td>A</td>
                              <td>B</td>
                              <td>C</td>
                              <td>D</td>
                              <td>E</td>
                
                            </tr> 

                            <tr>
                                <td> Exellence</td>
                                <td> Very Good</td>
                                <td> Good</td>
                                <td> Pass</td>
                                <td> FAIL</td>
                            </tr>
                           
                          </table>
                    </div>
                </div>
            </div>
          </div>
          

          </table>


          <table>
            <tr>
                <td>REG CODE:</td>
                <td>{{ $getyour_result->regnumber }}</td>
                <td>SEX:</td>
                <td>{{ $getyour_result->gender }}</td>
                <td>TOTAL STUDENT:</td>
                <td>{{ $total_student  }}</td>
                <td>POSITION:</td>
                <td>{{ $rankedStudents->rank }}</td>
            </tr>
    
            <tr>
                <td>CLASS:</td>
                <td>{{ $getyour_result->classname }}</td>
                <td>TERM:</td>
                <td>{{ $getyour_result->term }} </td>
                <td>SCORE OBTAINED:</td>
                <td>{{ $total_score }}</td>
    
                
            </tr>
            <tr>
                <td>AGE:</td>
                <td>{{ $getyour_result->student['dob'] }}</td>
                <td colspan="2"></td>
               
                <td>PERCENTAGE:</td>
                <td>{{ $total_score/100 }}</td>
                <!-- <td>PUPIL'S GRADE IN CLASS:</td>
                <td>B</td> -->
            </tr>
            
        
    
         </table>
    
          
          
        <table class="dayopen" style="margin-top: 10px; " >
            <tr>
                {{-- <td class="von">Days School Opens:</td>
                <td class="von">{{ $getyour_result->dayschopen }}</td>
                <td class="von">No of Days Present:</td>
                <td class="von">{{ $getyour_result->dayspresent }}</td> --}}
                <td class="von">Next Term Begins:</td>
                <td class="von">{{ $getyour_result->next_term }}</td>
            </tr>

           
            </table>

            <table style="margin-top: 2px;">
                <tr>
                    <td>Class Teacher's Comment</td>
                    <td>{{ $getyour_result->teacher_comment}}								
                    </td>
                    
                </tr>

                <tr>
                  @if (Auth::guard('teacher')->user()->assign1 == 'Principal' && Auth::guard('teacher')->user()->schooltype == 'SUBEB')
                  <td colspan="5">Head Teacher's Comment</td>
                  <td><a class="btn btn-success" href="{{ url('teacher/addcomment') }}">Add Comment</a></td>

                  @elseif (Auth::guard('teacher')->user()->assign1 == 'Principal' && Auth::guard('teacher')->user()->schooltype == 'SSEB')
                  <td>Principal's Comment</td>
                  <td><a class="btn btn-success" href="{{ url('teacher/addcomment/'.$getyour_result->id) }}">Add Comment</a></td>
                    
                  @endif
                    <td>{{ $getyour_result->headteach_comment}}								
                    </td>
                  <td><a class="btn btn-success" href="{{ url('teacher/addcommentsteachers/'.$getyour_result->id) }}">Add Comment</a></td>
                    <td>Signature: <img style="width: 50%; height: 50px;" src="{{ asset('public/../'.$getyour_result->signature) }}"> </td>
                </tr>
        
            </table>
            @include('dashboard.teacher.footer')