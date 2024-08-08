@extends('layout.app')

@section('content')
    <div class="bg-gray-200 h-screen flex flex-col ">
        @include('layout.navbar')
        <main class="flex flex-grow justify-center items-center flex-col">
            <div class="bg-base-100 rounded-lg w-[650px] relative flex flex-col items-center">
                @session('success')
                    <x-success-alert class="-top-32 absolute">
                        {{ $value }}
                    </x-success-alert>
                @endsession
                @error('name')
                    <x-error-alert class="-top-32 absolute">
                        {{ $message }}
                    </x-error-alert>
                @enderror
                @error('student_records')
                    <x-error-alert class="-top-32 absolute">
                        {{ $message }}
                    </x-error-alert>
                @enderror
                <button class="btn btn-primary btn-sm text-white w-fit left-0 -top-10 absolute"
                    onclick="addModal.showModal()">
                    Add Student
                </button>
                <div class="-top-10 absolute right-0 flex gap-3">
                    <form action="{{ route('students.export') }}" method="GET">
                        <button class="btn btn-success btn-sm text-white w-fit" type="submit">
                            Download
                        </button>
                    </form>
                    <button class="btn btn-success btn-sm text-white w-fit" onclick="uploadModal.showModal()">
                        Upload
                    </button>
                </div>

                <div class="overflow-x-auto w-full">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->grade }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="w-[650px] mt-4">
                {{ $students->links() }}
            </div>
        </main>


        <dialog id="addModal" class="modal">
            <div class="modal-box">
                <h3 class="text-lg font-bold">Add Student</h3>
                <form action="{{ route('students.store') }}" method="post" id="add-form">
                    @csrf
                    <label class="form-control w-full relative">
                        <div class="label">
                            <span class="label-text">Name</span>
                        </div>
                        <input name="name" type="text" placeholder="Type here"
                            class="input input-bordered w-full mb-2" />
                        @error('name')
                            <div class="label absolute -bottom-6">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                </form>
                <div class="modal-action flex justify-between">
                    <button class="btn btn-success text-white" form="add-form">Submit</button>
                    <form method="dialog">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn">Close</button>
                    </form>
                </div>
            </div>
        </dialog>

        <dialog id="uploadModal" class="modal">
            <div class="modal-box">
                <h3 class="text-lg font-bold">Upload Record</h3>
                <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data" id="upload-form">
                    @csrf
                    <label class="form-control w-full relative">
                        <div class="label">
                            <span class="label-text">Excel File</span>
                        </div>
                        <input type="file" class="file-input file-input-bordered w-full " name="student_records"
                            accept=".xlsx" />
                        @error('student_records')
                            <div class="label absolute -bottom-7">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                </form>
                <div class="modal-action flex justify-between">
                    <button class="btn btn-success text-white" form="upload-form">Submit</button>
                    <form method="dialog">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn">Close</button>
                    </form>
                </div>
            </div>
        </dialog>
    </div>
@endsection
