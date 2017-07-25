@extends('main')


@section('title','| Contact')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Contact me</h2>
           <hr />
           <form>
               <div class="form-group">
                   <label name="email"> Email</label>
                   <input type="email" name="email" class="form-control">
               </div>
                <div class="form-group">
                   <label name="subject"> Subject</label>
                   <input type="text" name="subject" class="form-control">
               </div>
               <div class="form-group">
                   <label name="subject"> Body</label>
                   <textarea name="subject" class="form-control" rows="6" cols="4">
                   </textarea>
               </div>
               <input type="submit" name="" class="btn btn-default" value="send message">
           </form>
        </div>

    </div>
    @endsection