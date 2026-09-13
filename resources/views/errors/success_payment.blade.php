<style>

    @import url('https://fonts.googleapis.com/css?family=Maven+Pro');
    @import url('https://fonts.googleapis.com/css?family=Roboto:100,400');
    #session-messages {
        font-size: 12px !important;
    }
    div.box {
    margin: auto;
    padding: 0px;
    }
    #img-column {
        padding: 0px;
        max-height: 260px;
    }
    img {
        height: 260px;
        width: 100%;
        border-top-right-radius: 5px;
        border-top-left-radius: 5px;
    }
    hr {
        margin: 0px;
    }
    .product-info {
        background-color: #e8e8e8;
        padding: 0px;
    }
    .product-info > p {
        padding: 12px;
        padding-top: 30px;
        padding-bottom: 30px;
        font-family: 'Maven Pro', sans-serif;
        color: #00D1B2;
    }
    #input-column {
        padding-top: 30px;
        padding-bottom: 30px;
    }
    .error {
    display: none;
    font-size: 13px;
    }
    .error.visible {
    display: inline;
    }
    .error {
    color: #E4584C;
    }
    /***********
    SUCCESS PAGE
    *************/
    #thank-you  h1 {
        font-family: 'Roboto', sans-serif;
        padding-top: 30px;
        margin-bottom: 0px;
        color: #00D1B2;
    }
    #thank-you > p {
        font-family: 'Maven Pro', sans-serif;
        padding-bottom: 20px;
    }
    #thank-you {
        background-color: #e8e8e8;
        padding: 0px;
    }
    .big  {
        font-size: 200px;
        color: #00D1B2;
    }
    .sub-title {
        font-family: 'Maven Pro', sans-serif;
        font-size: 40px;
    }
    #message {
        background-color: #e8e8e8;
        padding: 0px;
    }
    #message p {
        font-family: 'Maven Pro', sans-serif;
        padding: 30px 20px 30px 20px;
        color: #00D1B2;
    }
</style>
</div>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<style>

    body
    {
        background:#f2f2f2;
    }

    .payment
    {
        border:1px solid rgb(0,209,178);
        height:280px;
        border-radius:20px;
        background:#fff;
    }
   .payment_header
   {
       background:rgb(0,209,178);
       padding:20px;
       border-radius:20px 20px 0px 0px;

   }

   .check
   {
       margin:0px auto;
       width:50px;
       height:50px;
       border-radius:100%;
       background:#fff;
       text-align:center;
   }

   .check i
   {
       vertical-align:middle;
       line-height:50px;
       font-size:30px;
   }

    .content
    {
        text-align:center;
    }

    .content  h1
    {
        font-size:25px;
        padding-top:25px;
    }

    .content a
    {
        width:200px;
        height:35px;
        color:#fff;
        border-radius:30px;
        padding:5px 10px;
        background:rgb(0,209,178);
        transition:all ease-in-out 0.3s;
    }

    .content a:hover
    {
        text-decoration:none;
        background:#000;
    }

</style>
<div class="container">
    <div class="row">
       <div class="col-md-6 mx-auto mt-5">
          <div class="payment">
             <div class="payment_header">
                <div class="check">
                <i class="fa fa-check-circle-o big" aria-hidden="true"></i></div>
             </div>
             <div class="content">
                <h1>Succesful Payment</h1>
                <br><br>
                <a href="#">check your profile</a>
             </div>

          </div>
       </div>
    </div>
 </div>

