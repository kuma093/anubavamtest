<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Home</title>
</head>
<body>
    <h2>Welcome Form</h2>
    <form id="myForm">
  <label for="student">Students :</label>
  <select name="students[]" id="students" multiple>
   @foreach($studentdata as $student)
   <option value="{{$student->id}}">{{$student->student_name}}</option>
   @endforeach
  </select>
  <br><br>

  <label for="teacher">Teachers :</label>
  <select name="teachers[]" id="teachers" multiple>
   @foreach($teacherdata as $teacher)
   <option value="{{$teacher->id}}">{{$teacher->teacher_name}}</option>
   @endforeach
  </select>
  <br><br>
  <button type="submit">Submit</button>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $(document).ready(function() {
            $('#myForm').submit(function(event) {
                event.preventDefault(); // Prevent the default form submission

                // Serialize form data
                var formData = $(this).serialize();

                // Send form data via Ajax
                $.ajax({
                    url: '{{url("mapper")}}', // Replace with your endpoint URL
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        // Handle success response
                       //alert("success");
                       window.location.href='{{url("listmapper")}}';
                    },
                    error: function(error) {
                        // Handle errors
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
</body>
    </html>