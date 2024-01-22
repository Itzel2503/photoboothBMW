<div>
    @foreach($photos as $photo)
        <div class="photo-container">
            <img src="{{ asset('images/' . $photo->name . '.jpg') }}" alt="PhotoBoothFrame">
            <p>{{ $photo->name }}</p>
        </div>
    @endforeach
</div>
