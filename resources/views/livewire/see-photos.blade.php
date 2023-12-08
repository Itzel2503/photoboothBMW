<div>
    @foreach($photos as $photo)
        <div class="photo-container">
            <img src="{{ asset('images/' . $photo->name . '.jpeg') }}" alt="PhotoBoothFrame">
            <p>{{ $photo->name }}</p>
        </div>
    @endforeach
</div>