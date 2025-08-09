<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Мастер {{ $name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6" data-master-id="{{ $id }}">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<button class="btn" onclick="empty_modal.showModal()" style="display:none" id="open_empty_modal">open modal</button>
<dialog id="empty_modal" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold">Добавить выбранные слоты?</h3>
        <div class="flex justify-between items-end">
            <form action="{{ route('dashboard.timeslots.store') }}" method="post">
                @csrf
                <input type="hidden" name="start" id="interval_start" value="">
                <input type="hidden" name="finish" id="interval_finish" value="">
                <input type="hidden" name="master_id" value="{{ $id }}">
                <button class="btn">Добавить</button>
            </form>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Отмена</button>
                </form>
            </div>
        </div>
    </div>
</dialog>

<button class="btn" onclick="full_modal.showModal()" style="display:none" id="open_full_modal">open modal</button>
<dialog id="full_modal" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold" id="slot_description">Slot description</h3>
        <div class="flex justify-between items-end">
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Закрыть</button>
                </form>
            </div>
            <form action="{{ route('dashboard.timeslots.delete') }}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="start" id="delete_start" value="">
                <input type="hidden" name="master_id" value="{{ $id }}">
                <button class="btn btn-xs btn-secondary btn-soft">Удалить</button>
            </form>
        </div>
    </div>
</dialog>