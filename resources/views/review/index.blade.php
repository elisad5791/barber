<x-client-layout>
    <div class="w-full">
        <h1 class="text-4xl font-bold">Отзывы</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 w-full mt-6">
            <div class="card bg-base-100 card-md shadow-sm">
                <div class="card-body">
                    <h2 class="card-title">Поиск отзывов</h2>
                    <form action="{{ route('reviews.index') }}">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Салон</legend>
                            <select class="select w-full" name="salon">
                                <option value="0" @selected($salonId == 0)>Не выбрано</option>
                                @foreach ($salons as $salon)
                                <option value="{{ $salon->id }}" @selected($salonId == $salon->id)>
                                    {{ $salon->title }}
                                </option>
                                @endforeach
                            </select>
                        </fieldset>

                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Услуга</legend>
                            <select class="select w-full" name="service">
                                <option value="0" @selected($serviceId == 0)>Не выбрано</option>
                                @foreach ($services as $service)
                                <option value="{{ $service->id }}" @selected($serviceId == $service->id)>
                                    {{ $service->title }}
                                </option>
                                @endforeach
                            </select>
                        </fieldset>

                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Мастер</legend>
                            <select class="select w-full" name="master">
                                <option value="0" @selected($masterId == 0)>Не выбрано</option>
                                @foreach ($masters as $master)
                                <option value="{{ $master->id }}" @selected($masterId == $master->id)>
                                    {{ $master->name }}
                                </option>
                                @endforeach
                            </select>
                        </fieldset>

                        <div class="mt-4 flex justify-between">
                            <button class="btn">Найти</button>
                            <a href="{{ route('reviews.index') }}" class="btn-default">Сбросить</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-span-2">
                @foreach ($reviews as $review)
                    <div class="card w-full bg-base-100 card-md shadow-sm mt-4">
                        <div class="card-body">
                            <h2 class="card-title">
                                {{ $review->user_name }}
                                <div class="badge font-normal">{{ $review->created_at->format('d.m.Y H:i') }} </div>
                            </h2>
                            <p>{{ $review->content }}</p>
                            <div class="card-actions justify-end">
                                <div class="badge badge-outline badge-primary">{{ $review->salon_title }}</div>
                                <div class="badge badge-outline badge-warning">{{ $review->service_title }}</div>
                                <div class="badge badge-outline badge-success">{{ $review->master_name }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</x-client-layout>