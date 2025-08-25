<x-client-layout>
    <div class="w-full max-w-[700px] mx-auto">
        <h1 class="text-4xl font-bold">Мои отзывы</h1>
        
        @if ($reviews)
        <div>
            @foreach ($reviews as $review)
                <div class="card w-full bg-base-100 card-md shadow-sm mt-4">
                    <div class="card-body">
                        <div class="font-normal">{{ $review->created_at->format('d.m.Y H:i') }}</div>
                        <p>{{ $review->content }}</p>
                        <div class="card-actions justify-end">
                            <div class="badge badge-outline badge-primary">{{ $review->salon_title }}</div>
                            <div class="badge badge-outline badge-warning">{{ $review->service_title }}</div>
                            <div class="badge badge-outline badge-success">{{ $review->master_name }}</div>
                        </div>
                        <div class="justify-end card-actions mt-4">
                            <button type="button" class="btn btn-sm btn-secondary" onclick="del_modal_{{ $review->id }}.showModal()">
                                Удалить отзыв
                            </button>
                            <dialog id="del_modal_{{ $review->id }}" class="modal">
                                <div class="modal-box">
                                    <h3 class="text-lg font-bold">Вы уверены, что хотите удалить отзыв?</h3>
                                    <div class="flex justify-between items-end">
                                        <form action="{{ route('reviews.delete', $review->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn">Удалить</button>
                                        </form>
                                        <div class="modal-action">
                                            <form method="dialog">
                                                <button class="btn">Отмена</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </dialog>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @else
            <div class="mt-10">Пока нет отзывов</div>
        @endif
    </div>
</x-client-layout>