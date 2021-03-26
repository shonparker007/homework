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

<form id="ajaxform" action="/barcode" method="post">
@csrf
<div class="container text-center">
  <div class="row">
    <div class="col-md-8 offset-md-2">

    <div class="content-bar">
       <h1 class="mb-5">Laravel 8 Barcode Generator</h1>
   
       <div class="barcode">    

       @if(isset($code))
        {!! DNS1D::getBarcodeHTML($code, 'C39') !!}       
     
      </div></br>
  
       
       <div class="productName">แผ่นซิปซั่ม
      
        {!! $code  !!}
   
       </div></br>
       @endif
</div>

       <br>
   

<div> ชื่อสินค้า </div><input name="barCo" type="text" /></div>

<!--

<div> ชื่อสินค้า </div><input name="product" type="text" value="แผ่นยิปซั่ม" readonly/></div>
<div> ชนิดสินค้า </div><select name="category" id="category">
  <option value="G01">ชนิดธรรมดา</option>
  <option value="G02">ชนิดทนร้อน</option>
  <option value="G03">ชนิดทนชื้น</option>
</select></div>
<div> แบรนด์ </div>
<select name="Brands" id="Brands">
  <option value="CX01">TOA</option>
  <option value="CX02">GM</option>
  <option value="CX03">VIP</option>

</select>

<div> Lot </div><select name="Lot" id="Lot">
  <option value="L1">L1</option>
  <option value="L2">L2</option>

</select></div>
<br>
<section style="margin-right:0;width:95%">
<div id="ttotal"> จำนวน <input id="total"  name="total" type="text"/><div class="waring">กรอกเฉพาะตัวเลข</div></div>

-->


<div id="bn"><input id="ok" name="button" value="ตกลง" type="button"></div>
</section>


<!--
      
       <div>{!! DNS1D::getBarcodeHTML('4445645656', 'PHARMA') !!}</div></br>
       <div>{!! DNS2D::getBarcodeHTML('4445645656', 'QRCODE') !!}</div></br>
       -->
    </div>
  </div>
</div>
</form>
<script>
function myFunction(a) {
 // var str = "12121212";
 var v=$(this).val();

  var patt1 = /[0-9]/g;


  var result = v.match(patt1);

  alert(result);
  document.getElementById(a).innerHTML = result;
}






$(function(){

    $("#total").on('keypress keydown',function(event){

        var a=event.which || event.keyCode;
        if ( a == 13 ) {          
     event.preventDefault();   
     
    }
    });


    //$("barCo)


$("div.barcode div").css({"height":"90px"});

$("#ok").click(function(){

    let _token   = $('meta[name="csrf-token"]').attr('content');

var Brands=$("#Brands").val();
var category=$("#category").val();
var Lot=$("#Lot").val();
var total=$("#total").val();
$("#ajaxform").submit();
$.ajax({
        url: "/barcode",
        type:"POST",
        data:{
            Brands:Brands,
            category:category,
            Lot:Lot,
            total:total  , 
            _token:_token,       
        },
        success:function(data){
       
          if(data) {

            //$('.success').text(response.success);

        //  $('.barcode').html(data);
          }
        },
       });
  });


});




</script>
</body>
</html>