@extends('welcome')

@section('main')
<?php
$orderStatus = 'accept'; // Replace 'accept' with the actual order status value
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Orders</h1>
        
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Orders</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->


    <button type="button" class="badge bg-danger" style="
    margin-right: 10px;
">Pending</button>
    <button type="button" class="badge bg-primary" style="
    margin-right: 10px;
">Preparing</button>
    <button type="button" class="badge bg-warning" style="
    margin-right: 10px;
">Enroute</button>
    <button type="button" class="badge bg-success" style="
    margin-right: 10px;
">Delivered</button>
    <!-- End Buttons -->
        <hr class="mt-3 mb-0">
        <!-- End Divider -->

        <div class="row mt-0">


        <div class=" mt-2" style="width: 250px ;">
            <div class="card" >
              <div class="m-0 card-body">
                
                <div class="row">
                  <div class="col-md-12">
                    <h6>Items</h6>
                    <ul class="list-group">
                      <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                          <span>Paneertika</span>
                          <span>1</span>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                          <span>Paneertika</span>
                          <span>1</span>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                          <span>Paneertika</span>
                          <span>1</span>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                          <span>Paneertika</span>
                          <span>1</span>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                          <span>Paneertika</span>
                          <span>1</span>
                        </div>
                      </li>
                    </ul>
                    
                    
                  </div>
                </div>
                

                <div class="row mt-4">
                  <div class="col-md-12 text-center">
                    @if ($orderStatus === 'accept')
                      <form action="/orders" method="POST">
                        @csrf
                        <input type="hidden" name="order_status" value="ready">
                        <button type="submit" class="btn btn-primary">Ready</button>
                      </form>
                    @elseif ($orderStatus === 'decline')
                      <p>This order has been canceled.</p>
                    @else
                      <form action="/orders" method="POST">
                        @csrf
                        <input type="hidden" name="order_status" value="accept">
                        <button type="submit" class="btn btn-primary">Accept</button>
                      </form>
                      <form action="/orders" method="POST">
                        @csrf
                        <input type="hidden" name="order_status" value="decline">
                        <button type="submit" class="btn btn-danger">Decline</button>
                      </form>
                    @endif
                  </div>
                </div>
                

                
                </div>
              </div>
            </div>
          </div>

        
        </div>

      

</main>
@endsection

