@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100">
        </div>
    <div class="col-9 pt-5">
        <div class="d-flex justify-content-between align-items-baseline pb-3">
            <div class="d-flex align-items-center">
                <div class="h4">{{$user->username}}</div>
                <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
            </div>
        @can('update',$user->profile)
                <a href="/p/create">Add New Post</a>
        @endcan
        </div>
        @can('update',$user->profile)
        <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
        @endcan
            <div class="d-flex">
                <div class="pr-5"><strong class="pr-1">{{ $postCount }}</strong>posts</div>
                <div class="pr-5"><strong class="pr-1">{{ $followersCount }}</strong>followers</div>
                <div class="pr-5"><strong class="pr-1">{{ $followingCount }}</strong>following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description }}</div>
        @if($user->profile->url)
             <div><a href="{{$user->profile->url}}">{{$user->profile->url}}</a></div>
        @else
            <div><a href="#">N/A</a></div>
        @endif
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}">
            <img src="/storage/{{$post->image}}" class="w-100" alt="">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
