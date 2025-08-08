<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Редактирование салона
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($errors->any())
                    <div role="alert" class="alert alert-error">
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                        @endforeach
                    </div>
                @endif

                <form class="p-6 text-gray-900" action="{{ route('dashboard.salon.update') }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Название</legend>
                                <input type="text" name="title" class="input w-full"
                                    value="{{ old('title') ?? $title }}" />
                            </fieldset>
                        </div>

                        <div>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Описание</legend>
                                <textarea class="textarea w-full"
                                    name="description">{{ old('description') ?? $description }}</textarea>
                            </fieldset>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>