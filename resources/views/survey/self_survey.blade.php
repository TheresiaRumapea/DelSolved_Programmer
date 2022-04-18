@extends('layouts.app')

@section('content')
<style>
.css-button {
	font-family: Arial;
	color: #FFFFFF;
	font-size: 16px;
	border-radius: 5px;
	border: 1px #eeb44f solid;
	background: #F29B4B;
	margin-bottom: 5px;
	box-shadow: inset 1px 1px 2px 0px #fce2c1;
	cursor: pointer;
	display: inline-flex;
	align-items: center;
}
.css-button:hover {
	background: linear-gradient(180deg, #fb9e25 5%, #ffc477 100%);
}
.css-button-icon {
	padding: 3px 14px;
}
.css-button-icon svg {
	vertical-align: middle;
	position: relative;
	left: 4px;
}
.css-button-text {
	padding: 7px 9px;
}
.css-button-text span{
	display: block;
	position: relative;
	left: -11px;
}

.css-button1 {
	font-family: Arial;
	color: #FFFFFF;
	font-size: 16px;
	border-radius: 5px;
	border: 0px #c81414 solid;
	background-color: #ff0000;
	margin-bottom: 5px;
	box-shadow: inset 1px 1px 2px 0px #fce2c1;
	cursor: pointer;
	display: inline-flex;
	align-items: center;
}
.css-button1:hover {
	background-color: #c81414;
}
.css-button-icon1 {
	padding: 7px 10px;
}
.css-button-icon1 svg {
	vertical-align: middle;
	position: relative;
	left: 3px;
}
.css-button-text1 {
	padding: 7px 9px;
}
.css-button-text1 span{
	display: block;
	position: relative;
	left: -7px;
}

</style>

    <div class="row">
      <div class="col-lg-12">
          <div class="row">
              <div class="col-lg-8 table-responsive">
              <h2 style="color:#333333"><b>View Survey</b></h2><br/>
              </div>
              <div class="text-right col-lg-4 table-responsive">
                <a href="/survey/showForm/"><i class="fa-solid fa-circle-plus pr-2"></i>Create Survey</a>
              </div>
          </div>
      </div>

      <div class="col-lg-12">
        <div class="row">
          @foreach ($surveys as $survey)

          <div class="col-lg-12 table-responsive mb-5 ml-3" style="border: 1px solid black">
          <span>Dibuat oleh </span> <a href="/client/user/{{ $survey->user->id}}">{{ $survey->user->name}}</a>
            <br>
            <h4 style="color:#333333"><b>{{ $survey->title }}</b></h4>
            <p>{{ $survey->body }}</p>
            <a href="#">{{ $survey->link }}</a><br>
            <i class="fa fa-clock-o" aria-hidden="true"></i> <span>Berlaku hingga 20 Maret 2022</span>

            <div class="mb-4 d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="css-button mr-3" href="/survey/self/edit/{{ $survey->id }}">
              <span class="css-button-icon"><svg width="16" height="16" viewBox="2 2 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"/>
              <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"/>
              </svg></span>
              <span class="css-button-text"><span>Edit</span></span>
            </a>

            <a class="css-button1 alert_notifsurvey" href="/survey/self/delete/{{ $survey->id }}">
              <span class="css-button-icon1"><svg width="16" height="16" viewBox="2 2 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M7.5 7.5A.5.5 0 018 8v6a.5.5 0 01-1 0V8a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V8a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V8z"/>
              <path fill-rule="evenodd" d="M16.5 5a1 1 0 01-1 1H15v9a2 2 0 01-2 2H7a2 2 0 01-2-2V6h-.5a1 1 0 01-1-1V4a1 1 0 011-1H8a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM6.118 6L6 6.059V15a1 1 0 001 1h6a1 1 0 001-1V6.059L13.882 6H6.118zM4.5 5V4h11v1h-11z" clip-rule="evenodd"/>
              </svg></span>
              <span class="css-button-text1"><span>Delete</span></span>
            </a>

          </div>
          </div>
         @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
