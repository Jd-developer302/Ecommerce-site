@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Check Player</h1>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card ml-2 mt-5 mb-5 mb-lg-10">
        <div class="card-body">
            <div class="p-3 mt-4">
                <div>
                    Name: {{ $student->fullname }}
                </div>
                <div>
                    Class: {{ $student->class }}
                </div>
                <div>
                    Admission Number: {{ $student->admno }}
                </div>
                <div>
                    Roll Number: {{ $student->rollno }}
                </div>
                <div>
                    Blood Group: {{ $student->blood_group }}
                </div>
                <div>
                    Phone: {{ $student->phone }}
                </div>
                <div>
                    Address: {{ $student->address }}
                </div>
                <div>
                    Pincode: {{ $student->pincode }}
                </div>
                <div>
                    Class: {{ $student->class }}
                </div>
                <br>
            </div>
            <div class="mt-4 mb-4">
                <a href="{{ route('students.verify', $student->id) }}" class="btn btn-primary">Verify</a>
                <a href="{{ route('students.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
@endsection
