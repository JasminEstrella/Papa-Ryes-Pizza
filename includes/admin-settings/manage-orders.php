<?php
    session_start();

?>


<div class="container manage-orders">
    <!-- <h3>Hi, <?=$_SESSION['username'];?>!</h3> -->
    <div class="mb-3">
        <h4>Manage Orders</h4>
    </div>

    <div class="table-content my-4 table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer</th>
                    <th scope="col">No. of products</th>
                    <!-- <th scope="col">Address</th> -->
                    <th scope="col">Payment Type</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Jasxxxx</td>
                    <td>3</td>
                    <!-- <td>xxxxx</td> -->
                    <td>COD</td>
                    <td>Pending</td>
                    <td>
                        <a class="view" data-toggle="modal" data-target="#manageOrder">View</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Jasxxxx</td>
                    <td>3</td>
                    <!-- <td>xxxxx</td> -->
                    <td>COD</td>
                    <td>Pending</td>
                    <td>
                        <a class="view">View</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Jasxxxx</td>
                    <td>3</td>
                    <!-- <td>xxxxx</td> -->
                    <td>COD</td>
                    <td>Pending</td>
                    <td>
                        <a class="view">View</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Jasxxxx</td>
                    <td>3</td>
                    <!-- <td>xxxxx</td> -->
                    <td>COD</td>
                    <td>Pending</td>
                    <td>
                        <a class="view">View</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Jasxxxx</td>
                    <td>3</td>
                    <!-- <td>xxxxx</td> -->
                    <td>COD</td>
                    <td>Pending</td>
                    <td>
                        <a class="view">View</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Jasxxxx</td>
                    <td>3</td>
                    <!-- <td>xxxxx</td> -->
                    <td>COD</td>
                    <td>Pending</td>
                    <td>
                        <a class="view">View</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Jasxxxx</td>
                    <td>3</td>
                    <!-- <td>xxxxx</td> -->
                    <td>COD</td>
                    <td>Pending</td>
                    <td>
                        <a class="view">View</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Jasxxxx</td>
                    <td>3</td>
                    <!-- <td>xxxxx</td> -->
                    <td>COD</td>
                    <td>Pending</td>
                    <td>
                        <a class="view">View</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Jasxxxx</td>
                    <td>3</td>
                    <!-- <td>xxxxx</td> -->
                    <td>COD</td>
                    <td>Pending</td>
                    <td>
                        <a class="view">View</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Jasxxxx</td>
                    <td>3</td>
                    <!-- <td>xxxxx</td> -->
                    <td>COD</td>
                    <td>Pending</td>
                    <td>
                        <a class="view">View</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Jasxxxx</td>
                    <td>3</td>
                    <!-- <td>xxxxx</td> -->
                    <td>COD</td>
                    <td>Pending</td>
                    <td>
                        <a class="view">View</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Jasxxxx</td>
                    <td>3</td>
                    <!-- <td>xxxxx</td> -->
                    <td>COD</td>
                    <td>Pending</td>
                    <td>
                        <a class="view">View</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Jasxxxx</td>
                    <td>3</td>
                    <!-- <td>xxxxx</td> -->
                    <td>COD</td>
                    <td>Pending</td>
                    <td>
                        <a class="view">View</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Jasxxxx</td>
                    <td>3</td>
                    <!-- <td>xxxxx</td> -->
                    <td>COD</td>
                    <td>Pending</td>
                    <td>
                        <a class="view">View</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Jasxxxx</td>
                    <td>3</td>
                    <!-- <td>xxxxx</td> -->
                    <td>COD</td>
                    <td>Pending</td>
                    <td>
                        <a class="view">View</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Jasxxxx</td>
                    <td>3</td>
                    <!-- <td>xxxxx</td> -->
                    <td>COD</td>
                    <td>Pending</td>
                    <td>
                        <a class="view">View</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

      <!-- Modal -->
      <div class="modal fade" id="manageOrder" tabindex="-1" role="dialog" aria-labelledby="manageOrderLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="manageOrderLabel">Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Order ID: <span>00123</span> </p>
                    <p>Recepient: <span>Diluc Ragnvindr</span> </p>
                    <p>Address: <span>111 Starfell Valley, Mondstadt, Teyvat</span> </p>
                    <p>Order Items: <span></span> </p>
                    <div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Quantity</th>
                            <th scope="col">Item/s</th>
                            <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Bacon Pizza</td>
                                <td>Php 230.00</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Coke Float</td>
                                <td>Php 35.00</td>
                            </tr>
                            <tr >
                                <td colspan="2">Total</td>
                                <td class="total-price" >Php 265.00</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <p>Payment Method: <span>Bank Transfer</span> </p>
                    <p>Payment Status: <span>Paid</span> </p>
                    <p> <span></span> </p>
                    <button type="button" class="my-3 btn btn-primary confirm-order"> Confirm Order </button>
                    <button type="button" class="my-3 btn btn-warning cancel-order">Cancel Order</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                    
                </div>
            </div>
        </div>
    </div>

</div>