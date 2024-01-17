@extends('partials.layout')

@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-200 shadow-xl">

            <div class="card-body">
                <form action="{{ route('profile.update', ['user' => $user]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Change name</span>
                        </label>

                        <input type="text" placeholder="Name" class="input input-bordered w-full" name="name"
                            value="{{ old('name') ?? $user->name }}" />
                        @error('name')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Change Email</span>
                        </label>

                        <input type="text" placeholder="Name" class="input input-bordered w-full" name="email"
                            value="{{ old('email') ?? $user->email }}" />
                        @error('email')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <br />
                    <div class="w-full">
                    <input type="submit" class="btn btn-primary my-3" value="Update">
                    </div>
                </form>
            </div>
        </div>


        <!-- HERE WILL BE PROFILE DELETING
        <div class="card bg-base-200 shadow-xl my-20">
            <div class="card-body">
                <span class="text-2xl">Delete Profile</span>
                <form action="{{ route('profile.destroy', ['user' => $user]) }}" method="DELETE">
                    @csrf
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Current password</span>
                        </label>

                        <input type="password" placeholder="Current Password" class="input input-bordered w-full" name="password" />
                        @error('password')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>
                    <br />
                    <div class="w-full">
                    <input type="submit" class="btn btn-warning my-3" value="Destroy">
                    </div>
                </form>
            </div>
        -->

        </div>
    </div>
@endsection
