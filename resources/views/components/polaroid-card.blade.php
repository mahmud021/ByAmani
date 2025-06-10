{{-- resources/views/components/polaroid-card.blade.php --}}

<style>
    /* From Uiverse.io by datpedo_9896 */
    .polaroid {
        width: 220px;
        padding: 10px 10px 20px 10px;
        background: #fff;
        box-shadow:
            0 1px 1px rgba(0, 0, 0, 0.12),
            0 2px 2px rgba(0, 0, 0, 0.12),
            0 4px 4px rgba(0, 0, 0, 0.12),
            0 8px 8px rgba(0, 0, 0, 0.12);
        transform: rotate(-2deg);
        transition: all 0.3s ease;
    }
    .polaroid:hover {
        transform: rotate(0deg) scale(1.02);
        box-shadow:
            0 2px 2px rgba(0, 0, 0, 0.15),
            0 4px 4px rgba(0, 0, 0, 0.15),
            0 8px 8px rgba(0, 0, 0, 0.15),
            0 16px 16px rgba(0, 0, 0, 0.15);
    }

    .photo {
        width: 100%;
        height: 200px;
        background: #87ceeb;
        position: relative;
        overflow: hidden;
        background-size: cover;
        background-position: center;
    }

    /* Updated caption style for better readability */
    .caption {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        text-align: center;
        margin-top: 12px;
        color: #2d3748;
        font-size: 16px;
        font-weight: 500;
        opacity: 0.9;
    }
</style>

<div {{ $attributes->merge(['class' => 'polaroid']) }}>
    <div class="photo" style="background-image: url('{{ $image }}');"></div>
    <div class="caption">{{ $slot }}</div>
</div>
