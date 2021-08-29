<div>    
    <input type="text" name="title" value="{{ old('title', optional($post ?? null)->title) }}"/>
</div>
        {{-- Specific field error --}}
        @error('title')
            <div>{{ $message }}</div>
        @enderror
        <div><textarea name="content">{{ old('content', optional($post ?? null)->content) }}</textarea></div>

        {{-- Combined error for all  --}}
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

