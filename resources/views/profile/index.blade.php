@foreach($profile as $profile)
    <div><h1>{{$profile->name}}</h1></div>
    <div><h2>{{$profile->caption}}</h2></div>
    <div><img src="/storage/{{$profile->image}}" class="w-100" alt=""></div>
    <div><a href="/profile/{{$profile->id}}">Edit Profile</a></div>
@endforeach