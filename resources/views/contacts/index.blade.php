@extends('public.layouts.app')

@section('content')
    <div class="site-section" data-aos="fade">
        <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-7">
            <div class="row mb-5">
                <div class="col-12 ">
                <h2 class="site-section-heading text-center">Contact Us</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 mb-5">
                    {!! Form::open(['action' => 'ContactsController@store', 'method' => 'POST']) !!}
                        <div class="row form-group">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="text-black" for="fname">First Name</label>
                                {{Form::text('fname', '', ['class' => 'form-control'])}}
                            </div>
                            <div class="col-md-6">
                                <label class="text-black" for="lname">Last Name</label>
                                {{Form::text('lname', '', ['class' => 'form-control'])}}
                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="email">Email</label>
                                {{Form::text('email', '', ['class' => 'form-control'])}}
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="subject">Subject</label>
                                {{Form::text('subject', '', ['class' => 'form-control'])}}
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="message">Message</label>
                                {{Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Write your notes or questions here...', 'rows' => 7, 'cols' => 30])}}
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                {{Form::submit('Send Message', ['class'=> 'btn btn-primary py-2 px-4 text-white'])}}
                            </div>
                        </div>


                    {!! Form::close() !!}
                </div>
                <div class="col-lg-3 ml-auto">
                <div class="mb-3 bg-white">
                    @foreach ($comp_details as $comp)
                        <p class="mb-0 font-weight-bold">Address</p>
                        <p class="mb-4">{{$comp->address}}</p>

                        <p class="mb-0 font-weight-bold">Phone</p>
                        <p class="mb-4"><a href="#">{{$comp->phone_numbers}}</a></p>

                        <p class="mb-0 font-weight-bold">Email Address</p>
                        <p class="mb-0"><a href="#">{{$comp->email}}</a></p>
                    @endforeach

                </div>

                </div>
            </div>
            </div>

        </div>
        </div>
    </div>
@endsection