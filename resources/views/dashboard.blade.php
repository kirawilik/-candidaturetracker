<x-app-layout>

    <div class="min-h-screen bg-[#0B1120] text-white">

        <div class="flex">

            {{-- SIDEBAR --}}
            <aside class="w-64 min-h-screen bg-[#111827] border-r border-white/10 p-6">

                <h1 class="text-2xl font-bold mb-10">
                    CandidatureTracker
                </h1>

                <nav class="space-y-3">

                    <a href="#"
                       class="flex items-center gap-3 px-4 py-3 rounded-2xl
                              bg-gradient-to-r from-indigo-500 to-purple-600">

                        Dashboard
                    </a>

                    <a href="{{ route('candidatures.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-2xl
                              hover:bg-white/10 transition">

                        Applications
                    </a>

                  <a href="{{ route('entretiens.index') }}"
   class="flex items-center gap-3 px-4 py-3 rounded-2xl
          hover:bg-white/10 transition">

    Interviews
</a>

                   <a href="{{ route('candidatures.archives') }}" 
   class="flex items-center gap-3 px-4 py-3 rounded-2xl
          hover:bg-white/10 transition">
    Archives
</a>
                </nav>

            </aside>

            {{-- MAIN CONTENT --}}
            <main class="flex-1 p-10">

                {{-- HEADER --}}
                <div class="flex items-center justify-between mb-10">

                    <div>
                        <h2 class="text-4xl font-bold">
                            Dashboard
                        </h2>

                        <p class="text-gray-400 mt-2">
                            Track your job applications
                        </p>
                    </div>

                    <a href="{{ route('candidatures.create') }}"
                       class="px-6 py-3 rounded-2xl
                              bg-gradient-to-r from-indigo-500 to-purple-600
                              hover:opacity-90 transition">

                        + Add Application
                    </a>

                </div>

                {{-- STATS --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

                    {{-- TOTAL --}}
                    <div class="bg-[#111827] rounded-3xl p-6 border border-white/10">

                        <p class="text-gray-400">
                            Total Applications
                        </p>

                        <h3 class="text-4xl font-bold mt-4">
                            {{ $totalCandidatures }}
                        </h3>

                    </div>

                    {{-- PENDING --}}
                    <div class="bg-[#111827] rounded-3xl p-6 border border-white/10">

                        <p class="text-gray-400">
                            Pending
                        </p>

                        <h3 class="text-4xl font-bold mt-4 text-yellow-400">
                            {{ $pendingCandidatures }}
                        </h3>

                    </div>

                    {{-- ACCEPTED --}}
                    <div class="bg-[#111827] rounded-3xl p-6 border border-white/10">

                        <p class="text-gray-400">
                            Accepted
                        </p>

                        <h3 class="text-4xl font-bold mt-4 text-green-400">
                            {{ $acceptedCandidatures }}
                        </h3>

                    </div>

                    {{-- REJECTED --}}
                    <div class="bg-[#111827] rounded-3xl p-6 border border-white/10">

                        <p class="text-gray-400">
                            Rejected
                        </p>

                        <h3 class="text-4xl font-bold mt-4 text-red-400">
                            {{ $rejectedCandidatures }}
                        </h3>

                    </div>

                </div>

                {{-- RECENT APPLICATIONS --}}
                <div class="space-y-6">

                    @forelse($recentCandidatures as $candidature)

                        @php

                            $statusColors = [
                                'Applied' => 'bg-blue-500/20 text-blue-400',
                                'Interview' => 'bg-green-500/20 text-green-400',
                                'Accepted' => 'bg-purple-500/20 text-purple-400',
                                'Rejected' => 'bg-red-500/20 text-red-400',
                            ];

                            $priorityColors = [
                                'HIGH' => 'bg-red-500/20 text-red-400',
                                'MEDIUM' => 'bg-yellow-500/20 text-yellow-400',
                                'LOW' => 'bg-green-500/20 text-green-400',
                            ];

                        @endphp

                        <div class="bg-[#111827]
                                    rounded-3xl
                                    p-6
                                    border border-white/10">

                            <div class="flex justify-between items-center">

                                <div class="flex gap-5">

                                    {{-- ICON --}}
                                    <div class="w-16 h-16 rounded-2xl
                                                bg-gradient-to-r from-indigo-500 to-purple-600
                                                flex items-center justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="h-8 w-8 text-white"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2
                                                     2 0 012-2h5.586a1 1 0 01.707.293l5.414
                                                     5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>

                                    </div>

                                    {{-- CONTENT --}}
                                    <div>

                                        <h3 class="text-2xl font-bold">
                                            {{ $candidature->job_title }}
                                        </h3>

                                        <p class="text-gray-400 mt-1">
                                            {{ $candidature->company_name }}
                                        </p>

                                        <div class="flex gap-3 mt-4">

                                            {{-- STATUS --}}
                                            <span class="px-3 py-1 rounded-full text-sm
                                            {{ $statusColors[$candidature->status->value] ?? 'bg-gray-500/20 text-gray-300' }}">

                                                {{ $candidature->status->value }}

                                            </span>

                                            {{-- PRIORITY --}}
                                            <span class="px-3 py-1 rounded-full text-sm
                                            {{ $priorityColors[$candidature->priority->value] ?? 'bg-gray-500/20 text-gray-300' }}">

                                                {{ $candidature->priority->value }}

                                            </span>

                                        </div>

                                    </div>

                                </div>

                                {{-- BUTTONS --}}
                                <div class="flex gap-3">

                                    <a href="{{ route('candidatures.show', $candidature) }}"
                                       class="px-5 py-2 rounded-xl bg-white/10 hover:bg-white/20 transition">

                                        View
                                    </a>

                                    <a href="{{ route('candidatures.edit', $candidature) }}"
                                       class="px-5 py-2 rounded-xl
                                              bg-gradient-to-r from-indigo-500 to-purple-600">

                                        Edit
                                    </a>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="bg-[#111827] p-10 rounded-3xl text-center text-gray-400">
                            No applications found.
                        </div>

                    @endforelse

                </div>

                {{-- INTERVIEWS --}}
                <div class="mt-16">

                    <h2 class="text-3xl font-bold mb-6">
                        Upcoming Interviews
                    </h2>

                    <div class="grid md:grid-cols-2 gap-6">

                        @forelse($upcomingEntretiens as $entretien)

                            <div class="bg-[#111827]
                                        rounded-3xl
                                        p-6
                                        border border-white/10">

                                <h3 class="text-2xl font-bold">
                                    {{ $entretien->candidature->company_name }}
                                </h3>

                                <p class="text-gray-400 mt-2">
                                    {{ $entretien->type }}
                                </p>

                                <p class="mt-4 text-indigo-400">
                                    {{ $entretien->scheduled_at->format('d M Y - H:i') }}
                                </p>

                            </div>

                        @empty

                            <div class="text-gray-400">
                                No interviews planned.
                            </div>

                        @endforelse

                    </div>

                </div>

            </main>

        </div>

    </div>

</x-app-layout>