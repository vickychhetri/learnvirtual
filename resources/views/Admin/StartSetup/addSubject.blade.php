@extends('Admin.layout')
@section('title','Dashboard')

@section("container")

<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">Add Subject</h2>
<!--// main-heading -->

<!-- Error Page Content -->
<div class="blank-page-content">

    <!-- Error Page Info -->
    <div class="outer-w3-agile mt-3 d-flex justify-content-center">

        <form action="/Add/Course" method="post"  >
        <div class="form-group">
                <label for="exampleFormControlSelect1">Course select</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>    
        <div class="form-group">
                <label for="exampleFormControlInput1">Subject</label>
                <input type="text" class="form-control" id="Subject" placeholder="Subject"
                    required="">
            </div>
            

            <button type="submit" class="btn btn-primary mb-2">Add</button>

        </form>

    </div>
    <!--// Error Page Info -->

</div>
@endsection