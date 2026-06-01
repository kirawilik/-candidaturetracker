<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CandidatureTracker') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex">

        <!-- LEFT PANEL - Auth Form -->
        <div class="w-full lg:w-5/12 flex flex-col justify-center items-center px-8 py-12"
             style="background-color: #0f1117;">

            <!-- Logo + Title -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-4"
                     style="background: linear-gradient(135deg, #6c63ff, #8b5cf6);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h1 class="text-2xl font-bold" style="color: #6c63ff;">CandidatureTracker</h1>
                <p class="text-sm mt-1" style="color: #8b9bb4;">
                    Smart job application management for ambitious professionals
                </p>
            </div>

            <!-- Card -->
            <div class="w-full max-w-md rounded-2xl p-8" style="background-color: #1a1d2e;">
                {{ $slot }}
            </div>
        </div>

        <!-- RIGHT PANEL - Marketing -->
        <div class="hidden lg:flex lg:w-7/12 flex-col justify-center px-16"
             style="background: linear-gradient(135deg, #6c63ff 0%, #8b5cf6 50%, #a855f7 100%);">

            <h2 class="text-5xl font-bold text-white leading-tight mb-6">
                Organize Your<br>Job Search<br>Like a Pro
            </h2>
            <p class="text-lg text-purple-100 mb-10">
                Track applications, schedule interviews, and land your dream job
                with the most elegant job tracking platform.
            </p>

            <div class="space-y-6">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center"
                         style="background: rgba(255,255,255,0.2);">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-white">Smart Tracking</h3>
                        <p class="text-purple-200 text-sm">Never lose track of an application</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center"
                         style="background: rgba(255,255,255,0.2);">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-white">Real-time Analytics</h3>
                        <p class="text-purple-200 text-sm">Insights to improve your success rate</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center"
                         style="background: rgba(255,255,255,0.2);">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-white">Interview Scheduler</h3>
                        <p class="text-purple-200 text-sm">Never miss an important meeting</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>