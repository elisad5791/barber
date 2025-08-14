<x-client-layout>
    <div class="w-full">
        <h1 class="text-4xl font-bold">{{ $title }}</h1>
        <p class="mt-6">{{ $description }}</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 items-start gap-8">
            @foreach ($services as $service)
            <table class="table-auto">
                <tbody>
                    <tr class="font-bold">
                        <td colspan="2" class="pt-8">{{ $service->title }}</td>
                    </tr>
                    @foreach ($service->masters as $master)
                        <tr>
                            <td class="pt-4 ps-8">{{ $master->name }}</td>
                            <td class="pt-4 ps-8">
                                <a href="{{ route('welcome.master', $master->id) }}" class="btn btn-info ms-6">
                                    Записаться
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endforeach
        </div>
    </div>
</x-client-layout>