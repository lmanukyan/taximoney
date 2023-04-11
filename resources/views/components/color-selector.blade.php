<div class="color-selector">
    @foreach ($colors as $color)
        <div class="color-item">
            <label>
                <input 
                    class="color-input"
                    type="radio"
                    name="color_id"
                    value="{{ $color->id }}"
                    {{ $selected === $color->id ? 'checked' : '' }}
                    required
                />
                <span class="color-btn" style="background: {{ $color->hex }}"></span>
            </label>
          </div>
    @endforeach
</div>

