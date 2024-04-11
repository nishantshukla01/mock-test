@extends('clientside.userdashboard.masteruserdashboard')
@section('title','Profile | '.\Illuminate\Support\Facades\Auth::user()->name)
@section('content')
    <div class="main_container">
        <div class="z-depth-1">
            <div class="page__container">
                <div class="heder_section_dashboard">
                    <h3>Profile Setting</h3>
                </div>
                <div class="card-form">
                    <div class="row mx-0">
                        <div class="col-lg-4 card-body">
                            <p><strong class="headings-color">Basic Information</strong></p>
                            <p class="text-muted mb-0">Edit your account details and settings.</p>
                        </div>
                        <div class="col-lg-8 card-form__body card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Login</label>
                                        <input id="" type="text" class="form-control" placeholder="7000535236"
                                               value="{{\Illuminate\Support\Facades\Auth::user()->mobile}}" readonly/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="userid">User Id</label>
                                        <input id="userid" type="text" class="form-control" placeholder="@user6765"
                                               readonly/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input id="date" type="text" class="form-control"
                                               value="{{\Carbon\Carbon::parse(\Illuminate\Support\Facades\Auth::user()->created_at)->format('d-m-Y')}}"
                                               placeholder=""
                                               readonly/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="time">Time</label>
                                        <input id="time" type="text"
                                               value="{{\Carbon\Carbon::parse(\Illuminate\Support\Facades\Auth::user()->created_at)->format('g:i A')}}"
                                               class="form-control"
                                               readonly/>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
                <hr>

                <div class="card-form">
                    <div class="row mx-0">
                        <div class="col-lg-4 card-body">


                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg"
                                           onchange="readURL(this);"/>
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview">
                                        <img src="{{url(\Illuminate\Support\Facades\Storage::url(\Illuminate\Support\Facades\Auth::user()->image))}}"
                                             alt="profile" id="profileImg"/>
                                    </div>
                                </div>
                            </div>

                            <!-- <p><strong class="headings-color">Priyansha Tiwari</strong></p>
                            <p class="text-muted mb-0">Emai.</p> -->
                        </div>
                        <div class="col-lg-8 card-form__body card-body">
                            <form action="{{route('user.profile.update')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Full name</label>
                                            <input id="name" name="name" type="text" class="form-control"
                                                   placeholder="First name"
                                                   value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                        </div>
                                    </div>
                                    {{--<div class="col-sm-6">--}}
                                    {{--<div class="form-group">--}}
                                    {{--<label for="lname">Last name</label>--}}
                                    {{--<input id="lname" type="text" class="form-control" placeholder="Last name" value="tiwari">--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" type="email" name="email" class="form-control"
                                                   placeholder="Last name"
                                                   value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Phone no</label>
                                            <input id="mobile" name="mobile" type="number" class="form-control"
                                                   placeholder="Last name"
                                                   value="{{\Illuminate\Support\Facades\Auth::user()->mobile}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea id="address" name="address" rows="4" class="form-control"
                                                      placeholder="">{{\Illuminate\Support\Facades\Auth::user()->address}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button class="submit-button state-0" type="submit">
                                            Update

                                        </button>

                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
                <hr/>
                {{--<div class=" card-form">--}}
                {{--<div class="row mx-0">--}}
                {{--<div class="col-lg-4 card-body">--}}
                {{--<p><strong class="headings-color">Update Your Password</strong></p>--}}
                {{--<p class="text-muted mb-0">Change your password.</p>--}}
                {{--</div>--}}
                {{--<div class="col-lg-8 card-form__body card-body">--}}
                {{--<div class="row">--}}
                {{--<div class="col-md-6">--}}
                {{--<div class="form-group">--}}
                {{--<label for="opass">Old Password</label>--}}
                {{--<input id="opass" type="password" class="form-control"--}}
                {{--placeholder="Old password" value="****">--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                {{--<label for="npass">New Password</label>--}}
                {{--<input id="npass" type="password" class="form-control is-invalid">--}}
                {{--<small class="invalid-feedback">The new password must not be empty.</small>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                {{--<label for="cpass">Confirm Password</label>--}}
                {{--<input id="cpass" type="password" class="form-control"--}}
                {{--placeholder="Confirm password">--}}
                {{--</div>--}}
                {{--<div class="col-sm-12 px-0">--}}
                {{--<button class="submit-button state-0">--}}
                {{--Change Password--}}

                {{--</button>--}}

                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}


            </div>
        </div>
    </div>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $('#profileImg')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
                change_profile(input);
            }
        }

        function change_profile(id) {
            // debugger;
            let image = $('#imageUpload')[0].files[0];
            let form_data = new FormData();
            form_data.append('image', image);
            $.ajax({
                url: "{{route('user.profile.image')}}",
                data: form_data,
                type: 'POST',
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $(id).attr('disabled', true);
                },
                success: function (response) {
                    // debugger;
                    console.log(data);
                    $(id).attr('disabled', false);
                    if (response.success === true) {
                        console.log(response)
                    } else {
                        $(id).attr('disabled', false);
                        $.each(response.error, function (index, value) {
                            console.log(value)
                        });
                    }
                },
                error: function (error) {
                    $(id).attr('disabled', false);
                    console.log(error);
                }
            });
        }

    </script>
@stop
