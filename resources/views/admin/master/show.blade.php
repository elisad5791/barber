<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Мастер {{ $name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <table class="table border">
                        <tbody>
                            <tr>
                                <th>Имя</th>
                                <td>{{ $name }}</td>
                            </tr>
                            <tr>
                                <th>Телефон</th>
                                <td>{{ $phone }}</td>
                            </tr>
                            <tr>
                                <th>Услуги</th>
                                <td>
                                    <ul>
                                        @foreach ($services as $service)
                                            <li>{{ $service->title }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>