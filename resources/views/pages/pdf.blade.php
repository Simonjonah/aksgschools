<!DOCTYPE html>
<html>
<head>
    <title>Golden Destiny Academy Terminal Result</title>
</head>
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
            @if ($getyour_result->status == 'approved')
                
            @else
                
            @endif

        @endforeach
 
  
  
    <table class="table">

        <tr>
            <th style="text-align: center; width: 120px; height: 100px; padding: 0px">
                {{-- <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('assets/dist/img/AdminLTELogo.png')))}}"> --}}
                <img src="{{ public_path('public/../'.$getyour_result->logo) }}">
            </th>
           
            <th style="text-transform:uppercase; text-align: center; width: 450px;"><h1>{{ $getyour_result->schoolname }}</h1>
                <p style="font-weight: normal; margin-bottom: -8px;">{{ $getyour_result->address }}</p>
                <p  style="font-weight: normal; font-style:italic">Motor: {{ $getyour_result->motor }}</p> 
            </th>
                
            <th style="text-align: center; width: 120px;">
                <img style="width: 100%; height: 10%;" src="{{ public_path('public/../'.$getyour_result->images) }}">

               
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
              <th>AFFECTIVE DOMAIN (UBJECT OFFERED) </th>
              <th>CA 1</th>
              <th>CA 2</th>
              <th>CA 3</th>
              <th>EXAMS</th>
              <th>TOTAL</th>
              <th>TOTAL</th>
              <th>-</th>
              <th>GRADE</th>
              
            </tr>
            <tr>

              <td>-</td>
              <td>20</td>
              <td>20</td>
              <td>10</td>
              <td>50</td>
              <td>100</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>

            </tr>
       
            @foreach ($getyour_results as $getyour_result)
                @if ($getyour_result->status == 'approved')
                    @php
                    $total_score +=$getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams;
                @endphp
            <tr>
                <td>{{ $getyour_result->subjectname }}</td>
                <td>{{ $getyour_result->test_1 }}</td>
                <td>{{ $getyour_result->test_1 }}</td>
                <td>{{ $getyour_result->test_2 }}</td>
                <td>{{ $getyour_result->test_3 }}</td>
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
                <td>-</td>
                {{-- <td>-</td> --}}
                <td><b>{{ $total_score }}</b></td>
                <td><b>-</b></td>
                <td>-</td>
                <td></td>
                <td>Grade</td>

              </tr>

          </table>

          <style>
            .container .row .col .psy{
                width: 200px;
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
                             
                
                            @foreach ($getyour_resultsdomains as $getyour_resultsdomain)
                            @if ($getyour_resultsdomain->psycomoto == 'Cognitive Domain')
                                <tr>
                                <td>{{ $getyour_resultsdomain->cogname }}</td>
                                <td>{{ $getyour_resultsdomain->punt1 }}</td>
                                <td>{{ $getyour_resultsdomain->punt2 }}</td>
                                <td>{{ $getyour_resultsdomain->punt3 }}</td>
                                <td>{{ $getyour_resultsdomain->punt4 }}</td>
                                <td>{{ $getyour_resultsdomain->punt5 }}</td>
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
                              <th colspan="4">GRADE</th>
                             
                            @foreach ($getyour_resultsdomains as $getyour_resultsdomain)
                            @if ($getyour_resultsdomain->psycomoto == 'Psychomotor Domain')
                                <tr>
                                <td>{{ $getyour_resultsdomain->cogname }}</td>
                                <td>{{ $getyour_resultsdomain->punt1 }}</td>
                                <td>{{ $getyour_resultsdomain->punt2 }}</td>
                                <td>{{ $getyour_resultsdomain->punt3 }}</td>
                                <td>{{ $getyour_resultsdomain->punt4 }}</td>
                                <td>{{ $getyour_resultsdomain->punt5 }}</td>
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
                <td>TOTAL SCORE OBTAINABLE:</td>
                <td>{{ $total_subject * 100 }}</td>
                <td>NO. OF DISTINGTIONS (A-B):</td>
                <td>7A's, 3B's</td>
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
                <td>PUPIL'S GRADE IN CLASS:</td>
                <td>B</td>
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
                    <td>Signature: </td>
                </tr>

                <tr>
                    <td>Head Teacher's Comment</td>
                    <td>{{ $getyour_result->headteach_comment}}								
                    </td>
                    <td>Signature: </td>
                </tr>
        
            </table>
  
</body>
</html>
