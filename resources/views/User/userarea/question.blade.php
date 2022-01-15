@extends('User.userarea.layout')
@section('title','Dashboard')

@section("container")

<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center"> {{$Quest->testName}} </h2>
<!--// main-heading -->

<!-- Error Page Content -->
<div class="blank-page-content">

    <!-- Error Page Info -->
    <div class="outer-w3-agile mt-3">
        <p class="paragraph-agileits-w3layouts">
        <h4 class="mb-3">{{$Quest->question}} </h4>
       
        <div class="d-block my-3">
            <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" 
                    required="">
                <label class="custom-control-label" for="credit"> {{$Quest->optionA}} </label>
            </div>
            <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="debit"> {{$Quest->optionB}}  </label>
            </div>
            <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="paypal">  {{$Quest->optionC}}</label>
            </div>
            <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="paypal"> {{$Quest->optionD}} </label>
            </div>
        </div>
        <center> <input type="submit" name="submit" value="Save & Next" class="btn btn-success"/> </center>

        </p>
    </div>
    <!--// Error Page Info -->

</div>
@endsection