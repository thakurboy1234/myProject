@extends('user_layout')
@section('content')
    <section class="h-100 bg-dark">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <form action="{{ route('update_profile') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col-xl-6 d-none d-xl-block text-center">
                                    <div class="card mb-4 mb-xl-0">
                                        <div class="card-header">Profile Picture</div>
                                        <div class="card-body text-center">
                                            <!-- Profile picture image-->
                                            <img style="width: 400px" class="img-account-profile rounded-circle mb-2"
                                                src="{{ asset('profile/' . $user['profile']) }}" alt="">
                                            <!-- Profile picture help block-->
                                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB
                                            </div>
                                            <!-- Profile picture upload button-->
                                            <button class="btn btn-primary" type="button">Upload new image</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card-body p-md-5 text-black">
                                        <h3 class="mb-5 text-uppercase">My Profile</h3>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="First_name" name="First_name"
                                                        value="{{ $user->First_name }}"
                                                        class="form-control form-control-lg" />
                                                    <label class="form-label" for="First_name">First name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="Last_name" name="Last_name"
                                                        value="{{ $user->Last_name }}"
                                                        class="form-control form-control-lg" />
                                                    <label class="form-label" for="Last_name">Last name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="email" name="email" value="{{ $user->email }}"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="email">Email ID</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="contact" name="contact" value="{{ $user->contact }}"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="contact">Contact</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="address" name="address" value="{{ $user->address }}"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="address">Address</label>
                                        </div>

                                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                            <h6 class="mb-0 me-4">Gender: </h6>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="gender" id="gender"
                                                    value="Female" @if ($user->gender == 'Female') checked @endif />
                                                <label class="form-check-label" for="gender">Female</label>
                                            </div>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="gender" id="gender"
                                                    value="Male" @if ($user->gender == 'Male') checked @endif />
                                                <label class="form-check-label" for="gender">Male</label>
                                            </div>

                                            <div class="form-check form-check-inline mb-0">
                                                <input class="form-check-input" type="radio" name="gender" id="gender"
                                                    value="Other" @if ($user->gender == 'Other') checked @endif />
                                                <label class="form-check-label" for="gender">Other</label>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">

                                                <select class="select" id="state" name="state">
                                                    <option selected disabled>State</option>
                                                    @foreach ($states as $state)
                                                        <option value="{{ $state->id }}"
                                                            @if ($user->state == $state->id) selected @endif>
                                                            {{ $state->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-md-6 mb-4">

                                                <select class="select">
                                                    <option selected disabled>City</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}"
                                                            @if ($user->country == $country->id) selected @endif>
                                                            {{ $country->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
