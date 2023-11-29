@php
    // cache()->forget('last-commit');
    $commit = cache()->remember('last-commit', now()->addHour(), function() {
        $data = Http::timeout(5)->get('https://api.github.com/repos/jxxe/payback/commits/main')->json();

        return [
            'message' => $data['commit']['message'],
            'url' => $data['html_url'],
            'additions' => $data['stats']['additions'],
            'deletions' => $data['stats']['deletions'],
            'date' => now()->parse($data['commit']['author']['date']),
            'hash' => str($data['sha'])->substr(0, 7)
        ];
    });
@endphp

<div class="text-sm flex gap-4 justify-between">
    <p>© {{  date('Y') }} Jerome Paulos</p>

    @if($commit)
        <a href="{{ $commit['url'] }}" class="squish" target="_blank">
            <div class="text-right leading-none space-y-2">
                <p class="text-[0.65rem] text-gray-500 uppercase">Most Recent Commit</p>
                <p title="{{ $commit['message'] }}">{{ str($commit['message'])->limit(30) }}</p>
    
                <p class="font-mono text-xs">
                    {{ $commit['hash'] }}
                    <span class="text-gray-400">•</span>
                    {{ $commit['date']->diffForHumans(short: true) }}
                    <span class="text-gray-400">•</span>
                    <span class="text-green-500">+{{ $commit['additions'] }}</span>
                    <span class="text-red-500">-{{ $commit['deletions'] }}</span>
                </p>
            </div>
        </a>
    @else
        <p class="text-gray-400">Unable to load commit</p>
    @endif
</div>