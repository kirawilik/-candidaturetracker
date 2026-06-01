<x-app-layout>
    <div class="max-w-6xl mx-auto py-10">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">

            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                Mes candidatures
            </h1>

            <a href="{{ route('candidatures.create') }}"
               class="px-4 py-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700">
                + Ajouter
            </a>

        </div>

        <!-- LIST -->
        <div class="space-y-4">

            @forelse($candidatures as $candidature)

                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-5 flex justify-between items-center">

                    <!-- LEFT -->
                    <div>

                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $candidature->job_title }}
                        </h2>

                        <p class="text-gray-500">
                            {{ $candidature->company_name }}
                        </p>

                        <div class="flex gap-3 mt-2 text-sm text-gray-400">
                            <span>
                                Status: {{ $candidature->status->value }}
                            </span>

                            <span>
                                Priority: {{ $candidature->priority->value }}
                            </span>
                        </div>

                    </div>

                    <!-- ACTIONS -->
                    <div class="flex items-center gap-3">

                        <a href="{{ route('candidatures.show', $candidature) }}"
                           class="px-3 py-1 rounded-lg bg-gray-200 dark:bg-gray-700 text-sm">
                            Voir
                        </a>

                        <a href="{{ route('candidatures.edit', $candidature) }}"
                           class="px-3 py-1 rounded-lg bg-blue-500 text-white text-sm">
                            Modifier
                        </a>

                        <!-- DELETE -->
                        <form method="POST"
                              action="{{ route('candidatures.destroy', $candidature) }}"
                              onsubmit="return confirm('Supprimer cette candidature ?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="px-3 py-1 rounded-lg bg-red-500 text-white text-sm">
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <p class="text-gray-500">Aucune candidature.</p>

            @endforelse

        </div>

        <!-- PAGINATION -->
        <div class="mt-6">
            {{ $candidatures->links() }}
        </div>

    </div>
</x-app-layout>