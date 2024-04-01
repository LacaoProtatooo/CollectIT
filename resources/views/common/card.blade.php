@if($collectibles->isNotEmpty())
    @foreach ($collectibles as $collectible)
        @php
            $imagePaths = explode(',', $collectible->image_path);
        @endphp

        {{-- CARDS --}}
        <a href="{{ route('collectible.info', ['id' => $collectible->id]) }}">
            <div class="card w-96 bg-slate-200 shadow-xl" style="margin: 20px;">
                <figure>
                    <img class="collectibleImage{{ $collectible->id }}" src="{{ asset(trim($imagePaths[0])) }}" alt="collectible" style="object-fit: cover; width: 100%; height: 200px;">
                </figure>
                <div class="card-body" style="height: 350px; overflow: hidden;">
                    <h2 class="card-title text-stone-900">
                        {{ $collectible->name }} <br>
                        <span class="text-primary font-bold">{{ $collectible->price }}</span>
                    </h2>
                    <p class="text-stone-500" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ $collectible->description }}
                    </p> <!-- Adjusted to show description -->
                    <div class="card-actions justify-end">
                        <div class="badge badge-outline text-stone-500">Gundam</div>
                        <div class="badge badge-outline text-stone-500">Mint</div>
                    </div>
                    <button class="btn btn-primary mt-4 px-6 py-2">Buy Now</button>
                </div>
            </div>
        </a>

        <script>
            const imagePaths{{ $collectible->id }} = {!! json_encode($imagePaths) !!};
            let currentIndex{{ $collectible->id }} = 0;

            function transitionImages{{ $collectible->id }}() {
                const currentImages = document.querySelectorAll('.collectibleImage{{ $collectible->id }}');
                currentImages.forEach(image => image.classList.add('hidden'));
                currentIndex{{ $collectible->id }} = (currentIndex{{ $collectible->id }} + 1) % imagePaths{{ $collectible->id }}.length;
                const nextImage = document.querySelector('.collectibleImage{{ $collectible->id }}');
                nextImage.src = "{{ asset('') }}" + imagePaths{{ $collectible->id }}[currentIndex{{ $collectible->id }}];
                nextImage.classList.remove('hidden');
                setTimeout(transitionImages{{ $collectible->id }}, 3000);
            }

            transitionImages{{ $collectible->id }}();
        </script>
    @endforeach
@endif
