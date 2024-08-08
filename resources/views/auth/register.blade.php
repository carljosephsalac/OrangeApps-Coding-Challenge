@extends('layout.app')

@section('content')
    <main class="bg-gray-200 h-screen flex justify-center items-center">
        <div class="bg-white rounded-lg shadow-sm w-[430px] py-4 px-6 relative flex justify-center">
            <header class="text-6xl absolute -top-20">Register</header>
            <form action="{{ route('registerUser') }}" method="POST" class="flex flex-col gap-4 w-full">
                @csrf
                <label class="form-control w-full relative">
                    <div class="label">
                        <span class="label-text">Name</span>
                    </div>
                    <input name="name" type="text" placeholder="Type here" class="input input-bordered w-full" />
                    @error('name')
                        <div class="label absolute -bottom-6">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </div>
                    @enderror
                </label>
                <label class="form-control w-full relative">
                    <div class="label">
                        <span class="label-text">Email</span>
                    </div>
                    <input name="email" type="email" placeholder="Type here" class="input input-bordered w-full" />
                    @error('email')
                        <div class="label absolute -bottom-6">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </div>
                    @enderror
                </label>
                <label class="form-control w-full relative">
                    <div class="label">
                        <span class="label-text">Password</span>
                    </div>
                    <input name="password" type="password" placeholder="Type here" class="input input-bordered w-full" />
                    @error('password')
                        <div class="label absolute -bottom-6">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </div>
                    @enderror
                </label>
                <div class="flex justify-between mt-3">
                    <button class="btn btn-success btn-sm text-white w-fit" type="submit">
                        Register
                    </button>
                    <a href="{{ route('login') }}" class="link link-info">Already have an account</a>
                </div>
            </form>
        </div>
    </main>
@endsection
