<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Салоны
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Название</th>
                            <th>Полная сумма платежей, руб.</th>
                            <th>Оплачено до</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($salons as $salon)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $salon->title }}</td>
                            <td>{{ $salon->total }}</td>
                            <td>{{ $salon->paid_upto }}</td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>