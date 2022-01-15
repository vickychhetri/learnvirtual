@extends('User.userarea.layout')
@section('title','Dashboard')

@section("container")


<!-- Error Page Content -->
<div class="blank-page-content">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">


            <!-- Error Page Info -->
            <div class="outer-w3-agile mt-3">
                <p class="paragraph-agileits-w3layouts">
                <h4 class="tittle-w3-agileits mb-4">Candidate Personal Detail</h4>
                <p> <i style="color: red;"> Dear participants, read the statement carefully and give your 
                    responses. </i> </p>
                <br/>
                <form action="/User/Demographic" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Age (In Years)</label>
                        <input type="number" class="form-control" name="age" id="exampleFormControlInput1" placeholder="32"
                            required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Gender</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name of Institute</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"  name="college" placeholder="Guru Nanak Dev University"
                            required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">State</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="state" placeholder="Punjab"
                            required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Year of study</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="yearStudy" placeholder="2020-23"
                            required="">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Do you have any information regarding Cardiovascular Disorders among children ?</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="inforRef">
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">If yes, Specify the source of information</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="infoRefExplanation" required=""></textarea>
                    </div>
                    <center>
                    <div class="form-group">
                       <input type="submit" name="submit" value="Start" class="btn btn-danger"/>
                    </div>
                    </center>
                </form>


                <br /> <br />
                <span style="float: right;"> Amita </span>
                </p>
            </div>

        </div>

    </div>
    <!--// Error Page Info -->

</div>
@endsection