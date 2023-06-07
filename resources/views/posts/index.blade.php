@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{ route('posts') }}" method="post" class="mb-4">
                @csrf
                <div>
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" 
                    placeholder="Post something!"></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded font-medium">
                            Post
                        </button>
                    </div>
                </div>
            </form>

            @if ($posts->count())
                @foreach ($posts as $post)

                <!-- Referencing Blade component -->
                <!-- Pass down data we want to use in this Blade component as prop -->
                <x-post :post="$post"/>

                @endforeach

                <!-- pagination link -->
                {{ $posts->links() }}
            @else
                <p>There are no posts</p>
            @endif

        </div>

    </div>
@endsection