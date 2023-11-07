<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($notes as $note)
        <url>
            <loc>{{ route('note',[$note->grade->slug,$note->subject->slug,$note->lesson->slug,$note->slug]) }}</loc>
            <lastmod>{{ $note->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>