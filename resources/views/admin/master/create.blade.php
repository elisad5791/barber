<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Добавление мастера
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form class="p-6 text-gray-900" action="{{ route('dashboard.master.store') }}" method="post">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
                        <div>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Имя</legend>
                                <input type="text" name="name" class="input" />
                            </fieldset>
                        </div>

                        <div>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Email</legend>
                                <input type="email" name="email" class="input" />
                            </fieldset>
                        </div>

                        <div>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Телефон</legend>
                                <input type="text" name="phone" class="input" />
                            </fieldset>
                        </div>

                        <div>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Пароль</legend>
                                <input type="password" name="password" class="input" />
                            </fieldset>
                        </div>

                        <div>
                            <fieldset class="fieldset bg-base-100 border-base-300 rounded-box w-64 border p-4">
                                <legend class="fieldset-legend">Услуги</legend>
                                @foreach ($services as $service)
                                    <label class="label">
                                        <input type="checkbox" class="checkbox" name="service_ids[]" value="{{ $service->id }}"/>
                                        {{ $service->title }}
                                    </label>
                                @endforeach
                            </fieldset>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button class="btn btn-success">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>