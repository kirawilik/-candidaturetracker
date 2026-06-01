<x-app-layout>
    <div class="max-w-3xl mx-auto py-10">

        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-6">

            <h1 class="text-xl font-bold mb-6 text-gray-900 dark:text-white">
                Nouvelle candidature
            </h1>

            <form method="POST" action="{{ route('candidatures.store') }}" class="space-y-4">
                @csrf

                <!-- Company + Job -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" name="company_name" placeholder="Entreprise"
                        class="w-full rounded-xl border-gray-300 dark:bg-gray-700 dark:text-white">

                    <input type="text" name="job_title" placeholder="Poste"
                        class="w-full rounded-xl border-gray-300 dark:bg-gray-700 dark:text-white">
                </div>

                <!-- URL -->
                <input type="url" name="job_url" placeholder="URL de l'offre"
                    class="w-full rounded-xl border-gray-300 dark:bg-gray-700 dark:text-white">

                <!-- Status + Priority -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <select name="status"
                        class="w-full rounded-xl border-gray-300 dark:bg-gray-700 dark:text-white">
                        <option value="pending">Pending</option>
                        <option value="interview">Interview</option>
                        <option value="accepted">Accepted</option>
                        <option value="rejected">Rejected</option>
                    </select>

                    <select name="priority"
                        class="w-full rounded-xl border-gray-300 dark:bg-gray-700 dark:text-white">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>

                <!-- Date -->
                <input type="date" name="applied_at"
                    class="w-full rounded-xl border-gray-300 dark:bg-gray-700 dark:text-white">

                <!-- Notes -->
                <textarea name="notes" rows="4" placeholder="Notes..."
                    class="w-full rounded-xl border-gray-300 dark:bg-gray-700 dark:text-white"></textarea>

                <!-- Buttons -->
                <div class="flex justify-end gap-3 pt-4">
                    <button type="button"
                        class="px-4 py-2 rounded-xl bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-white">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-4 py-2 rounded-xl bg-indigo-600 text-white hover:bg-indigo-700">
                        Add Application
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>