@extends('clientside.Master.main')
@section('title','View detail')
@section('content')
<div class="container">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-9 my-4 z-depth-1">
                <div class="tab-content pt-4">

                    <!--Panel 1-->
                    <!--Card content-->
                    <form>

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6 mb-4">

                                <!--firstName-->
                                <label for="firstName" class="">First name</label>
                                <input type="text" id="firstName" class="form-control">

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6 mb-2">

                                <!--lastName-->
                                <label for="lastName" class="">Last name</label>
                                <input type="text" id="lastName" class="form-control">
                            </div>
                            <!--Grid column-->
                        </div>
                        <!--Grid row-->
                        <!--Username-->
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">@</span>
                            </div>
                            <input type="text" class="form-control py-0" placeholder="Username" aria-describedby="basic-addon1">
                        </div>
                        <!--email-->
                        <label for="email" class="">Email (optional)</label>
                        <input type="text" id="email" class="form-control mb-4" placeholder="youremail@example.com">
                        <!--address-->
                        <label for="address" class="">Address</label>
                        <input type="text" id="address" class="form-control mb-4" placeholder="1234 Main St">
                        <!--address-2-->
                        <label for="address-2" class="">Address 2 (optional)</label>
                        <input type="text" id="address-2" class="form-control mb-4" placeholder="Apartment or suite">
                        <!--Grid row-->
                        <div class="row">

                            <div class="col-lg-4 col-md-6 mb-4">
                                <label for="state">State</label>
                                <select class="custom-select d-block w-100" id="state" required="">
                                    <option value="">Choose...</option>
                                    <option>Mp</option>
                                    <option>Mp</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>

                            </div>
                            <!--Grid column-->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <label for="state">City</label>
                                <select class="custom-select d-block w-100" id="state" required="">
                                    <option value="">Choose...</option>
                                    <option>Jabalpur</option>
                                    <option>Katni</option>
                                    <option>Sihora</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>

                            </div>
                            <!--Grid column-->
                            <div class="col-lg-4 col-md-6 mb-4">

                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>

                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!-- <hr> -->
                        <!--
                        <div class="mb-1">
                            <input type="checkbox" class="form-check-input filled-in" id="chekboxRules">
                            <label class="form-check-label" for="chekboxRules">I accept the terms and conditions</label>
                        </div>
                        <div class="mb-1">
                            <input type="checkbox" class="form-check-input filled-in" id="safeTheInfo">
                            <label class="form-check-label" for="safeTheInfo">Save this information for next time</label>
                        </div>
                        <div class="mb-1">
                            <input type="checkbox" class="form-check-input filled-in" id="subscribeNewsletter">
                            <label class="form-check-label" for="subscribeNewsletter">Subscribe to the newsletter</label>
                        </div> -->

                        <!-- <hr> -->
                        <!-- <div class="w-25 mx-auto">
                            <button class="btn btn-elegant py-2 btn-lg btn-block" type="submit">Next step</button>
                        </div> -->


                    </form>

                </div>
            </div>
            <div class="col-lg-3  my-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center font-weight-bold">Summary</h4>
                        <hr>
                        <dl class="row mb-0">
                            <dd class="col-sm-6">
                                <p class="price_left_side">
                                    Subtotal
                                </p>
                            </dd>
                            <dd class="col-sm-6">
                                <p class="price_right_side">
                                    2000<span class="pl-2"> Rs</span>
                                </p>
                            </dd>
                        </dl>
                        <dl class="row mb-0">
                            <dd class="col-sm-6">
                                <p class="price_left_side">
                                    Discount
                                </p>
                            </dd>
                            <dd class="col-sm-6">
                                <p class="price_right_side">
                                    20.00<span class="pl-2"> Rs</span>
                                </p>
                            </dd>
                        </dl>
                        <hr class="my-2">
                        <dl class="row mb-0">
                            <dt class="col-sm-6">
                                <p class="price_left_side">
                                    Total
                                </p>
                            </dt>
                            <dt class="col-sm-6">
                                <p class="price_right_side">

                                    2000.00<span class="pl-2"> Rs</span>
                                </p>
                            </dt>
                        </dl>
                    </div>

                </div>
                <a class="btn  py-2 place_order btn-block mt-3" href="http://solarmall.retinodes.com/Shiping/address" type="submit">Place order</a>

            </div>

            <!--Grid column-->

        </div>
        <!--Grid row-->

    </div>
</div>
@stop
