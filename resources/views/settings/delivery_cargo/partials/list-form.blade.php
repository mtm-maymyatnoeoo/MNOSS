<section>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <table id="cargoTable" class="min-w-full table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Cargo Name</th>
                            <th class="border px-4 py-2">Register Phone</th>
                            <th class="border px-4 py-2">Kpay Phone</th>
                            <th class="border px-4 py-2">Register Date</th>
                            <th class="border px-4 py-2">Is Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cargos as $cargo)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="border px-4 py-2">{{ $cargo->id }}</td>
                                <td class="border px-4 py-2">{{ $cargo->name }}</td>
                                <td class="border px-4 py-2">{{ $cargo->register_phone }}</td>
                                <td class="border px-4 py-2">{{ $cargo->kpay_phone }}</td>
                                <td class="border px-4 py-2">{{ $cargo->register_date }}</td>
                                <td class="border px-4 py-2">{{ $cargo->is_active ? 'Yes' : 'No' }}</td>
                                <td class="border px-4 py-2">
                                    <a href="#" class="text-blue-500 hover:underline">Edit</a>
                                    <a href="#" class="text-red-500 hover:underline ml-2">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
