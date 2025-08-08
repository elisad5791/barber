<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Панель управления
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
                        <div class="card w-96 bg-base-100 shadow-sm">
                            <div class="card-body">
                                <div class="flex justify-between">
                                    <h2 class="text-3xl font-bold">{{ $title }}</h2>
                                </div>

                                <div class="text-xs uppercase font-semibold opacity-60">
                                    {{ $description }}
                                </div>

                                <div>
                                    <a href="{{ route('dashboard.salon.edit') }}" class="btn btn-success mt-2">Редактировать</a>
                                </div>
                            </div>
                        </div>

                        <div class="card w-96 bg-base-100 shadow-sm">
                            <div class="card-body">
                                <div class="flex justify-between">
                                    <h2 class="text-2xl font-bold">Услуги</h2>
                                </div>

                                <ul class="mt-6 flex flex-col gap-2 text-xs">
                                @forelse ($services as $service)
                                    <li class="list-row text-xs uppercase font-semibold opacity-60">
                                        {{ $service->title }}
                                    </li>
                                @empty
                                    <li class="list-row text-xs uppercase font-semibold opacity-60">Услуги не выбраны</li>
                                @endforelse
                                </ul>

                                @if (!empty($missingServices))
                                    <form class="mt-6" action="{{ route('dashboard.service.add') }}" method="post">
                                        @csrf
                                        <select class="select" name="service_id">
                                            @foreach ($missingServices as $service)
                                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-success mt-2">Добавить</button>
                                    </form>
                                @endif
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="card w-96 bg-base-100 shadow-sm">
                                <div class="card-body">
                                    <div class="flex justify-between">
                                        <h2 class="text-2xl font-bold">Мастера</h2>
                                    </div>
                                    <ul class="mt-6 flex flex-col gap-2 text-xs">
                                        @forelse ($masters as $master)
                                            <li class="list-row">
                                                <span class="text-xs uppercase font-semibold opacity-60">{{ $master->name }}</span>
                                                <a href="{{ route('dashboard.master.show', $master->id) }}" class="btn btn-info btn-sm ms-2">Детали</a>
                                                <a href="#" class="btn btn-info btn-sm ms-2">График</a>
                                            </li>
                                        @empty
                                            <li class="list-row">
                                                <span class="text-xs uppercase font-semibold opacity-60">Нет мастеров</span>
                                            </li>
                                        @endforelse
                                    </ul>

                                    <div class="mt-6">
                                        <a href="{{ route('dashboard.master.create') }}" class="btn btn-success">Добавить мастера</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>