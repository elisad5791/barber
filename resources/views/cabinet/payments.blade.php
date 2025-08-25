<x-client-layout>
    <div class="w-full max-w-[700px] mx-auto">
        <h1 class="text-4xl font-bold">Мои платежи</h1>

        <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100 mt-6">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Дата создания</th>
                        <th>Сумма, руб.</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $payment->created_at->format('d.m.Y') }} </td>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->status_name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-client-layout>