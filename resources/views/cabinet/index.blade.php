<x-client-layout>
    <div class="w-full">
        <h1 class="text-4xl font-bold">История бронирований</h1>
        
        <table class="table-auto mt-10 border-collapse border border-gray-400">
            <thead>
                <tr>
                    <th class="border border-gray-300 p-2">№</td>
                    <th class="border border-gray-300 p-2">Дата/Время</td>
                    <th class="border border-gray-300 p-2">Услуга</td>
                    <th class="border border-gray-300 p-2">Мастер</td>
                    <th class="border border-gray-300 p-2"></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($timeslots as $timeslot)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 p-2">
                            {{ $timeslot->start->format('d.m.Y') }}
                            {{ $timeslot->start->format('H:i') }}
                            -
                            {{ $timeslot->finish->format('H:i') }}
                        </td>
                        <td class="border border-gray-300 p-2">{{ $timeslot->service_title }}</td>
                        <td class="border border-gray-300 p-2">{{ $timeslot->master_name }}</td>
                        <td class="border border-gray-300 p-2">
                            <a href="" class="btn btn-secondary ms-6">
                                Отменить
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-client-layout>