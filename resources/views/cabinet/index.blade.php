<x-client-layout>
    <div class="w-full">
        <h1 class="text-4xl font-bold">Мои бронирования</h1>
        
        @if ($timeslots)
            <table class="table-auto mt-10 border-collapse border border-gray-400 min-w-[950px]">
                <thead>
                    <tr>
                        <th class="border border-gray-300 p-2">№</td>
                        <th class="border border-gray-300 p-2">Дата/Время</td>
                        <th class="border border-gray-300 p-2">Салон</td>
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
                                <span data-cabinet-date="{{ $timeslot->start->toAtomString() }}"></span>
                                <span data-cabinet-time="{{ $timeslot->start->toAtomString() }}"></span>
                                -
                                <span data-cabinet-time="{{ $timeslot->finish->toAtomString() }}"></span>
                            </td>
                            <td class="border border-gray-300 p-2">{{ $timeslot->salon_title }}</td>
                            <td class="border border-gray-300 p-2">{{ $timeslot->service_title }}</td>
                            <td class="border border-gray-300 p-2">{{ $timeslot->master_name }}</td>
                            <td class="border border-gray-300 p-2">
                                @if ($timeslot->start->toAtomString() > now()->addHours(2))
                                <button type="button" class="btn btn-secondary btn-sm ms-6" onclick="cancel_{{ $timeslot->id }}.showModal()">
                                    Отменить
                                </button>

                                <dialog id="cancel_{{ $timeslot->id }}" class="modal">
                                    <div class="modal-box">
                                        <h3 class="text-lg font-bold">Вы уверены, что хотите отменить запись?</h3>
                                        <div class="flex justify-between items-end">
                                            <form action="{{ route('welcome.timeslots.cancel') }}" method="post">
                                                @csrf
                                                @method('patch')
                                                <input type="hidden" name="timeslot_id" value="{{ $timeslot->id }}">
                                                <button class="btn">Отменить запись</button>
                                            </form>
                                            <div class="modal-action">
                                                <form method="dialog">
                                                    <button class="btn">Назад</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </dialog>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="mt-10">Пока нет бронирований</div>
        @endif
    </div>
</x-client-layout>