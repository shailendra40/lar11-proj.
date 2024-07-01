{{-- <div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
</div> --}}


@extends('layouts.app')

@section('content')


<!-- Bootstrap CSS -->
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
<!-- Font Awesome -->
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> --}}
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
        background-color: #068372;
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
    /* .fa {
        margin-right: 5px;
    } */
</style>

    <div class="container">

        <h3 align="center" class="mt-5">Student Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('lar.student.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Student Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="col-md-6">
                            <label>Student DOB</label>
                            <input type="date" class="form-control" name="dob">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-info" value="Register">
                        </div>

                    </div>
                </form>
            </div>

                <table class="table mt-5">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Show</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ( $students as $key => $student )

                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $student->name }}</td>
                            <td scope="col">{{ $student->dob }}</td>
                            <td scope="col">{{ $student->phone }}</td>
                            <td scope="col">

                            {{-- <button type="button" class="btn btn-primary" onclick="showStudentDetails('{{ $student->name }}', '{{ $student->dob }}', '{{ $student->phone }}')">View Details</button> --}}

                            {{-- <a href="{{  route('lar.student.show', $student->id) }}"> --}}
                                {{-- <button class="btn btn-info btn-sm view-student-details" --}}
                                {{-- <button class="btn btn-secondary btn-sm"> --}}

                                <button class="btn btn-info btn-sm view-student-details"
                                    data-name="{{ $student->name }}"
                                    data-dob="{{ $student->dob }}"
                                    data-phone="{{ $student->phone }}">
                                    {{-- <button class="btn btn-sm" style="background-color: skyblue;">Button</button> --}}
                                    {{-- <button class="btn btn-sm" style="background-color: aqua;">Button</button> --}}
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> View
                                </button>
                                {{-- </a> --}}
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

                            <td scope="col">
                            <a href="{{  route('lar.student.edit', $student->id) }}">
                            <button class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>
                            </a>

                            <form action="{{ route('lar.student.destroy', $student->id) }}" method="POST" style ="display:inline">
                             @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            </td>
                          </tr>
                        @endforeach


                    </tbody>
                  </table>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:#FFFF00;
        }

        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }

        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush


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

        $('.close').on('click', function () {
            // alert("sss");
            $('#studentModal').modal('hide');
        });
    });
</script>
