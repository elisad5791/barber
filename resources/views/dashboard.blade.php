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
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="card w-96 bg-base-100 shadow-sm">
                            <div class="card-body">
                                <div class="flex justify-between">
                                    <h2 class="text-3xl font-bold">Услуги</h2>
                                </div>
                                <ul class="mt-6 flex flex-col gap-2 text-xs">
                                    <li class="list-row text-xs uppercase font-semibold opacity-60">Мужской парикмахер
                                    </li>
                                    <li class="list-row text-xs uppercase font-semibold opacity-60">Мужской парикмахер
                                    </li>
                                    <li class="list-row text-xs uppercase font-semibold opacity-60">Мужской парикмахер
                                    </li>
                                    <li class="list-row text-xs uppercase font-semibold opacity-60">Мужской парикмахер
                                    </li>
                                    <li class="list-row text-xs uppercase font-semibold opacity-60">Мужской парикмахер
                                    </li>
                                </ul>
                                <form class="mt-6" action="" method="post">
                                    <select class="select">
                                        <option disabled selected>Pick a color</option>
                                        <option>Crimson</option>
                                        <option>Amber</option>
                                        <option>Velvet</option>
                                    </select>
                                    <button class="btn btn-success mt-2">Добавить</button>
                                </form>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="card w-96 bg-base-100 shadow-sm">
                                <div class="card-body">
                                    <div class="flex justify-between">
                                        <h2 class="text-3xl font-bold">Мастера</h2>
                                    </div>
                                    <ul class="mt-6 flex flex-col gap-2 text-xs">
                                        <li class="list-row">
                                            <span class="text-xs uppercase font-semibold opacity-60">Иван Иванов</span>
                                            <a href="#" class="btn btn-info btn-sm ms-2">Детали</a>
                                            <a href="#" class="btn btn-info btn-sm ms-2">График</a>
                                        </li>
                                        <li class="list-row">
                                            <span class="text-xs uppercase font-semibold opacity-60">Иван Иванов</span>
                                            <a href="#" class="btn btn-info btn-sm ms-2">Детали</a>
                                            <a href="#" class="btn btn-info btn-sm ms-2">График</a>
                                        </li>
                                        <li class="list-row">
                                            <span class="text-xs uppercase font-semibold opacity-60">Иван Иванов</span>
                                            <a href="#" class="btn btn-info btn-sm ms-2">Детали</a>
                                            <a href="#" class="btn btn-info btn-sm ms-2">График</a>
                                        </li>
                                        <li class="list-row">
                                            <span class="text-xs uppercase font-semibold opacity-60">Иван Иванов</span>
                                            <a href="#" class="btn btn-info btn-sm ms-2">Детали</a>
                                            <a href="#" class="btn btn-info btn-sm ms-2">График</a>
                                        </li>
                                        <li class="list-row">
                                            <span class="text-xs uppercase font-semibold opacity-60">Иван Иванов</span>
                                            <a href="#" class="btn btn-info btn-sm ms-2">Детали</a>
                                            <a href="#" class="btn btn-info btn-sm ms-2">График</a>
                                        </li>
                                    </ul>
                                    <div class="mt-6">
                                        <a href="#" class="btn btn-success">Добавить мастера</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>