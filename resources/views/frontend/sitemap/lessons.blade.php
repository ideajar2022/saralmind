<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($lessons as $lesson)
        <url>
            <loc>{{ route('lesson',[$lesson->grade->slug,$lesson->subject->slug,$lesson->slug]) }}</loc>
            <lastmod>{{ $lesson->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>