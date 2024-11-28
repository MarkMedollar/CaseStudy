@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

  {{--               <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div> --}}
                <div class="container-fluid p-0">
                    <!-- Hero Section -->
                    <div class="text-white text-center d-flex flex-column justify-content-center align-items-center" style="height: 100vh; background: linear-gradient(to right, #1e3c72, #2a5298), url('https://source.unsplash.com/1600x900/?university') no-repeat center center/cover;">
                        <div class="bg-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4);"></div>
                        <div class="z-index-1">
                            <h1 class="display-4 fw-bold">Welcome to State Universities and Colleges Locator</h1>
                            <p class="fs-4">Your guide to finding state universities and colleges across the country.</p>

                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="bg-primary text-white text-center py-3">
                    <p class="mb-0">&copy; 2024 State Universities and Colleges Locator. All rights reserved.</p>
                </footer>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>




        </div>
    </div>
</div>
@endsection
