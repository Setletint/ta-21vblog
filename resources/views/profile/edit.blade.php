@extends('partials.layout')

@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-200 shadow-xl">

            <div class="card-body">
                <span class="text-2xl">Update Name/Email</span>
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

        <div class="card bg-base-200 shadow-xl mt-20">

            <div class="card-body">
                <span class="text-2xl">Update Password</span>
                <form action="{{ route('newPassword.update', ['user' => $user]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Current Password</span>
                        </label>
                        <input type="password" placeholder="New Password" class="input input-bordered w-full" name="current_password"
                            value="" />
                        @error('current_password')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">New Password</span>
                        </label>
                        <input type="password" placeholder="New Password" class="input input-bordered w-full" name="password"
                            value="" />
                        @error('password')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Password confirmation</span>
                        </label>

                        <input type="password" placeholder="Confirm new password" class="input input-bordered w-full" name="password_confirmation"
                            value="" />
                        @error('password_confirmation')
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



        <div class="card bg-base-200 shadow-xl my-20">
            <div class="card-body">
                <span class="text-2xl">Delete Profile</span>
                <form action="{{ route('profile.destroy', ['user' => $user]) }}" method="POST">
                    @csrf
                    @method('DELETE')
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

        </div>
    </div>
@endsection
