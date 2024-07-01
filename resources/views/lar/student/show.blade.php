<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Custom CSS for modal and page styling */

        /* Sky milky lighting background */
        body {
            background: radial-gradient(circle, rgba(30, 144, 255, 0.6), rgba(255, 255, 255, 0.3));
        }

        /* Style for modal */
        .modal-content {
            background: linear-gradient(to bottom right, #ff7e5f, #feb47b, #ffdb78, #ffc974); /* Gradient background */
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.2);
        }

        .modal-header {
            border-bottom: none;
            padding-bottom: 0;
            background-color: transparent; /* Transparent header background */
        }

        .modal-title {
            color: #63c4e9; /* Light blue color for modal title */
            background-color: purple; /* Purple background color for modal title */
            padding: 10px; /* Add padding for better appearance */
            border-radius: 10px; /* Add border radius for rounded corners */
        }

        .modal-body {
            padding: 20px;
        }

        .modal-body p {
            margin-bottom: 10px;
        }

        /* Close button in modal */
        .close {
            outline: none;
            color: #000;
            opacity: 0.5;
            font-size: 24px;
        }

        .close:hover {
            opacity: 1;
        }

        /* Button style */
        .view-student-details {
            background-color: #17a2b8;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }

        .view-student-details:hover {
            background-color: #138496;
        }

        /* Font Awesome icon style */
        .fa {
            margin-right: 5px;
        }
    </style>
</head>
<body>

{{-- Remove the anchor tag surrounding the "View" button --}}
<td scope="col">
    <button class="btn btn-info btn-sm view-student-details"
            data-name="{{ $student->name }}"
            data-dob="{{ $student->dob }}"
            data-phone="{{ $student->phone }}">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> View
    </button>
</td>

<!-- Modify your modal structure to display the student details dynamically -->
<div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">Student Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> <span id="studentName"></span></p>
                <p><strong>Date of Birth:</strong> <span id="studentDOB"></span></p>
                <p><strong>Phone:</strong> <span id="studentPhone"></span></p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap and jQuery JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Add JavaScript to handle modal display and data population -->
<script>
    $(document).ready(function(){
        $('.view-student-details').on('click', function () {
            var name = $(this).data('name');
            var dob = $(this).data('dob');
            var phone = $(this).data('phone');

            $('#studentName').text(name);
            $('#studentDOB').text(dob);
            $('#studentPhone').text(phone);

            $('#studentModal').modal('show');
        });
    });
</script>

</body>
</html>
