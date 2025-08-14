<x-client-layout>
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8 w-full">
        @foreach ($salons as $salon)
            <div class="card bg-primary text-primary-content">
                <div class="card-body">
                    <h2 class="card-title">{{ $salon->title }}</h2>
                    <ul>
                    @foreach ($salon->services as $service)
                        <li>{{ $service->title }}</li>
                    @endforeach
                    </ul>
                    <div class="card-actions justify-end">
                        <a href="{{ route('welcome.salon', $salon->id) }}" class="btn">Записаться</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-client-layout>