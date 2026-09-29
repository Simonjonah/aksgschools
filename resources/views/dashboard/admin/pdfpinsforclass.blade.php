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



table, th {
    border: 1px solid black;
  border-collapse: collapse;
}
table, td {
  border: 1px solid black;
  border-collapse: collapse;
  font-size: 10px;
  text-align: center;
  
}
table .b{
    border-style: none;
}

table, tr, td{
    margin: 0;
    padding: 0;
}

</style>
<body>
       

    {{-- <div style="width: 50px;"> --}}
        <table id="myTable">
            <tr>
              <th>Schoolname</th>
              <th>Name</th>
              <th>Class</th>
              <th>Term</th>
              <th>Pins</th>
              <th>Reg. No</th>
              <th>Session</th>
              
              
            </tr>
            @foreach ($getyour_pins as $getyour_pin)
            <tr>
                <th>{{ $getyour_pin->schoolname }}</th>
                <th>{{ $getyour_pin->surname }} {{ $getyour_pin->fname }} {{ $getyour_pin->middlename }}</th>
                <th>{{ $getyour_pin->classname }}</th>
                <th>{{ $getyour_pin->term }}</th>
                <th>{{ $getyour_pin->pins }}</th>
                <th>{{ $getyour_pin->regnumber }}</th>
                <th>{{ $getyour_pin->academic_session }}</th>

            </tr>
            @endforeach
            
          </table>
    {{-- </div> --}}
        

        
  
</body>
</html>
