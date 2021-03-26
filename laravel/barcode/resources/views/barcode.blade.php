<!DOCTYPE html>
<html>
<head>
  <title>Laravel 8 Barcode Generator</title>

  <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>


<style>



input,select{
    font-size:20pt;
    width:95%;
    height:40px;
    margin:0 auto;
    color:black;
    padding-left:20px;
}

input[type="text"]{
    width:93%;
}

input[type="button"]{
    margin-top:10px;
    width:50%;
    height:100%;
margin-left:90%;
margin-right:auto;
    border-radius:10px;
    height:90px;
 
    align:center;

}

.content-bar{
    display:inline-box;
    margin-left:auto;
    margin-right:auto;
    text-align:center;
}

.barcode>div{
margin:auto;
}

input[type="button"]:hover{
    cursor:pointer;
}

#bn{


    width:40%;
    height:40px;
    margin-left:auto;
    margin-right:auto;
    margin-left:40px;
}

#total{
width:20%;
background-color:yellow;
border-radius:40px;
color:red;
front-size:20px;
text-align:center;

}

.waring{
 color:red;
    font-color:red;
    font-size:16px;
    width:120px;
    margin-left:180px;

}
.productName{
    margin-top:10px;
}

input[name="product"]{
 background-color:rgb(35,41,70);
 color:white;
}


div.container{
    margin-left:40px;
}

#ttotal{
   right:0px;
 font-size:30px;
 color:#000000;
}

section{

    margin-left:auto;
    margin-right:auto;
}


div.barcode>div{
    height:500px;
}

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body>

<form id="ajaxform" action="/barcodeSearch" method="post">
@csrf
<div class="container text-center">
  <div class="row">
    <div class="col-md-8 offset-md-2">

    <div class="content-bar">
       <h1 class="mb-5">Laravel 8 Barcode Generator</h1>
   

   <pre>
   </pre>
       <div class="barcode">    

       @if(isset($code) and $code!="")
        {!! DNS1D::getBarcodeHTML($code, 'C39') !!}       
     
      </div></br>
  
       
       <div class="productName">แผ่นซิปซั่ม
      
        {!! $code  !!}
   
   @else
   {!! "ไม่พบข้อมูล" !!}
       </div></br>
       @endif
</div>

       <br>
   

<div> ชื่อสินค้า </div><input id="barco" name="barco" type="text"/></div>


<div id="bn"><input id="ok" name="button" value="ตกลง" type="button"></div>
</section>



    </div>
  </div>
</div>
</form>
<script>


$(function(){

  
$("div.barcode div").css({"height":"90px"});

$("#ok").click(function(){

    let _token   = $('meta[name="csrf-token"]').attr('content');


var barco=$("#barCo").val();
$("#ajaxform").submit();

  });


});




</script>
</body>
</html>