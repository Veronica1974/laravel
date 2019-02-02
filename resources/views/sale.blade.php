<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
               
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                display: block;
                margin-bottom: 5%;
                
            }
            .form-group{
            background-color: #f2f5f8;
                  color :#2c3e50;
                   display: block;
                  margin-left: auto;
                  margin-right: auto;
                  width: 30%;
                  padding: 5%;
            }
            .control-label{
             color :#2c3e50;
             font-weight: bold;
             margin-right: 7%
            }
            .col-sm-6{
                width: 90%;
                margin: 15px auto;
            }
.table_class{
 
                display: block;
               
}
.td_title{
color :#2c3e50;
             font-weight: bold;
             text-align:center;
             width:20%;
             
}

.td_data{background-color: #f2f5f8;  border:1px solid #ffffff;  color :#2c3e50;
             font-weight: bold;}
.tr_title{ background-color: #ffffff; border:1px solid #f2f5f8;}
        .btn-default{  background-color: #3498db;color:#ffffff; margin:1%; padding:1%; cursor:pointer;}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                 
   


     <div class="form-group">
    <form action="{{ url('store') }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      
     
        <h1>New Sale Creation</h1>

        <div class="col-sm-6">
          <label for="product_name" class="control-label">Product Name</label>
          <input type="text" name="product_name" id="product_name" class="form-control">
        </div>
         <div class="col-sm-6">
         <label for="sale_price" class="control-label">Price</label>
          <input type="text" name="sale_price" id="sale_price" class="form-control">
        </div>
         <div class="col-sm-6">
          <label for="currency" class="control-label">Currency</label>
          <select name="currency">
           						<option value="">Select Currency</option>
                                <option value="ILS">ILS</option>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                            </select>
          
        </div>
         
     
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Insert Payment Details
          </button>
        </div>
      </div>
    </form>
 </div>
    
       
     @if ($saledata)
        <div class="table_class">
        <table>
         <tr class="tr_title">
            <td class="td_title">Time</td>
            <td class="td_title">Sale Number</td>
            <td class="td_title">Description</td>
            <td class="td_title">Amount</td>
            <td class="td_title">Currency</td>
         </tr>
         @foreach ($saledata as $data)
         <tr>
            <td class="td_data">{{ $data->datetime }}</td>
            <td class="td_data"><a href= "{{$data->sale_url}}">{{ $data->payme_sale_code }}</a></td>
             <td class="td_data">{{ $data->product_name }}</td>
            <td class="td_data">{{ $data->sale_price }}</td>
            <td class="td_data">{{ $data->currency }}</td>
         </tr>
         @endforeach
      </table>
      </div>
      @endif
      
        </div>
    </body>
</html>
