<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Student mapper Lisgt</h2>

<table>
  <tr>
    <th>ID</th>
    <th>Student</th>
    <th>Teacher</th>
  </tr>
  @if($data)
  @foreach($data as $val)
  <tr>
    <td>{{$val->id}}</td>
    <td>{{$val->student_name}}</td>
    <td>{{$val->teacher_name}}</td>
  </tr>
  @endforeach
  @endif
  
</table>

<a href="{{url('removemapper')}}" type="button">Remove Mapping</a>

</body>
</html>

