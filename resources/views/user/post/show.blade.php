<x-app-layout :title="$post->title">
    <div class="row">
        <div class="col-12">
            <div class="text-right mb-3">
                <a href="{{ route('post.index') }}" class="btn btn-sm btn-primary text-white" >Back</a>
                <a href="{{ route('post.edit', $post) }}" class="btn btn-sm btn-primary text-white" >Edit</a>
                <a href="" class="btn btn-sm btn-secondary " >Public View</a>
            </div>
            <div class="card">
                <div class="card-header"><h3>{{ $post->title }}</h3></div>
                <div class="card-body">
                    <p>{{ $post->excerpt }}</p>

                    <div class="card-img">
                        <center><img width="50%" src="{{ $post->getFirstMediaUrl('thumbnails') ?? '' }}"></center>
                    </div>
                    <br>
                    {!! $post->content !!}
                    <br>

                    @if($post->hasMedia('attachments'))
                        <h3>Attachments</h3>
                        <ul>
                        @forelse($post->getMedia('attachments') as $attachment)
                            <li><a href="{{ optional($attachment)->getUrl() }}"
                                       target="_blank">{{ optional($attachment)->name.' '.optional($attachment)->mime_type }}</a>
                            </li>
                        @empty
                        @endforelse
                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
