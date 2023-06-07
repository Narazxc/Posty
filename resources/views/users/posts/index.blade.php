@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 ">
            <div class="p-6">
                <h1 class="text-3xl font-medium mb-1">{{$user->name}}</h1>
                <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and
                    recieved {{ $user->recievedLikes()->count() }} likes
                </p>
            </div>
            <div class="bg-white p-6 rounded">

                @if ($posts->count())
                    @foreach ($posts as $post)
    
                    <!-- Referencing Blade component -->
                    <!-- Pass down data we want to use in this Blade component as prop -->
                    <x-post :post="$post"/>
    
                    @endforeach
    
                    <!-- pagination link -->
                    {{ $posts->links() }}
                @else
                    <p>{{ $user->name }} does not have any posts</p>
                @endif
            </div>
        </div>
    </div>
@endsection