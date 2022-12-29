@extends('user_layout')
@section('content')
    <section class="h-100 bg-primary">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                                    alt="Sample photo" class="img-fluid"
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">

                                    <form id="reg" method="POST" action="{{ route('store_user') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <h3 class="mb-5 text-uppercase">Student registration form</h3>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="First_name" name="First_name"
                                                        class="form-control form-control-lg" />
                                                    <label class="form-label" for="First_name">First name</label><br>
                                                    <span style="color:red">
                                                        @error('First_name')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="Last_name" name="Last name"
                                                        class="form-control form-control-lg" />
                                                    <label class="form-label" for="Last_name">Last name</label><br>
                                                    <span style="color:red">
                                                        @error('Last_name')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="email" name="email"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="email">Email ID</label><br>
                                            <span style="color:red">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="contact" name="contact"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="contact">Contact</label><br>
                                            <span style="color:red">
                                                @error('contact')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="address" name="address"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="address">Address</label><br>
                                            <span style="color:red">
                                                @error('address')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                            <h6 class="mb-0 me-4">Gender: </h6>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    value="Female" />
                                                <label class="form-check-label" for="gender">Female</label>
                                            </div>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    value="Male" />
                                                <label class="form-check-label" for="gender">Male</label>
                                            </div>

                                            <div class="form-check form-check-inline mb-0">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    value="Other" />
                                                <label class="form-check-label" for="gender">Other</label>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">

                                                <label for="state" class="form-label">State</label>
                                                <select class="select" id="state" name="state">
                                                    <option selected disabled>State</option>
                                                    @foreach ($states as $state)
                                                        <option value="{{ $state->id }}">{{ $state->state_name }}
                                                        </option>
                                                    @endforeach
                                                </select><br>
                                                <span style="color:red">
                                                    @error('state')
                                                        {{ $message }}
                                                    @enderror
                                                </span>

                                            </div>
                                            <div class="col-md-6 mb-4">

                                                <label for="country" class="form-label">Country</label>
                                                <select class="select" id="country" name="country">
                                                    <option selected disabled>City</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->country_name }}
                                                        </option>
                                                    @endforeach
                                                </select><br>
                                                <span style="color:red">
                                                    @error('country')
                                                        {{ $message }}
                                                    @enderror
                                                </span>

                                            </div>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" id="pass" name="password"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="password">Password</label><br>
                                            <span style="color:red">
                                                @error('password')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label for="profile" class="form-label">Profile</label><br>
                                                <input type="file" class="form-control-file" name="profile"
                                                    id="profile"><br>
                                                <span style="color:red">
                                                    @error('profile')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-end pt-3">
                                                <button type="button" class="btn btn-light btn-lg">Reset all</button>
                                                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- @section('script')
    <script>
        $(document).ready(function() {
            var value = $("#pass").val();

            $.validator.addMethod("checklower", function(value) {
                return /[a-z]/.test(value);
            });
            $.validator.addMethod("checkupper", function(value) {
                return /[A-Z]/.test(value);
            });
            $.validator.addMethod("checkdigit", function(value) {
                return /[0-9]/.test(value);
            });

            // $("#reg").validate({
            //     rules: {

            //         First_name: "required|max:250|string",
            //         Last_name: "required|max:250|string",
            //         email: "required|email|max:255",
            //         password: {
            //             required: true,
            //             min: 6,
            //             max: 15
            //             // checklower:true,
            //             // checkupper:true,
            //             // chrckdigit:true

            //         },
            //         contact: "required|numeric"
            //     },
            //     submitHandler: function(form) {
            //         if ($('#reg').validate()) {

            //             form.submit();
            //         }
            //     }
            // });

            $("#reg").validate({
                rules: {
                    First_name: {
                        required: true,
                        maxlength: 50
                    },
                    Last_name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    password: {
                        required: true,
                        min: 6,
                        max: 15,
                        checklower:true,
                        checkupper:true,
                        chrckdigit:true

                    },
                },
                messages: {
                    First_name: {
                        required: "Please enter First name",
                    },
                    Last_name: {
                        required: "Please enter valid email",
                    },
                    email: {
                        required: "Please enter message",
                    },
                },
            });



        })
    </script>
@endsection --}}
