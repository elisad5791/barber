<x-client-layout>
    <div class="w-full">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Мастер {{ $name }}
        </h2>
        <p>т. {{ $phone }}</p>

        <div class="py-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div data-master-id="{{ $id }}">
                    <div id="calendar_client"></div>
                </div>
            </div>
        </div>
    </div>
</x-client-layout>

<button class="btn" onclick="reservation_modal.showModal()" style="display:none" id="open_reservation_modal">open modal</button>
<dialog id="reservation_modal" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle absolute right-2 top-2">✕</button>
        </form>

        <h3 class="text-lg font-bold">Запись к мастеру {{ $name }}</h3>
        <div class="mt-2">
            <span id="time_start"></span> - <span id="time_finish"></span> <span id="reservation_date" class="ms-4"></span> 
        </div>

        <form action="{{ route('welcome.timeslots.update') }}" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="timeslot_id" id="timeslot_id" value="">

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Выберите услугу</legend>
                <select class="select" name="service_id">
                    @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Ваше имя (или другая информация)</legend>
                <input type="text" class="input" name="comment"/>
            </fieldset>

            <button class="btn btn-success mt-4">Записаться</button>
        </form>
    </div>
</dialog>